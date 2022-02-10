<?php

require_once('dbc.php');

$blogData = getBlogList()
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>

<body>
  <h2>ブログ一覧</h2>
  <p><a href="form.php">新規作成</a></p>
  <table>
    <tr>
      <th>ID</th>
      <th>タイトル</th>
      <th></th>
    </tr>
    <?php foreach ($blogData as $column) : ?>
      <tr>
        <td><?php echo $column['id'] ?></td>
        <td><?php echo $column['title'] ?></td>
        <td><a href="/database/06/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
