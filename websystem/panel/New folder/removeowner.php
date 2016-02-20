<?php
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
//the above part is for fixing a warband reading headers error

     $owner=$_GET["owner"];
	 $var2=$_GET["var2"];
      
     $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
	  if($db_handle) 
			mysqli_query($db_handle, "UPDATE houses SET Owner=0 WHERE var2 = '$var2';");
			  mysqli_close($db_handle);

	  
	  
?>