<?php

require_once('blog.php');

$blog = new Blog();
$blogDetail = $blog->getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ詳細</title>
</head>

<body>
  <h2>ブログ詳細</h2>
  <h4>ID:<?php echo $blogDetail['id'] ?></h4>
  <h4>タイトル:<?php echo $blogDetail['title'] ?></h4>
  <hr>
  <h4>内容:<?php echo $blogDetail['content'] ?></h4>
</body>

</html>
