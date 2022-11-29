<?php
    session_start();
    require_once "./mydbms.php";
    $dbname="oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

    if (isset($_POST["send"])) 
    {  
    $query="select name from gallery";
    $res=mysqli_query($con,$query) or die ("Nem sikerült".$query);
    $vanE = false;
    while (list($name)=mysqli_fetch_row($res)){ 
        if(strtolower($name) == strtolower($_POST['name'])){
        $vanE =  true;
        }
    }
    if(!$vanE){
        $temp1=trim($_FILES['nameimg']['name']);
        
        $str=$_POST["name"];
        $name=str_replace(" ", "_", $str);
        
        $temp2=rand().$temp1;
        $filename=str_replace(" ", "_", $temp2);
        $beirando="img/gallery/".$name."/".$filename;
        
        $dbname="oohq3e";
        $con=connect("root","",$dbname);
        
        $query="insert into gallery(name,meret,datum,kategoria,alkoto,img) values('".$_POST['name']."','".$_POST['meret']."','".$_POST['datum']."','".$_POST['kategoria']."','".$_POST['alkoto']."','".$beirando."')";
        
        $result=mysqli_query($con,$query);
        
        if (!$result){
             echo mysqli_errno($con)."Hiba: ".mysqli_error($con);
	    }
        else{
            mkdir("img/gallery/".$name);
            move_uploaded_file ($_FILES['nameimg']['tmp_name'],"./img/gallery/".$name."/".$filename);
            echo '<script>alert("Sikeres képfelvétel!")</script>';
            echo '<meta http-equiv="refresh" content="0; URL=index.php?d=3">'; 
	    }
    }
    else{
        echo '<script>alert("Ezzel a címmel szerepel már kép a rendszerben!")</script>';
        echo '<meta http-equiv="refresh" content="0; URL=index.php?d=4">'; 
    }
        
mysqli_close($con);
            
}
?>