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
<a href="groups.php">view groups</a> | <a href="editgroup.php">edit groups</a> | <a href="creategroup.php">create a group</a> | join a group 
<h2>Join a group!</h2>

<?php
						$name = $_SESSION['username'];
						$query = "SELECT g.groupName, g.groupadmin, g.groupdescription FROM groups g";
						$result = mysqli_query($db,$query);
						
						if($_GET['d'] != '1')
						{
							echo("<form method='get' action='joingroup.php'><input type='hidden' name='d' value='1'>");
							echo("<table border = 1>");
						
							echo("<tr><td><b>Join?</b></td><td><b>Group</b></td><td><b>Admin</b></td><td><b>Description</b></td><td><b>Member</b></td></tr>");
						
							while($row = mysqli_fetch_array($result))
							{
								$groupName = $row['groupName'];
								$admin = $row['groupadmin'];
								$description = $row['groupdescription'];
								$tempquery = "SELECT COUNT(userName) FROM memberjunction m WHERE m.groupname = '$groupName' AND m.username = '$name'";
								$tempresult = mysqli_query($db, $tempquery);
								$array = mysqli_fetch_array($tempresult);
								$count = $array['COUNT(userName)'];
								
								
								echo("<tr>");
								echo("<td><input type='checkbox' name=$groupName value='1'></td>");
								echo("<td>" . $groupName . "</td>");
								echo("<td>" . $admin . "</td>");
								echo("<td>" . $description . "</td>");
								if($count > 0){
									echo("<td>" . Y . "</td>");
								}
								else{
									echo("<td>" . N . "</td>");
								}
								echo("</tr>");
								
							}
						
							echo("</table><br>");
							
							echo("<input type='submit' value='Join Selected'></form>");
						}
						else
						{
							echo("<table><tr><b>Joined:</b></tr>");
							$i = 0;
							while($row = mysqli_fetch_array($result))
							{
								if($_GET[$row["groupName"]] == "1")
								{
									$i++;
									$groupName = $row['groupName'];
									$admin = $row['groupadmin'];
									$description = $row['groupdescription'];
									
									$query2 = "INSERT INTO memberjunction VALUES ('$name', '$groupName')";
									mysqli_query($db,$query2) or die($query2);
									echo("	
											<tr><td><br></td><td></td></tr>
											<tr><td><b>Group:</b><td> $groupName </td></tr>
											<tr><td><b>Admin:</b><td> $admin </td></tr>
											<tr><td><b>Description:</b><td> $description </td></tr>
										");
								}
							}
							if($i == 0)
							{
								echo("<tr><td> No item selected! </td></tr>");
							}
							
							echo("<tr><td><form method='post' action='joingroup.php'><input type='submit' value='Go Back'></form></td></tr>");
							echo("</table>");
							
						}
					?>

		</div>
	</body>
</html>