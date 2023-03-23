<?php

namespace Controllers;



use Models\Products;
use stdClass;
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
    $produtos = $data;
    $produtos_unicos = [];

    foreach ($produtos as $produto) {
      $produto_id = $produto['product_id'];
      if ($produto['image_id']) {
        $imagem = [
          'image_id' => $produto['image_id'],
          'image_src' => $produto['image_src']
        ];
      } else {
        $imagem = [];
      }

      $produto_existente = array_filter($produtos_unicos, function ($p) use ($produto_id) {
        return $p['product_id'] == $produto_id;
      });

      if (count($produto_existente) == 0) {
        $produto_unico = [
          'product_id' => $produto_id,
          'description' => $produto['description'],
          'value' => $produto['value'],
          'name' => $produto['name'],
          'current_inventory' => $produto['current_inventory'],
          'imagens' => count($imagem) ? [$imagem] : []
        ];
        $produtos_unicos[] = $produto_unico;
      } else {
        $key = key($produto_existente);
        $produtos_unicos[$key]['imagens'][] = $imagem;
      }
    }
    return $produtos_unicos;
  }

  public function getProduct($data)
  {
    $produto = $this->productsModel->getProduct($data)[0];
    $imagem = $this->productsModel->getImage($data);
    $data = [
      'product_id' => $data->product_id,
      'description' => $produto['description'],
      'value' => $produto['value'],
      'name' => $produto['name'],
      'current_inventory' => $produto['current_inventory'],
      'imagens' => count($imagem) ? $imagem : []
    ];
    if (count($data)) {
      return $data;
    } else {
      return [];
    }
  }

  public function createProduct($data)
  {
    if ($data->name && $data->value && $data->current_inventory) {
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
    if ($data->image_src && $product_id) {
      $this->productsModel->addImage($data, $product_id);
      return $this->response->sucessResponse();
    } else {
      return $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
  public function changeProduct($data)
  {
    if ($data->description && $data->value && $data->current_inventory && $data->name) {
      try {
        $product_id = $this->productsModel->changeProduct($data);
        $this->product_id = $product_id;
        return $this->response->sucessResponse();
      } catch (\Throwable $th) {
        return  $this->response->errorResponse('500', 'Internal Server Error' . $th->getMessage());
      }
    } else {
      return  $this->response->errorResponse('400', 'Not Acceptable');
    }
  }
}
