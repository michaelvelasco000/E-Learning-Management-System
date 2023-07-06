<?php
session_start();
include('../connection.php');
$connection = connection();
$get_id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM teacher where teacher_id = '$get_id'");
$row_query = mysqli_fetch_assoc($query);
$a = $row_query['day'];
$b = explode(",", $a);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <title>Edit Teacher</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link rel="stylesheet" href="../src/css/a.css">
</head>
<style>
    .categorychecklist li {
        display: inline-block;

    }
</style>

<body>

    <?php include('sidebar.php'); ?>





    <main id="content">

        <?php
        $teacher_query = mysqli_query($connection, "select * from teacher where teacher_id='$get_id'") or die($connection->error);
        $row = mysqli_fetch_array($teacher_query);
        // var_dump($row['middlename']);
        ?>
        <div class="container">

            <div class="row-fluid">

                <div class="span12">
                    <div class="hero-unit-3">
                        <div class="col-md-12 pt-1">
                            <div class="alert alert-info ">

                                <strong><i class="icon-user icon-large"></i>&nbsp;Update Teacher Informartion</strong>
                            </div>
                            <a href="teachers.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>


                            <br>
                            <br>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">User ID</label>
                                            <div class="controls">
                                                <input type="number" id="inputEmail" name="empid" class="form-control" value="<?php echo $row['user_idlogin']; ?>" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">E-mail</label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="username" class="form-control" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password</label>
                                            <div class="controls">
                                                <input type="text" name="password" id="inputPassword" class="form-control" value="<?php echo $row['password']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Firstname</label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Lastname</label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Middle Initial</label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="middlename" class="form-control" value="<?php echo $row['middlename'] ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Department:</label>
                                            <div class="controls">

                                                <select name="department" class="form-control" required>
                                                    <option><?php echo $row['department']; ?></option>
                                                    <?php
                                                    $query = mysqli_query($connection, "select * from department");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option><?php echo $row['department']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="control-group">
                                            <label class="control-label" for="input01">Image:</label>
                                            <div class="controls">
                                            
                                            <div class="upload-container">
                                            <input type="file" name="location" class="font">
                                            </div>    

                                            </div>
                                            <img class="rounded" src="../uploads/<?php echo $row_query['location']; ?>" height="50" width="50">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="control-label" for="">Class Day <span class="text-danger font-weight-bold">*REQUIRED*</span></label>
                                            <div class="controls ">
                                                <input type="checkbox" name="day[]" value="Monday" <?php
                                                                                                    if (in_array("Monday", $b)) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>> Monday <br>

                                                <input type="checkbox" name="day[]" value="Tuesday" <?php
                                                                                                    if (in_array("Tuesday", $b)) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>> Tuesday <br>

                                                <input type="checkbox" name="day[]" value="Wednesday" <?php
                                                                                                        if (in_array("Wednesday", $b)) {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>> Wednesday
                                                <br>
                                                <input type="checkbox" name="day[]" value="Thursday" <?php
                                                                                                        if (in_array("Thursday", $b)) {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>> Thursday
                                                <br>
                                                <input type="checkbox" name="day[]" value="Friday" <?php
                                                                                                    if (in_array("Friday", $b)) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>> Friday <br>
                                                <input type="checkbox" name="day[]" value="Saturday" <?php
                                                                                                        if (in_array("Saturday", $b)) {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>> Saturday
                                                <br>
                                                <input type="checkbox" name="day[]" value="Sunday" <?php
                                                                                                    if (in_array("Sunday", $b)) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>> Sunday <br>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <hr>
                                            <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                        </div>
                                    </div>

                            </form>

                            <?php
                            if (isset($_POST['save'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $middlename = $_POST['middlename'];
                                $department = $_POST['department'];
                                $location = isset($row['location']) ? $row['location'] : '';
                                $day = $_POST['day'];
                                $empid = $_POST['empid'];

                                $day1 = implode(",", $day);


                                if (!empty($_FILES["location"]["tmp_name"])) {
                                    $image = addslashes(file_get_contents($_FILES['location']['tmp_name']));
                                    $image_name = addslashes($_FILES['location']['name']);
                                    $image_size = getimagesize($_FILES['location']['tmp_name']);
                                    move_uploaded_file($_FILES["location"]["tmp_name"], "../uploads/" . $_FILES["location"]["name"]);
                                    $location = "../uploads/" . $_FILES["location"]["name"];

                                    mysqli_query($connection, "update teacher set email='$username',password='$password',firstname='$firstname',lastname='$lastname',middlename='$middlename',
                                        department='$department',location='$location', day='$day1',user_idlogin='$empid' where teacher_id='$get_id'
                                        ") or die($connection->error);

                                    echo ('<script>location.href = "teachers.php"</script>');
                                } else {
                                    mysqli_query($connection, "update teacher set email='$username',password='$password',firstname='$firstname',lastname='$lastname',middlename='$middlename',
                                        department='$department', day='$day1',user_idlogin='$empid' where teacher_id='$get_id'
                                        ") or die($connection->error);
                                    echo ('<script>location.href = "teachers.php"</script>');
                                }
                            }


                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script src="fileupload.js"></script>
</body>

</html>