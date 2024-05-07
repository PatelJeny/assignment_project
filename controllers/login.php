<?php

require_once 'models/user.php';

class ControllerLogin {

    //make session if does not exist
    public function start_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Method to display the user list
    public function render() {
        global $loggedInUser;
        require_once 'views/login.php';
    }

    // Method to display the user list
    public function checkAuth($email,$password) {
        return User::isAuthorized($email,$password);
    }
}


?>