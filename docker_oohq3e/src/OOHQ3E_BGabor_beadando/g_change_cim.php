<?php
        session_start();
        require_once "./mydbms.php";
        $dbname="oohq3e";
        $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);
        $query="select name from gallery";
        $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);

        list($name)=mysqli_fetch_row($result); 
        if(isset($_POST["sendcim"])){
             $vanE = false;
             while (list($name)=mysqli_fetch_row($result)){    
                 if(strtolower($name) == strtolower($_POST['name'])){
                    $vanE =  true;
                    }
                }
        if(!$vanE){
         $query="select name,img from gallery where id=".$_POST["id"]."";
         $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
         list($name,$img)=mysqli_fetch_row($result);
        
            $old = $name;
            $new = $_POST['name'];
            $query="update gallery set name='".$_POST['name']."' where id=".$_POST["id"]."";
            $new_ = str_replace(" ", "_", $new);
            $newpath_ = "img/gallery/".$new_;
            $old_ = str_replace(" ", "_", $old);
            $oldpath_ = "img/gallery/".$old_;
            rename("$oldpath_", "$newpath_");

            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            
            if($result){
                echo '<script>alert("Sikeresen módosította a címet!")</script>' ;
                 echo '<meta http-equiv="refresh" content="0; URL=index.php?d=7&page='.$_POST["page"].'">'; 
            }
        }
    }
    if(!$vanE){
        $old_path = $img;
        $new_path = str_replace("$old_", "$new_", $old_path);
        $query="update gallery set img='".$new_path."' where id=".$_POST["id"]."";
        $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
        
    }  
    else{
        echo '<script>alert("Ezzel a címmel szerepel már kép a rendszerben!")</script>';
        echo '<meta http-equiv="refresh" content="0; URL=index.php?d=7&page='.$_POST["page"].'">'; 
    }
    mysqli_close($con);  
?>
