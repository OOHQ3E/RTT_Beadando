<?php

    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    $query="select authority from users where uname='".$_SESSION['user']."'";
    $res=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
    list($aut)=mysqli_fetch_row($res);


    if ($aut == "admin") { 
        $query = "select name,link from menu";
    }
     else if ($aut == "mod") {
        $query = "select name,link from menu where link in(1,3,4,5,6,7)";
    }
     else {
        $query = "select name,link from menu where link in(1,3,6)";
    }
    $result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));



    echo "<table class=menutable>";
        while(list($menutitle,$link)=mysqli_fetch_row($result)){
             if ($menutitle === "Your Profile") {
                 $menutitle = "Saját adatok";
             }
             elseif ($menutitle == "All Profiles") {
                 $menutitle = "Összes Felhasználó";
             } 
             elseif ($menutitle == "Gallery") {
             $menutitle = "Képgaléria";
             } 
             elseif ($menutitle == "Add To Gallery") {
                 $menutitle = "Új Kép Felvétele";
             }
             elseif ($menutitle == "Remove from Gallery") {
                 $menutitle = "Képek törlése Galériából";
             }
             elseif ($menutitle == "Search") {
                 $menutitle = "Kép keresése a galériában";
             }
             elseif ($menutitle == "Modify") {
                 $menutitle = "Képek adatainak módosítása";
             }
            echo "<tr><td><a class=menu href=index.php?d=".$link.">".$menutitle."</a></td></tr>";
    }
    echo "</table>";

mysqli_close($con);
?>

