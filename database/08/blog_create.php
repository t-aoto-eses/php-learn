<?php
require_once('blog.php');

$blogs = $_POST;



$blog = new Blog();
$blog->blogCreate($blogs);




?>
