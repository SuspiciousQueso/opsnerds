<?php

namespace App\Controller;

use App\Config\Database;

class SupportRequestController {
    public function handleSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $phone = trim($_POST['phone'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if (empty($name) || empty($email) || empty($description)) {
                // In Phase 2, we'll replace this with a proper flash message
                http_response_code(400);
                echo "Please fill in all required fields.";
                return;
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
