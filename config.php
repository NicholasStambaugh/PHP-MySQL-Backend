<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_username');
define('DB_PASSWORD', 'your_database_password');

// Website configuration
define('WEBSITE_NAME', 'Your Website Name');
define('WEBSITE_URL', 'http://yourwebsite.com');

// Security configuration
define('SECRET_KEY', 'your_secret_key_here');
define('HASH_ALGO', 'sha256');
define('SESSION_NAME', 'your_session_name_here');

// Error reporting configuration
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Timezone configuration
date_default_timezone_set('UTC');
?>
