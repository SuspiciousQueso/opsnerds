<?php

namespace App\Security;

class Helpers {
    /**
     * Escape HTML for output (XSS Prevention)
     */
    public static function e(?string $text): string {
        return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
    }

    /**
     * Generate CSRF hidden input field
     */
    public static function csrf_field(): string {
        $token = $_SESSION['csrf_token'] ?? '';
        return '<input type="hidden" name="csrf_token" value="' . self::e($token) . '">';
    }

    /**
     * Verify CSRF token from POST request
     */
    public static function verify_csrf(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
                http_response_code(403);
                die('CSRF token validation failed.');
            }
        }
    }
}
