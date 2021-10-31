<?php
$page_title = "Projekt";
include("includes/header.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
else{
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
    echo '<tbody id="data-table">';
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr><td><button><a href="add-project.php">Lägg till</a></button></td></tr>';
    echo '</tfoot>';
    echo '</table>';  
}

?>

</div>
<script>window.addEventListener('load', getData, false);</script>

<?php





