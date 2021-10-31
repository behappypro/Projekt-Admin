<?php
$page_title = "Utbildning";
include("includes/header.php");


if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
else{
    echo '<div class="content">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Lärosäte</th>';
    echo '<th>Utbildning</th>';
    echo '<th>Startdatum</th>';
    echo '<th>Slutdatum</th>';
    echo '<th>Redigera</th>';
    echo '<th>Tag bort</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody id="data-table">';
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr><td><button><a href="add-education.php">Lägg till</a></button></td></tr>';
    echo '</tfoot>';
    echo '</table>';  
}

?>

<script>window.addEventListener('load', getData, false);</script>

</div>


<?php





