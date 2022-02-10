<?php
$id = $_GET['id'];

if (empty($id)) {
  exit('IDが不正です。');
}

function dbConnect()
{
  $dsn  = 'mysql:host=localhost;dbname=blog;charset=utf8';  // 接続先を定義 $dsn:データソースネームの略
  $user = 'root';  // MySQLのユーザーID
  $pass = '';  // MySQLのパスワード

  try {
    $dbh = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]);
  } catch (PDOException $e) {
    echo 'エラー：' . $e->getMessage();
  }

  return $dbh;
}
$dbh = dbConnect();

//SQLの準備
$stmt = $dbh->prepare('SELECT * FROM blogs WHERE id = :id');
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

//SQLの実行
$stmt->execute();

//結果の取得
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  exit('ブログがありません');
}
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
  <h4>ID:<?php echo $result['id'] ?></h4>
  <h4>タイトル:<?php echo $result['title'] ?></h4>
  <hr>
  <h4>内容:<?php echo $result['content'] ?></h4>
</body>

</html>
