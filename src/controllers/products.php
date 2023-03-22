<?php

namespace Controllers;


 
use Models\Products;
use Utils\Responses;

class ProductsController
{
  private $response;

  function __construct()
  {
    $this->response = new Responses();
  }

  public function getAllProducts()
  {
    $productsModel = new Products();
    $data = $productsModel->getProducts();
    if (count($data)) {
      return $data;
    } else {
      return [];
    }
  }

  public function getProduct($data)
  {
    $productsModel = new Products();
    $data = $productsModel->getProduct($data->product_id);
    if (count($data)) {
      return $data;
    } else {
      return [];
    }
  }

  public function createProduct($data)
  {
    if ($data->description && $data->value && $data->current_inventory) {
      try {
        $productsModel = new Products();
        $productsModel->insertProduct($data);
      } catch (\Throwable $th) {
        return  $this->response->errorResponse('500', 'Internal Server Error' . $th->getMessage());
      }
    } else {
      return  $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function deleteProduct($data)
  {
  }
  public function deleteImage($data)
  {
  }
  public function addImage($data, $product_id = false)
  {
  }
  public function changeProduct($data)
  {
  }
}
