<?php

include('../connection.php');
require('session.php');
$connection = connection();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link rel="stylesheet" href="css/cards.css">
</head>

<body>



    <?php
    if (isset($_POST['save'])) {


        $cc = $_POST['cc'];
        $cd = $_POST['cd'];
        $adviser = $_POST['adviser'];
        $sy = $_POST['sy'];


        $query = mysqli_query($connection, "SELECT * from course where cys = '$cc'");
        if (mysqli_num_rows($query) > 0) {
            echo ('<script>alert("Data Existed");</script>');
        } else {
            mysqli_query($connection, "insert into course (cys,sy,department,adviser) values ('$cc','$sy','$cd','$adviser')") or die($connection->error);
            echo ('<script>location.href = "course.php"</script>');
        }
    }
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $course = mysqli_query($conn, "SELECT * FROM course where course_id = {$_GET['id']}");
                        foreach (mysqli_fetch_array($course) as $k => $v) {
                            $$k = $v;
                        }
                    }
                    ?>
                    <form class="form-horizontal" method="POST">

                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Class Name</label>
                            <div class="controls">
                                <input type="text" name="cc" id="inputPassword" class="form-control" value="<?php echo isset($cys) ? $cys : '' ?>" placeholder="Class Name" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">School Year</label>
                            <div class="controls">
                                <input type="text" name="sy" id="inputPassword" class="form-control" value="<?php echo isset($sy) ? $sy : '' ?>" placeholder="No. of Subjects" required>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Adviser:</label>
                            <div class="controls">

                                <select class="form-control" name="adviser" required>
                                    <option></option>
                                    <?php
                                    $query = mysqli_query($connection, "select * from teacher");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option><?php echo  $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] . " - " . $row['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Department:</label>
                            <div class="controls">
                                

                                <select class="form-control" name="cd" required>
                                    <option><?php echo isset($department) ? $department : '' ?></option>
                                    <?php
                                    $query = mysqli_query($connection, "select * from department");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option><?php echo  $row['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                      


                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Class</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!---ENDMODAL--->


    <!-- ##########################################################EDIT###################################################################################### -->

    <div class="modal fade" id="editcourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecodecourse.php" class="form-horizontal" method="POST">
                    <div class="modal-body">




                        <input type="hidden" name="course_id" id="course_id">
                        <div class="control-group">
                            <label class="control-label">Class Name</label>
                            <div class="controls">
                                <input type="text" name="cys" id="cys" class="form-control" value="<?php echo isset($cys) ? $cys : '' ?>" placeholder="Course Year And Section" required>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">School Year</label>
                            <div class="controls">
                                <input type="text" name="sy" class="form-control sy" value="<?php echo isset($sy) ? $sy : '' ?>" placeholder="School Year" required>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Department:</label>
                            <div class="controls">

                                <select class="form-control" name="department" id="department" required>
                                    <option></option>
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


                        <div class="control-group">
                            <label class="control-label">Adviser:</label>
                            <div class="controls">

                                <select class="form-control adviser" name="adviser" id="adviser">
                                    <option></option>
                                    <?php
                                    $query = mysqli_query($connection, "select * from teacher");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option><?php echo $row['lastname'] . " asdsad" . $row['firstname'] . " " . $row['middlename'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updatedata" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                            </div>
                        </div>

                </form>
            </div>

        </div>
    </div>
    </div>

    <!-- ##########################################################EDIT###################################################################################### -->

    <?php include('sidebar.php'); ?>
    <main id="content">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span2">

                </div>
                <div class="span10">
                    <div class="hero-unit-3">

                        <table class="table table-striped table-bordered text-center table-responsive-md" id="datatable">
                            <br>
                            <div class="" id="card">
                                <h1 class="">CLASS MANAGEMENT</h1>
                                <hr>
                            </div>

                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Course</button>
                            </div>
                            <thead>
                                <tr>

                                    <th>Class Name</th>
                                    <th>Department</th>
                                    <th>Adviser</th>
                                    <th>S.Y</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from course") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $course_id = $row['course_id'];
                                ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $row['cys']; ?></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['adviser']; ?></td>
                                        <td><?php echo $row['sy']; ?></td>
                                        <td width="">
                                            <button title="Edit" type="button" class="btn btn-success editcourse"><i class='bx bxs-edit'></i></button>
                                            <button title="Delete" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $course_id ?>"><i class='bx bxs-trash'></i>
                                            </button>
                                        </td>



                                        <!-- user delete modal -->
                                        <div id="course_id<?php echo $course_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">Are you Sure you Want to
                                                    <strong>Delete</strong>&nbsp; this Class?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;</button>
                                                <a href="deleteteacher.php<?php echo '?id=' . $course_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                            </div>
                                        </div>
                                        <!-- end delete modal -->

                                    </tr>
                                <?php

                                    include('deleteCoursemodal.php');
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    </main>

    <script>
        $(document).ready(function() {
            $('.editcourse').on('click', function() {
                $('#editcourse').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#course_id').val(data[0]);
                $('#cys').val(data[0]);

                $('#department').val(data[1]);
                $('.adviser').val(data[2]);
                $('.sy').val(data[3]);



            })
        });
    </script>

</body>

</html>