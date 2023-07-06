<?php
require('teachersession.php');

$get_id = $_GET['id'];
$connection = $con;

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
<link rel="stylesheet" href="admin/dist/css/fullcalendar.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<title>Teacher List</title>
<!DOCTYPE html>
<html>
<style type="text/css" media="print">
@media print {

    .noprint,
    .noprint * {
        display: none !important;
    }
}

body {
    font-style: Sans-serif;
}
</style>
<style type="text/css">
.container {
    /*border: 1px solid black;*/
    border: 40px solid transparent;
    /* border-image: url(logo.png) 80 stretch;*/
    padding: 0px;
}

p {
    text-align: justify;
}
</style>

<body onload="print()">
    <!--  <body>  -->

    <div class="container">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="row align-items-center">
                        <div class="col-sm-1 text-center text-sm-left "><img id="logo" src="admin/images/1.png"
                                height="190" />
                        </div>
                        <div class="form-group col-sm-9 text-center" style="padding-left: 80px">
                            <h4>Republic of the Philippines</h4>
                            <h4>Region IV-A Calabarzon</h4>
                            <h4 > <strong>Dagatan National High School</strong> </h4>
                            <h4> <strong>Senior High Department</strong> </h4>
                            <h3>Brgy. Dagatan Dolores Quezon</h3>
                            <?php
                    $qwe = mysqli_query($connection, "SELECT * from course where course_id = '$session_id' ") or die('error');
                    while ($s = mysqli_fetch_array($qwe)) {
                      
        
                        $id  = $s['course_id'];

                       

                    ?>


                    <h6>SY: <?php echo $s['sy']; ?></h6>
                   
                  


                    <?php } ?>

                        </div>
                        <div class="col-sm-1 text-center text-sm-left"><img id="logo" src="admin/images/2.png"
                                height="190" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">

                  











                    <hr style="border: bolder">
                    <?php
                    $query = mysqli_query($connection, "select * FROM class_quiz 
                                                            LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
                                                            where class_quiz_id = '$get_id' 
                                                            order by date_added DESC ") or die('error');
                    while ($row = mysqli_fetch_array($query)) {
                        $id  = $row['class_quiz_id'];
                        $stcqid = $row['student_class_quiz_id'];

                       

                    ?>


                    <h5> <strong> Quiz title: </strong> <?php echo $row['quiz_title']; ?></h5>
                  
                    <h5> <strong> Description: </strong> <?php echo $row['quiz_description']; ?></h5>
                   


                    <?php } ?>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-center" id="">
                                <thead>


                                    <th>LRN</th>
                                    <th>Student Name</th>
                                    <th>Score</th>

                                </thead>
                                <tbody>
                                    <?php
                               
                               $q1 = mysqli_query($connection, "SELECT * FROM student_class_quiz where class_quiz_id = '$get_id'");
                               while ($row = mysqli_fetch_array($q1)) {
                                   $id  = $row['student_class_quiz_id'];
                                   $aid  = $row['class_quiz_id'];
                                   $s_id = $row['student_id'];

                                   $class = mysqli_query($connection, "select * from student where student_id = '$s_id'") or die(mysqli_error($connection));
                                   $rowClass = mysqli_fetch_assoc($class);

                                        $student_query = mysqli_query($connection, "select * from student where student_id='" . $row['student_id'] . "'") or die($connection->error);
                                        $student_row = mysqli_fetch_array($student_query);
                                    ?>
                                    <tr class="odd gradeX">
                                        <td class="text-uppercase"><?php echo $student_row['lrn'] ?></td>
                                        <td class="text-uppercase">
                                            <?php echo $student_row['lastname'] . " " . $student_row['firstname'] . " " . $student_row['middle_name'] . "." ?>
                                        </td>
                                        <td class="text-uppercase"><?php echo $row['grade'] ?></td>


                                    </tr>

                                    <?php

                                    } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="form-group mt-5" style="float: left">
            <a href="student_quiz_history.php<?php echo '?id=' . $get_id; ?>" class="btn btn-danger noprint"> Back </a>
        </div>
    </div>

</body>

</html>