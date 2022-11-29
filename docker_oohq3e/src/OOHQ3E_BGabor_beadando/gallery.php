<?php
      require_once "./mydbms.php";
      $dbname="oohq3e";
      $con=connect("MYSQL_USER","MYSQL_PASSWORD",$dbname);

      if(!isset($_GET['order']))
      	$order=0;
      else $order=$_GET['order'];

      if ($order==0)
      	$orderstring=" order by id";
      else $orderstring=" order by name";

      $limit = 6;
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
      echo"<h3>Képgaléria</h3><hr>";
      echo "<table class='rendezes'><tr><td>Képek rendezése</td><td><a class='button' href=index.php?d=".$_GET['d']."&order=0>Felvitel szerint</a></td><td>
      <a class='button' href=index.php?d=".$_GET['d']."&order=1>Név szerint</a> </td></tr></table>";
       
      while (list($id,$nev,$meret,$datum,$kategoria,$alkoto,$kep)=mysqli_fetch_row($result)){
       echo "<div class='users'>";
              echo "<img src=" . $kep ." alt=". $kep ." width=250px height=250px />";
              echo "<p>Cím: " . $nev . "</p>";
              echo "<p>Méret: " . $meret . " cm</p>";
              echo "<p>Készült: " . $datum . "</p>";
              echo "<p>Technika: " . $kategoria . "</p>";
              echo "<p>Alkotó: " . $alkoto . "</p>";
              echo '</div>';
      }

      echo '<hr style="clear:both; margin:15px">';

      $linklimit = 4; 
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
      

      mysqli_close($con);
      
?>
    