<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Environment;
use App\Security\Helpers;
use App\Controller\AuthController;
use App\Controller\JobController;
use App\Controller\SupportRequestController;
use App\Controller\ProfileController;
// Load environment and validate
Environment::load(__DIR__ . '/..');

// ... session setup ...
session_start();

// Define global variable for views
$isLoggedIn = isset($_SESSION['user_id']);

// Global CSRF Verification
Helpers::verify_csrf();

$action = $_GET['action'] ?? 'home';

switch ($action) {
   // case 'home':
    //   include __DIR__ . '/../views/AboutPage.php'; // Or LandingPage if you have it
           // break;
    case 'home':
        include __DIR__ . '/../views/LandingPage.php';
        break;

    case 'manifesto':
        include __DIR__ . '/../views/ManifestoPage.php';
        break;

    case 'about':
        include __DIR__ . '/../views/AboutPage.php';
        break;

    case 'contact':
        include __DIR__ . '/../views/ContactPage.php';
        break;

    case 'login':
        include __DIR__ . '/../views/LoginForm.php';
        break;

    case 'do_login':
        (new AuthController())->login();
        break;

    case 'register':
        include __DIR__ . '/../views/AccountCreationForm.php';
        break;

    case 'do_register':
        (new AuthController())->register();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    case 'browse_jobs':
        (new JobController())->index();
        break;

    case 'view_job':
        (new JobController())->view();
        break;

    case 'post_job':
        (new JobController())->create();
        break;

    case 'do_post_job':
        (new JobController())->store();
        break;

    case 'dashboard':
        if (!$isLoggedIn) {
            header("Location: index.php?action=login");
            exit;
        }
        include __DIR__ . '/../views/Dashboard.php';
        break;

    case 'submit_request':
        (new SupportRequestController())->handleSubmission();
        break;

    case 'profile':
        (new ProfileController())->view();
        break;

    case 'update_bio':
        (new ProfileController())->updateBio();
        break;

    case 'add_experience':
        (new ProfileController())->addExperience();
        break;

    case 'add_project':
        (new ProfileController())->addProject();
        break;

    default:
        http_response_code(404);
        echo "404 - Page Not Found";
        break;
}