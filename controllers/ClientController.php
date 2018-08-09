<?php

namespace App\Controllers;

use App\Core\App;

class ClientController
{
  public function allClients ()
  {
      $clients = App::get('database')->getAll("clients");
      echo json_encode($clients);
  }
  public function singleClient ($params)
  {
    $client = App::get('database')->getOne("clients", $params);
    echo json_encode($client);
  }
  public function addClient ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['client_name'] = filter_var($parsedRequestData['client_name'], FILTER_SANITIZE_STRING);
    $parsedRequestData['client_lastname'] = filter_var($parsedRequestData['client_lastname'], FILTER_SANITIZE_STRING);
    $parsedRequestData['client_photo'] = filter_var($parsedRequestData['client_photo'], FILTER_SANITIZE_STRING);
    var_dump($parsedRequestData);
    App::get('database')->addNew('clients', $parsedRequestData);
  }
  public function editClient ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['client_name'] = filter_var($parsedRequestData['client_name'], FILTER_SANITIZE_STRING);
    $parsedRequestData['client_lastname'] = filter_var($parsedRequestData['client_lastname'], FILTER_SANITIZE_STRING);
    $parsedRequestData['client_photo'] = filter_var($parsedRequestData['client_photo'], FILTER_SANITIZE_STRING);
    var_dump($parsedRequestData);
    App::get('database')->editClient('clients', $parsedRequestData);
  }
}
