<?php
include("includes/header.php");
include("../projekt-api/classes/Employment.class.php");
include("../projekt-api/includes/Database.php"); ?>

<?php
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

           if(isset($_POST['add'])){
            $place = $_POST['place'];
            $title = $_POST['title'];
            $start_year = $_POST['start_year'];
            $end_year = $_POST['end_year'];
            $update = $_POST['add'];
            $employment->addEmployment($place, $title, $start_year,$end_year);
            header("Location: admin-employment.php");
           }
    ?>


<div class="content">

<main>
<form method="post" id="admin-form">
<br>
<h1 style="color:#3c3c3c;margin:10px;text-align:left;">Lägg till branscherfarenhet</h1>
<label for="place">Arbetsplats:</label>
<input type="text" name="place" id="place" required>
<br>
<label for="title">Titel:</label>
<input type="text" name="title" id="title" required>
<label for="start_year">Startdatum:</label>
<input id="start_year" type="date" name="start_year" required>
<label for="end_year">Slutdatum:</label>
<input type="date" id="end_year" name="end_year" required>
<input type="submit" name="add" id="add-post" value="Lägg till">
</main>
</div>

<?php
