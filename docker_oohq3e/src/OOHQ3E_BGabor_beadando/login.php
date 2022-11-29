<?php

    session_start();

        require "./mydbms.php";
        $dbname="oohq3e";
        $con=connect("MYSQL_USER","MYSQL_PASSWORD", $dbname);
		$query="select uname,passwd from users where uname='".$_POST['username']."'";
		$result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
                
        list($username,$passwd)=mysqli_fetch_row($result);
		if($passwd==md5($_POST['passwd'])){
                    $_SESSION["user"]=$username;
                            
                    $cookie_name = $username;
                    $a=getenv("REMOTE_ADDR"); 
                    $cookie_value = $a;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    echo '<meta http-equiv="refresh" content="0; URL=index.php">';                  
        } 
        else{	
            echo '<script>alert("Hibás jelszó vagy felhasználónév!")</script>' ;
            echo '<meta http-equiv="refresh" content="0; URL=loginpage.html">'; 
		}

mysqli_close($con);

                
?>
