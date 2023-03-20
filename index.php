<?php
session_start();

 
require_once("src/views/constructor.php");
require_once("src/controllers/conection.php");
require_once("src/routes/index.php");


$Conection = new Conection();
$router = new Router();
$constructor = new Constructor();

$Conection->ConnnectionStart();


$json_routerList = file_get_contents("src/routes/routerList.json");
$routeList = json_decode($json_routerList, true);

$modulo = $router->getModulo();


if (!isset($routeList[$modulo])) {
  http_response_code(404);
  include('404.php');
  die();
} else {
  include($routeList[$modulo]);
}
;