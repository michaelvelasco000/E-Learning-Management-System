<?php
require('../connection.php');
$connection = connection();

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $query="DELETE FROM student WHERE student_id='$id' ";
    $query_run =mysqli_query($connection, $query);
    if($query_run){
        echo 'data deleted';
        header("Location: students.php");
    }else{
        echo 'not deleted';
    }
}


?>