<?php

namespace App\Controller;

use App\Config\Database;
use App\Security\Helpers;
class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'seeker';

            $minPassword = (int)getenv('PASSWORD_MIN_LENGTH') ?: 12;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < $minPassword) {
                // In Phase 2, we will use proper Exception handling/Flash messages
                http_response_code(400);
                die("Invalid email or password (min $minPassword chars).");
            }

            $db = Database::getInstance();

            // Check if user exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                die("Email already registered.");
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Use 'full_name' to match your master_init.sql
            // For now, we'll default the full_name to the first part of the email
            $fullName = explode('@', $email)[0];

            $stmt = $db->prepare("INSERT INTO users (email, password_hash, role, full_name) VALUES (?, ?, ?, ?)");

            if ($stmt->execute([$email, $hash, $role, $fullName])) {
                header("Location: index.php?action=login&status=registered");
                exit;
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT id, password_hash, role FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];

                // Optional: Create entry in user_sessions table here

                header("Location: index.php?action=dashboard");
                exit;
            }
            die("Invalid credentials.");
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
