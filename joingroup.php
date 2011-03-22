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
<a href="viewgroups.php">view groups</a> | <a href="editgroup.php">edit groups</a> | <a href="creategroup.php">create a group</a> | join a group 
<h2>Select a group to join</h2><h5>

<h3>Current Abductions</h3>
					
					<?php
						$query = "SELECT * FROM abduction;";
						$result = mysqli_query($db,$query);
						
						if($_GET['d'] != '1')
						{
						
							echo("<form method='get' action='list.php'><input type='hidden' name='d' value='1'>");
							echo("<table>");
						
							echo("<tr><td><b>Details?</b></td><td><b>ID</b></td><td><b>Name</b></td><td><b>Date</b></td><td><b>Location</td></tr>");
						
							while($row = mysqli_fetch_array($result))
							{
								$id = $row['id'];
								$name = $row['fname'] . ' ' . $row['lname'];
								$date = $row['ab_date'];
								$location = $row['city'] . ' ' . $row['state'];
							
								echo("<tr>");
								echo("<td><input type='checkbox' name=$id value='1'></td>");
								echo("<td>" . $id . "</td>");
								echo("<td>" . $name . "</td>");
								echo("<td>" . $date . "</td>");
								echo("<td>" . $location . "</td>");
								echo("</tr>");
							}
						
							echo("</table>");
							
							echo("<input type='submit' value='See Details'></form>");
						}
						else
						{
							echo("<table>");
							$i = 0;
							while($row = mysqli_fetch_array($result))
							{
								if($_GET[$row["id"]] == "1")
								{
									$i++;
									$id = $row['id'];
									$name = $row["fname"] . ' ' . $row["lname"];
									$gender = $row["gender"] == "female" ? "Female" : "Male";
									$date = $row["ab_date"];
									$city = $row["city"];
									$state = $row["state"];
									$scary = $row["scary"];
									$info = $row["info"];
									echo("
											<tr><td>-</td><td></td></tr>
											<tr><td><b>Name:</b><td> $name </td></tr>
											<tr><td><b>Gender:</b><td> $gender </td></tr>
											<tr><td><b>Date:</b><td> $date </td></tr>
											<tr><td><b>Location:</b><td> $city, $state </td></tr>
											<tr><td><b>Scary:</b><td> $scary scary </td></tr>
											<tr><td><b>Extra Info:</b><td> $info </td></tr>
										");
								}
							}
							if($i == 0)
							{
								echo("<tr><td> No item selected! </td></tr>");
							}
							
							echo("<tr><td><form method='post' action='list.php'><input type='submit' value='Go Bach'></form></td></tr>");
							echo("</table>");
							
						}
					?>




</h5></td></tr>
			</table
		</div>
	</body>
</html>