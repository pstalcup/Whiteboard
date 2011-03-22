<?php 
   include('db_connect.php');

   $group = $_POST['groupToJoin'];
   $name = $_SESSION['username'];
   
   $query= "INSERT INTO membership (userName, groupName) VALUES ('$name', '$group')";
      
   echo($query);
   
   mysqli_query($db,$query) or die("Query Failed LOLZ");
   
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/Whiteboard/groups.php">';
?>