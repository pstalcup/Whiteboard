<?php 
   include('db_connect.php');

   $bio = $_POST['Bio'];
   $email = $_POST['email'];
   $avatar = $_POST['avatar']; 
   $name = $_SESSION['username'];
   $password = $_POST['password'];
   
   $query= "UPDATE users SET Bio = '$bio', eMail = '$email', Avatar = '$avatar', password = '$password' WHERE userName = '$name'";
     
   
   mysqli_query($db,$query) or die("Query Failed LOLZ");
   
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/Whiteboard/profile.php">';
?>