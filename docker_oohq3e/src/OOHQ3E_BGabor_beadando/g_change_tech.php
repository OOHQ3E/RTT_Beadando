<?php
        session_start();
        require_once "./mydbms.php";
        $dbname="oohq3e";
        $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

        if(isset($_POST["sendtec"])){
            $query="update gallery set kategoria='".$_POST['kategoria']."' where id=".$_POST["id"]."";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            
            if($result){
                 echo '<script>alert("Sikeresen módosította a technikát")</script>' ;
                 echo '<meta http-equiv="refresh" content="0; URL=index.php?d=7&page='.$_POST["page"].'">'; 
            }
        }
mysqli_close($con);
?>