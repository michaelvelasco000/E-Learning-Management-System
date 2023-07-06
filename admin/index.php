<?php
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/indexadmin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <style>
        body {
            background-image: url("images/dagatanCover.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

        }
    </style>
</head>

<body>
    <?php include('loader.php'); ?>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto mt-5">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                            <img src="images/2.png" class="logo" style="height: 10%; width:10%; padding-left:100px;">
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="images/dagatanCover.jpg" class="image" style="height: 80%; width:80%;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">

                            <h1 class="mb-0 mr-4 mt-2 text-center">ADMINISTRATOR ACCESS</h1>



                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <small class="bx bxs-lock"></small>
                            <div class="line"></div>
                        </div>
                        <form action="" method="post">
                            <div class="row px-3">

                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Admin Username</h6>
                                </label>
                                <input type="text" name="username" id="inputEmail" placeholder="Username" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Admin Password</h6>
                                </label>
                                <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                                
                            </div>

                       
                            <br>
                                <button type="submit" name="login" class="btn btn-primary text-center">Login</button>
                                <a href="forgotPassword.php">Forgot Password?</a>
                       
                        </form>
                        <?php
                        include('../connection.php');
                        $connection = connection();

                        if (isset($_POST['login'])) {


                            $username = mysqli_real_escape_string($connection, $_POST['username']);
                            $password = mysqli_real_escape_string($connection, $_POST['password']);

                            $query = mysqli_query($connection, "select * from superadmin where username='$username' and password='$password'") or die($connection->error);
                            $count = mysqli_num_rows($query);
                            $row = mysqli_fetch_array($query);


                            if ($count > 0) {

                                $_SESSION['id'] = $row['user_id'];
                                echo ('<script>location.href = "admin.php"</script>');

                                echo 'true';

                                mysqli_query($connection, "insert into user_log (username,login_date,user_id)values('$username',NOW()," . $row['user_id'] . ")") or die("actLog error");

                                session_write_close();
                                exit();
                            } else {
                                session_write_close();
                        ?>


                                <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>

                        <?php

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2 bx bxs-lock"> This page is for admin access. </small>
                    <div class="social-contact ml-4 ml-sm-auto">
                        <span class="fa fa-facebook mr-4 text-sm"></span>
                        <span class="fa fa-google-plus mr-4 text-sm"></span>
                        <span class="fa fa-linkedin mr-4 text-sm"></span>
                        <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>

</html>