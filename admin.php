<?php
include("includes/header.php");
include("../projekt-api/classes/Education.class.php");
include("../projekt-api/includes/Database.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
else{
    echo '<div class="sidebar-container">';
    echo '<div class="side-section" style="margin-top:50px;">';
    echo '<a href="admin-employment.php">Jobb</a>';
    echo '</div>';
    echo '<div class="side-section">';
    echo '<a href="admin-education.php">Utbildning</a>';
    echo '</div>';
    echo '<div class="side-section">';
    echo '<a href="admin-projects.php">Projekt</a>';
    echo '</div>';
    echo '</div>';

    echo '<div class="content">';
    echo '<h2>Administration</h2>';
    echo '<h4 style="text-align:center">Denna sida ska du endast kunna nå om du är inloggad</h4>';
    echo '<h2> Välkommen '.$_SESSION['username'].'</h2>';
    
    $posts = new Posts();
    $database = new Database();
    $db = $database->connect();

    $education = new Education($db);
    
}


?>

</div>


<?php





