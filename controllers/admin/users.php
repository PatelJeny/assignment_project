<?php

include '../models/user.php';

class ControllerUsers {

    //make session if does not exist
    public function start_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //security mechanism to ask for login for admin only
        if(!isset($_SESSION['user_id']) || !$_SESSION['user_is_admin']){
            header("Location:/login.php");
        }
    }

    public function prepareUsers(){
        return User::getAllUsers();
    }

    // Method to display the user list
    public function render($userList) {
        $sectionName="Users";
        require_once '../views/admin/users.php';
    }

}


?>