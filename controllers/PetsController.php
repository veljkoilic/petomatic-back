<?php

namespace App\Controllers;

use App\Core\App;

class PetsController
{
  public function getAllPets ()
  {
    $pets = App::get('database')->getAll("pets");
    echo json_encode($pets);
  }
  public function getAllClientPets ($params)
  {
    $pets = App::get('database')->getClientsPets("pets", $params);
    echo json_encode($pets);
  }
  public function getAllPetsVisits ($params)
  {
    $pets = App::get('database')->getPetsVisits("visits", $params);
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
    App::get('database')->addNewPet('pets', $parsedRequestData);
  }
  public function editPet ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['pet_name'] = filter_var($parsedRequestData['pet_name'], FILTER_SANITIZE_STRING);
    $parsedRequestData['species'] = filter_var($parsedRequestData['species'], FILTER_SANITIZE_STRING);
    $parsedRequestData['pet_photo'] = filter_var($parsedRequestData['pet_photo'], FILTER_SANITIZE_STRING);
    $parsedRequestData['breed_id'] = filter_var($parsedRequestData['breed_id'], FILTER_SANITIZE_NUMBER_INT);
    $parsedRequestData['clients_id'] = filter_var($parsedRequestData['clients_id'], FILTER_SANITIZE_NUMBER_INT);

    var_dump($parsedRequestData);
    App::get('database')->editPet('pets', $parsedRequestData);
  }
  public function breeds ()
  {
    $breeds = App::get('database')->getAll("breeds");
    echo json_encode($breeds);
  }
  public function addBreed ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['breed_name'] = filter_var($parsedRequestData['breed_name'], FILTER_SANITIZE_STRING);
    App::get('database')->addNew("breeds", $parsedRequestData);

  }
}

