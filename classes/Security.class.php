<?php
class Security {
    // Hash a password using the configured algorithm and secret key
    public static function hashPassword($password) {
        return hash(HASH_ALGO, $password.SECRET_KEY);
    }

    // Generate a random string of the specified length
    public static function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    // Generate a secure token for use in forms and URLs
    public static function generateToken() {
        $token = self::generateRandomString(32);
        $_SESSION[SESSION_NAME]['tokens'][$token] = time();
        return $token;
    }

    // Verify that a token is valid and has not expired
    public static function verifyToken($token) {
        if (isset($_SESSION[SESSION_NAME]['tokens'][$token])) {
            $timestamp = $_SESSION[SESSION_NAME]['tokens'][$token];
            if (time() - $timestamp < 3600) {
                unset($_SESSION[SESSION_NAME]['tokens'][$token]);
                return true;
            }
        }
        return false;
    }

    // Sanitize input data to prevent SQL injection and other attacks
    public static function sanitizeInput($input) {
        if (is_array($input)) {
            foreach ($input as $key => $value) {
                $input[$key] = self::sanitizeInput($value);
            }
        } else {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
        }
        return $input;
    }
}
?>
