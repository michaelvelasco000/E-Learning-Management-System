<?php


require('../connection.php');
include_once("../session.php");
$connection = connection();

if (isset($_POST['btn_delete'])) {
    $id = $_POST['id'];

    $query = "update student set delete_status = '1' where student_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo 'data deleted';
        header("Location: students.php");
    } else {
        echo 'not deleted';
    }
}