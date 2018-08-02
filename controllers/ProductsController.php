<?php

namespace App\Controllers;

use App\Core\App;

class ProductsController
{
    public function index()
    {
        $trainings = App::get('database')->getUserTrainings("trainings", $_SESSION['auth']->id);

        return view('products.index', compact('trainings'));
    }

    public function create()
    {
        $difficulties = App::get('database')->getAll("difficulties");
        $exercises = App::get('database')->getAll("exercises");

        return view('products.create', compact('difficulties', 'exercises'));
    }

    public function store()
    {
//        $this->handleUpload();
        $_POST["exercise_id"] = str_replace('"',"", trim(json_encode(preg_replace('/\d/', '(\\0)',$_POST["exercise_id"])),"[]"));
        $payload=[
            "training_name" => $_POST["training_name"],
            "difficulties_id" => $_POST["difficulties_id"]

        ];
        App::get('database')->addNewTraining('trainings', $payload);
        $payload=[
            "exercise_id" => $_POST["exercise_id"],
            "training_id" => $_POST["training_id"]
//            "sets" => $_POST["sets"],
//            "reps" => $_POST["reps"]
        ];
        App::get('database')->connectTrainingAndExercise('exercises_trainings', $payload);

//        return redirect('/admin/trainings');
        echo "<pre>";
        var_dump($_POST["exercise_id"]);
        echo "</pre>";



    }

    public function show()
    {
        $training = App::get('database')->getOneUserTraining('trainings',$_SESSION['auth']->id, $_GET['id']);
//        $categories = App::get('database')->getAll("categories");

        return view('products.show', compact('training'));
    }

    public function edit()
    {
        $training = App::get('database')->getOneUserTraining('trainings', $_SESSION['auth']->id, $_GET['id']);
        $difficulties = App::get('database')->getAll("difficulties");
        $exercises = App::get('database')->getAll("exercises");
        return view('products.create', compact('training', 'difficulties', 'exercises'));
    }

    public function update()
    {
        $this->handleUpload();
        App::get('database')->update('products', $_POST);
        return redirect('/admin/products');
    }

    public function destroy()
    {
        App::get('database')->destroy('products', $_POST['id']);
        return redirect('/admin/products');
    }

    private function handleUpload()
    {
        if($_FILES['image']['error'] != 4) {
            $newName = "images/".time()."_".$_FILES['image']['name'];
            $_POST['image'] = $newName;
            move_uploaded_file($_FILES['image']['tmp_name'], getcwd()."/storage/".$newName);
        }
    }
}