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
  <h3>タイトル:<?php echo $blogDetail['title'] ?></h3>
  <h5>作成日時:<?php echo $blogDetail['created_at'] ?></h4>
  <h5>更新日時:<?php echo $blogDetail['updated_at'] ?></h5>
  <hr>
  <h4><?php echo $blogDetail['content'] ?></h4>
</body>

</html>
