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

     $unique_id=$_GET["guid"];
	 $local_id=$_GET["playerid"];
	 $username=$_GET["username"];

      
     $db_handle = mysqli_connect("localhost", "root", "pass", "scripts") or die("|-1");
	  if($db_handle) 
	  
	    $fetch = mysqli_query($db_handle, "SELECT bank, banklimit  FROM player_names WHERE unique_id = '$unique_id'");
        $row = mysqli_fetch_assoc($fetch);
		echo "42|$local_id|$unique_id|$row[bank]|$row[banklimit]|";
		mysqli_query($db_handle, "UPDATE player_names SET name = $username WHERE unique_id = '$unique_id'");
		mysqli_close($db_handle);
		

	  
	  
?>