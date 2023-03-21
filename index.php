<?php
session_start();


require_once("src/views/constructor.php");
require_once("src/controllers/conection.php");
require_once("src/routes/index.php");
require_once("src/models/products.php");


$Conection = new Conection();
$router = new Router();
$constructor = new Constructor();


$router->useRoute();
