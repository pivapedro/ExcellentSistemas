<?php

namespace Models;

use Controllers\Conection;

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

  public function getProduct($data)
  {
    $connection = new Conection();
    $sql = 'SELECT * FROM product WHERE product_id=' . $data->product_id;
    $data = $connection->SqlQueryExe($sql);
    return $data;
  }

  public function insertProduct($data)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO product ( description, value ,current_inventory ) VALUES ("' . $data->description . '", ' . $data->value . ', ' . $data->current_inventory . ')';
    $data = $connection->SqlQueryExe($sql);
    if ($data->image_src) {
      echo $connection->lastInsertId;
      $this->addImage($data,  $connection->lastInsertId);
    }
  }

  public function deleteProduct($data)
  {
    $connection = new Conection();
    $sql = 'DELETE FROM product WHERE product_id =' . $data->product_id;
    $connection->SqlQueryExe($sql);

    $data = $this->getProducts();
    return $data;
  }

  public function changeProduct($data)
  {
    $connection = new Conection();
    $sql = 'UPDATE product  SET description ="' . $data->description . '"  , value = ' . $data->value . ' ,current_inventory = ' . $data->current_inventory . ' WHERE product_id =' . $data->product_id;
    $connection->SqlQueryExe($sql);
    $data = $this->getProduct($data);
    return  $data;
  }

  public function addImage($data, $product_id)
  {
    $connection = new Conection();
    $sql = 'INSERT INTO product_images ( product_id, image_src) VALUES ("' .  $product_id . '", ' . $data->image_src . ')';
    $connection->SqlQueryExe($sql);
  }

  public function deleteImage($data)
  {
    $connection = new Conection();
    $sql = 'DELETE FROM product_images WHERE image_id = ' . $data->image_id . ')';
    $connection->SqlQueryExe($sql);
  }
}
