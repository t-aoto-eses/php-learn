<?php

require_once('blog.php');

session_start();

$blog = new Blog();
$result = $blog->delete($_GET['id'], $_GET['title']);
header('Location: index.php');
?>
