
<?php
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
//the above part is for fixing a warband reading headers error
     
     $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
	  if($db_handle) 
			mysqli_query($db_handle, "UPDATE playerdata SET CoordinateX=0;");
			  mysqli_close($db_handle);

	  
	  
?>