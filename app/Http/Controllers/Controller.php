<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successfulResponse($result, $message, $http_code = 200)
  {
    $response = [
      "success" => true,
      "status" => $http_code,
      "message" => $message,
      "data" => $result,
    ];

    return response()->json($response, $http_code);
  }

  public function unauthorizedResponse($message, $http_code = 401)
  {
    $response = [
      "success" => false,
      "status" => $http_code,
      "message" => $message
    ];

    return response()->json($response, $http_code);
  }


  public function notFoundResponse($message, $http_code = 404)
  {
    $response = [
      "success" => false,
      "status" => $http_code,
      "message" => $message
    ];

    return response()->json($response, $http_code);
  }

  public function notAllowedResponse($message, $http_code = 405)
  {
    $response = [
      "success" => false,
      "status" => $http_code,
      "message" => $message
    ];

    return response()->json($response, $http_code);
  }

  public function conflictResponse($message, $http_code = 409)
  {
    $response = [
      "success" => false,
      "status" => $http_code,
      "message" => $message
    ];

    return response()->json($response, $http_code);
  }
}
