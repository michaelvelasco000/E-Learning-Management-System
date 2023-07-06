<?php
include('connection.php');
include('session.php');
$conn = connection();

$user_query = mysqli_query($conn, "select * from teacher where teacher_id='$session_id'") or die($conn->error);
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($conn, "select * from class where teacher_id='$session_id'") or die($conn->error);
$course_row = mysqli_fetch_array($course_query);
$subect_id = $course_row['subject_id'];
$query_class = mysqli_query($conn, "select * from class where teacher_id='$session_id'") or die($conn->error);
$row_class = mysqli_fetch_array($query_class);
$id_class = $row_class['class_id'];
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
            <a href="" class="btn btn-success"><i class="icon-group icon-large"></i>&nbsp;<?php echo $course_row['course_id']; ?></a>
            <br><br>
            <div class="alert alert-success">
                <strong>Subject:&nbsp;<?php echo $course_row['subject_id']; ?></strong>
            </div>


            <div class="hero-unit-3">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Add Students</strong>
                </div>

                <div class="row-fluid">
                    <div class="span9">
                        <form class="form-horizontal" method="POST">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Student</label>
                                <div class="controls">

                                    <select name="student" class="span6" required>
                                        <option></option>
                                        <?php
                                        $query = mysqli_query($conn, "select * from teacher_student where teacher_id = '$session_id'") or die($conn->error);
                                        while ($row = mysqli_fetch_array($query)) {
                                            $student_id = $row['student_id'];
                                            $student_query = mysqli_query($conn, "select * from student where student_id='$student_id'") or die($conn->error);
                                            $student_row = mysqli_fetch_array($student_query);
                                        ?>


                                         
                                            <option value="<?php echo $student_id; ?>"><?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?></option>
                                        <?php } ?>

                                        <input type="hidden" name="teacher_id" value="<?php echo $session_id; ?>">

                                        <input type="hidden" name="cys" value="<?php echo $course_row['course_id']; ?>">
                                        <input type="hidden" name="subject" value="<?php echo $course_row['subject_id']; ?>">

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="save_subject" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Students</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['save_subject'])) {
                            $subject = $_POST['subject'];
                            $cys = $_POST['cys'];
                            $student = $_POST['student'];

                            $teacher_id = $_POST['teacher_id'];

                            mysqli_query($conn, "insert into sws (teacher_id,student_id,cys,subject_id,class_id) values('$teacher_id','$student','$cys','$subject','$get_id')") or die(mysqli_error());
                        ?>
                            <script type="text/javascript">
                                window.location = "class.php<?php echo '?id=' . $id_class; ?>";
                            </script>
                        <?php
                        }
                        ?>


                    </div>

                </div>


                <!-- end slider -->
            </div>
        </div>


    </section>
</body>

</html>