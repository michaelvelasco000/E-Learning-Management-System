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
    <title>Students Information</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link href="../src/css/a.css" rel="stylesheet" type="text/css">
    <link href="CSS/cards.css" rel="stylesheet" type="text/css">

</head>



<body>

    <?php include('sidebar.php'); ?>
    <?php include('mailStudents.php'); ?>





    <!--importmodal-->


    

    <!---END IMPORT-->


    <!-- Modal -->
    <?php
    if (isset($_GET['id'])) {
        $course = mysqli_query($conn, "SELECT * FROM course where course_id = {$_GET['id']}");
        foreach (mysqli_fetch_array($course) as $k => $v) {
            $$k = $v;
        }
    }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">

                        <div class="row">
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LRN</label>
                                    <div class="controls">
                                        <input type="number" name="lrn" id="lrn" placeholder="LRN" class="form-control" <?php echo (isset($lrn)) ? "" : 'required' ?>>

                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">User-ID</label>
                                    <div class="controls">
                                        <input type="number" name="uid" id="uid" placeholder="User ID" class="form-control" <?php echo (isset($uid)) ? "" : 'required' ?>>

                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">E-mail</label>
                                    <div class="controls">
                                        <input type="text" name="em" id="inputEmail" placeholder="E-mail" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" name="p" id="inputPassword" placeholder="Password" class="form-control" <?php echo (isset($password)) ? "" : 'required' ?>>
                                        <?php echo (isset($password)) ? "<i>Leave this blank if you dont want to change your password.</i>" : '' ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">First Name</label>
                                    <div class="controls">
                                        <input type="text" name="fn" id="inputEmail" placeholder="First Name" class="form-control" required value="<?php echo isset($firstname) ? $firstname : "" ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="ln" id="inputEmail" placeholder="Last Name" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middle Initial</label>
                                    <div class="controls">
                                        <input type="text" name="mn" id="inputEmail" placeholder="Middle Initial" class="form-control" value="<?php echo isset($middle_name) ? $middle_name : "" ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">School Year</label>
                                    <div class="controls">
                                        <input type="text" name="sy" id="inputEmail" placeholder="School Year" class="form-control" value="<?php echo isset($sy) ? $sy : "" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Track | Year and Section</label>
                                    <label class="control-label" for="inputPassword"></label>
                                    <div class="controls">

                                        <select name="st" class="form-control span4" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query($connection, "select * from course");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option><?php echo $row['cys']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12">
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <div class="upload-container">
                                        <div id="display-image" style="position: absolute; top:120px; left:0%; color:#468d94; width:100%;"></div>
                                            <input type="file" name="image"  onchange="getImage(this.value);" class="font" <?php echo (isset($location)) ? "" : 'required' ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="<?php echo isset($location) && is_file($location) ? $location : '' ?>" alt="">
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>

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
        <div class="container-fluid">

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <?php echo $alert ?>

                    <div class="" id="card">
                        <h1 class="">STUDENTS' MANAGEMENT</h1>
                        <hr>
                    </div>

                </div>
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<h4>" . $_SESSION['message'] . "</h4>";
                        unset($_SESSION['message']);
                    }
                    ?>

                    <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Student</button>

                    <a href="student_print.php" class="btn btn-primary mb-1 bx bxs-printer"></a>
                </div>
                <div class="col-md-9">

                </div>

                <div class="col-md-12 mt-3">


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <th>LRN</th>
                                <th>User ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email </th>

                                <th>School Year</th>
                                <th>Strand Year & Section</th>
                                <th>Action</th>

                            </thead>
                            <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">Are you Sure you Want to
                                        <strong>Delete</strong>&nbsp; this Student?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="deletestudents.php<?php echo '?id=' . $student_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from student where delete_status = 0") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $student_id = $row['student_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $row['lrn']; ?></td>
                                        <td><?php echo $row['user_idlogin']; ?></td>
                                        <td><img class="rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
                                        <td class="text-capitalize"><?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middle_name']; ?>
                                        </td>
                                        <td><?php echo $row['email']; ?></td>

                                        <td><?php echo $row['sy']; ?></td>
                                        <td class="text-capitalize"><?php echo $row['strand']; ?></td>
                                        <td class="">
                                            <a rel="tooltip" title="Edit" id="e<?php echo $student_id; ?>" href="delup_students.php?id=<?php echo $row['student_id'] ?>" class="btn btn-success"><i class='bx bxs-edit'></i> </a>

                                            <a class="btn btn-danger text-white" title="Delete" data-toggle="modal" data-target="#delete<?php echo $student_id ?>"><i class='bx bxs-archive'></i>
                                            </a>
                                        </td>

                                    </tr>
                                <?php
                                    include('deletestudentmodal.php');
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </main>



    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>


<script>
        function getImage(imagename) {
            $('#display-image').html(imagename);
        }
    </script>
</body>

</html>