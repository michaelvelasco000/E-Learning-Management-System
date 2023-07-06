<?php
include_once("teachersession.php");
include_once("connection.php");

if (isset($_POST['btn_delete'])) {
    # code...
    $id = $_POST['id'];
    $class_id = $_POST['class_id'];
        
        $Query = mysqli_query($connection, "delete from module_class where id='$id' ") or die(mysqli_error($connection));
             if($Query)
                    {
    //echo "Saved";
    $_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: class_module.php?id=$class_id");
                 }else
                {
    $_SESSION['status'] = "Error! Cannot Deleted";
    $_SESSION['status_code'] = "error";
    header("Location: class_module.php?id=$class_id");
                    }
}

?>