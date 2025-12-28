<?php
// Session security - MUST be before session_start
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// Use the domain for the app URL
define('APP_URL', 'https://jobs.mspguild.tech');

// Session security for Production
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// Only set cookie_secure if we are actually on HTTPS
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    ini_set('session.cookie_secure', 1);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration (Adjust values to match your compose.yaml)
define('DB_HOST', getenv('DB_HOST') ?: 'db');
define('DB_NAME', getenv('DB_NAME') ?: 'opsnerds');
define('DB_USER', getenv('DB_USER') ?: 'opsnerds');
define('DB_PASS', getenv('DB_PASS') ?: 'opsnerds');

define('APP_NAME', 'OpsNerds');

// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
