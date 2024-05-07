<?php

require_once 'models/user.php';

class ControllerSignup{

     //make session if does not exist
     public function start_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

     // Method to display the user list
     public function render() {
        global $signupUser;
        require_once 'views/signup.php';
    }

    public function create_user($name,$phone,$email,$password,$address){
        return User::saveUser($name,$phone,$email,$password,$address);
    }

}



?>