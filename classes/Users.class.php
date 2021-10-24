<?php

/* Klass för att hantera anvndare och inloggning*/

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

// Register new user
public function registerUser($username,$password,$email,$name,$path){
    // För att motverka SQL injections
    $username = $this->db->real_escape_string($username);
    $password = $this->db->real_escape_string($password);
    $sql = "INSERT INTO users(username,password,email,name,profilepic)VALUES('$username','$password','$email','$name','$path')";

    $result = $this->db->query($sql);
    $_SESSION['username'] = $username;

    return $result;
}

//Login existing user
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

// Check if username is already taken

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


public function getName($username){
    $sql = "SELECT name FROM users WHERE username in (SELECT username from guestbookposts WHERE username='$username');";
    $result = $this->db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          return $row["name"];

}
    }
}


}