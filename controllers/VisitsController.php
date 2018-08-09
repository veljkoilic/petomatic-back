<?php

namespace App\Controllers;

use App\Core\App;

class VisitsController
{
  public function todaysVisits ()
  {
    $date = date("Y-m-d", time());
    $visits = App::get('database')->getAllVisitsToday("visits", $date);
    echo json_encode($visits);
  }
  public function allVisits ()
  {
    $visits = App::get('database')->getAllVisits("visits");
    echo json_encode($visits);
  }
  public function singleVisit ($params)
  {
    $visit = App::get('database')->getOne("visits", $params);
    echo json_encode($visit);
  }
  public function addVisit ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['date'] = filter_var($parsedRequestData['date'], FILTER_SANITIZE_STRING);
    $parsedRequestData['long_descritpion'] = filter_var($parsedRequestData['long_descritpion'], FILTER_SANITIZE_STRING);
    $parsedRequestData['short_descritpion'] = filter_var($parsedRequestData['short_descritpion'], FILTER_SANITIZE_STRING);
    $parsedRequestData['diagnosis'] = filter_var($parsedRequestData['diagnosis'], FILTER_SANITIZE_STRING);
    $parsedRequestData['photo'] = filter_var($parsedRequestData['photo'], FILTER_SANITIZE_STRING);
    $parsedRequestData['pet_id'] = filter_var($parsedRequestData['pet_id'], FILTER_SANITIZE_NUMBER_INT);
    var_dump($parsedRequestData);
    App::get('database')->addNew('visits', $parsedRequestData);
  }
  public function editVisit ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['date'] = filter_var($parsedRequestData['date'], FILTER_SANITIZE_STRING);
    $parsedRequestData['long_descritpion'] = filter_var($parsedRequestData['long_descritpion'], FILTER_SANITIZE_STRING);
    $parsedRequestData['short_descritpion'] = filter_var($parsedRequestData['short_descritpion'], FILTER_SANITIZE_STRING);
    $parsedRequestData['diagnosis'] = filter_var($parsedRequestData['diagnosis'], FILTER_SANITIZE_STRING);
    $parsedRequestData['photo'] = filter_var($parsedRequestData['photo'], FILTER_SANITIZE_STRING);
    $parsedRequestData['pet_id'] = filter_var($parsedRequestData['pet_id'], FILTER_SANITIZE_NUMBER_INT);

    var_dump($parsedRequestData);
    App::get('database')->editVisit('visits', $parsedRequestData);
  }
  public function type ()
  {
    $types = App::get('database')->getAll("types");
    echo json_encode($types);
  }
  public function addType ()
  {
    $requestData = trim(file_get_contents("php://input"));
    $parsedRequestData = json_decode($requestData, true);
    $parsedRequestData['type'] = filter_var($parsedRequestData['type'], FILTER_SANITIZE_STRING);
    App::get('database')->addNew("types", $parsedRequestData);

  }
}


