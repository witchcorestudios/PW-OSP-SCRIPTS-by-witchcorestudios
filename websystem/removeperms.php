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

     
          $db_handle = mysqli_connect("localhost", "root", "pass", "scripts") or die("|-1");
      if($db_handle)
            			mysqli_query($db_handle, "UPDATE admin_permissions SET panel = 0, gold = 0, kick = 0, temporary_ban = 0, permanent_ban = 0, kill_fade = 0, freeze = 0, teleport_self = 0, admin_items = 0, heal_self = 0, godlike_troop = 0, ships = 0, announce = 0, override_poll = 0, all_items = 0, mute = 0, animals = 0, factions = 0 WHERE unique_id = '$unique_id'");
  mysqli_close($db_handle);
  echo "Saved player $username($unique_id)";
}
       
 
   
?>