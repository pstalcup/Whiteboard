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
			<td class="tab2"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a></td>			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">
			
<h2>Create an Event</h2><h5>			
			
			<?php
				
				echo('<form method="post" action="createEvent_submit.php">
					<table>
					<tr><td>Event Name:</td><td> <input type="text" name="eventName" size="50"></td></tr>				
					<tr><td>Description:</td><td><textarea rows="10" cols="50" name="description"></textarea></td></tr>
					<tr><td>Date (YYYY-MM-DD):</td><td><input type="text" name="eventDate" size = "50"></td></tr>
					<tr><td>Start Time (hh:mm:ss):</td><td><input type="text" name="startTime" size = "50"></td></tr>
					<tr><td>End Time (hh:mm:ss):</td><td><input type="text" name="endTime" size = "50"></td></tr>
					<tr><td>Location:</td><td> <input type="text" name="location" size="50"></td></tr>
					<tr><td>Event Group:</td><td> <input type="text" name="groupName" size="50"></td></tr>
					<tr><td><input type="submit" value="Submit" name="add group" /></td>
					</table>
					</form>');			
				
			?>
            </h5></td></tr>
			</table
		</div>
	</body>
</html>