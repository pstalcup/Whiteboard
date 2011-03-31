<?php include('db_connect.php'); ?>
   
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
view groups | <a href="editgroup.php">edit groups</a> | <a href="creategroup.php">create a group</a> | <a href="joingroup.php">join/unjoin a group</a> 
<h4>

<table>
		<?php  

			$name = $_SESSION['username'];
			$g = $_GET['group'];
			$grp = (string)$g;   
			   
	
			  echo("<tr><td><h2>Group: $grp</h2>");			 
			   $query = "select groupdescription from groups WHERE groupName = '$grp'";
			   $result = mysqli_query($db, $query);
			  
			  while($row = mysqli_fetch_array($result)){
				$content = $row['groupdescription'];				
				echo("<h4>Description:	</h4><h5>$content</h5>");
			}			 
			   $query = "select groupadmin from groups WHERE groupName = '$grp'";
			   $result = mysqli_query($db, $query);
			  
			  while($row = mysqli_fetch_array($result)){
				$content = $row['groupadmin'];				
				echo("<h4>Admin:	</h4><h5>$content</h5>");
				
			}
			
			
			echo("<h2>$grp's Members:</h2>");
			  $name = $_SESSION['username'];			 
			  $query = "SELECT u.userName, g.groupName FROM users u inner join groups 
g INNER JOIN memberJunction m ON u.userName = m.userName 
AND g.groupName = m.groupName WHERE m.groupName = '$grp'";
			  $result = mysqli_query($db, $query);
			  echo '<table><h5>';
			  while($row = mysqli_fetch_array($result)){
				
				$content = $row['userName'];
				echo("<tr><td><a href='userProf.php?user=$content'>$content</a></td>");
			}
			
			echo "</h5></table>";
			echo('<br><form method="post" action="groups.php">
					<input type="submit" value="Back to groups" name="Back to groups" />
				</form>');			
			
?>
			</td></tr>	
			
			</h4></td></tr>
			
			</table
		</div>
		</br>
		
	</body>
</html>


 
 
 
 