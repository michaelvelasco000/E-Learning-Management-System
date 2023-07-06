<?php
include('../connection.php');
$connection =  connection();
$get_id=$_GET['id'];
mysqli_query($connection,"DELETE from subject where subject_id='$get_id'")or die($connection->error);
header('location:subjects.php');


?>
