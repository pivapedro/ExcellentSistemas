<?php

namespace Utils;

class Responses
{
  public function errorResponse($responseCode, $message)
  {
    header('HTTP/1.0 ' . $responseCode . $message);
    return (['code' => $responseCode, 'message' => $message]);
  }
}
