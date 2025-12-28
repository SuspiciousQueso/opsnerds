## Me
Project Name: OpsNerds
Purpose:
OpsNerds is a lightweight, income-first web application for on-demand IT support. The goal is to connect people who have broken tech (servers, websites, email, networks, general IT issues) with experienced IT professionals who can respond quickly, primarily via remote support.

Core Philosophy:

Human-first support, not gig-economy bidding

Fast triage and resolution over complex workflows

Simple, understandable UX for non-technical users

Minimal features, no overengineering

Built to generate revenue early, not to be “perfect”

Initial Scope (MVP):
The MVP is intentionally small and pragmatic. It must:

Allow a user to submit a support request describing what is broken

Capture contact details (name, email, optional phone)

Allow an OpsNerd (initially a single admin user) to view and respond to requests

Support remote-first help (no on-site scheduling in v1)

Be secure, stable, and easy to extend later

Explicitly Out of Scope (for now):

Multi-sided marketplaces

User profiles or reputation systems

Bidding, proposals, or gig-style workflows

Real-time chat

Mobile apps

AI-driven matching or automation

Technical Expectations:

PHP-based web app (compatible with common shared/VPS hosting)

Simple MVC or clean, organized structure

Use minimal dependencies unless clearly justified

Prepared statements and input validation everywhere

Sensible defaults over configurability

Clear separation between logic, views, and configuration

Data Model (Initial):

SupportRequest

id

name

email

issue_description

status (new, in_progress, resolved)

created_at

Admin Functionality (v1):

Secure login for admin

View list of requests

View individual request details

Update request status

Design Guidance:

Clean, minimal UI

No heavy frameworks

Accessible and readable

Functional over flashy

Development Instructions:

Prefer clarity over cleverness

Comment non-obvious logic

Avoid premature abstractions

Always ask before introducing major new concepts

Long-Term Direction (Not to implement now):
OpsNerds may eventually support multiple OpsNerds, payments, scheduling, and integrations, but none of that should influence the MVP architecture unless it adds zero complexity.

Your Role:
Act as a pragmatic senior engineer assisting in building a production-ready MVP. Do not invent features. Do not expand scope. Focus on correctness, security, and speed to launch.

## AI Assistant
Hello! It's great to meet you. OpsNerds sounds like a fantastic, focused project. I love the "income-first" and "human-first" philosophy—it's a refreshing approach to building software that solves real problems without getting bogged down in "feature creep."

As your pragmatic senior engineer, I'm ready to help you get this MVP launched. Looking at your project structure, it seems we're starting with a clean slate.

To get us moving toward a stable, secure, and simple PHP application, I suggest we start with the core infrastructure. Since we're aiming for a clean MVC/organized structure without heavy frameworks, here is how I propose we organize the initial codebase:

1.  **`/public`**: The web root (index.php, CSS, JS).
2.  **`/src`**: Core logic (Models, Controllers, Database helper).
3.  **`/views`**: HTML templates.
4.  **`/config`**: Database credentials and app settings.

### First Step: Database Schema
Based on your data model, here is the SQL to get the `support_requests` table ready:

```sql
CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    issue_description TEXT NOT NULL,
    status ENUM('new', 'in_progress', 'resolved') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);
```


### How should we proceed?
Would you like me to:
1.  **Draft the `Database.php` class?** (Using PDO for prepared statements as requested).
2.  **Create the submission form logic?** (The "Submit a Request" part for your users).
3.  **Set up the basic directory structure?**

Let me know where you'd like to dive in first! I'm ready when you are.

## Me
I created a few directories, let's start from scratch with it. Do it right from top to bottom.

## AI Assistant
Understood! Let's build this "right" from the ground up—simple, secure, and organized. Since we are targeting PHP 5.6+ compatibility and a "minimal dependencies" philosophy, we'll use a clean folder structure and a basic front-controller pattern.

Here is the plan for our "Top to Bottom" setup:
1.  **Configuration**: Database credentials.
2.  **Core**: A PDO-based Database wrapper.
3.  **Bootstrap**: The common entry point.
4.  **The Public Entry**: `index.php` to route requests.
5.  **The Form**: A simple view for users to submit requests.

---

### 1. Configuration
First, let's create a config file. This should stay out of the web root.

```php
<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'opsnerds_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// App settings
define('APP_NAME', 'OpsNerds');
define('BASE_URL', 'http://localhost/opsnerds/public');

// Error reporting - should be toggled off in production
ini_set('display_errors', 1);
error_reporting(E_ALL);
```


---

### 2. Database Helper
We'll use PDO for prepared statements to ensure security.

```php
<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}
```


---

### 3. The Public Entry Point
All requests will flow through `public/index.php`. This keeps the URL logic centralized.

```php
<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/Database.php';

// Simple routing logic
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'submit':
        require_once __DIR__ . '/../src/RequestController.php';
        $controller = new RequestController();
        $controller->handleSubmission();
        break;

    case 'home':
    default:
        include __DIR__ . '/../views/home.php';
        break;
}
```


---

### 4. The Request Controller
This handles the logic of receiving data and saving it.

```php
<?php
class RequestController {
    public function handleSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $phone = trim($_POST['phone']);
            $description = trim($_POST['description']);

            if (empty($name) || empty($email) || empty($description)) {
                die("Please fill in all required fields.");
            }

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO support_requests (name, email, phone, issue_description) VALUES (?, ?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $phone, $description])) {
                echo "Support request submitted successfully! We will contact you soon.";
                echo '<br><a href="index.php">Go back</a>';
            } else {
                echo "Something went wrong. Please try again.";
            }
        }
    }
}
```


---

### 5. The View (Home/Form)
A simple, functional UI for the user.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> - Submit a Request</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 600px; margin: 40px auto; padding: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Need IT Help?</h1>
    <p>Tell us what's broken and we'll get an OpsNerd on it.</p>
    
    <form action="index.php?action=submit" method="POST">
        <label for="name">Your Name *</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number (Optional)</label>
        <input type="text" id="phone" name="phone">

        <label for="description">What is the problem? *</label>
        <textarea id="description" name="description" rows="5" required placeholder="Describe the issue, error messages, etc."></textarea>

        <button type="submit">Submit Request</button>
    </form>
</body>
</html>
```


### Next Steps:
1.  **Database**: Make sure you have a MySQL database named `opsnerds_db` with the `support_requests` table I shared in my previous message.
2.  **Admin Area**: Once you're happy with the submission flow, we can build the `/admin` route to let you view and update these requests.

How does this look for a starting structure? Ready to move to the Admin list view?
