<?php

namespace Utils;

class Responses
{
  public function errorResponse($responseCode, $message)
  {

    return (['code' => $responseCode, 'message' => $message]);
  }
  public function sucessResponse($responseCode = 200, $message = 'sucess')
  {

    return (['code' => $responseCode, 'message' => $message]);
  }
}
