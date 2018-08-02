<?php
 
namespace App\Controllers;
use \App\Core\App;

class Authenticate {
    public function signup()
    {
        return view('signup');
    }

    public function createuser(){
        $credentials = $_POST;
        $credentials['user_password'] = $this->hash($credentials);
        App::get('database')->addNew("users", $credentials);
        var_dump($credentials);
        return redirect('/admin/login');
    }
    private function hash($credentials){
        $password = $credentials['user_password'];
        $password = crypt($password, '$1$rasmusle$') . "\n";
        return $password;
        
    }

    public function login()
    {

        return view('login');
    }
    public function validate(){
        $credentials = $_POST;
        $email = $credentials['email'];
        $user = App::get('database')->getOneUser("users", $email);
        if(!$user){
            return redirect("/admin/login");
        }

        $password = $this->hash($credentials);

        if($password === $user->user_password) {
            $_SESSION['auth'] = $user;
            return redirect('/admin/trainings');
            
        }else{
            return redirect('/admin/login');
        }


    }
    public function logout()
    {
        unset($_SESSION["auth"]);
        return redirect('/admin/login');
    }

}