<?php include("db_connect.php") ?>
<?php include("lib/swift_required.php")?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<LINK href="stylesheet.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="header">
			<img src="logo.jpg"/>
		</div>
		<div class="body">
			<table padding-left="5px" cellspacing="0">
			<tr><td class="blank"></td>
			
			
			<td class="tab4"><a href="home.php">home</a></td>
			<td class="tab2"><a href="profile.php">profile</a></td>
			<td class="tab3"><a href="calendar.php">calendar</a></td>
			<td class="tab1">groups</td>
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">
view groups | <a href="editgroup.php">edit groups</a> | <a href="creategroup.php">create a group</a> | <a href="joingroup.php">join a group</a><h2>Groups</h2>
		<h5>	
		
<?php
$query= "SELECT * FROM groups";
$result= mysqli_query($db, $query)
or die ('Error querying te database.');

while ($row = mysqli_fetch_array($result)) {

$group_name = $row['groupName'];
$group_desc = $row['groupdescription'];
$group_admin = $row['groupadmin'];

echo 'Group:'.$group_name.'<br/>';
     'Admin:'.$group_admin.'<br/>';
	 'Info:'.$group_desc.'<br/>';
	 }
	 ?>
		
		
		
		
		</h5></td></tr>
			</table
		
		</div>
		
		
		
</html>