<?php
    session_start();
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    $query="select passwd from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($passwd)=mysqli_fetch_row($result); 
    if(isset($_POST["send"])){
        if($passwd==md5($_POST["old_pwd"])){
            $query="UPDATE users SET passwd=md5('".$_POST['new_pwd']."') where uname='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            if($result){
                echo '<script>alert("Sikeresen megváltoztatta a jelszavát!")</script>' ;
            }
        }
        else{
            echo '<script>alert("Helytelenül adta meg a jelenlegi jelszót")</script>' ;
        }
        echo '<meta http-equiv="refresh" content="0; URL=index.php">'; 
    }
    mysqli_close($con);
?>
