<?php

// EVENT 3

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
	  if (!isset($_GET['bank'])) {
	    mysqli_query($db_handle, "UPDATE playerdata SET Username = '$username' Unique_Id = '$unique_id'");
	    $fetch = mysqli_query($db_handle, "SELECT Gold, Bank, Pin FROM playerdata WHERE Unique_Id = '$unique_id'");
        $row = mysqli_fetch_assoc($fetch);
		echo "33|$local_id|$unique_id|$row[Gold]|$row[Bank]|$row[Pin]|5";
		} else {
		$bank=$_GET["bank"];
		mysqli_query($db_handle, "UPDATE playerdata SET Bank=Bank - $bank WHERE Unique_Id = '$unique_id'");
	   }
	   mysqli_close($db_handle);

	  
	  
?>