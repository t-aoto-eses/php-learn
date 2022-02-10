<?php
require_once('dbc.php');

class Blog extends Dbc
{
  protected $table_name = 'blogs';
  public function blogCreate($blogs)
  {
    $sql = 'INSERT INTO
          blogs(title, content, publish_status, created_at, updated_at)
        VALUES
          (:title, :content, :publish_status, :created_at, :updated_at)';

    $dbh = $this->dbConnect();

    $dbh->beginTransaction();
    try {
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
      $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
      $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
      date_default_timezone_set('Asia/Tokyo');
      $stmt->bindValue(':created_at', date("Y/m/d H:i:s"), PDO::PARAM_STR);
      $stmt->bindValue(':updated_at', date("Y/m/d H:i:s"), PDO::PARAM_STR);
      $stmt->execute();
      $dbh->commit();
      echo 'ブログを投稿しました！';
    } catch (PDOException $e) {
      $dbh->rollBack();
      echo 'エラー：' . $e->getMessage();
    }
  }
}
?>
