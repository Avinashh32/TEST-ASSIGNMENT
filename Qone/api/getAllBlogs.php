<?php
require_once '../Blog.php';

$blog = new Blog($pdo);
echo json_encode($blog->getAllBlogs());
?>
