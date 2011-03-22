<?php include "db_connect.php"?>

<?php
$query= "SELECT * FROM group";
$result= mysqli_query($db, $query)
or die ('Error querying te database.');

while ($row = mysqli_fetch_array($result)) {

$group_name = $row['name'];
$group_desc = $row['description'];
$group_admin = $row['admin'];

echo 'Group:'.$group_name.'</br>'
     'Admin:'.$group_admin.'</br>'
	 'Info:'.$group_desc.'</br>';
	 }
	 