<?php

/* Klass för att hantera användare och inloggning*/

class Users{
    private $db;
    private $username;
    private $password;
    private $email;
    private $name;


function __construct(){
    $this->db = new mysqli(DBHOST,DBUSER,DBPASS,DBDATABASE);
    if($this->db->connect_errno > 0){
        die("Fel vid anslutning ".$this->$db->connect_error);
    }
}

// Registrera ny användare
public function registerUser($username,$password,$email,$name){
    // För att motverka SQL injections
    $username = $this->db->real_escape_string($username);
    $password = $this->db->real_escape_string($password);
    $sql = "INSERT INTO users(username,password,email,name)VALUES('$username','$password','$email','$name')";

    $result = $this->db->query($sql);
    $_SESSION['username'] = $username;

    return $result;
}

//Logga in befintlig användare
public function loginUser($username,$password){
    $username = $this->db->real_escape_string($username);
    $password = $this->db->real_escape_string($password);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $this->db->query($sql);

    if($result->num_rows > 0){
        $_SESSION['username'] = $username;
        header('location: admin.php');

    }
 else{
    header('location: ?error'); 
 }
}

// Kolla om användarnamet är taget

public function isUsernameTaken($username){
    $username = $this->db->real_escape_string($username);

    $sql = "SELECT username FROM users WHERE username = '$username'";

    $result = $this->db->query($sql);

    if($result->num_rows > 0){
        return true;
    }
    else{
        return false;
    }
}

}