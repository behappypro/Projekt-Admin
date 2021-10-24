<?php
include("includes/header.php");
include("../projekt-api/classes/Projects.class.php");
include("../projekt-api/includes/Database.php"); ?>

<?php
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

           if(isset($_POST['add'])){
            $title = $_POST['title'];
            $project_desc = $_POST['project_desc'];
            $image = $_POST['image'];
            $url = $_POST['url'];
            $update = $_POST['add'];

            if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
                $image = $_FILES['image']['name'];
                $path = "http://localhost/projekt-admin/images/dev.jpg";
            } 
            else {
                $image = $_FILES['image']['name'];
                $target = "http://localhost/projekt-admin/images/".basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $target);   
                $path = "http://localhost/projekt-admin/images/".basename($image);
            }

            $project->addProject($title, $project_desc, $path,$url);
            header("Location: admin-projects.php");
           }
      
    ?>


<div class="content">

<main>
<form method="post" id="admin-form" action="add-project.php" enctype="multipart/form-data">
<br>
<h1 style="color:#3c3c3c;margin:10px;text-align:left;">Lägg till projekt</h1>
<label for="title">Titel:</label>
<input type="text" name="title" id="title" required>
<br>
<label for="project_desc">Beskrivning:</label>
<input type="text" name="project_desc" id="project_desc" required>
<label for="url">Länk:</label>
<input type="text" name="url" id="url" required>
<label for="start_year">Startdatum:</label>
<input id="start_year" type="date" name="start_year" required>
<label for="end_year">Slutdatum:</label>
<input type="date" id="end_year" name="end_year" required>
<input type="hidden" name="size" value="1000000">
<label for="image" id="image-label">Välj bild att ladda upp (PNG, JPG)</label>
<input type="file" name="image" id="image-file" accept=".jpg, .jpeg, .png">
<input type="submit" name="add" id="add-post" value="Lägg till">
</main>
</div>

<?php
