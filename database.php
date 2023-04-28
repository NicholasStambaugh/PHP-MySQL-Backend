<?php
// Include configuration file
require_once('config.php');

// Create database connection
try {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Define database table names
define('USERS_TABLE', 'users');
define('POSTS_TABLE', 'posts');
define('COMMENTS_TABLE', 'comments');

// Define database column names
define('USER_ID', 'user_id');
define('POST_ID', 'post_id');
define('COMMENT_ID', 'comment_id');
define('USERNAME', 'username');
define('PASSWORD', 'password');
define('EMAIL', 'email');
define('TITLE', 'title');
define('CONTENT', 'content');
define('CREATED_AT', 'created_at');
define('UPDATED_AT', 'updated_at');

// Define database queries
define('SELECT_ALL_USERS', 'SELECT * FROM '.USERS_TABLE);
define('SELECT_USER_BY_ID', 'SELECT * FROM '.USERS_TABLE.' WHERE '.USER_ID.' = :id');
define('SELECT_USER_BY_USERNAME', 'SELECT * FROM '.USERS_TABLE.' WHERE '.USERNAME.' = :username');
define('INSERT_USER', 'INSERT INTO '.USERS_TABLE.' ('.USERNAME.', '.PASSWORD.', '.EMAIL.') VALUES (:username, :password, :email)');
define('UPDATE_USER', 'UPDATE '.USERS_TABLE.' SET '.USERNAME.' = :username, '.PASSWORD.' = :password, '.EMAIL.' = :email, '.UPDATED_AT.' = NOW() WHERE '.USER_ID.' = :id');
define('DELETE_USER', 'DELETE FROM '.USERS_TABLE.' WHERE '.USER_ID.' = :id');

define('SELECT_ALL_POSTS', 'SELECT * FROM '.POSTS_TABLE);
define('SELECT_POST_BY_ID', 'SELECT * FROM '.POSTS_TABLE.' WHERE '.POST_ID.' = :id');
define('INSERT_POST', 'INSERT INTO '.POSTS_TABLE.' ('.USER_ID.', '.TITLE.', '.CONTENT.', '.CREATED_AT.') VALUES (:user_id, :title, :content, NOW())');
define('UPDATE_POST', 'UPDATE '.POSTS_TABLE.' SET '.TITLE.' = :title, '.CONTENT.' = :content, '.UPDATED_AT.' = NOW() WHERE '.POST_ID.' = :id');
define('DELETE_POST', 'DELETE FROM '.POSTS_TABLE.' WHERE '.POST_ID.' = :id');

define('SELECT_ALL_COMMENTS', 'SELECT * FROM '.COMMENTS_TABLE);
define('SELECT_COMMENT_BY_ID', 'SELECT * FROM '.COMMENTS_TABLE.' WHERE '.COMMENT_ID.' = :id');
define('SELECT_COMMENTS_BY_POST_ID', 'SELECT * FROM '.COMMENTS_TABLE.' WHERE '.POST_ID.' = :id');
define('INSERT_COMMENT', 'INSERT INTO '.COMMENTS_TABLE.' ('.USER_ID.', '.POST_ID.', '.CONTENT.', '.CREATED_AT.') VALUES (:user_id, :post_id, :content, NOW())');
define('UPDATE_COMMENT', 'UPDATE '.COMMENTS_TABLE.' SET '.CONTENT.' = :content, '.UPDATED_AT.' = NOW() WHERE '.COMMENT_ID.' = :id');
define('DELETE_COMMENT', 'DELETE FROM '.COMMENTS_TABLE.' WHERE '.COMMENT_ID.' = :id');
?>
->where;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }
}
?>

