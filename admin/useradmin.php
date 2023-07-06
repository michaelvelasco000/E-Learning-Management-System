<?php

include('../connection.php');

require('session.php');
$connection = connection();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <title>Admin Information</title>
    <link href="../src/css/a.css" rel="stylesheet" type="text/css">
    <link href="css/cards.css" rel="stylesheet" type="text/css">
</head>
<style>
.categorychecklist li {
    display: inline-block;

}

#cont {
    background-color: white;
    width: 99%;
}
</style>

<body>

    <?php include('sidebar.php'); ?>


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
            mysqli_query($connection, "INSERT into superadmin (email,username,password,firstname,lastname)
            values ('$email','$username','$password','$firstname','$lastname') ") or die($connection->error);
            echo ('<script>location.href = "useradmin.php"</script>');
        }



      
    }

    ?>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-md" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="controls">
                                        <input type="Email" id="email" name="email" class="form-control"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="form-label" for="inputEmail">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="username" class="form-control"
                                            placeholder="Username" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="control-group">
                                    <label class="form-label" for="inputEmail">Password</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">First Name</label>
                                    <div class="controls">
                                        <input type="text" name="firstname" id="inputPassword" class="form-control"
                                            placeholder="Firstname" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" class="form-control"
                                            placeholder="Lastname" required>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <br>
                        <div class="control-group ">
                            <div class="controls">
                                <hr>
                                <button type="submit" name="save" class="btn btn-info"><i
                                        class="icon-save icon-large"></i>&nbsp;Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <br>
                            </div>
                        </div>
                </div>





                </form>
            </div>

        </div>
    </div>
    </div>
    <!---ENDMODAL--->
    <script src="../fileupload.js"></script>

    <main id="content">

        <div class="container-fluid" id="cont">

            <div class="row p-0">
                <div class="col-md-12 pt-1">

                    <div class="" id="card">
                        <h1 class="">ADMIN MANAGEMENT</h1>
                        <hr>
                    </div>

                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal"
                        data-target=".bd-example-modal-md"> Add Admin</button>

                </div>
                <div class="col">

                </div>
                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <th>Email</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Action</th>


                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from superadmin ") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $user_id = $row['user_id'];
                                ?>
                                <script type="text/javascript">
                                $(document).ready(function() {

                                    $('#e<?php echo $user_id; ?>').tooltip('show')
                                    $('#e<?php echo $user_id; ?>').tooltip('hide')
                                });
                                </script>
                                <!-- end script -->
                                <!-- script -->
                                <script type="text/javascript">
                                $(document).ready(function() {

                                    $('#d<?php echo $user_id; ?>').tooltip('show')
                                    $('#d<?php echo $user_id; ?>').tooltip('hide')
                                });
                                </script>



                                <tr>

                                    <td><?php echo $row['email'];?> </td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?> </td>

                                    <td>
                                        <a rel="tooltip" title="Edit Admin" id="e<?php echo $user_id; ?>"
                                            href="editAdmin.php<?php echo '?id=' . $user_id; ?>"
                                            class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;</a>


                                    </td>

                                </tr>



                                <?php
                                
                                } ?>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

</html>