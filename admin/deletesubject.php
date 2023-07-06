<?php 


require('../connection.php');
include_once("../session.php");
$connection = connection();

if(isset($_POST['btn_del'])){
    $id = $_POST['id'];

    $query="DELETE FROM subject WHERE subject_id ='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        echo 'data deleted';
        header("Location: subjects.php");
    }else{
        echo 'not deleted';
    }
}
