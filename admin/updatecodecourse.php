<?php
require_once('../connection.php');
require('../session.php');



    if(isset($_POST['updatedata']))
    {   


        $course_id = $_POST['course_id'];
        $cc = $_POST['cys'];
        $sy = $_POST['sy'];
        $cd = $_POST['department'];
        $adviser =$_POST['adviser'];

        $query1 = mysqli_query($connection, "SELECT * from course where cys = '$cc'");

      if($query1){
            mysqli_query($connection, "UPDATE course SET cys = '$cc',sy='$sy',department ='$cd' ,adviser = '$adviser' WHERE cys = '$course_id' ");
            echo ('<script>location.href = "course.php"</script>');
        }

       

       

      
    }
?>      