<?php
namespace Models;
use Controllers\Conection;

class Order
{
  public function __construct()
  {

  }
  public function getOrders()
  {
    $connection = new Conection();
    $sql = 'SELECT * FROM order';
    $data = $connection->SqlQueryExe($sql);
    return $data;
  }
  public function createOrder($data)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO order ( description, value ,current_inventory ) VALUES ("' . $data->description . '", ' . $data->value . ', ' . $data->current_inventory . ')';
    $connection->SqlQueryExe($sql);
  }
  public function changeOrder($data)
  {
    $connection = new Conection();
    $sql = 'UPDATE order  SET description ="' . $data->description . '"  , value = ' . $data->value . ' ,current_inventory = ' . $data->current_inventory . ' WHERE order_id =' . $data->order_id;
    $connection->SqlQueryExe($sql);
  }
}