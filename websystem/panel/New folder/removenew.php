<?php
 
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
   if(isset($_GET['uniqueid'])) {
      $unique_id=$_GET["uniqueid"];
     
          $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
      if($db_handle)
			mysqli_query($db_handle, "UPDATE playerdata SET NewPlayer = 0 WHERE Unique_ID = '$unique_id'");
			
  mysqli_close($db_handle);
}
       
 
   
?>