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
     
	 $config = parse_ini_file('db.ini');
	 
          $db_handle = mysqli_connect($config['server'],$config['username'],$config['password'],$config['dbname']);
      if($db_handle)
            $head = $_GET['head'];
			$body = $_GET['body'];
			$gloves = $_GET['hands'];
			$foot = $_GET['feet'];
			$horse = $_GET['horse'];
			$item1 = $_GET['item1'];
			$item2 = $_GET['item2'];
			$item3 = $_GET['item3'];
			$item4 = $_GET['item4'];
			$troop = $_GET['troop'];
			$gold = $_GET['gold'];
            $x= $_GET['x'];
            $y = $_GET['y'];
            $z= $_GET['z'];
            $hp= $_GET['health'];
			$food= $_GET['food'];
			$faction= $_GET['faction'];
			mysqli_query($db_handle, "UPDATE player_names SET name = '$username', head = '$head', body = '$body', hands = '$gloves', feet = '$foot', horse = '$horse', item1 = '$item1', item2 = '$item2', item3 = '$item3', item4 = '$item4', troop = '$troop', gold = '$gold', x = '$x', y = '$y', z = '$z', health = '$hp', hunger = '$food', faction = '$faction' WHERE unique_id = '$unique_id'");
  mysqli_close($db_handle);
  echo "Saved player $username($unique_id)";
}
       
 
   
?>