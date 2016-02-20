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


	 # echo "36|$local_id|$unique_id|$var2|5|5|1|5|4|3|1|";
	  $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
	  if($db_handle) 
	  $var2= $_GET['var2'];
	  $instance_id= $_GET['instance_id'];
	  $left= $_GET['left'];
	  $fetch = mysqli_query($db_handle, "SELECT owner, price FROM houses WHERE var2 = '$var2'") or die("Error: ".mysqli_error($db_handle));
      $row = mysqli_fetch_assoc($fetch);
	  if(isSet($row)) {
	  $owner = $row['owner'];	 
      $price = $row['price'];
	  if($owner==$unique_id){
	#   echo "36|$local_id|$unique_id|$var2|$row[Price]|5|1|5|4|3|1|";
	    echo "36|$local_id|$unique_id|$var2|$row[price]|$row[owner]|1|$fifty|$instance_id|$left|1|";
	  } else {
	    echo "36|$local_id|$unique_id|$var2|$row[price]|$row[owner]|1|$fifty|$instance_id|$left|0|";
	  }
	  }
		

	  
	  
?>