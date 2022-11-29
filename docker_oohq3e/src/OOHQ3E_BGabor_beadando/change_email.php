<?php
    session_start();
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    $query="select email from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($email)=mysqli_fetch_row($result); 
    if(isset($_POST["send"])){
        if($email==$_POST["old_email"]){
            $query="UPDATE users SET email='".$_POST['new_email']."' where uname='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            if($result){
                echo '<script>alert("Sikeresen megváltoztatta az email címét!")</script>' ;
            }
        }
        else{
             echo '<script>alert("Helytelenül adta meg a jelenlegi e-mail címet!")</script>' ;
        }
        echo '<meta http-equiv="refresh" content="0; URL=index.php">'; 
    }
    mysqli_close($con);

