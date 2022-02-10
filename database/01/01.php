<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  接続テスト<br />
  <?php
    //データベースに接続する。
    $dsn  = 'mysql:host=localhost;dbname=blog;charset=utf8';  // 接続先を定義 データソースネームの略
    $user = 'root';  // MySQLのユーザーID
    $pass = '';  // MySQLのパスワード

    try {
      $dbh = new PDO ($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
      echo '接続成功';
      $dbh = null;
    } catch(PDOException $e) {
      echo '接続失敗'.$e->getMessage();
    }
  ?>
</body>
</html>
