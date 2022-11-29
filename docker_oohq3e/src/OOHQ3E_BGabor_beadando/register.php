<?php
    session_start();

            require "./mydbms.php";
            $dbname = "oohq3e";
            $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);
            $query="select uname,email from users";
            $res=mysqli_query($con,$query) or die ("Nem sikerült".$query);
            $vanE = false;

            while (list($username,$email)=mysqli_fetch_row($res)){ 
                if(strtolower($username) == strtolower($_POST['username']) || strtolower($email) == strtolower($_POST['email'])){
                    $vanE =  true;
                }
            }

                if(!$vanE){
                    $temp1 = trim($_FILES['profileimg']['name']);
                    $str=$_POST["username"];
                    $uname=str_replace(" ", "_", $str);
                    $temp2 = rand().$temp1;
                    $filename=str_replace(" ", "_", $temp2);
                    $beirando="img/users/".$uname."/".$filename;

                    $query="insert into users(uname,email,passwd,img,authority) values ('".$_POST['username']."','"
                    .$_POST['email']."', md5('".$_POST['passwd']."'),'".$beirando."','user')";
                    echo($query);
    	            $result=mysqli_query($con,$query);
        
                    if (!$result){
                        echo mysqli_errno($con)."Nem sikerült: ".mysqli_error($con);
    	            }
    	            else{
                    mkdir("img/users/".$uname);
                    move_uploaded_file ($_FILES['profileimg']['tmp_name'],"./img/users/".$uname."/".$filename);
                    echo '<script>alert("Sikeresen regisztrált!")</script>' ;
                    echo '<meta http-equiv="refresh" content="5; URL=loginpage.html">'; 
                    }
                }
                else{
                    echo '<script>alert("Ezzel a felhasználónévvel, vagy e-mail címmel szerepel már felhasználó a rendszerben!")</script>';
                    echo '<meta http-equiv="refresh" content="0; URL=regform.php">'; 
                }
    mysqli_close($con);

?>

