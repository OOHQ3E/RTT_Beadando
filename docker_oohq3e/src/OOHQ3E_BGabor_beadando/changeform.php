<?php
    require_once "./mydbms.php";
    $dbname = "oohq3e";
    $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);
    
    if(!isset($_GET['order']))
    	$order=0;
    else $order=$_GET['order'];
    
    if ($order==0)
    	$orderstring=" order by id";
    else $orderstring=" order by name";
    
    $limit = 1;
    $page = isset($_GET['page']) ? abs((int)$_GET['page']) : 1;
    
    $query="select count(*) from gallery";
    
    $res=mysqli_query($con,$query) or die ("Nem sikerült".$query);
    $list=mysqli_fetch_row($res);
    $c = array_shift($list);
    
    $maxpage = ceil($c / $limit);
    
    if ($page <= 0){
      $page = 1;
    }
    else if ($page >= $maxpage) {
           $page = $maxpage;
    }
    $offset = ($page-1)*$limit;
       
    $query="select id,name,meret,datum,kategoria,alkoto,img from gallery";
    $query.=$orderstring;
    $query.=" limit $offset,$limit";
       
    $result=mysqli_query($con,$query) or die ("Nem sikerült ".$query);
       
    echo"<h2>Kép adatainak módosítása</h2>";
    $linklimit = 10; 
    $linklimit2 = $linklimit / 2; 
    $linkoffset = ($page > $linklimit2) ? $page - $linklimit2 : 0; 
    $linkend = $linkoffset+$linklimit; 
       
    if ($maxpage - $linklimit2 < $page){
       $linkoffset = $maxpage - $linklimit;
       if ($linkoffset < 0){
          $linkoffset = 0;
       }
       $linkend = $maxpage;
    }
    
    if ($page > 1){
      echo "<a class='button' href='index.php?d=".$_GET['d']."&order=".$order."&page=1'><<</a>";
      echo "<a class='button' href='index.php?d=".$_GET['d']."&order=".$order."&page=".($page-1)."'><</a>";
    }
    
     for ($i=1+$linkoffset; $i <= $linkend and $i <= $maxpage; $i++) {
        $style = ($i == $page) ? "color: black;" : "color: white;";
        echo "<a class='button' href='index.php?d=".$_GET['d']."&order=".$order."&page=$i' style='$style'>$i</a>";
     }
   
     if ($page < $maxpage){
       echo "<a class='button' href='index.php?d=".$_GET['d']."&order=".$order."&page=".($page+1)."'>></a>";
       echo "<a class='button' href='index.php?d=".$_GET['d']."&order=".$order."&page=".$maxpage."'>>></a>";
       }
       
     echo"<hr>";
     
    while (list($id,$name,$meret,$datum,$kategoria,$alkoto,$img)=mysqli_fetch_row($result)){ 
            $azonosito='<input type="hidden" name="id" value='.$id.'><input type="hidden" name="page" value='.$page.'>';
            echo "<div class='change'>";

            echo "<img src=" .$img . " alt=".$img." width=300px height=300px/>";
            echo "<div class='modositas'>";
            echo '<form action="g_change_img.php" method="post" enctype=multipart/form-data><input type="file" name="imgname" id="imgname" required>'
            . '<input class="button" type="submit" name="sendimg" value="Kép módosítása">'.$azonosito.'</form>';
            echo"<br/><hr>";
            echo 'Jelenlegi cím: '.$name.'';
            echo '<form action="g_change_cim.php" method="post"><input class="textbox" type="text" name="name" pattern="[A-Z a-z 0-9]*" placeholder="Új cím - Angol abc betűi és számok" maxlength="50" required size=40>'
            . '<input class="button" type="submit" name="sendcim" value="Cím módosítása">'.$azonosito.'</form>';
            echo"<hr>";
            echo 'Jelenlegi méret: '.$meret.' cm';
            echo '<form action="g_change_meret.php" method="post"><input class="textbox" type="text" name="meret" pattern="[x 0-9]*" placeholder="Új méret - Szélesség x magasság" maxlength="35" required size=40> cm'
                . '<input class="button" type="submit" name="sendmer" value="Méret módosítása">'.$azonosito.'</form>';
                echo"<hr>";
            echo 'Jelenlegi készítési dátum: '.$datum.'';     
            echo '<form action="g_change_dat.php" method="post"><input class="textbox" type="text" name="datum"  pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ ./-_ a-z 0-9]*" placeholder="Új készítési dátum - Pl.:2020 október 7." maxlength="35" required size=40>'
             . '<input class="button" type="submit" name="senddat" value="Dátum módosítása">'.$azonosito.'</form>';
             echo"<hr>";
            echo 'Jelenlegi készítési technika: '.$kategoria.'';          
            echo '<form action="g_change_tech.php" method="post"><input class="textbox" type="text" name="kategoria" pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ a-z 0-9]*" placeholder="Új technika - Pl.:ceruza" maxlength="40" required size=40>'
             . '<input class="button" type="submit" name="sendtec" value="Technika módosítása">'.$azonosito.'</form>';
             echo"<hr>";
            echo 'Jelenlegi alkotó: '.$alkoto.'';         
            echo '<form action="g_change_alk.php" method="post"><input class="textbox" type="text" name="alkoto" pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ a-z 0-9]*" placeholder="Új alkotó" maxlength="60" required size=40>'
              . '<input class="button" type="submit" name="sendalk" value="Alkotó módosítása">'.$azonosito.'</form>';
                echo '</div>';
                echo '</div>';
    }
  echo '<hr style="clear:both; margin:15px">';
    
?>