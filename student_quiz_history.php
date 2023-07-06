<?php


include('teachersession.php');
$conn = $con;
$getid = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <!-- Bootstrap Css -->

    <!-- Bootstrap Css -->

</head>

<body>
    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">





                        <div class="card-header card-header-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h1> Quiz Results</h1>


                                        <a href="print_quiz.php<?php echo '?id=' . $getid; ?>"
                                            class="btn btn-primary mb-2">Print</a>

                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <?php

                                    $q1 = mysqli_query($conn, "SELECT * FROM student_class_quiz where class_quiz_id = '$getid'");
                                    while ($row = mysqli_fetch_array($q1)) {
                                        $id  = $row['student_class_quiz_id'];
                                        $aid  = $row['class_quiz_id'];
                                        $s_id = $row['student_id'];

                                        $class = mysqli_query($connection, "select * from student where student_id = '$s_id'") or die(mysqli_error($connection));
                                        $rowClass = mysqli_fetch_assoc($class);
                                    ?>
                                <tbody>


                                    <tr>
                                        <td><?php echo $rowClass['lastname'] . " " . $rowClass['firstname'] . " " . $rowClass['middle_name'] . "." ?>
                                        </td>
                                        <td><?php echo $row['grade'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                     



                    </div>

                </div>

            </div>
        </div>
    </div>



    <!-- Datatable init js -->



    <script src="assets/js/pages/datatables.init.js"></script>


</body>

</html>