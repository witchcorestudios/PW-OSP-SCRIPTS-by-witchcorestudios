<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","avalon","pass");
    $db=mysql_select_db("avalon",$con);
    $query=mysql_query("select * from playerdata where Username LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['Unique_ID'];
    }
    echo json_encode($array);
?>
