<?php

namespace Models;

use Controllers\Conection;

class Order
{
  public function __construct()
  {
  }
  public function deleteOrder($data)
  {
    $connection = new Conection();
    $sql = 'DELETE FROM orders WHERE order_id =' . $data->order_id;
    $connection->SqlQueryExe($sql);
  }
  public function getOrders()
  {
    $connection = new Conection();
    $sql = 'SELECT * FROM orders';
    $data = $connection->SqlQueryExe($sql);
    return $data;
  }
  public function createOrder($data)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO orders (client) VALUES ("' . $data->client . '")';
    $connection->SqlQueryExe($sql);
  }
  public function changeOrder($data)
  {
    $connection = new Conection();
    $sql = 'UPDATE orders  SET client ="' . $data->client . '" WHERE order_id =' . $data->order_id;
    $connection->SqlQueryExe($sql);
  }
  public function inserProducts($data)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO orders_product (order_id, ) VALUES ("' . $data->client . '")';
    $connection->SqlQueryExe($sql);
  }
}
