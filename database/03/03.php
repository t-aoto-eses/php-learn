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
  //分かりやすいように関数にまとめる
  function dbConnect() {
    $dsn  = 'mysql:host=localhost;dbname=blog;charset=utf8';  // 接続先を定義 $dsn:データソースネームの略
    $user = 'root';  // MySQLのユーザーID
    $pass = '';  // MySQLのパスワード

    try {
      $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
    } catch (PDOException $e) {
      echo 'エラー：' . $e->getMessage();
    }

    return $dbh;
  }
  function getBlogDate() {
    $dbh = dbConnect();
    //1.SQLの準備
    $sql = 'SELECT * FROM blogs';
    //2.SQLの実行
    $stmt = $dbh->query($sql);
    //3.SQLの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;

    return $result;
  }
  $blogData = getBlogDate();
  ?>
  <h2>ブログ一覧</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>タイトル</th>
    </tr>
    <?php foreach ($blogData as $column) : ?>
      <tr>
        <td><?php echo $column['id'] ?></td>
        <td><?php echo $column['title'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
