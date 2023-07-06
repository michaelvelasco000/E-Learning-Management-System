<?php
session_start();
include('../connection.php');
$connection = connection();
$get_id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM superadmin where user_id = '$get_id'");
$row_query = mysqli_fetch_assoc($query);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <title>Edit Admin Information</title>
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
        $adminq = mysqli_query($connection, "select * from superadmin where user_id='$get_id'") or die($connection->error);
        $row = mysqli_fetch_array($adminq);
        // var_dump($row['middlename']);
        ?>
        <div class="container">

            <div class="row-fluid">

                <div class="span12">
                    <div class="hero-unit-3">
                        <div class="col-md-12 pt-1">
                            <div class="alert alert-info ">

                                <strong><i class="icon-user icon-large"></i>&nbsp;Edit Admin Information</strong>
                            </div>
                            <a href="useradmin.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>


                            <br>
                            <br>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="row">
                                   


                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Email</label>
                                            <div class="controls">
                                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username</label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
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
                                $email = $_POST['email'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
     
                                $query1 = mysqli_query($connection, "SELECT * from superadmin where email = '$email'");
                                if (mysqli_num_rows($query1) > 0) {
                                    echo ('<script>alert("Data Existed");</script>');
                                } else {
                                    mysqli_query($connection, "update superadmin set email = '$email', username='$username',password='$password',firstname='$firstname',lastname='$lastname' where user_id = '$get_id'") or die($connection->error);
                                    echo ('<script>location.href = "useradmin.php"</script>');
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