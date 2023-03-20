<?php

class Router
{
  protected $linker;
  protected $modulo = '';
  protected $identificador;

  public function __construct()
  {
    $this->linkBreaker($_SERVER['REQUEST_URI']);
  }


  public function linkBreaker($url)
  {
    $urlBreak = explode("/", $_SERVER['REQUEST_URI']);
    $parameters = explode('?', end($urlBreak));
    $counter = count($urlBreak);
    $counterParameters = count($parameters);

    $this->identificador = $urlBreak;

    switch ($counter) {
      case "1":
        $this->setModulo($urlBreak[0]);
      case "2":
        $this->setModulo($urlBreak[1]);
      case "3":
        $this->setModulo($urlBreak[2]);
      case "4":
        $this->setModulo($urlBreak[3]);
    }

  }

  private function setModulo($modulo)
  {
    $this->modulo = $modulo;
    return $this;
  }

  public function getModulo()
  {

    return $this->modulo;
  }

  public function getIdentificador()
  {

    return $this->identificador;
  }
}

?>