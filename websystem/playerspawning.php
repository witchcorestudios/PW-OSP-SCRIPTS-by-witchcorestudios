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
    $peasant = 1375631;

      
     $db_handle = mysqli_connect("localhost", "root", "pass", "scripts") or die("|-1");

	  if($db_handle) 
	  
	    $fetch = mysqli_query($db_handle, "SELECT gold, bank, head, body, hands, feet, horse, item1, item2, item3, item4, troop, x, y, z, health, hunger, faction, unique_id, motd FROM player_names WHERE unique_id = '$unique_id'");

        $row = mysqli_fetch_assoc($fetch);
		echo "40|$local_id|$unique_id|$row[gold]|$row[bank]|$row[head]|$row[body]|$row[hands]|$row[feet]|$row[horse]|$row[item1]|$row[item2]|$row[item3]|$row[item4]|$row[troop]|$row[x]|$row[y]|$row[z]|$row[health]|$row[hunger]|$row[faction]|$row[unique_id]|a|a|a|a|a|a|a|a|a|$row[motd]|";
		mysqli_close($db_handle);
		

	  
	  
?>