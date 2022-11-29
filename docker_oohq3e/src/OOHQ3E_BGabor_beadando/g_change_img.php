<?php
    session_start();
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    $query="select name from gallery where id=".$_POST["id"]."";
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
    
    list($name)=mysqli_fetch_row($result); 
    if(isset($_POST["sendimg"])){
            $temp=rand();
            $temp.= basename($_FILES['imgname']['name']);
            $name = str_replace(" ", "_", $name);
            $filename = "img/gallery/".$name."/".$temp;
            $filename = str_replace(" ","_",$filename);
            $query="update gallery set img='".$filename."' where id=".$_POST["id"]."";
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            $folder_path = "img/gallery/$name";
            $files = glob($folder_path.'/*'); 
            
            foreach($files as $file) {
                if(is_file($file)) 
                unlink($file); 
            }
            
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);

            if($result){
               echo '<script>alert("Sikeresen módosította a képet")</script>' ;
               echo '<meta http-equiv="refresh" content="0; URL=index.php?d=7&page='.$_POST["page"].'">'; 
                move_uploaded_file ($_FILES["imgname"]['tmp_name'],$filename);
            }
        
    }
    mysqli_close($con);
?>
