<?php 
$page_title = "Lägg till";
include("includes/header.php");
?>

<?php
    
           if(isset($_POST['add'])){
            if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
                $path = "#";
                
            } 
            
            else {
            $image = $_FILES['image']['name'];
              $target = "/userhome/asha1900/public_html/writeable/images/".basename($image);
              move_uploaded_file($_FILES['image']['tmp_name'], $target);   
              $newPath = "http://studenter.miun.se/~asha1900/writeable/images/".basename($image);
            }
        }
           
      
    ?>


<div class="content">
<!--Formulär för inmatning av data-->
<form method="post" id="admin-form" action="add-project.php" enctype="multipart/form-data">
<br>
<h1 style="color:#3c3c3c;margin:10px;text-align:left;">Lägg till projekt</h1>
<label for="input1">Titel:</label>
<input type="text" name="input1" id="input1" required>
<br>
<label for="input2">Beskrivning:</label>
<input type="text" name="input2" id="input2" required>
<label for="input3">Länk:</label>
<input type="text" name="input3" id="input3" required>
<input type="hidden" name="size" value="1000000">
<label for="input4" id="image-label">Välj bild att ladda upp (PNG, JPG)</label>
<input type="file" name="image" id="input4" accept=".jpg, .jpeg, .png" value="">
<input type="submit" name="add" id="add-post" value="Lägg till" onclick="addData()">
<p id="message"></p>

</div>

<?php
