<?php
require_once('Database.class.php');

class QueryBuilder {
    private $pdo;
    private $table;
    private $columns = '*';
    private $where = '';
    private $orderBy = '';
    private $limit = '';

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function table($table) {
        $this->table = $table;
        return $this;
    }

    public function select($columns = '*') {
        $this->columns = $columns;
        return $this;
    }

    public function where($column, $operator, $value) {
        if ($this->where == '') {
            $this->where = ' WHERE ';
        } else {
            $this->where .= ' AND ';
        }
        $this->where .= $column . ' ' . $operator . ' ' . $this->pdo->quote($value);
        return $this;
    }

    public function orderBy($column, $direction = 'ASC') {
        $this->orderBy = ' ORDER BY ' . $column . ' ' . $direction;
        return $this;
    }

    public function limit($limit) {
        $this->limit = ' LIMIT ' . $limit;
        return $this;
    }

    public function get() {
        $sql = 'SELECT ' . $this->columns . ' FROM ' . $this->table . $this->where . $this->orderBy . $this->limit;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_map(function($value) {
            return $this->pdo->quote($value);
        }, array_values($data)));
        $sql = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . $values . ')';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function update($data) {
        $set = '';
        foreach ($data as $column => $value) {
            $set .= $column . ' = ' . $this->pdo->quote($value) . ', ';
        }
        $set = rtrim($set, ', ');
        $sql = 'UPDATE ' . $this->table . ' SET ' . $set . $this->where;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function delete() {
        $sql = 'DELETE FROM ' . $this->table . $this