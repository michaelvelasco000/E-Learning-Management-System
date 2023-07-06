<?php
error_reporting(0);
include_once("connection.php");
if (isset($_POST['backup_delete'])){
$id=$_POST['selector'];
$N = is_array($id) ? count($id) : 0 ;
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($connection,"DELETE FROM quiz where quiz_id='$id[$i]'");
}
header("location: teacher_quiz.php");
}
?>