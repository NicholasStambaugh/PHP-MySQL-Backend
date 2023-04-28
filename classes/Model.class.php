<?php
require_once('Database.class.php');

class Model {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get($table, $id) {
        $query = "SELECT * FROM $table WHERE id = :id";
        $params = array(':id' => $id);
        return $this->db->select($query, $params);
    }

    public function getAll($table) {
        $query = "SELECT * FROM $table";
        return $this->db->selectAll($query);
    }

    public function insert($table, $data) {
        $query = "INSERT INTO $table (";
        $params = array();
        foreach ($data as $key => $value) {
            $query .= "$key, ";
            $params[":$key"] = $value;
        }
        $query = rtrim($query, ', ') . ") VALUES (";
        foreach ($data as $key => $value) {
            $query .= ":$key, ";
        }
        $query = rtrim($query, ', ') . ")";
        return $this->db->insert($query, $params);
    }

    public function update($table, $id, $data) {
        $query = "UPDATE $table SET ";
        $params = array(':id' => $id);
        foreach ($data as $key => $value) {
            $query .= "$key = :$key, ";
            $params[":$key"] = $value;
        }
        $query = rtrim($query, ', ') . " WHERE id = :id";
        return $this->db->update($query, $params);
    }

    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = :id";
        $params = array(':id' => $id);
        return $this->db->delete($query, $params);
    }
}
?>

