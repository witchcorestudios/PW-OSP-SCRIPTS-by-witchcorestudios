<?php

// EVENT 1

header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
//the above part is for fixing a warband reading headers error

     $unique_id=$_GET["uniqueid"];
	 $local_id=$_GET["localid"];
	 $username=$_GET["username"];

      
      $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
	  if($db_handle) 
	  
	    $fetch = mysqli_query($db_handle, "SELECT Gold, Bank, Pin, Head, Body, Gloves, Feet, Horse, Item1, Item2, Item3, Item4, Troop, CoordinateX, CoordinateY, CoordinateZ, DeadLeave, NewPlayer, HP, Food, Faction, LostHouse FROM playerdata WHERE Unique_Id = '$unique_id'");
        $row = mysqli_fetch_assoc($fetch);
		echo "37|$local_id|$unique_id|$row[Gold]|$row[Bank]|$row[Pin]|$row[Head]|$row[Body]|$row[Gloves]|$row[Feet]|$row[Horse]|$row[Item1]|$row[Item2]|$row[Item3]|$row[Item4]|$row[Troop]|$row[CoordinateX]|$row[CoordinateY]|$row[CoordinateZ]|$row[DeadLeave]|$row[NewPlayer]|$row[HP]|$row[Food]|$row[Faction]|$row[LostHouse]|";
		mysqli_close($db_handle);
		

	  
	  
?>