<?php
    if(!isset($_GET["d"]))
    {
        $_GET["d"]=0;
    }
    switch($_GET["d"])
    {
	    case 1:
            include "profile.php";break;
	    case 2:
            include "formlist.php"; break;
        case 3:
            include "gallery.php";break;
        case 4:
            include "galleryform.php";break;
        case 5:
            include "delete.php";break;
        case 6:
            include "kereses.php";break;
        case 7:
            include "changeform.php";break;
	    default: 
            include "profile.php"; break;
    }
?>
