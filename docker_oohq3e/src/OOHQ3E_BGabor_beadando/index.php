<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>OOHQ3E</title>
        <meta http-equiv="content-type" content="text/HTML; charset=UTF-8">
	    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	    <meta http-equiv="content-style-type" content="text/css">
	    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <?php require "./mydbms.php"; ?>
	<?php
       //
        if (isset($_SESSION['user'])){
            echo "<div class=wrapper>";
            echo "<div class=header>";
            include "header.php";
            echo "</div>";
            echo "<div class=menu>";
            include "menu.php";
            echo "</div>";
            echo "<div class='content'>";
            include "content.php";
            echo "</div>";
            echo "</div>";
            echo '<footer><div class="extra">© Bagoly Gábor - OOHQ3E, 2021 <br>Developed by Bagoly Gábor</div></footer>';
        } 
        else {
            echo '<meta http-equiv="refresh" content="0; URL=loginpage.html">';
        }
    ?>
    </body>
</html>
