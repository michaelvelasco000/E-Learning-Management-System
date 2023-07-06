<?php 
include_once("session.php");
include_once("connection.php");

if (isset($_POST['btn_delete'])) {
    # code...
    $id = $_POST['id'];
    $class_id = $_POST['class_id'];
 $Query = mysqli_query($connection, "delete from student_class where id='$id' ") or die(mysqli_error($connection));

    $_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
    header("Location:class.php?id=$class_id");

}


?>