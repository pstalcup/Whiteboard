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
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">

<h2>Add an Event</h2>

<?php
						$name = $_SESSION['username'];
						$query = "SELECT * FROM events";
						$result = mysqli_query($db,$query);
						
						if($_GET['d'] != '1')
						{
							echo("<form method='get' action='addEvent.php'><input type='hidden' name='d' value='1'>");
							echo("<table border = 1>");
						
							echo("<tr><td><b>Select</b></td><td><b>Event</b></td><td><b>Date</b></td><td><b>Start</b></td><td><b>End</b></td><td><b>Group</b></td><td><b>Location</b></td><td><b>Attending</b></td></tr>");
						
							while($row = mysqli_fetch_array($result))
							{
								$event = $row['name'];
								$eDate = $row['event_date'];
								$startT = $row['start_time'];
								$tempquery = "SELECT COUNT(eventID) c FROM userevents e WHERE e.eventID = '$event' AND e.userID = '$name'";
								//echo($tempquery);
								$tempresult = mysqli_query($db, $tempquery);
								//print_r($tempresult);
								$array = mysqli_fetch_array($tempresult);
								$count = $array['c'];
								$endT = $row['end_time'];
								$location = $row['location'];
								$grp = $row['group_id'];
																
								$url = urlencode($event);
								echo("<tr>");
								echo("<td><input type='checkbox' name= $url value='1'></td>");
								echo("<td>" . $event . "</td>");
								echo("<td>" . $eDate . "</td>");
								echo("<td>" . $startT . "</td>");
								echo("<td>" . $endT . "</td>");
								echo("<td>" . $grp . "</td>");
								echo("<td>" . $location . "</td>");
								if($count > 0){
									echo("<td>" . Y . "</td>");
								}
								else{
									echo("<td>" . N . "</td>");
								}
								echo("</tr>");
								
							}
						
							echo("</table><br>");
							
							echo("<input type='submit' value='Add/Remove Event'></form>");
						}
						else
						{
							echo("<table><tr><b>Action Performed On:</b></tr>");
							$i = 0;
							while($row = mysqli_fetch_array($result))
							{
								//$test = $_GET[$row["name"]];
								//echo("<br>Name: $test");
								//echo($row['name']);
								if($_GET[urlencode($row["name"])] == "1")
								{
									$i++;
									$event = $row['name'];
									$eDate = $row['event_date'];
									$startT = $row['start_time'];
									$tempquery = "SELECT COUNT(eventID) FROM userevents e WHERE e.eventID = '$event' AND e.userID = '$name'";
									$tempresult = mysqli_query($db, $tempquery);
									$array = mysqli_fetch_array($tempresult);
									$count = $array['COUNT(eventID)'];
									$endT = $row['end_time'];
									$location = $row['location'];
									$grp = $row['group_id'];
									echo("Count: $count");
									if($count == 0){									
										$query2 = "INSERT INTO userevents VALUES ('$name', '$event')";
										$join = "ADDED";
									}
									else{
										$query2 = "DELETE FROM userevents WHERE userID= '$name' AND eventID = '$event'";
										$join = "REMOVED";
									}
									mysqli_query($db,$query2) or die($query2);
									echo("	
											<tr><td><br></td><td></td></tr>
											<tr><td><b>Event:</b><td> $event </td></tr>
											<tr><td><b>Date:</b><td> $eDate </td></tr>
											<tr><td><b>ACTION:</b><td>$join</td></tr>
										");
								}
							}
							if($i == 0)
							{
								echo("<tr><td> No item selected! </td></tr>");
							}
							
							echo("<tr><td><form method='post' action='addEvent.php'><input type='submit' value='Go Back'></form></td></tr>");
							echo("</table>");
							
						}
					?>

		</div>
	</body>
</html>