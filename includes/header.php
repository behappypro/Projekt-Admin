<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
<title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/main.js"></script>
</head>
<body onclick="closeNav()">
    
        <header id="mainheader">
        <?php include("includes/mainmenu.php"); ?>
        </header>
            <div class="sidebar-container">
            <div class="side-section" style="margin-top:50px;">
                <a href="admin-employment.php">Jobb</a>
            </div>
            <div class="side-section">
                <a href="admin-education.php">Utbildning</a>
            </div>
            <div class="side-section">
                <a href="admin-projects.php">Projekt</a>
            </div>
        </div>

        <div id="mySidenav" class="sidenav" onclick="event.stopPropagation();">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href="admin-employment.php">Jobb</a>
				<a href="admin-education.php">Utbildning</a>
				<a href="admin-projects.php">Projekt</a>
			</div>
            <span class="ham-menu" style="font-size:30px;cursor:pointer;float:right;margin-right: 20px;" onclick="openNav(event)">&#9776;</span>
            <script>
			function openNav(event) {
			  event.stopPropagation();
			  document.getElementById("mySidenav").style.width = "250px";
			
			}
			
			function closeNav() {
			  document.getElementById("mySidenav").style.width = "0";
			}
			
		</script>
        
 