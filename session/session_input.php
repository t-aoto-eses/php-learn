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

    if (isset($_SESSION['my_id'])) {
      $session = $_SESSION['my_id'];
    } else {
      $session = '無し';
    }
  ?>
  <p>ログイン情報：<?php echo htmlspecialchars($session); ?></p>
  <form method="post" action="session01.php">
    <dl>
      <dt>ID</dt>
      <dd><input type="text" name="my_id" id="my_id" /></dd>

      <dt>パスワード</dt>
      <dd><input type="password" name="password" id="password" /></dd>
    </dl>

    <input type="submit" value="送信する" />
  </form>
</body>

</html>
