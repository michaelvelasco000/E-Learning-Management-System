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
                        <div class="col-sm-1 text-center text-sm-left "><img id="logo" src="admin/images/1.png" height="190" />
                        </div>
                        <div class="form-group col-sm-9 text-center" style="padding-left: 80px">
                            <h4>Republic of the Philippines</h4>
                            <h4>Region IV-A Calabarzon</h4>
                            <h4> <strong>Dagatan National High School</strong> </h4>
                            <h4> <strong>Senior High Department</strong>    </h4>
                            <h3>Brgy. Dagatan Dolores Quezon</h3>
                           
                        </div>
                        <div class="col-sm-1 text-center text-sm-left"><img id="logo" src="admin/images/2.png" height="190" />
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                     <?php
                    $qwe = mysqli_query($connection, "SELECT * from teacher where teacher_id = '$session_id' ") or die('error');
                    while ($s = mysqli_fetch_array($qwe)) {
                      
        
                        $id  = $s['teacher_id'];

                       

                    ?>


                    <h6 style=""> <span style="font-weight: bold;"> Teacher: </span><?php echo $s['lastname']." ".$s['firstname'] ." ". $s['middlename']; ?></h6>
                   
                  


                    <?php } ?>

                    <hr style="border: bolder">
                      
                    
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-center" id="datatable">
                                <thead>

                                    <th>Strand</th>
                                    <th>Subject Title</th>
                                  
                                    
                                 
                                </thead>
                                <tbody>
                                <?php
                                            $page = 'class';
                                            $query = mysqli_query($connection, "SELECT * from class where teacher_id = '$session_id' AND delete_status = 0") or die($connection->error);
                                            while ($row = mysqli_fetch_array($query)) {
                                              
                                                $course = mysqli_query($connection, "select * from course where course_id = '" . $row['course_id'] . "'");
                                                $rowCourse = mysqli_fetch_assoc($course);

                                                $subject = mysqli_query($connection, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                                $rowSubject = mysqli_fetch_assoc($subject);

                                               
                                            ?>
                                           
                                            <td><?php echo $rowCourse['cys']; ?></td>
                                            <td><?php echo $rowSubject['subject_title']; ?></td>
                                      
                                           

                                          
                                        </tr>
                                    
                                    <?php  } ?>

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
        <a href="teacherclass.php<?php echo '?id=' . $session_id;?>" class="btn btn-danger noprint"> Back </a>
        </div>
    </div>

</body>

</html>