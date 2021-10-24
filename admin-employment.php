<?php
include("includes/header.php");
include("../projekt-api/classes/Employment.class.php");
include("../projekt-api/includes/Database.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
else{
    $posts = new Posts();
    $database = new Database();
    $db = $database->connect();
    $employment = new Employment($db);

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
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Arbetsplats</th>';
    echo '<th>Titel</th>';
    echo '<th>Startdatum</th>';
    echo '<th>Slutdatum</th>';
    echo '<th>Redigera</th>';
    echo '<th>Tag bort</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    //$users = new Users();
    //$guestBookItems = $posts->getPosts($_SESSION['username']);
    $employmentItems = $employment->getEmployments();
    foreach($employmentItems as $item){
        $id = $item['id'];
        echo '<tr>';
        echo '<td>'.$item['place'].'</td>';
        echo '<td>'.$item['title'].'</td>';
        echo '<td>'.$item['start_year'].'</td>';
        echo '<td>'.$item['end_year'].'</td>';
        echo '<td><a class="edit" href="edit.php?edit='.$id.'">Redigera &#9998;</a></td>';
        echo '<td><a class="delete" href="admin-employment.php?del='.$id.'">Tag bort &#10060;</a></td>';
        echo '</tr>';
       
        if (strpos($_SERVER['REQUEST_URI'], "del") == true){
            $id = $_GET['del'];
            $education->deleteEmployment($id);
            header("Location: admin-employment.php");
        }
}
    echo '</tbody>';
    echo '<tfooter>';
    echo '<tr><td><button><a href="admin-employment.php?add='.$id.'">Lägg till</a></button></td></tr>';
    echo '</tfooter>';
    echo '</table>';
    if (strpos($_SERVER['REQUEST_URI'], "add") == true){
        $id = $_GET['PostId'];
        header("Location: add-employment.php");
    }
}

?>

</div>


<?php





