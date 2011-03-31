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
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">
view groups | <a href="editgroup.php">edit groups</a> | <a href="creategroup.php">create a group</a> | <a href="joingroup.php">join/unjoin a group</a> 
<h5>
		
<?php
			  $name = $_SESSION['username'];			 
			  $query = "SELECT * FROM groups";
			  $result = mysqli_query($db, $query);
			  echo ("<h2>Existing Groups</h2>");
			  echo '<table  border="1">';
			  echo("<tr><td><b>Group Name</b></td><td><b>Admin</b></td><td><b>Description</b></td></tr>");
			  while($row = mysqli_fetch_array($result)){
				$content = $row['groupName'];
				echo("<tr><td>$content</td>");
				$content2 = $row['groupadmin'];
				echo("<td>$content2</td>");
				$content3 = $row['groupdescription'];
				echo("<td>$content3</td></tr>");
			}
			echo "</table>";
			
			?>
			</tr></td>					</form>
		
</h5></td></tr>
			</table
		</div>
	</body>
</html>