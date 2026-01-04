<?php
##require_once __DIR__ . '/Database.php';
namespace App\Controller;
use App\Config\Database;

class JobController {
    /**
     * Show the job posting form
     */
    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        // Match your actual filename
        include __DIR__ . '/../../views/JobPosterForm.php';
    }

    /**
     * Handle the POST request to save a job
     */
    public function store() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=post_job");
            exit;
        }

        // NOTE:
        // You already run Helpers::verify_csrf() globally in index.php.
        // So if CSRF fails, it likely exits/throws before reaching here.
        // If you want per-form CSRF handling instead, we can adjust later.

        $title = trim($_POST['title'] ?? '');
        $category = trim($_POST['category'] ?? 'server');
        $description = trim($_POST['description'] ?? '');
        $budget = trim($_POST['budget'] ?? '');

        $allowedCategories = ['server', 'web', 'network', 'general'];

        $errors = [];

        if ($title === '' || mb_strlen($title) < 3) {
            $errors[] = "Job Title is required (min 3 characters).";
        }

        if (!in_array($category, $allowedCategories, true)) {
            $errors[] = "Invalid category selected.";
        }

        if ($description === '' || mb_strlen($description) < 20) {
            $errors[] = "Description is required (min 20 characters).";
        }

        if (mb_strlen($budget) > 100) {
            $errors[] = "Budget is too long.";
        }

        if ($errors) {
            // Store for the redirect so create() can display them
            $_SESSION['form_errors'] = $errors;
            $_SESSION['form_old'] = [
                'title' => $title,
                'category' => $category,
                'description' => $description,
                'budget' => $budget,
            ];

            header("Location: index.php?action=post_job");
            exit;
        }

        $db = Database::getInstance();

        // your schema uses poster_id
        $stmt = $db->prepare("
        INSERT INTO jobs (poster_id, title, category, description, budget)
        VALUES (?, ?, ?, ?, ?)
    ");

        $ok = $stmt->execute([
            $_SESSION['user_id'],
            $title,
            $category,
            $description,
            ($budget === '' ? null : $budget),
        ]);

        if ($ok) {
            header("Location: index.php?action=browse_jobs&status=posted");
            exit;
        }

        // Fail safe
        $_SESSION['form_errors'] = ["Failed to post job. Please try again."];
        $_SESSION['form_old'] = [
            'title' => $title,
            'category' => $category,
            'description' => $description,
            'budget' => $budget,
        ];
        header("Location: index.php?action=post_job");
        exit;
    }


    /**
     * List all available jobs for Seekers
     */
    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT j.*, u.full_name FROM jobs j JOIN users u ON j.poster_id = u.id ORDER BY j.created_at DESC");
        $jobs = $stmt->fetchAll();

        include __DIR__ . '/../../views/AvailableJobsPage.php';
    }

    /**
     * View a single job's details
     */
    public function view() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $db = Database::getInstance();
    
        $stmt = $db->prepare("SELECT j.*, u.full_name FROM jobs j JOIN users u ON j.poster_id = u.id WHERE j.id = ?");
        $stmt->execute([$id]);
        
        // Add this line to actually fetch the job data
        $job = $stmt->fetch();

        if (!$job) {
            die("Job not found.");
        }

        // Match your actual filename
        include __DIR__ . '/../../views/JobDetailsView.php';
    }

    /**
     * Handle job application submission
     */
    public function apply() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $jobId = (int)$_POST['job_id'];
            $seekerId = $_SESSION['user_id'];
            $message = trim($_POST['message']);

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO job_applications (job_id, seeker_id, cover_letter) VALUES (?, ?, ?)");
            
            if ($stmt->execute([$jobId, $seekerId, $message])) {
                header("Location: index.php?action=browse_jobs&status=applied");
                exit;
            } else {
                die("Failed to submit application.");
            }
        }
    }

    /**
     * List all jobs posted by the current user
     */
    public function myJobs() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $userId = $_SESSION['user_id'];
        $db = Database::getInstance();

        // Get jobs plus the count of applications for each
        $stmt = $db->prepare("
            SELECT j.*, 
            (SELECT COUNT(*) FROM job_applications WHERE job_id = j.id) as app_count 
            FROM jobs j 
            WHERE j.poster_id = ? 
            ORDER BY j.created_at DESC
        ");
        $stmt->execute([$userId]);
        $myJobs = $stmt->fetchAll();

        include __DIR__ . '/../../views/MyJobPosts.php';
    }

    /**
     * View applications for a specific job
     */
    public function viewApplications() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $jobId = (int)$_GET['job_id'];
        $db = Database::getInstance();

        // Security check: Ensure this user actually owns this job
        $stmt = $db->prepare("SELECT id, title FROM jobs WHERE id = ? AND poster_id = ?");
        $stmt->execute([$jobId, $_SESSION['user_id']]);
        $job = $stmt->fetch();

        if (!$job) {
            die("Unauthorized or job not found.");
        }

        // Get the applications and the seeker's display name
        $stmt = $db->prepare("
            SELECT a.*, u.full_name, u.email 
            FROM job_applications a 
            JOIN users u ON a.seeker_id = u.id 
            WHERE a.job_id = ? 
            ORDER BY a.created_at DESC
        ");

        include __DIR__ . '/../../views/ViewApplications.php';
    }
}
