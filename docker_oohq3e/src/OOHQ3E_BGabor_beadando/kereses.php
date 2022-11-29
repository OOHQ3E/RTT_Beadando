<?php
    require_once "./mydbms.php";
    $dbname = "oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    echo "<form method=post>
        <h3>Kép Keresése a Galériában</h3><hr>
        <input class='textbox' type=search name='keresett' placeholder='Keresés...' required>
        <input class='button' type=submit value=Keresés></form>";

    if(isset($_POST['keresett'])){
        echo "<h3>Keresési kifejezés: <keresesikulcs style='color:rgb(25,25,25)'>".$_POST['keresett'].
        "</keresesikulcs><br>Ez alapján talált kép(ek):</h3>";
        $query="select * from gallery where name like '%$_POST[keresett]%'";

        $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);

        while (list($id,$nev,$meret,$datum,$kategoria,$alkoto,$kep)=mysqli_fetch_row($result)){ 
            echo "<div class='users'>";
            echo "<img src=" . $kep ." alt=". $kep ." width=250px height=250px />";
            echo "<p>Cím: " . $nev . "</p>";
            echo "<p>Méret: " . $meret . " cm</p>";
            echo "<p>Készült: " . $datum . "</p>";
            echo "<p>Technika: " . $kategoria . "</p>";
            echo "<p>Alkotó: " . $alkoto . "</p>";
            echo '</div>';
        }
        echo "<hr style='clear:both; margin:15px'>";
    }
mysqli_close($con);
?>

