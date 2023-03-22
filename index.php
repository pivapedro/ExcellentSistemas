<?php
session_start();

require_once("src/lib/autoload.php");


use Routes\Router;


$router = new Router();
$constructor = new Constructor();


$router->useRoute();
