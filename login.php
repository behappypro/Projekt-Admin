<?php
$page_title = "logga in";
include("includes/header.php"); ?>
<div class="content">
<?php 
    if(isset($_POST['username'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
	  $users = new Users();
      $users->loginUser($username,$password);
	  echo $_SESSION['username'];	  
}

?>
			<form id="login-form" method="POST">
				<h1 style="color: #292929;" >Logga in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
				</div>
				<?php if (strpos($_SERVER['REQUEST_URI'], "error") !== false){
  				echo '<p class="alert"> Användarnamn eller lösenord fel </p>';
				}?>
				<span style="color: #292929;">eller använd ditt konto</span>
				<input type="text" name="username" placeholder="Användarnamn" />
				<input type="password" name="password" placeholder="Lösenord" />
				<a style="color: #292929; text-decoration: underline; margin:10px" href="#">Glömt ditt lösenord?</a>
				<button id="login-button">Logga In</button>
			</form>

			<script>window.addEventListener('load', hideSidebar, false);</script>

<?php




