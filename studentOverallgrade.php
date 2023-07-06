<?php

include('session.php');
$connection = $con;

$user_query = mysqli_query($connection, "select * from student where student_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Student Home</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');

h1 {
    font-family: 'Noto Sans', sans-serif;
    text-align: center;
}
</style>

<body>
  

    <?php include('studentsidebar.php'); ?>
    <h1>·OVERALL GRADES·</h1>
    <br>
    <section class="container section__height">

        <div class="table-responsive">
            <table class="table  text-center" id="datatable">
                <thead style="background-color: #2f448c;">


                    <tr class="text-white">
                        <th>Class</th>
                        <th>Subject</th>


                        <th>1st Grading</th>
                        <th>2nd Grading</th>
                    </tr>







                </thead>
                <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">Are you Sure you Want to
                            <strong>Delete</strong>&nbsp; this Student?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove icon-large"></i>&nbsp;Close</button>
                        <a href="deletestudents.php<?php echo '?id=' . $student_id; ?>" class="btn btn-danger"><i
                                class="icon-trash icon-large"></i>&nbsp;Delete</a>
                    </div>
                </div>
                <tbody>
                    <?php
                    $query = mysqli_query($connection, "select * from student_class where student_id='$session_id'") or die($connection->error);
                    while ($row = mysqli_fetch_array($query)) {
                        $student_id = $row['id'];
                        $id = $row['class_id'];
                        $teacher_id = $row['teacher_id'];
                        $class_id = $row['class_id'];

                        $class = mysqli_query($connection, "select * from class where class_id = '$class_id'") or die(mysqli_error($connection));
                        $rowClass = mysqli_fetch_assoc($class);

                        $course = mysqli_query($connection, "select * from course where course_id = '" . $rowClass['course_id'] . "'");
                        $rowCourse = mysqli_fetch_assoc($course);

                        $subject = mysqli_query($connection, "select * from subject where subject_id = '" . $rowClass['subject_id'] . "'");
                        $rowSubject = mysqli_fetch_assoc($subject);

                        $teacher_query = mysqli_query($connection, "select * from teacher where teacher_id='$teacher_id'") or die($connection->error);
                        $teacher_row = mysqli_fetch_array($teacher_query);



                    ?>
                  
                    <tr>
                    <td class=""> <?php echo $rowCourse['cys']?></td>
                        <td class=""> <?php echo $rowSubject['subject_title']?></td>
                        <td><?php echo $row['first']; ?></td>
                        <td><?php echo $row['second']; ?></td>

                    </tr>
                    <?php
                     
                    } ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>