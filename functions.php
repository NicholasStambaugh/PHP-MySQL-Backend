<?php
// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to generate a random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Function to check if a user is logged in
function isLoggedIn() {
    if (isset($_SESSION[SESSION_NAME]) && !empty($_SESSION[SESSION_NAME])) {
        return true;
    } else {
        return false;
    }
}

// Function to redirect to a specified URL
function redirect($url) {
    header('Location: '.$url);
    exit();
}

// Function to display an error message
function displayError($message) {
    echo '<div class="alert alert-danger">'.$message.'</div>';
}

// Function to display a success message
function displaySuccess($message) {
    echo '<div class="alert alert-success">'.$message.'</div>';
}
?>

