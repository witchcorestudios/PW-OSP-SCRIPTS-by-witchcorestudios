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

$config = parse_ini_file('db.ini');

      
      $db_handle = mysqli_connect($config['server'],$config['username'],$config['password'],$config['dbname']);
	  if($db_handle) 
	  
	    $fetch = mysqli_query($db_handle, "SELECT adminlevel, troop FROM player_names WHERE unique_id = '$unique_id'");
        $row = mysqli_fetch_assoc($fetch);
		echo "33|$local_id|$unique_id|$row[adminlevel]|$row[troop]|";

		mysqli_close($db_handle);
		

	  
	  
?>