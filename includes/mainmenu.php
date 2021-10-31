<?php 
?>
<?php
if(!isset($_SESSION['username'])){
?>
<nav id="mainmenu">
                <a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin.php"><h1 id="title">Admin</h1></a>
                <ul>
                    <li><a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin.php">Startsida</a></li>
                    <li><a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/login.php">Logga in</a></li>
                    <li><a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/register.php">Registrera</a></li>
                </ul>        
</nav>

<?php 
}else {

?>
                <nav id="mainmenu">
                <a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin.php"><h1 id="title">Admin</h1></a>
                <ul>
                    <li><a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin.php">Startsida</a></li>
                    <li><a href="http://studenter.miun.se/~asha1900/dt173g/cms/admin/logout.php">Logga ut</a></li>
                </ul>        
</nav>
<?php 
}

?>
