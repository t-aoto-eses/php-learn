<?php
require_once('blog.php');

$blogs = $_POST;

if (empty($blogs['title'])) {
  exit('タイトルを入力してください');
}
if (mb_strlen($blogs['title']) > 100) {
  exit('100文字以下にして下さい');
}
if (empty($blogs['content'])) {
  exit('本文を入力してください');
}
if (empty($blogs['publish_status'])) {
  exit('公開ステータスを入力してください');
}

$blog = new Blog();
$blog->blogCreate($blogs);




?>
