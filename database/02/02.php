<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>

<body>
  <?php
  //selectで表示する
  $dsn  = 'mysql:host=localhost;dbname=blog;charset=utf8';  // 接続先を定義 データソースネームの略
  $user = 'root';  // MySQLのユーザーID
  $pass = '';  // MySQLのパスワード

  try {
    $dbh = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    //1.SQLの準備
    $sql = 'SELECT * FROM blogs';
    //2.SQLの実行
    $stmt = $dbh->query($sql);
    //3.SQLの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
  } catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage();
  }
  ?>
  <h2>ブログ一覧</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>タイトル</th>
    </tr>
    <?php foreach($result as $column): ?>
    <tr>
      <td><?php echo $column['id']?></td>
      <td><?php echo $column['title']?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
