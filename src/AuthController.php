<?php

namespace App;

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $role = $_POST['role']; // 'seeker', 'poster', or 'both'

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
                die("Invalid email or password (min 8 chars).");
            }

            $db = Database::getInstance();
            
            // Check if user exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                die("Email already registered.");
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            // Create a default display name from the email (e.g., "john" from "john@example.com")
            $displayName = explode('@', $email)[0];

            $stmt = $db->prepare("INSERT INTO users (email, password_hash, role, display_name) VALUES (?, ?, ?, ?)");
            
            if ($stmt->execute([$email, $hash, $role, $displayName])) {
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
