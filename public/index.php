<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Start session with security settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    ini_set('session.cookie_secure', 1);
}
session_start();

// Initialize CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Global CSRF Verification for all POST requests
\App\Helpers::verify_csrf();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/Database.php';

// Simple routing logic
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'register':
        include __DIR__ . '/../views/AccountCreationForm.php';
        break;

    case 'do_register':
        require_once __DIR__ . '/../src/AuthController.php';
        (new AuthController())->register();
        break;

    case 'login':
        include __DIR__ . '/../views/LoginForm.php';
        break;

    case 'do_login':
        require_once __DIR__ . '/../src/AuthController.php';
        (new AuthController())->login();
        break;

    case 'logout':
        require_once __DIR__ . '/../src/AuthController.php';
        (new AuthController())->logout();
        break;

    case 'dashboard':
        // Protected route
        if (!isset($_SESSION['user_id'])) { 
            header("Location: index.php?action=login"); 
            exit; 
        }
        include __DIR__ . '/../views/Dashboard.php';
        break;

    case 'about':
        include __DIR__ . '/../views/AboutPage.php';
        break;

    case 'contact':
        include __DIR__ . '/../views/ContactPage.php';
        break;

    case 'home':

    case 'update_profile':
        require_once __DIR__ . '/../src/ProfileController.php';
        (new ProfileController())->updateBio();
        break;

    case 'add_experience':
        require_once __DIR__ . '/../src/ProfileController.php';
        (new ProfileController())->addExperience();
        break;

    case 'add_project':
        require_once __DIR__ . '/../src/ProfileController.php';
        (new ProfileController())->addProject();
        break;

    case 'post_job':
        require_once __DIR__ . '/../src/JobController.php';
        (new JobController())->create();
        break;

    case 'do_post_job':
        require_once __DIR__ . '/../src/JobController.php';
        (new JobController())->store();
        break;

    case 'browse_jobs':
        require_once __DIR__ . '/../src/JobController.php';
        (new JobController())->index();
        break;

    case 'view_job':
        require_once __DIR__ . '/../src/JobController.php';
        (new JobController())->view();
        break;

    case 'apply_job':
        require_once __DIR__ . '/../src/JobController.php';
        (new JobController())->apply();
        break;

        case 'my_jobs':
            require_once __DIR__ . '/../src/JobController.php';
            (new JobController())->myJobs();
            break;

        case 'view_apps':
            require_once __DIR__ . '/../src/JobController.php';
            (new JobController())->viewApplications();
            break;
}

// ... existing code ...

// ... existing code ...