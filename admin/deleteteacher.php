<?php


require('../connection.php');
include_once("../session.php");
$connection = connection();

if (isset($_POST['btn_del'])) {
    $id = $_POST['id'];

    $query = "UPDATE teacher set status = 1 where teacher_id ='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo 'data deleted';
        header("Location: teachers.php");
    } else {
        echo 'not deleted';
    }
}