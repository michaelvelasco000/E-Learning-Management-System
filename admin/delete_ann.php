<?php
require('session.php'); 

if(isset($_POST['btn_delete'])){
    $id = $_POST['id'];

    $query="DELETE FROM announcement WHERE id ='$id' ";
    $query_run =mysqli_query($connection, $query);
    if($query_run){
        echo 'data deleted';
        header("Location: announcement.php");
    }else{
        echo 'not deleted';
    }
}


?>