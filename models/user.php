<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/utils/db.php');


class User {
    public $id;
    public $name;
    public $phone;
    public $email;
    public $password;
    public $is_admin;
    public $address;


    public function __construct($id,$name, $phone, $email, $password, $is_admin = 0,$address) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
        $this->address = $address;

    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function isAdmin() {
        return $this->is_admin;
    }

    public function getAddress() {
        return $this->address;
    }

    public static function isAuthorized($email,$password){
        
        $userResult = executeQuery("SELECT * FROM users WHERE email='$email' AND password='$password'");
        if($userResult->num_rows>0){
            $userRow = $userResult->fetch_assoc();
            return new User($userRow['id'],$userRow['name'], $userRow['phone'], $userRow['email'], $userRow['password'], $userRow['is_admin'], $userRow['address']);
        }
        return false;
    }

    public static function saveUser($name,$phone,$email,$password,$address){
        
        return executeQuery("INSERT INTO users(name,phone,email,password,address) VALUES('$name','$phone','$email','$password','$address')");

    }

    //add order to database
    public static function getAllUsers(){
        return executeQuery("SELECT * FROM users");
    }

}


?>