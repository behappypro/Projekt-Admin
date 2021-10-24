<?php
include("includes/header.php");
include("../projekt-api/classes/Projects.class.php");
include("../projekt-api/includes/Database.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
else{
    $posts = new Posts();
    $database = new Database();
    $db = $database->connect();
    $project = new Project($db);

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
    echo '<th>Titel</th>';
    echo '<th>Beskrivning</th>';
    echo '<th>Bakgrundsbild</th>';
    echo '<th>Länk</th>';
    echo '<th>Redigera</th>';
    echo '<th>Tag bort</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    
   
    //$users = new Users();
    //$guestBookItems = $posts->getPosts($_SESSION['username']);
    $projectItems = $project->getProjects();
    foreach($projectItems as $item){
        $id = $item['id'];
        echo '<tr>';
        echo '<td>'.$item['title'].'</td>';
        echo '<td>'.$item['project_desc'].'</td>';
        echo '<td>'.$item['image'].'</td>';
        echo '<td>'.$item['url'].'</td>';
        echo '<td><a class="edit" href="edit.php?edit='.$id.'">Redigera &#9998;</a></td>';
        echo '<td><a class="delete" href="admin-projects.php?del='.$id.'">Tag bort &#10060;</a></td>';
        echo '</tr>';
        
        if (strpos($_SERVER['REQUEST_URI'], "del") == true){
            $id = $_GET['del'];
            $project->deleteProject($id);
            header("Location: admin-projects.php");
        }
}
    echo '</tbody>';
    echo '<tfooter>';
    echo '<tr><td><button><a href="admin-projects.php?add">Lägg till</a></button></td></tr>';
    echo '</tfooter>';
    echo '</table>';
    
    if (strpos($_SERVER['REQUEST_URI'], "add") == true){
        header("Location: add-project.php");
    }
}

?>

</div>


<?php





