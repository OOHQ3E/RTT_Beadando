<?php
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);
    

    $query="select id,uname,email,img from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($id,$nev,$email,$kep)=mysqli_fetch_row($result);{
        echo '<h2>Az Ön adatai:</h2><hr>';
        echo "<table><tr><td colspan=2><img src=" . $kep . " alt=".$kep." height=150/></td>";
        echo "<tr><td>Felhasználónév:</td><td>" . $nev . "</td></tr>";
        echo "<tr><td>E-mail:</td><td>" . $email . "</td></tr></table>";                                           
    }    
    echo '<form action="" method="post"><input class="button" type="submit" name="modify" value="Jelszó módosítása"></form>';

    if(isset($_POST["modify"])){
        echo '<form action="change_pwd.php" method="post"><input type="password" name="old_pwd" placeholder="Jelenlegi jelszó" required>'
    . '<input type="password" name="new_pwd" placeholder="Új jelszó" required>'
            . '<input class="button" type="submit" name="send" placeholder="Módosítás" value="Módosítás"></form>';
    }
    
    echo '<form action="" method="post"><input class="button" type="submit" name="imgmodify" value="Profilkép módosítás"></form>';
    if(isset($_POST["imgmodify"])){
        echo '<form action="change_img.php" method="post" enctype=multipart/form-data><input type="file" name="profileimg" id="profileimg" required>'
    . '<input class="button" type="submit" name="send" placeholder="Módosítás"></form>';}
  
  
    echo '<form action="" method="post"><input class="button" type="submit" name="modifyE" value="E-mail cím módosítás"></form>';
    if(isset($_POST["modifyE"])){
        echo '<form action="change_email.php" method="post"><input type="email" name="old_email" placeholder="Jelenlegi e-mail" required>'
    . '<input type="email" name="new_email" placeholder="Új e-mail" required>'
            . '<input class="button" type="submit" name="send" placeholder="Módosít" value="Módosítás"></form>';
    }
    
mysqli_close($con);
?>

