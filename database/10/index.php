<?php

require_once('blog.php');

session_start();
if (isset($_SESSION['message'])) {
  $session = $_SESSION['message'];
  unset($_SESSION['message']);
} else {
  $session = '　';
}
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
  <p><?php echo htmlspecialchars($session); ?></p>
  <table>
    <tr>
      <th>タイトル</th>
      <th>投稿日時</th>
      <th></th>
    </tr>
    <?php foreach ($blogData as $column) : ?>
    <?php if ($column['publish_status'] === 1) : ?>
    <tr>
      <td><?php echo hs($column['title']) ?></td>
      <td><?php echo hs($column['created_at']) ?></td>
      <td><a href="/database/10/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
      <td><a href="/database/10/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
      <td><a href="/database/10/blog_delete.php?id=<?php echo $column['id'] ?>&title=<?php echo $column['title'] ?>">削除</a></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
  </table>
</body>

</html>
