<?php
include 'session.php';

if (isset($_POST['btn_add'])) {
  $course_id = $_POST['course_id'];
  $teacher_id = $_POST['teacher_id'];
  $subject_id = $_POST['subject_id'];


  $query = mysqli_query($connection, "SELECT * from class where course_id = '$course_id'") or die($connection->error);
  while ($row = mysqli_fetch_array($query)) {
    $class_id = $row['class_id'];

    $course = mysqli_query($connection, "select * from course where course_id = '" . $row['course_id'] . "'");
    $rowCourse = mysqli_fetch_assoc($course);

    $subject = mysqli_query($connection, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
    $rowSubject = mysqli_fetch_assoc($subject);
    
    $subject = mysqli_query($connection, "select * from teacher where teacher_id = '" . $row['teacher_id'] . "'");
    $rowSubject = mysqli_fetch_assoc($subject);
  }

  if ($query) {
    mysqli_query($connection, "insert into class (course_id,subject_id,teacher_id) values ('$course_id','$subject_id','$teacher_id')") or die(mysqli_error($connection));
    $_SESSION['status'] = "Added Successfully!";
    $_SESSION['status_code'] = "success";
    header("Location: teacherclasses.php");
  } else {

    $_SESSION['status'] = "Error Adding";
    $_SESSION['status_code'] = "error";
    header("Location: teacherclasses.php");
  }
}
