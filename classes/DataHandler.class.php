<?php
// Include database file
require_once('../database.php');

class DataHandler {
    private $pdo;

    public function __construct() {
        // Create database connection
        try {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    public function getData($query) {
        // Prepare and execute query
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        // Fetch data
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function insertData($query, $params) {
        // Prepare and execute query
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        // Return the ID of the last inserted row
        return $this->pdo->lastInsertId();
    }

    public function updateData($query, $params) {
        // Prepare and execute query
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        // Return the number of affected rows
        return $stmt->rowCount();
    }

    public function deleteData($query, $params) {
        // Prepare and execute query
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        // Return the number of affected rows
        return $stmt->rowCount();
    }
}
?>

