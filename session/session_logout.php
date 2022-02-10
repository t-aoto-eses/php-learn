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
    unset($_SESSION['my_id']);
  }
  header('Location: session_input.php');
  exit();
  ?>
</body>

</html>
