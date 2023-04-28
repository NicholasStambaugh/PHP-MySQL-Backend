<?php
require_once('Database.class.php');
require_once('View.class.php');

class Controller {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        $data = $this->db->query('SELECT * FROM posts');
        $view = new View('index');
        $view->render(['data' => $data]);
    }

    public function show($id) {
        $data = $this->db->query('SELECT * FROM posts WHERE id = :id', ['id' => $id]);
        $view = new View('show');
        $view->render(['data' => $data]);
    }

    public function create() {
        $view = new View('create');
        $view->render();
    }

    public function store($data) {
        $this->db->query('INSERT INTO posts (title, content) VALUES (:title, :content)', $data);
        header('Location: /');
    }

    public function edit($id) {
        $data = $this->db->query('SELECT * FROM posts WHERE id = :id', ['id' => $id]);
        $view = new View('edit');
        $view->render(['data' => $data]);
    }

    public function update($id, $data) {
        $this->db->query('UPDATE posts SET title = :title, content = :content WHERE id = :id', array_merge($data, ['id' => $id]));
        header('Location: /');
    }

    public function delete($id) {
        $this->db->query('DELETE FROM posts WHERE id = :id', ['id' => $id]);
        header('Location: /');
    }
}
?>

