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
    var_dump($parsedRequestData);
    App::get('database')->addNew('clients', $parsedRequestData);
  }

























    public function singleTraining()
    {
        $training = App::get('database')->getOneTraining("trainings", $_GET['id']);

        return view('singleTraining', compact('training'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function storeTask()
    {
        App::get('database')->addNew("tasks", $_POST);

    }

    public function products()
    {
        $products = App::get('database')->getAll("products");

        return view('products', compact('products'));
    }
}
