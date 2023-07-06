<?php
include_once("connection.php");
include('session.php');
$connection = connection();
$user_query = mysqli_query($connection, "select * from teacher where teacher_id='$session_id'") or die($connection->error);
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Subject</label>
                            <div class="controls">

                                <select name="subject" class="span6">
                                    <option></option>
                                    <?php
                                    $query = mysqli_query($connection, "select * from subject") or die($connection->error);
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="save_subject" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Subject</button>
                            </div>
                            <br>
                            <?php
                            if (isset($_POST['save_subject'])) {
                                $subject = $_POST['subject'];

                                $result = mysqli_query($connection, "select * from teacher_subject where teacher_id='$session_id' and subject_id='$subject'") or die($connection->error);
                                $count = mysqli_num_rows($result);

                                if ($count > 0) {
                            ?>
                                    <div class="alert alert-danger">Subject <strong>Already Exist</strong></div>
                            <?php
                                } else {


                                    mysqli_query($connection, "insert into teacher_subject (subject_id,teacher_id) values('$subject','$session_id')") or die($connection->error);
                                    echo ('<script>location.href="subjects.php"</script>');
                                }
                            }
                            ?>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!---ENDMODAL--->
    <?php include('sidebar.php'); ?>

    <section class="home-section">

        <div class="hero-unit-3">

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Subject Table</strong>
                </div>
                <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Course</button>
                <thead>
                    <tr>

                        <th>Course Code</th>
                        <th>Course Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $teacher_subject_query = mysqli_query($connection, "select * from teacher_subject where teacher_id='$session_id'") or die($connection->error);
                    $teacher_row = mysqli_fetch_array($teacher_subject_query);
                    $subject_id = $teacher_row['subject_id'] ?? null;

                    $query = mysqli_query($connection, "select * from subject where subject_id in (select subject_id from teacher_subject where teacher_id='$session_id')") or die($connection->error);
                
                    while ($row = mysqli_fetch_assoc($query)) {
                        
                        $id = $row['subject_id'];
                    ?>
                        <!-- script -->
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $('#d<?php echo $subject_id; ?>').tooltip('show')
                                $('#d<?php echo $subject_id; ?>').tooltip('hide')
                            });
                        </script>
                        <!-- end script -->
                        <!-- script -->
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $('#e<?php echo $subject_id; ?>').tooltip('show')
                                $('#e<?php echo $subject_id; ?>').tooltip('hide')
                            });
                        </script>
                        <!-- end script -->

                        <tr class="odd gradeX">

                            <td><?php echo $row['subject_code']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>

                            <td width="50">
                                <a rel="tooltip" title="Delete Subject" id="d<?php echo $subject_id; ?>" href="#id<?php echo $id; ?>" role="button" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;</a>

                            </td>
                            <!-- user delete modal -->
                            <div id="id<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Subject?</div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="delete_teacher_course.php<?php echo '?id=' . $course_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>
                            <!-- end delete modal -->

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end slider -->
        </div>

    </section>

</body>

</html>