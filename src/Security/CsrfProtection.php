<?php

namespace App\Security;

use App\Config\Environment;
use App\Exception\CsrfException;

class CsrfProtection
{
    private const TOKEN_LENGTH = 32;

    /**
     * Generate and store a CSRF token in the session
     */
    public static function generateToken(): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $tokenName = Environment::get('CSRF_TOKEN_NAME', '_csrf_token');
        
        if (!isset($_SESSION[$tokenName])) {
            $_SESSION[$tokenName] = bin2hex(random_bytes(self::TOKEN_LENGTH));
        }

        return $_SESSION[$tokenName];
    }

    /**
     * Get the current CSRF token
     */
    public static function getToken(): ?string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $tokenName = Environment::get('CSRF_TOKEN_NAME', '_csrf_token');
        return $_SESSION[$tokenName] ?? null;
    }

    /**
     * Validate CSRF token from request
     */
    public static function validateToken(?string $token): bool
    {
        $sessionToken = self::getToken();
        
        if ($sessionToken === null || $token === null) {
            return false;
        }

        return hash_equals($sessionToken, $token);
    }

    /**
     * Verify CSRF token or throw exception
     */
    public static function verify(): void
    {
        $token = $_POST[Environment::get('CSRF_TOKEN_NAME', '_csrf_token')] ?? 
                 $_SERVER['HTTP_X_CSRF_TOKEN'] ?? 
                 null;

        if (!self::validateToken($token)) {
            throw new CsrfException();
        }
    }

    /**
     * Generate HTML hidden input field with CSRF token
     */
    public static function field(): string
    {
        $token = self::generateToken();
        $tokenName = Environment::get('CSRF_TOKEN_NAME', '_csrf_token');
        
        return sprintf(
            '<input type="hidden" name="%s" value="%s">',
            htmlspecialchars($tokenName, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($token, ENT_QUOTES, 'UTF-8')
        );
    }

    /**
     * Get token for use in JavaScript/AJAX
     */
    public static function getTokenForJs(): array
    {
        return [
            'name' => Environment::get('CSRF_TOKEN_NAME', '_csrf_token'),
            'value' => self::generateToken()
        ];
    }
}
