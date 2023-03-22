<?php

namespace Controllers;



use Models\Products;
use Utils\Responses;

class ProductsController
{
  private $response;
  private $product_id;
  private $productsModel;

  function __construct()
  {
    $this->response = new Responses();
    $this->productsModel = new Products();
  }

  public function getAllProducts()
  {
    $data = $this->productsModel->getProducts();
    if (count($data)) {
      return $data;
    } else {
      return [];
    }
  }

  public function getProduct($data)
  {
    $data = $this->productsModel->getProduct($data->product_id);
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
        $product_id = $this->productsModel->insertProduct($data);
        $this->product_id = $product_id;
        if ($data->image_src) {
          $this->addImage($data, $product_id);
        }
        return $this->response->sucessResponse();
      } catch (\Throwable $th) {
        return  $this->response->errorResponse('500', 'Internal Server Error' . $th->getMessage());
      }
    } else {
      return  $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function deleteProduct($data)
  {
    if ($data->product_id) {
      $this->productsModel->deleteProduct($data);
      return $this->response->sucessResponse();
    } else {
      return $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function deleteImage($data)
  {
    if ($data->image_id) {
      $this->productsModel->deleteImage($data);
      return $this->response->sucessResponse();
    } else {
      return $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function addImage($data, $product_id)
  {
    if ($data->image_id && $product_id) {
      $this->productsModel->addImage($data, $product_id);
      return $this->response->sucessResponse();
    } else {
      return $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function changeProduct($data)
  {
    if ($data->description && $data->value && $data->current_inventory) {
      try {
        $product_id = $this->productsModel->changeProduct($data);
        $this->product_id = $product_id;
        if ($data->image_src) {
          $this->addImage($data, $product_id);
        }
        return $this->response->sucessResponse();
      } catch (\Throwable $th) {
        return  $this->response->errorResponse('500', 'Internal Server Error' . $th->getMessage());
      }
    } else {
      return  $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
}
