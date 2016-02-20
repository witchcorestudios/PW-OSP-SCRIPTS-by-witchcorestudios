<?php
//set the action for adding a admin
if(isset($_POST['submitpermadd']))
{
			$db_handle = mysqli_connect("localhost", "avalon", "pass", "avalon") or die("|-1");
				if($db_handle)
				//change this (idk why you would change the value)
				//set the UID value
				$uid = $_POST['uid'];
                                $permission = $_POST['permission'];
					mysqli_query($db_handle, "UPDATE playerdata SET Adminperms = '$permission' WHERE Unique_ID = '$uid'");
						mysqli_close($db_handle);
}	
?>

<?php
//set the action for adding a admin
if(isset($_POST['submitpermdel']))
{
			$db_handle = mysqli_connect("localhost", "avalon", "pass", "avalon") or die("|-1");
				if($db_handle)
				//change this (idk why you would change the value)
				$adminvalue = '0';
				//set the UID value
				$uid = $_POST['uid'];
					mysqli_query($db_handle, "UPDATE playerdata SET Adminperms = '$adminvalue' WHERE Unique_ID = '$uid'");
						mysqli_close($db_handle);
}
//start HTML	
?>
<html>
	<head>
		<title>Admin panel - Item ID's</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
					<style>
						#header_container { background:#eee; border:1px solid #666; height:80px; left:0; position:fixed; width:100%; top:0; }
						#header{ line-height:40px; margin:0 auto; width:1200px; text-align:center; }
						table, th, td {
						border: 1px solid black;
						border-collapse: collapse;
									  }
					</style>
	</head>
			<fieldset>
				<div id="load_new">
				<center>
					<table style="width:auto">
										  <tr>
											<th>ID</th>	
											<th>Unique ID</th>
											<th>Username</th>
											<th>Admin permissions</th>
										  </tr>	
												<?php
										$con=mysqli_connect("localhost","avalon","pass","avalon");
										// Check connection
											if (mysqli_connect_errno()) {
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
												$value = '1';
                                                                                                $end = '300000';
												$result = mysqli_query($con,"SELECT * FROM playerdata WHERE Adminperms BETWEEN '$value' AND '$end'");
													while($row = mysqli_fetch_array($result)) {
																
																$unique_id = $row['Unique_ID'];
																$id = $row['ID'];
																$adminperm = $row['Adminperms'];
																$username = $row['Username'];
																
																?>
												  <tr>
													<td><?php echo $id ?></td>
													<td><?php echo $unique_id ?></td>
													<td><?php echo $username ?></td>
													<td><?php echo $adminperm ?></td>
													<td><?php echo $permlevel ?></td>
												  </tr>
												<?php
												}
												mysqli_close($con);
												?>

					</table>
					<p>&nbsp;</p>
						<!-- Add UID form -->
							<form action="" method="POST">
								<input type="text" name="uid" placeholder="UID of Admin">&nbsp;&middot;&nbsp;<input type="text" name="permission" placeholder="Permission Number">
								<input type="submit" name="submitpermadd" value="Add">&nbsp;&middot;&nbsp;<input type="submit" name="submitpermdel" value="Remove">
							</form>
						<!-- Add UID form -->

<form action="http://panel.avalon-gaming.com/posx.php"><input type="submit" value="Reset POSX">&nbsp;&middot;&nbsp;<form action="http://panel.avalon-gaming.com/posy.php"><input type="submit" value="Reset POSY">&nbsp;&middot;&nbsp;<form action="http://panel.avalon-gaming.com/posz.php"><input type="submit" value="Reset POSZ">
</form>
					</center>

<p style="text-align: center;"><span style="font-size:18px;"><strong>Owner =&nbsp;262143 &nbsp;| &nbsp;Standard =&nbsp;262142 &nbsp;| &nbsp;Limited =&nbsp;245740</strong></span></p>



				</div>
			</fieldset>
	</body>
</html>