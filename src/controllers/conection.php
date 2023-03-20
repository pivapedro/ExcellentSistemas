<?php

class Conection
{
  private $query;
  private $link;
  private $result;
  private $servername = 'localhost:3308';
  private $dbname = 'sales';
  private $username = 'root';
  private $password = 'teste123';
  public function ConnnectionStart()
  {
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Conexão falhou: " . $e->getMessage();
    }
  }
}

?>