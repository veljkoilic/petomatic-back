<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function allTrainings()
    {
        $trainings = App::get('database')->getAllTrainings("trainings");

        return view('index', compact('trainings'));
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
        return redirect('/');
    }

    public function products()
    {
        $products = App::get('database')->getAll("products");

        return view('products', compact('products'));
    }
}