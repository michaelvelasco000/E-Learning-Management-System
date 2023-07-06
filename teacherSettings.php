<?php

include_once("connection.php");

include('session.php');

$conn = connection();
$user_query = mysqli_query($conn, "select * from teacher where teacher_id='$session_id'") or die($conn->error);
$user_row = mysqli_fetch_array($user_query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <title></title>


</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Teacher Class</h4>
                            <p class="category">New employees on 15th December, 2016</p>
                        </div>
                        <div class="card-content table-responsive">


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

                                                    <strong><i class="icon-user icon-large"></i>&nbsp;Update Teacher
                                                        Informartion</strong>
                                                </div>
                                                <a href="teachers.php" class="btn btn-success"><i
                                                        class="icon-arrow-left icon-large"></i>&nbsp;Back</a>


                                                <br>
                                                <br>
                                                <form class="form-horizontal" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="control-group">
                                                        <label class="control-label" for="inputEmail">Username</label>
                                                        <div class="controls">
                                                            <input type="text" id="inputEmail" name="username"
                                                                class="form-control"
                                                                value="<?php echo $row['username']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label"
                                                            for="inputPassword">Password</label>
                                                        <div class="controls">
                                                            <input type="text" name="password" id="inputPassword"
                                                                class="form-control"
                                                                value="<?php echo $row['password']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="inputEmail">Firstname</label>
                                                        <div class="controls">
                                                            <input type="text" id="inputEmail" name="firstname"
                                                                class="form-control"
                                                                value="<?php echo $row['firstname']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="inputEmail">Lastname</label>
                                                        <div class="controls">
                                                            <input type="text" id="inputEmail" name="lastname"
                                                                class="form-control"
                                                                value="<?php echo $row['lastname']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="inputEmail">Middlename</label>
                                                        <div class="controls">
                                                            <input type="text" id="inputEmail" name="middlename"
                                                                class="form-control"
                                                                value="<?php echo $row['middlename'] ?>" required>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <hr>
                                                <button type="submit" name="save" class="btn btn-info"><i
                                                        class="icon-save icon-large"></i>&nbsp;Save</button>
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


                                            mysqli_query($connection, "UPDATE teacher set username='$username',password='$password',firstname='$firstname',lastname='$lastname',middlename='$middlename' where teacher_id='$get_id'
                ") or die($connection->error);


                                            echo '<a href="teacherSettings.php">' . '?id=' . $teacher_id;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script src="assets/js/pages/datatables.init.js"></script>
    <?php include 'alert_message.php'; ?>


</body>

</html>