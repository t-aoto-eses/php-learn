<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  session_start();
  ?>

  <p>ページ２　ログイン情報：<?php echo htmlspecialchars($_SESSION['my_id']); ?></p>

  <p><a href="./session01.php">前のページへ</a></p>
  <p><a href="./session_logout.php">ログアウトする</a></p>
</body>

</html>
