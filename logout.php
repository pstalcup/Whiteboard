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
			<td class="content"><h2>Logout</h2><h5> 
			<?php
			  if(session_destroy()){
				echo "<p>Logged out successfully!</p>\n";
				echo '<form method="post" action="home.php">
					<input type="submit" value="Back" name="back" />
				    </form>';
			 }
			 else{
				echo "<p>Could not log you out!</p>\n";
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