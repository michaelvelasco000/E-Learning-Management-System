<?php

include_once("connection.php");
$connection = connection();
include('session.php');
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

    <?php include('sidebar.php'); ?>

    <section class="home-section">

        <div class="span9">





            <a href="teacherclass.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
            <br>
            <br>

            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Add Class</strong>
            </div>
            <div class="hero-unit-2">
                <form class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Class</label>
                        <div class="controls">

                            <select name="cys" class="span5" required>
                                <option></option>
                                <?php
                                $query = mysqli_query($connection, "select * from course") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option><?php echo $row['cys']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Subject</label>
                        <div class="controls">

                            <select name="subject" class="span6" required>
                                <option></option>
                                <?php
                                $teacher_subject_query = mysqli_query($connection, "select * from teacher_subject") or die($connection->error);
                                $teacher_row = mysqli_fetch_array($teacher_subject_query);
                                $subject_id = $teacher_row['subject_id'];

                                $query = mysqli_query($connection, "select * from subject where subject_id in (select subject_id from teacher_subject)") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option><?php echo $row['subject_title']; ?></option>
                                <?php } ?>
                                <input type="hidden" name="teacher_id" value="<?php echo $session_id; ?>">
                            </select>
                        </div>
                    </div>




                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="save_class" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Class</button>
                        </div>
                        <?php
                        if (isset($_POST['save_class'])) {

                            $subject = $_POST['subject'];
                            $cys = $_POST['cys'];
                            $teacher_id = $_POST['teacher_id'];

                            mysqli_query($connection, "insert into class (subject_id,course_id,teacher_id) values('$subject','$cys','$teacher_id')") or die($connection->error);
                            echo ('<script>location.href = "teacherclass.php"</script>');
                        }
                        ?>
                    </div>
                </form>
            </div>




            <!-- end slider -->
        </div>


    </section>

</body>

</html>