<?php


require('../connection.php');
include_once("../session.php");
$connection = connection();

if (isset($_POST['btn_del'])) {
    $id = $_POST['id'];

    $query = "UPDATE student set delete_status = 0 where student_id ='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo 'data deleted';
        header("Location: archiveStudent.php");
    } else {
        echo 'not deleted';
    }
}