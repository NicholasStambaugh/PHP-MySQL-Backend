<?php
/**
 * Validator class
 * 
 * This class provides methods for validating user input
 */
class Validator {
    
    /**
     * Validate email address
     * 
     * @param string $email Email address to validate
     * @return bool True if email is valid, false otherwise
     */
    public static function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Validate password
     * 
     * @param string $password Password to validate
     * @return bool True if password is valid, false otherwise
     */
    public static function validatePassword($password) {
        if (strlen($password) >= 8) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Validate username
     * 
     * @param string $username Username to validate
     * @return bool True if username is valid, false otherwise
     */
    public static function validateUsername($username) {
        if (preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Validate title
     * 
     * @param string $title Title to validate
     * @return bool True if title is valid, false otherwise
     */
    public static function validateTitle($title) {
        if (strlen($title) >= 5) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Validate content
     * 
     * @param string $content Content to validate
     * @return bool True if content is valid, false otherwise
     */
    public static function validateContent($content) {
        if (strlen($content) >= 10) {
            return true;
        } else {
            return false;
        }
    }
}
?>

