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
     
          $db_handle = mysqli_connect("localhost", "avalon", "P00P1337", "avalon") or die("|-1");
      if($db_handle)
            $head = $_GET['head'];
			$body = $_GET['body'];
			$gloves = $_GET['gloves'];
			$foot = $_GET['foot'];
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
            $hp= $_GET['hp'];
			$food= $_GET['food'];
			$faction= $_GET['faction'];
			mysqli_query($db_handle, "UPDATE playerdata SET Head = '$head', Body = '$body', Gloves = '$gloves', Feet = '$foot', Horse = '$horse', Item1 = '$item1', Item2 = '$item2', Item3 = '$item3', Item4 = '$item4', Troop = '$troop', Gold = '$gold', CoordinateX = '$x', CoordinateY = '$y', CoordinateZ = '$z', Hp = '$hp', Food = '$food', Faction = '$faction' WHERE Unique_ID = '$unique_id'");
  mysqli_close($db_handle);

}
       
 
   
?>