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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $title = trim($_POST['title']);
            $category = $_POST['category'];
            $description = trim($_POST['description']);
            $budget = trim($_POST['budget']);

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO jobs (poster_id, title, category, description, budget) VALUES (?, ?, ?, ?, ?)");
            
            if ($stmt->execute([$_SESSION['user_id'], $title, $category, $description, $budget])) {
                header("Location: index.php?action=browse_jobs&status=posted");
                exit;
            } else {
                die("Failed to post job.");
            }
        }
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
