<?php

namespace App\Controllers;

use App\Core\App;

class PetsController
{
  public function getAllClientPets ($params)
  {
    echo "$params";
    $pets = App::get('database')->getAllPets("pets", $params);
    echo json_encode($pets);
  }
  public function singlePet ($params)
  {
    $pet = App::get('database')->getOne("pets", $params);
    echo json_encode($pet);
  }
  public function addPet ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    var_dump($parsedRequestData);
    App::get('database')->addNew('pets', $parsedRequestData);
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

