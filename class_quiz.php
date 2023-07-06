<?php

include('teachersession.php');
$connection = $con;
$get_id = $_GET['id'];
$query_class = mysqli_query($connection, "select * from class where teacher_id='$session_id' and class_id='$get_id'") or die($connection->error);
$row_class = mysqli_fetch_array($query_class);
$id_class = $row_class['class_id'];

error_reporting(0);
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
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
                            <h4 class="card-title">QUIZ MANAGEMENT</h4>

                            <hr>

                            <form action="delete_class_quiz.php<?php echo '?id=' . $get_id; ?>" method="post">
                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                    <?php if ($row_class['delete_status'] == 0) echo '  <a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger mb-2" name="">Delete<i class="icon-trash icon-large"></i></a>' ?>
                                    <?php include('modal_delete_class_quiz.php'); ?>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Quiz title</th>
                                            <th>Description</th>


                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "select * FROM class_quiz 
                                                            LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
                                                            where class_id = '$get_id' 
                                                            order by date_added DESC ") or die('error');
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id  = $row['class_quiz_id'];
                                            $stcqid = $row['student_class_quiz_id'];

                                            $stcq = mysqli_query($connection, "select * from student_class_quiz where student_class_quiz_id = '$student_class_quiz_id'") or die(mysqli_error($connection));
                                            $rowstcq = mysqli_fetch_assoc($stcq);
                                        ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php echo $row['quiz_title']; ?></td>
                                                <td><?php echo $row['quiz_description']; ?></td>


                                                <td><a href="student_quiz_history.php?id=<?php echo $id ?> " class="btn btn-success">Result</a></td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>

                            <!-- /block -->
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- Datatable init js -->






</body>

</html>