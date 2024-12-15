<?php
require_once '../Blog.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data['id']) && !empty($data['title']) && !empty($data['description']) && !empty($data['category'])) {
    $blog = new Blog($pdo);
    $success = $blog->updateBlog($data['id'], $data['title'], $data['description'], $data['category']);
    if ($success) {
        echo json_encode(['message' => 'Blog updated']);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Blog not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>
