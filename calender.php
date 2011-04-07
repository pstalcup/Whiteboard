<?php include("db_connect.php"); ?>
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
			
			
			<td class="tab3"><a href="home.php">home</a></td>
			<td class="tab2"><a href="profile.php">profile</a></td>
			<td class="tab1">calendar</td>
			<td class="tab4"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">welcome username! | </font><a href="main.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content">view calendar | <a href="calendar2.php">add to calendar</a>

<h2>header1</h2><h5><?php $query = "select g.groupname gname, e.name ename, e.event_date edate, e.start_time etime from groups g left outer join events e on e.group_id = g.groupname;"; 
$result = mysqli_query($db,$query);
echo('<table><tr><td><b>Group Name</b></td><td><b>Event Name</b></td><td><b>Event Date</b></td><td><b>Event Time</b></td></tr>');
while($row = mysqli_fetch_array($result))
{
	$gname = $row['gname'];
	$ename = !$row['ename'] ? "No Scheduled Events" : $row['ename'];
	$edate = !$row['edate'] ? "--" : $row['edate'];
	$etime = !$row['etime'] ? "--" : $row['etime'];
	echo("<tr><td>$gname</td><td>$ename</td><td>$edate</td><td>$etime</td></tr>");
}
echo("</table>");
?> 
</h5></td></tr>
			</table
		</div>
	</body>
</html>