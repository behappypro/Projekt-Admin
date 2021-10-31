<?php 
$page_title = "Lägg till";
include("includes/header.php");
?>
<!--Formulär för inmatning av data-->
<div class="content">
    <form id="admin-form">
        <h1 style="color:#3c3c3c;margin:10px;text-align:left;">Lägg till utbildning</h1>
        <br>
        <label for="input1">Lärosäte:</label>
        <input type="text" name="input1" id="input1" required>
        <br>
        <label for="input2">Utbildning:</label>
        <input type="text" name="input2" id="input2" required>
        <label for="input3">Startdatum:</label>
        <input id="input3" type="date" name="input3" required>
        <label for="input4">Slutdatum:</label>
        <input type="date" id="input4" name="input4" required>
        <input type="submit" name="add" id="add-post" value="Lägg till" onclick="addData()">
        <p id="message"></p>
    </form>
</div>

<?php
