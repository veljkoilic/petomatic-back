<?php

namespace App\Controllers;
use \App\Core\App;

class Authenticate {
  public function createuser(){
    $requestData = trim(file_get_contents("php://input"));
    $credentials = json_decode($requestData, true);
    $credentials['password'] = $this->hash($credentials);
    App::get('database')->addNew("staff", $credentials);
  }

    private function hash($credentials){
      $password = $credentials['password'];
      $password = crypt($password, '$1$rasmusle$') . "\n";
      return $password;

    }

    public function login(){

      $requestData = trim(file_get_contents("php://input"));
      $credentials = json_decode($requestData, true);

        $email = $credentials['email'];

        $staff = App::get('database')->getOneStaff("staff", $email);
        var_dump($staff);
        if(!$staff){
            echo "No such user";
        }

        $password = $this->hash($credentials);
        if($password === $staff->password) {
            $_SESSION['auth'] = $staff;
            echo "Logged in";

        }else{
            echo "wrong password";
        }

var_dump($_SESSION['auth']);
    }
    public function logout()
    {
        unset($_SESSION["auth"]);
        echo "Logged out";
    }

}
