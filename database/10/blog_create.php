<?php
require_once('blog.php');

session_start();

$blogs = $_POST;
$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogCreate($blogs);
header('Location: index.php');
?>
