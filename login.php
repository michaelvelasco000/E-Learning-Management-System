<?php
include('connection.php');
$conn = connection();
session_start();
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
/* student */
$query = "SELECT * FROM student WHERE user_idlogin='$username' AND password='$password' AND delete_status = 0";
$result = mysqli_query($conn, $query) or die("error");
$row = mysqli_fetch_array($result);
$num_row = mysqli_num_rows($result);
/* teacher */
$query_teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE user_idlogin ='$username' AND password='$password' AND status = 0") or die("error");
$num_row_teacher = mysqli_num_rows($query_teacher);
$row_teahcer = mysqli_fetch_array($query_teacher);
if ($num_row > 0) {
	$_SESSION['id'] = $row['student_id'];
	echo 'true_student';

	session_write_close();
	exit();
} else if ($num_row_teacher > 0) {
	$_SESSION['id'] = $row_teahcer['teacher_id'];
	echo 'true';

	session_write_close();
	exit();
} else {
	echo 'false';

	session_write_close();
	exit();
}
