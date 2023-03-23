<?php

namespace Controllers;



use Models\Order;
use stdClass;
use Utils\Responses;

class OrdersController
{
  private $response;
  private $product_id;
  private $orderModel;

  function __construct()
  {
    $this->response = new Responses();
    $this->orderModel = new Order();
  }

  public function getAllOrders()
  {
    $data = $this->orderModel->getOrders();
    return $data;
  }

  public function getOrder($data)
  {
    /*   if (count($order)) {
      return $order;
    } else {
      return [];
    } */
  }

  public function createOrder($data)
  {
    $this->orderModel->createOrder($data);
    return $this->response->sucessResponse();
  }
  public function deleteOrder($data)
  {
    $this->orderModel->deleteOrder($data);
  }

  public function changeOrder($data)
  {
    $this->orderModel->changeOrder($data);
  }
}
