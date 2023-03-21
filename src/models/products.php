<?php

class Products
{
  public function __construct()
  {
  }
  public function getProducts()
  {
    $connection = new Conection();
    $sql = 'SELECT * FROM product';
    $data = $connection->SqlQueryExe($sql);
    return $data;
  }
  public function insertProduct($data)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO product ( description, value ,current_inventory ) VALUES ("' . $data->description . '", ' . $data->value . ', ' . $data->current_inventory . ')';
    $connection->SqlQueryExe($sql);
  }
  public function changeProduct($data)
  {
    $connection = new Conection();
    $sql = 'UPDATE product  SET description ="' . $data->description . '"  , value = ' . $data->value . ' ,current_inventory = ' . $data->current_inventory . ' WHERE product_id =' . $data->product_id;
    $connection->SqlQueryExe($sql);
  }
}
