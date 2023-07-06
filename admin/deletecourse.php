<?php
require('../connection.php');
$connection = connection();

if(isset($_POST['btn_delete'])){
    $id = $_POST['id'];

    $query="DELETE FROM course WHERE course_id='$id' ";
    $query_run =mysqli_query($connection, $query);
    if($query_run){
        echo 'data deleted';
        header("Location: course.php");
    }else{
        echo 'not deleted';
    }
}


?>