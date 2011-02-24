<?php include "db_connect.php"?>

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
						<table cellspacing="0"><tr><td>
			<table padding-left="5px" cellspacing="0">
				<tr>
				<td class="blank"></td>
				<td class="tab2"><a href="home.php">home</a></td>
				<td class="tab1">register</td>
				</tr>
			</table></td>
			</table>
			<?php
			if(isset($_POST['username']) && isset($_POST['password']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query = "insert into users (username,password) values ('$username','$password');";
				
				echo($query);
				
				
				
				echo('<table cellspacing="0">');
				if(mysqli_query($db,$query))
				{
					echo("<tr><td class='content'><h2>Registered</h2><h5>User $username successfully registered</h5></td></tr>");
				}
				else
				{
					echo("<tr><td class='content'><h2>Registration Failed</h2><h5>User $username unsuccessfully registered<br><a href='/Whiteboard/register.php'>Try again?</a></h5></td></tr>");
				}
				echo('</table>');
			}
			else
			{
			echo('
			<table cellspacing="0"><tr>
			<td class="content"><h2>Register</h2><h5><form action="register.php" method="post"><table><tr><td>Username</td><td><input type="text" name="username"></td>
			<tr><td>Password</td><td><input type="password" name="password"></td></h5></td></tr><tr><td><input type="submit"></td></table>
			');
			}
			?>
		</div>
	</body>
</html>