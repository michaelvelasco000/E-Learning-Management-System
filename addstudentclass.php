<?php
include_once("connection.php");
$conn = connection();
include('session.php');
$user_query = mysqli_query($conn, "select * from teacher where teacher_id='$session_id'") or die($conn->error);
$user_row = mysqli_fetch_array($user_query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>

    <?php include('sidebar.php'); ?>

    <section class="home-section">
        



          

            <div class="container">
                <div class="row-fluid">
                    <div class="span3">
                       

                    </div>
                    <div class="span9">
                        <div class="hero-unit-3">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong>
                                </div>
                                <thead>
                                    <tr>

                                        <th>Photo</th>
                                        <th>Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "select * from student") or die($conn->error);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $student_id = $row['student_id'];
                                    ?>




                                        <tr class="odd gradeX">
                                            <td width="50"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
                                            <td><?php echo $row['firstname'] . " " . $row['middle_name'] . " " . $row['lastname']; ?></td>



                                            <td width="50">
                                                <a href="#course_id<?php echo $student_id; ?>" role="button" data-toggle="modal" class="btn btn-info"><i class="icon-plus-sign-alt icon-large">Add</i></a>

                                            </td>
                                            <!-- user delete modal -->
                                            <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-info">Are you Sure you Want to <strong>Add</strong>&nbsp; this Student?</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST">
                                                        <input type="hidden" name="teacher_id" value="<?php echo $session_id; ?>">
                                                        <input type="hidden" name="student_id" value="<?php echo $student_id ?> ">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                                        <button name="save1" class="btn btn-info"><i class="icon-plus icon-large"></i>Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end delete modal -->

                                        </tr>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['save1'])) {
                                        $teacher_id = $_POST['teacher_id'];
                                        $student_id = $_POST['student_id'];

                                        $error_query = mysqli_query($conn, "select * from teacher_student where teacher_id='$teacher_id' and student_id='$student_id'") or die($conn->error);
                                        $error_row = mysqli_fetch_array($error_query);
                                        $count = mysqli_num_rows($error_query);

                                        if ($count > 0) {
                                    ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                Student Already Exist
                                            </div>
                                    <?php
                                        } else {

                                           $one =  mysqli_query($conn, "insert into teacher_student (teacher_id,student_id) values('$teacher_id','$student_id')") or die($conn->error);
                                            if($one){
                                                $one =  mysqli_query($conn, "insert into grade (student_id) values('$student_id')") or die($conn->error);
                                            }
                                            echo ('<script>location.href = "viewStudents.php"</script>');
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
           
            </div>
            </div>
            </div>






    






</section>

</body>

</html>