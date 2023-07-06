<?php 
session_start();
include('../connection.php');
$connection = connection();
$get_id = $_GET['id'];


if (isset($_POST['save'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $department = $_POST['department'];
    $location = isset($row['location']) ? $row['location'] : '';
    if (!empty($_FILES["image"]["tmp_name"])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $_FILES["image"]["name"]);
        $location = "../uploads/" . $_FILES["image"]["name"];
    }

    mysqli_query($connection, "UPDATE teacher set username='$username',password='$password',firstname='$firstname',lastname='$lastname',middlename='$middlename', department='$department',location='$location' where teacher_id='$get_id' ") or die($connection->error);

    echo ('<script>location.href = "teachers.php"</script>');
}
