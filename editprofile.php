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
			
			
			<td class="tab2"><a href="home.php">home</a></td>
			<td class="tab1">profile</td>
			<td class="tab3"><a href="calendar.php">calendar</a></td>
			<td class="tab4"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">Welcome! | </font><a href="logout.php"> logout</a></td>
			</tr></table>

			<table cellspacing="0"><tr>
			<td class="content"><a href="profile.php"> back</a><h2>Edit Profile</h2><h4> 
			<form method="post" action="prof_edits_submitted.php">
					<table>
					
					<tr><td>New Bio</td><td><textarea rows="10" cols="50" name="Bio" value= 
					<?php
					 $name = $_SESSION['username'];			 
					 $query = "select Bio from users WHERE username = '$name'";
					 $result = mysqli_query($db, $query);
			  
					while($row = mysqli_fetch_array($result)){
						$content = $row['Bio'];				
						echo("<h5>$content");
					}			
					?>
					</textarea></td></tr>
					<tr><td>New Email</td><td> <input type="text" name="email" size="50" value=
					<?php
					 $name = $_SESSION['username'];			 
					 $query = "select eMail from users WHERE username = '$name'";
					 $result = mysqli_query($db, $query);
			  
					while($row = mysqli_fetch_array($result)){
						$content = $row['eMail'];				
						echo("$content");
					}			
					?>
					>
					
					</td></tr>	
					<tr><td>Enter path to new avatar</td><td> <input type="text" name="avatar" size="50" value=
				    <?php
					 $name = $_SESSION['username'];			 
					 $query = "select avatar from users WHERE username = '$name'";
					 $result = mysqli_query($db, $query);
			  
					while($row = mysqli_fetch_array($result)){
						$content = $row['avatar'];				
						echo("$content");
					}			
					?>
					>
					
					</td></tr>		
					<tr><td></td><td><input type="Submit" value="Save Edits"></td></tr>
					
					</table>
					
					</form>
					
					
			</h4></td></tr>

			</table
		</div>
	</body>
</html>