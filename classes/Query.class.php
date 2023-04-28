<?php
// Query class for executing SQL queries

class Query {
    private $pdo;
    private $query;
    private $params;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function select($table, $columns = '*') {
        $this->query = "SELECT $columns FROM $table";
        return $this;
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $this->query = "INSERT INTO $table ($columns) VALUES ($values)";
        $this->params = $data;
        return $this;
    }

    public function update($table, $data, $id) {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');
        $this->query = "UPDATE $table SET $set WHERE id = :id";
        $this->params = $data;
        $this->params['id'] = $id;
        return $this;
    }

    public function delete($table, $id) {
        $this->query = "DELETE FROM $table WHERE id = :id";
        $this->params = ['id' => $id];
        return $this;
    }

    public function where($column, $operator, $value) {
        $this->query .= " WHERE $column $operator :$column";
        $this->params[$column] = $value;
        return $this;
    }

    public function orderBy($column, $direction = 'ASC') {
        $this->query .= " ORDER BY $column $direction";
        return $this;
    }

    public function limit($limit) {
        $this->query .= " LIMIT $limit";
        return $this;
    }

    public function execute() {
        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt;
    }
}
?>

