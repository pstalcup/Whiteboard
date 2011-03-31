<?php include("db_connect.php") ?>
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
			
<a href="groups.php">view groups</a> | <a href="editgroup.php">edit groups</a>  | create a group | <a href="joingroup.php">join/unjoin a group</a><h2>Create a Group!</h2><h5>			
			
			<?php
				
				echo('<form method="post" action="createGroup_submit.php">
					<table>
					<tr><td>Group Name:</td><td> <input type="text" name="groupName" size="50"></td></tr>				
					<tr><td>Group Admin:</td><td> <input type="text" name="groupAdmin" size="50"></td></tr>
					<tr><td>GroupDescription:</td><td><textarea rows="10" cols="50" name="groupDescription"></textarea></td></tr>
					<tr><td><input type="submit" value="Submit" name="add group" /></td>
					</table>
				</form>');			
				
			?>
            </h5></td></tr>
			</table
		</div>
	</body>
</html>