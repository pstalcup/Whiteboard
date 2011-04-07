<?php 
   include('db_connect.php');

   $event = $_POST['eventName'];
   $description = $_POST['description'];
   $startT = $_POST['startTime'];
   $endT = $_POST['endTime']; 
   $eventD = $_POST['eventDate'];
   $eventG = $_POST['groupName'];
   $location = $_POST['location'];
   
   $query = "INSERT INTO events (name,description,event_date,start_time,end_time,location,group_id) 
   VALUES ('$event','$description','$eventD','$startT','$endT','$location','$eventG')";

   echo($query);
   
  
   mysqli_query($db,$query) or die("Query Failed LOLZ");
   //$query2 = "INSERT INTO memberjunction VALUES ('$name','$gname')";
  // mysqli_query($db, $query2) or die("Query2 Failed LOLZ");
   
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/Whiteboard/events.php">';
?>