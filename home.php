<?php include("db_connect.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<LINK href="stylesheet.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
		if(isset($_SESSION['username']))
		{
		echo('
		<div class="header">
			<img src="logo.jpg"/>
		</div>
		<div class="body">
			<table padding-left="5px" cellspacing="0">
			<tr><td class="blank"></td>
			
			
			<td class="tab1">home</td>
			<td class="tab2"><a href="profile.php">profile</a></td>
			<td class="tab3"><a href="calendar.php">calendar</a></td>
			<td class="tab4"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">welcome username! | </font><a href="main.php"> logout</a></td>
			</tr></table>
			');
			echo("<table cellspacing='0'><tr>");
			//key time title value author
			$query = "SELECT * FROM news order by time";
			$result = mysqli_query($db,$query);
			while($row = mysqli_fetch_array($result))
			{
				$title = $row['title'];
				$content = $row['value'];
				$time = $row['time'];
				$author = $row['author'];
				$id = $row['id'];
				
				echo("<td class='content'>");
				echo("<h2>$title</h2><h5>$content</h5></td></tr>");
			}
			echo('</div>');
			echo('</body>');
		}
		else
		{
			echo('<body>
			<div class="header">
				<img src="logo.jpg"/>
			</div>
			<div class="body">
			<table cellspacing="0"><tr><td>
			<table padding-left="5px" cellspacing="0">
				<tr>
				<td class="blank"></td>
				<td class="tab1">home</td>
				<td class="tab2"><a href="register.php">register</a></td>
				</tr>
			</table></td>
			<td><table width="63px"><tr><td></td></tr></table></td><td><table cellspacing="0" class="login2">
				<tr><form action="login.php" method="post">
				<td padding-left="60px">username:<br/><input type="textfield" name ="username" size="16" maxlength="16"/></td>
				<td>password:<br/><input type="password" name="password" size="16" maxlength="16"/><input type="submit" value="login"></></td>
				</tr>
			</table></td></tr>
			</table>');
			$query = "SELECT * FROM news order by time";
			$result = mysqli_query($db,$query);
			while($result && $row = mysqli_fetch_array($result))
			{
				$title = $row['title'];
				$content = $row['value'];
				$time = $row['time'];
				$author = $row['author'];
				$id = $row['id'];
				
				echo("<td class='content'>");
				echo("<h2>$title</h2><h5>$content</h5></td></tr>");
			}
			if(!$result)
			{
				echo("<
			}
			echo('</div>');
			echo('</body>');
		}
		?>
</html>