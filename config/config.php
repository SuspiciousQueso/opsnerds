<?php

use App\Config\Environment;

// Load environment variables
Environment::load();

// Application constants
define('APP_NAME', Environment::get('APP_NAME'));
define('APP_URL', Environment::get('APP_URL'));
define('APP_ENV', Environment::get('APP_ENV'));

// Database constants
define('DB_HOST', Environment::get('DB_HOST'));
define('DB_NAME', Environment::get('DB_NAME'));
define('DB_USER', Environment::get('DB_USER'));
define('DB_PASS', Environment::get('DB_PASSWORD'));

// Error reporting (only in development)
if (Environment::isDebug()) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(0);
}

// Modern session security configuration
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_samesite', Environment::get('SESSION_SAMESITE', 'Strict'));
ini_set('session.cookie_lifetime', (string)Environment::get('SESSION_LIFETIME', 7200));
ini_set('session.gc_maxlifetime', (string)Environment::get('SESSION_LIFETIME', 7200));

// Only set cookie_secure if HTTPS is enabled
if (Environment::get('SESSION_SECURE', true)) {
    ini_set('session.cookie_secure', '1');
}

// Use strict session ID generation
ini_set('session.use_strict_mode', '1');
ini_set('session.sid_length', '48');
ini_set('session.sid_bits_per_character', '6');

// Prevent session fixation
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
    // Regenerate session ID periodically
    if (!isset($_SESSION['_created'])) {
        $_SESSION['_created'] = time();
    } else if (time() - $_SESSION['_created'] > 1800) {
        // Regenerate session ID every 30 minutes
        session_regenerate_id(true);
        $_SESSION['_created'] = time();
    }
}
