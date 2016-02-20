<?php
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
//the above part is for fixing a warband reading headers error

     $unique_id=$_GET["uniqueid"];
	 $username=$_GET["username"];

      
      $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
	  if($db_handle) 
		  mysqli_query($db_handle, "UPDATE playerdata SET Deaths = Deaths + 1 WHERE Unique_Id = '$unique_id'");
		  mysqli_close($db_handle);

	  
	  
?>