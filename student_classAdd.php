<?php
include('session.php');
include_once("connection.php");
$connection = connection();

if(isset($_POST['btn_add'])) {

$class_id = $_POST['class_id'];
$student_id = $_POST['student_id'];
$date_added = date('Y-m-d');
$teacher_id = $_POST['teacher_id'];

$user = mysqli_query($connection,"insert into student_class (class_id,student_id,teacher_id,date_added) values ('$class_id','$student_id','$teacher_id','$date_added')");

}

if($user)
  {
    //echo "Saved";
    $_SESSION['status'] = "Added Successfully. Thank you!";
    $_SESSION['status_code'] = "success";
    header("Location: class.php?id=$class_id");
  }else
  {
    $_SESSION['status'] = "Error! Please try again";
    $_SESSION['status_code'] = "error";
    header("Location: class.php?id=$class_id");
  }
 

 ?>
