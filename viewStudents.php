<?php
include('connection.php');
include('session.php');
$conn = connection();

$user_query = mysqli_query($conn, "select * from teacher where teacher_id='$session_id'") or die($conn->error);
$user_row = mysqli_fetch_array($user_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('sidebar.php'); ?>

    <section class="home-section">
        <div class="span9">



            <a href="addstudentclass.php" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Student</a>
            <br>
            <br>

            <div class="hero-unit-3">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong>
                    </div>
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $query = mysqli_query($conn, "select * from teacher_student where teacher_id = '$session_id'") or die($conn->error);
                            while ($row = mysqli_fetch_array($query)) {
                                $student_id = $row['student_id'];
                                $student_query = mysqli_query($conn, "select * from student where student_id = '$student_id'") or die($conn->error);
                                $student_row = mysqli_fetch_array($student_query);

                            ?>


                                <!-- script -->
                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        $('#e<?php echo $student_id; ?>').tooltip('show')
                                        $('#e<?php echo $student_id; ?>').tooltip('hide')
                                    });
                                </script>
                                <!-- script -->
                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        $('#d<?php echo $student_id; ?>').tooltip('show')
                                        $('#d<?php echo $student_id; ?>').tooltip('hide')
                                    });
                                </script>

                                <td><?php echo $student_row['firstname']; ?></td>
                                <td width="50"><img class="img img-rounded" src="<?php echo $student_row['location']; ?>" width="50" height="50"></td>
                                <td width="100">
                                    <a rel="tooltip" title="View More Info" id="e<?php echo $student_id; ?>" href="#view<?php echo $student_id; ?>" role="button" data-toggle="modal" class="btn btn-info"><i class="icon-align-justify icon-large"></i>VIEW</a>
                                    <a rel="tooltip" title="Delete Student" id="d<?php echo $student_id; ?>" href="#teacher<?php echo $student_id; ?>" role="button" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>DELETE</a>

                                </td>



                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!-- end slider -->
            </div>
        </div>

    </section>
</body>

</html>