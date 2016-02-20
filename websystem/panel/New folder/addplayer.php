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
	      $sql_result = mysqli_query($db_handle, "SELECT Username FROM playerdata WHERE Unique_Id = '$unique_id'") or die("Error: ".mysqli_error($db_handle));
          $result = mysqli_fetch_row($sql_result);
         
          if(!isSet($result)) {
		  $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'0123456789'); // and any other characters
          shuffle($seed); // probably optional since array_is randomized; this may be redundant
          $rand = '';
          foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
          mysqli_query($db_handle, "INSERT INTO playerdata (Unique_Id,Username,Pin) VALUES($unique_id,'$username','$rand')");
          echo"New user added.";
          }else{  
		  mysqli_query($db_handle, "UPDATE playerdata SET Username=$username WHERE Unique_Id = '$unique_id'");
		  # hier adden #
		  # met die field shit
          echo"User already exists.";
		  $fetch = mysqli_query($db_handle, "SELECT Pin FROM playerdata WHERE Unique_Id = '$unique_id'");
          $row = mysqli_fetch_assoc($fetch);	  
		  if($row['Pin']=='0'){
		  $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'0123456789'); // and any other characters
          shuffle($seed); // probably optional since array_is randomized; this may be redundant
		  $rand = '';
          foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];  
		  mysqli_query($db_handle, "UPDATE playerdata SET Pin = '$rand' WHERE Unique_Id = '$unique_id'");
		  echo"New pin added to a old player! ($rand)";
		  }
		  }	 
		  mysqli_close($db_handle);

	  
	  
?>