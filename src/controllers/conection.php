<?php

class Conection
{
  private $link;
  private $servername = 'localhost:3308';
  private $dbname = 'sales';
  private $username = 'root';
  private $password = 'teste123';
  private function ConnectionStart()
  {
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $this->link = $conn;
    } catch (PDOException $e) {
      echo "Conexão falhou: " . $e->getMessage();
    }
  }

  private function ConnectionStop()
  {
    return $this->link = null;
  }

  public function SqlQueryExe($query)
  {
    $this->ConnectionStart();

    try {
      $stmt = $this->link->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($results) {
        return $results;
      }
    } catch (PDOException $e) {
    };

    $this->ConnectionStop();
  }
}
