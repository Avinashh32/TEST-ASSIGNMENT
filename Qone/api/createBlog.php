<?php
require_once '../Blog.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data['title']) && !empty($data['description']) && !empty($data['category'])) {
    $blog = new Blog($pdo);
    $id = $blog->createBlog($data['title'], $data['description'], $data['category']);
    echo json_encode(['message' => 'Blog created', 'id' => $id]);
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>
