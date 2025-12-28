<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/Database.php';

// Simple routing logic
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'register':
        include __DIR__ . '/../views/register.php';
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

    case 'home':
    default:
        if (isset($_SESSION['user_id'])) {
            include __DIR__ . '/../views/Dashboard.php';
        } else {
            include __DIR__ . '/../views/AccountCreationForm.php';
        }
        break;

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