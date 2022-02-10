<?php
require_once('dbc.php');

class Blog extends Dbc
{
  protected $table_name = 'blogs';

  public function blogCreate($blogs)
  {
    $sql = "INSERT INTO
          $this->table_name(title, content, publish_status, created_at, updated_at)
        VALUES
          (:title, :content, :publish_status, :created_at, :updated_at)";

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

  public function blogUpdate($blogs)
  {
    $sql = "UPDATE $this->table_name SET
          title = :title, content = :content, publish_status = :publish_status, created_at = :created_at, updated_at = :updated_at
        WHERE
          id = :id";

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
      $stmt->bindValue(':id', $blogs['id'], PDO::PARAM_INT);
      $stmt->execute();
      $dbh->commit();
      echo 'ブログを更新しました！';
    } catch (PDOException $e) {
      $dbh->rollBack();
      echo 'エラー：' . $e->getMessage();
    }
  }

  //ブログのバリデーション
  /**
   * @param blogs
   *
   * @return void|string
   */
  public function blogValidate($blogs)
  {
    if (empty($blogs['title'])) {
      exit('タイトルを入力してください');
    }
    if (mb_strlen($blogs['title']) > 100) {
      exit('100文字以下にして下さい');
    }
    if (empty($blogs['content'])) {
      exit('本文を入力してください');
    }
    if (empty($blogs['publish_status'])) {
      exit('公開ステータスを入力してください');
    }
  }
}
?>
