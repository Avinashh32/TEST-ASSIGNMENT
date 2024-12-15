<?php
require_once 'database.php';

class Blog {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllBlogs() {
        $stmt = $this->pdo->query("SELECT * FROM blogs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBlogById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM blogs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBlog($title, $description, $category) {
        $stmt = $this->pdo->prepare("INSERT INTO blogs (title, description, category) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $category]);
        return $this->pdo->lastInsertId();
    }

    public function updateBlog($id, $title, $description, $category) {
        $stmt = $this->pdo->prepare("UPDATE blogs SET title = ?, description = ?, category = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $category, $id]);
    }
}
?>
