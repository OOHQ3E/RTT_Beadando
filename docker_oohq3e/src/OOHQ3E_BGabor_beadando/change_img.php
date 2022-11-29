<?php
    session_start();
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    $query="select uname from users where uname='".$_SESSION["user"]."'";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($uname)=mysqli_fetch_row($result); 
    if(isset($_POST["send"])){
            $temp=rand();
            $temp.=basename($_FILES['profileimg']['name']);
            $filename = "img/users/"."$uname"."/".$temp;
            $filename = str_replace(" ","_",$filename);
            $query="UPDATE users SET img='".$filename."' where uname='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            $folder_path = "img/users/$uname";
            $files = glob($folder_path.'/*'); 

            foreach($files as $file) {
                if(is_file($file)) 
                unlink($file); 
            }

            if($result){
                echo '<script>alert("Sikeresen megváltoztatta a profilképét!")</script>' ;
                move_uploaded_file ($_FILES["profileimg"]['tmp_name'],$filename);
            }
        
             echo '<meta http-equiv="refresh" content="0; URL=index.php">'; 
    }
mysqli_close($con);
?>
