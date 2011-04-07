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
			
			
			<td class="tab1"><a href="home.php">home</a></td>
			<td class="tab2"><a href="profile.php">profile</a></td>
			<td class="tab3"><a href="calendar.php">calendar</a></td>
			<td class="tab4"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">Welcome! | </font><a href="logout.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">
			<a href="createEvent.php">Create Event</a> | <a href='addEvent.php'>Add Event</a>	
			<table>
			<tr><td>			
			<tr><td><h2>Events</h2>
			<?php
			  $name = $_SESSION['username'];		  
			  $query = "select * from events";
			  
			  $result = mysqli_query($db, $query);
			  
			  if(mysqli_num_rows($result) > 0){
			  echo '<table><h5>';
			  while($row = mysqli_fetch_array($result)){
				
				 $content = $row['name'];
			     echo("<tr><td><b>$content</b></td>");
				 
				 echo("<table>");
				 $content = $row['description'];
				 echo("<tr><td>Description: $content</td></tr>");
				 
				 $content = $row['event_date'];
				 echo("<tr><td>Date: $content</td></tr>");
				 
				 $content = $row['start_time'];
				 echo("<tr><td>Start: $content</td></tr>");
				 
				 $content = $row['end_time'];
				 echo("<tr><td>End: $content</td></tr>");
				 
				 $content = $row['location'];
				 echo("<tr><td>Location: $content</td></tr>");
				 echo("<tr><td></td></tr>");
				 echo("<tr><td></td></tr>");
				 echo("<tr><td></td></tr>");
			    }	
			  }
			  else{
				echo("No events to display! <br><br>");
			  }
			?>
			
			</table>
		</div>
		</br>
		<br><form method="post" action="home.php">
					<input type="submit" value="Back to Home" name="Back to groups" />
				</form>
	</body>
</html>