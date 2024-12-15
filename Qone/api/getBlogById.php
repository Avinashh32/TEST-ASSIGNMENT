<?php
require_once '../Blog.php';

if (isset($_GET['id'])) {
    $blog = new Blog($pdo);
    $result = $blog->getBlogById($_GET['id']);
    if ($result) {
        echo json_encode($result);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Blog not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'ID is required']);
}
?>
