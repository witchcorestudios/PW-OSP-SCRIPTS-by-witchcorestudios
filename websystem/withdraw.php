<?php
 
header_remove();
      function set_content_length($output)
      {
         header("Content-Length: ".strlen($output));
         return $output;
      }
      ob_start("set_content_length");
   if(isset($_GET['guid']) && isset($_GET['username'])) {
       $unique_id=$_GET["guid"];
       $withdraw=$_GET["withdraw"];
       $balance=$_GET["balance"];
       $username=$_GET["username"];
         
$newbank = $balance - $withdraw;


     
          $db_handle = mysqli_connect("localhost", "root", "pass", "scripts") or die("|-1");
      if($db_handle)
            			mysqli_query($db_handle, "UPDATE player_names SET bank = '$newbank', name = '$username' WHERE unique_id = '$unique_id'");
  mysqli_close($db_handle);
  echo "Saved player $username($unique_id)";
}
       
 
   
?>