<?php

include_once("connection.php");
$connection = connection();
include('session.php');
$query = mysqli_query($connection, "select * from student_class where student_id='$session_id'") or die($connection->error);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive Classes</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <link rel="stylesheet" href="css/classtyle.css">
</head>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');
    .card {
        padding: 15px;
        max-width: auto;
        background: #222;
        border-radius: 5px;
        font-family: 'Noto Sans', sans-serif;
        font-size: 17px;
        border-width: 3px !important;
        border-color: #0019bd !important;
        text-align: center;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
        user-select: none;
    }

    .cover-photo {
        position: relative;
        background: url(https://i.imgur.com/jxyuizJ.jpeg);
        background-size: cover;
        height: 180px;
        border-radius: 5px 5px 0 0;
    }
        
    .profile {
        position: absolute;
        width: 150px;
        height: 150px;
        bottom: -60px;
        left: 15px;
        border-radius: 50%;

        background-color: rgba(0, 25, 189, 1);
        padding: 5px;
    }

    .profile-name {
        font-size: 20%;
        margin: 25px 0 0 120px;
        color: #007bff;
    }

    .about {
        margin-top: 30px;
        line-height: 1.6;
    }

    .btn {
        background-color:#0019bd !important;
        border: 1px solid #4f66ff !important;
        color: white !important;
        margin-bottom: 2px;
    }



    .btn:hover {
        background: #3b54ff !important;
        color: #222;
    }

    .icons {
        width: 180px;
        margin: 0 auto 10px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .icons i {
        cursor: pointer;
        padding: 5px;
        font-size: 18px;
        transition: 0.2s;
    }

    .icons i:hover {
        color: #7ce3ff;
    }

    .txt{
        font-family: 'Noto Sans', sans-serif;
    }

    .h1{
        font-family: 'Noto Sans', sans-serif;
    }
</style>

<body>
    <?php include('studentsidebar.php'); ?>



    <section class="container section__height">

        <div class="container">
            <?php
            $query = mysqli_query($connection, "select * from student_class where student_id='$session_id'") or die($connection->error);
            if ($classt = mysqli_num_rows($query)) {
                echo ' <h4 class="text-center">  </h4>';
            } else {
                echo '  <div class="alert alert-info text-center"><i class="icon-info-sign"></i> You are currently not enroll to your class</div>';
            }
            ?>
            <div class="row">


                <?php
                if ($count != '0') {
                    $query = mysqli_query($connection, "SELECT * from student_class where student_id='$session_id' AND delete_status = 1") or die($connection->error);

                    while ($row = mysqli_fetch_array($query)) {
                        $i = $row['id'];
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

                        <div class="col-md-4">



                            <div class="card mb-3 " style="background-color: rgba(255, 255, 255, 1);">
                                <b><p class="text-white"> <?php echo $rowCourse['cys']; ?></p></b>
                                <div class="cover-photo">
                                    <img src="uploads/<?php echo $teacher_row['location']; ?>" class="profile">
                                </div>
                                <br>
                                <p class="about" id="titles"><b class="text-capitalize text-black"><br><?php echo $rowSubject['subject_title']; ?> <br> <?php echo $teacher_row['firstname'] . ' ' . $teacher_row['middlename'] . ' ' . $teacher_row['lastname']; ?></b></p><br>
                                <a href="student_quiz_list.php?id=<?php echo $id ?>" class="btn txt"><i class="fa fa-eye"></i> Quiz</a>
                                <a href="student_class_module.php?id=<?php echo $class_id ?>" class="btn txt"><i class="fa fa-eye"></i> Learning Materials</a>

                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not enroll to your class</div>
                <?php } ?>



            </div>

        </div>

        </div>
    </section>

    <?php include('scripts.php'); ?>
</body>

</html>