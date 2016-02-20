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
	  
      $var2= $_GET['var2'];
	  $fetch = mysqli_query($db_handle, "SELECT price, owner FROM houses WHERE var2 = '$var2'") or die("Error: ".mysqli_error($db_handle));
      $row = mysqli_fetch_assoc($fetch);
	  if(isSet($row)) {
	  $fetch2 = mysqli_query($db_handle, "SELECT var2 FROM houses WHERE owner = '$unique_id'") or die("Error: ".mysqli_error($db_handle));
      $row2= mysqli_fetch_assoc($fetch2);
      $price = $row['price'];
	  if(isSet($row2)) {
	  echo "34|$local_id|$unique_id|$var2|$row[price]|$row[owner]|1|";
	  } else {
	  echo "34|$local_id|$unique_id|$var2|$row[price]|$row[owner]|0|";
	  }
	  }
		mysqli_close($db_handle);
		

	  
	  
?>