<?php include "db_connect.php";?>

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
			</table></td>
			</table>

			<table cellspacing="0"><tr>
			<td class="content"><h5> 
			<?php

			  $name = mysqli_real_escape_string($db,$_POST['username']);
			  $pw = mysqli_real_escape_string($db,$_POST['password']);

			   $query = "select * from users WHERE username = '$name' AND password ='$pw'";
			   $result = mysqli_query($db, $query);
			   if ($row = mysqli_fetch_array($result))
			   {
					$_SESSION['username'] = $row['userName'];
					echo "<p>Thanks for logging in, $name</p>\n";
					echo '<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/Whiteboard/home.php">';					
			   }
			   else
				{
					echo "<p>Could not log you in!</p>\n";
					echo '<form method="post" action="home.php">
						  <input type="submit" value="Back" name="back" />
						  </form>';
				}

			?>
			</h5></td></tr>
			</table
		</div>
	</body>
</html>
