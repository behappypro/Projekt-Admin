<?php
include("includes/header.php");
include("../projekt-api/classes/Education.class.php");
include("../projekt-api/includes/Database.php"); ?>

<?php
 $posts = new Posts();
 $database = new Database();
 $db = $database->connect();

 $education = new Education($db);

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
            $edu_name = $_POST['edu_name'];
            $program_name = $_POST['program_name'];
            $start_year = $_POST['start_year'];
            $end_year = $_POST['end_year'];
            $update = $_POST['add'];
            $education->addEducation($edu_name, $program_name, $start_year,$end_year);
            header("Location: admin-education.php");
           }
    ?>


<div class="content">

<main>
<form method="post" id="guestbook-form">
<br>
<h1 style="color:#3c3c3c;margin:10px;text-align:left;">Lägg till utbildning</h1>
<label for="edu_name">Lärosäte:</label>
<input type="text" name="edu_name" id="post-title" required>
<br>
<label for="program_name">Utbildning:</label>
<input type="text" name="program_name" id="post-title" required>
<label for="start_year">Startdatum:</label>
<input id="start_year" type="date" name="start_year" required>
<label for="end_year">Slutdatum:</label>
<input type="date" id="end_year" name="end_year" required>
<input type="submit" name="add" id="add-post" value="Lägg till">
</main>
</div>

<?php
