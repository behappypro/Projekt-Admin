<?php
$page_title = "Skapa konto";
include("includes/header.php"); 
?>
<?php 
$users = new Users();

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    

  if($users->isUsernameTaken($username)){
    header('location: register.php?usernametaken');
  }

  else{
    
    if($users->registerUser($username,$password,$email,$name,$path)){
      echo '<p class="message"> Användare skapad</p>';
      
      header('location: admin.php');
    }
    else{
      echo '<p class="alert"> Fel vid skapande av användare!</p>';
    }
  }

}

  ?>
<div class="content">
<form method="POST" action="register.php" id="register-form" enctype="multipart/form-data">
<h1 style="color:white;margin-bottom: 40px;text-align:center;">Registrera</h1>
<?php if (strpos($_SERVER['REQUEST_URI'], "usernametaken") !== false){
  echo '<h3 style="text-decoration:underline;"> Användarnamnet är upptaget </h3>';
}?>
<input type="text" id="name" name="name" placeholder="Namn" required="required"/>
<input type="email" id="email" name="email" placeholder="Email" required="required"/>
<input type="text" id="username" name="username" placeholder="Användarnamn" required="required"/>
<input type="password" id="password" name="password" placeholder="Lösenord" required="required"/>
<input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
<label for="newsletter" id="newsletter-label"> Jag vill prenumerera på nyhetsbrev</label><br>
<input type="submit" class="submit" name="submitbtn" value="Registrera">
<input type="reset" class="reset"/>   
</form>
</div>

<script>

function myFunction() {
  var checkBox = document.getElementById("newsletter");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<?php
