<?php

require_once('blog.php');

$blog = new Blog();
$blogDetail = $blog->getById($_GET['id']);

$id = $blogDetail['id'];
$title = $blogDetail['title'];
$content = $blogDetail['content'];
$publish_status = $blogDetail['publish_status'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BlogForm</title>
</head>

<body>
  <h2>ブログ更新フォーム</h2>
  <form action="blog_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <p>ブログタイトル：</p>
    <input type="text" name="title" value="<?php echo $title ?>">
    <p>ブログ本文：</p>
    <textarea name="content" id="content" cols="50" rows="10"><?php echo $content ?></textarea>
    <br>
    <input type="radio" name="publish_status" value="1" <?php if ($publish_status === 1) echo 'checked' ?>>公開
    <input type="radio" name="publish_status" value="2" <?php if ($publish_status === 2) echo 'checked' ?>>非公開
    <br>
    <input type="submit" value="送信">
  </form>
</body>

</html>
