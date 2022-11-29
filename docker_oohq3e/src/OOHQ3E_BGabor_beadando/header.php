<?php
    echo "<header>
        <div style='margin:auto'>
            <h2>OOHQ3E - Beadandó oldal</h2>";
            echo "<div style='width:80%; margin:auto; padding-bottom:2px;'>";
            echo "<p style='font-size:24; margin:10px;'>Üdv, ".$_SESSION['user']."!";
            echo '<form action=logout.php method=post><input class= "button" type=submit name=logout value=Kijelentkezés></form>'.
       '</div>'; 
		
    echo "</header>";
?>