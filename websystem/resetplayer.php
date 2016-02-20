<?php
 
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
   if(isset($_GET['uniqueid']) && isset($_GET['username'])) {
      $unique_id=$_GET["uniqueid"];
         $username=$_GET["username"];
     
          $db_handle = mysqli_connect("localhost", "root", "pass", "scripts") or die("|-1");
      if($db_handle)
            
			mysqli_query($db_handle, "UPDATE player_names SET name = '$username', head = 0, body = 0, hands = 0, feet = 0, horse = 0, item1 = 0, item2 = 0, item3 = 0, item4 = 0, x = 0, y = 0, z = 0, health = 100, hunger = 0 WHERE unique_id = '$unique_id'");
  mysqli_close($db_handle);
  echo "Saved player $username($unique_id)";
}
       
 
   
?>