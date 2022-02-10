<?php

Class Dbc
{
  protected $table_name;

  protected function dbConnect()
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

  public function getAll()
  {
    $dbh = $this->dbConnect();
    //1.SQLの準備
    $sql = "SELECT * FROM $this->table_name";
    //2.SQLの実行
    $stmt = $dbh->query($sql);
    //3.SQLの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;

    return $result;
  }

  /**
   * @param id
   *
   * @return result
   */
  public function getById($id) {
    if (empty($id)) {
      exit('IDが不正です。');
    }

    $dbh = $this->dbConnect();

    try {
      //SQLの準備
      $stmt = $dbh->prepare("SELECT * FROM $this->table_name WHERE id = :id");
      $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
      //SQLの実行
      $stmt->execute();
      //結果の取得
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo 'エラー：' . $e->getMessage();
    }

    if (!$result) {
      exit('ブログがありません');
    }

    return $result;
  }
}
?>


