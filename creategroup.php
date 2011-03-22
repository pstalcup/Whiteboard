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
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a></td>			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">
			
<a href="groups.php">view groups</a> | <a href="editgroup.php">edit groups</a>  | create a group | <a href="joingroup.php">join a group</a><h2>Create a Group!</h2><h5>			
			
			<?php
				if(isset($_POST['groupName']) && isset($_POST['groupAdmin']) && isset($_POST['groupDescription'])){
				include "db_connect.php";	
				$groupName = $_POST['groupName'];
				$groupAdmin = $_POST['groupAdmin'];
				$groupDescription = $_POST['groupDescription'];
				$query = "INSERT INTO group (group_name, group_description, group_admin) VALUES ('$groupName', '$groupAdmin', '$groupDescription')";
				mysqli_query($db, $query);			
				}
				else{
				echo('<form method="post" action="createGroup.php">
					<table>
					<tr><td><label for="groupname">Groupname:</label></td>
					<td><input type="text" id="groupName" name="groupname" /></td><br />
					<tr><td><label for="groupadmin">GroupAdmin:</label></td>
					<td><input type="text" id="groupAdmin" name="groupadmin" /></td><br />
					<tr><td><label for="groupdescription">GroupDescription:</label></td>
					<td><input type="text" id="groupDescription" name="groupdescription" /></td><br />
					<tr><td><input type="submit" value="Submit" name="add group" /></td>
					</table>
				</form>');			
				}
			?>
            </h5></td></tr>
			</table
		</div>
	</body>
</html>