<?php
#require_once __DIR__ . '/Database.php';
namespace App\Controller;
use App\Config\Database;

class ProfileController {
    public function view() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $userId = $_SESSION['user_id'];
        $db = Database::getInstance();

        // Get basic info
        $stmt = $db->prepare("SELECT email, role, bio, full_name FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        // Get work experience
        $stmt = $db->prepare("SELECT * FROM work_experience WHERE user_id = ? ORDER BY start_date DESC");
        $stmt->execute([$userId]);
        $experience = $stmt->fetchAll();

        // Get projects/portfolio
        $stmt = $db->prepare("SELECT * FROM projects WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        $projects = $stmt->fetchAll();

        // Match your actual filename
        include __DIR__ . '/../../views/UserProfilePage.php';
    }

    public function updateBio() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $fullName = trim($_POST['full_name']);
            $bio = trim($_POST['bio']);
            
            $db = Database::getInstance();
            $stmt = $db->prepare("UPDATE users SET full_name = ?, bio = ? WHERE id = ?");
            $stmt->execute([$fullName, $bio, $_SESSION['user_id']]);
            
            header("Location: index.php?action=profile");
            exit;
        }
    }

    public function addExperience() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $company = trim($_POST['company']);
            $role = trim($_POST['role']);
            $start = $_POST['start_date'];
            $end = !empty($_POST['end_date']) ? $_POST['end_date'] : null;
            $desc = trim($_POST['description']);

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO work_experience (user_id, company_name, role_title, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $company, $role, $start, $end, $desc]);

            header("Location: index.php?action=profile");
            exit;
        }
    }

    public function addProject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $link = trim($_POST['link']);

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO projects (user_id, title, description, link) VALUES (?, ?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $title, $description, $link]);

            header("Location: index.php?action=profile");
            exit;
        }
    }
}
