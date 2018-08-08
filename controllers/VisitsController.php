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
    var_dump($parsedRequestData);
    App::get('database')->addNew('visits', $parsedRequestData);
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


