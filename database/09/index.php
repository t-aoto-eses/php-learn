<?php

require_once('blog.php');

$blog = new Blog();
$blogData = $blog->getAll();

function hs($s)
{
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
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
      <th>タイトル</th>
      <th>投稿日時</th>
      <th></th>
    </tr>
    <?php foreach ($blogData as $column) : ?>
      <tr>
        <td><?php echo hs($column['title']) ?></td>
        <td><?php echo hs($column['created_at']) ?></td>
        <td><a href="/database/09/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
        <td><a href="/database/09/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
        <td><a href="/database/09/blog_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
