<?php
    require "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD", $dbname);
    
    if(isset($_POST["send"])){
        $query="select name from gallery where id=".$_POST["id"]."";
        $result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
         
        list($igazname)=mysqli_fetch_row($result);
        $tempigaznev= str_replace(" ","_",$igazname);

        if($igazname==$_POST["name"]){
            
            $query="delete from gallery where id=".$_POST["id"]."";
            $folder_path = "img/gallery/$tempigaznev";
            $files = glob($folder_path.'/*'); 
            foreach($files as $file) {
                if(is_file($file)) 
                unlink($file); 
            }
            
            rmdir($folder_path);
            $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
            if ($result){
                echo '<script>alert("Sikeresen törölte a képet!")</script>' ;
               echo '<meta http-equiv="refresh" content="0; URL=index.php?d=5">';
            }
        }
        else {	
          echo '<script>alert("Hibásan írta be a címet!")</script>' ;
          echo '<meta http-equiv="refresh" content="0; URL=index.php?d=5&page='.$_POST["page"].'">'; 
        }
    }
    mysqli_close($con);
?>