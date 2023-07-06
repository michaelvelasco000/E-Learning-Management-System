<?php /*
include_once("session.php");
include_once("connection.php");


if (isset($_POST['btn_delete'])) {
    # code...
    $id = $_POST['id'];
 $Query = mysqli_query($connection, "delete from class where class_id='$id'  ") or die(mysqli_error($connection));

    $_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
    header("Location:teacherclass.php");

}

*/
?>
<?php
include_once("teachersession.php");
include_once("connection.php");

if (isset($_POST['submit'])) {
    # code...
    $id = $_POST['id'];

    $query = "UPDATE class set delete_status = 0 where class_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $qquery = "UPDATE  student_class set delete_status = 0 where class_id='$id' ";
        $query_runn = mysqli_query($connection, $qquery);
        if ($query_runn) {
            $_SESSION['status'] = "Restore Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: classarchive.php");
        } else {
            echo 'not deleted';
        }
    }
}
