<?php
function connect($username,$passwd,$dbname){
    $con=mysqli_connect('db',$username,$passwd,$dbname,3306);
    if (!isset($con)){
        die("Hiba".mysqli_error($con));
    }
    else{
        return $con;
    }
}
?>