<?php 
?>
<?php
if(!isset($_SESSION['username'])){
?>
<nav id="mainmenu">
                <h1 id="title">Admin</h1>
                <ul>
                    <li><a href="../index.php">Startsida</a></li>
                    <li><a href="../projekt-api/login.php">Logga in</a></li>
                    <li><a href="../projekt-api/register.php">Registrera</a></li>
                </ul>        
</nav>

<?php 
}else {

?>

                <nav id="mainmenu">
                <h1 id="title">Admin</h1>
                <ul>
                    <li><a href="../projekt/index.php">Startsida</a></li>
                    <li><a href="../projekt-api/admin.php">Admin</a></li>
                    <li><a href="../projekt-api/logout.php">Logga ut</a></li>
                </ul>        
</nav>
<?php 
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
