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

  if (isset($_POST['my_id'])) {
    $_SESSION['my_id'] = $_POST['my_id'];
  }
  ?>

  <p>ページ１　ログイン情報：<?php echo htmlspecialchars($_SESSION['my_id']); ?></p>
  <p><a href="./session02.php">次のページへ</a></p>
  <p><a href="./session_input.php">入力ページへ</a></p>
</body>

</html>
