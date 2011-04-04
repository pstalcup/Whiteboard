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
			
			
			<td class="tab2"><a href= "home.php">home</a></td>
			<td class="tab2"><a href="profile.php">profile</a></td>
			<td class="tab3"><a href="calendar.php">calendar</a></td>
			<td class="tab4"><a href="groups.php">groups</a></td>
			<td class="login"><font color="#ffffff">welcome! | </font><a href="logout.php"> logout</a>
			<?php include('searchbar.html') ?>
			</td></tr></table>
			<table cellspacing='0'><tr>
			<td class='content'>
			<?php 
			//echo('hi'); 
			$s = mysqli_real_escape_string($db,$_GET['search']);
   
			$a = "'%".$s."'";
			$b = "'".$s."%'";
			$c = "'%".$s."%'";
   
			//$i = (int)$_GET['s'];
  
		   $query = "SELECT * FROM users WHERE userName LIKE $a OR userName LIKE $b OR userName LIKE $c 
			OR email LIKE $a OR email LIKE $b OR email LIKE $c;";
			
			//mysqli_real_escape_string($db, $query);
			
		   $result = mysqli_query($db,$query);

		   $query2 = "SELECT * FROM groups WHERE groupName LIKE $a OR groupName LIKE $b OR groupName LIKE $c 
		    OR shortInfo LIKE $a OR shortInfo LIKE $b OR shortInfo LIKE $c;";
			
			//mysqli_real_escape_string($db, $query2);
		   //echo($query);
		   $result2 = mysqli_query($db,$query2);
			echo($s == "" ? "No Term" : "Search Term: ".$s);
			echo("<hr>");
			echo("<table>");
			if(mysqli_num_rows($result)>0)
			{
				//echo("<table>");
				echo("Users:<br>"); 
				while($row = mysqli_fetch_array($result))
				{
				$user = $row["userName"];
				$email = $row["eMail"];
				echo("<tr><td><a href='userProf.php?user=$user'>$user</a></td></tr><tr><td>$email</td></tr><tr></tr>");
				//echo("</table><br>");
				}
			}
			echo("<table>");
			if(mysqli_num_rows($result2)>0)
			{
				//echo("<table>");
				echo("Groups:<br>"); 
				while($row = mysqli_fetch_array($result2))
				{
				$group = $row["groupName"];
				$info = $row["shortInfo"];
				echo("<tr><td><a href='groupProf.php?group=$group'>$group</a></td></tr><tr><td>$info</td></tr><tr></tr>");
				}
				//echo("</table><br>");
			}
			echo("<table>");
			
			
			if($result)
			{
				echo(mysqli_num_rows($result) . " users found <br>"); 
			}
			if($result2)
			{
				echo(mysqli_num_rows($result2) . " groups found"); 
			}
			else
			{
				echo("No results found");
			}
			
						
			?>			
			</div>	
	</body>
	
</html>