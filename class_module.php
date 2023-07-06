<?php
$get_id = $_GET['id'];

include('teachersession.php');
$connection = $con;
$user_query = mysqli_query($connection, "select * from teacher where teacher_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($connection, "select * from class where teacher_id='$session_id' and class_id='$get_id'") or die($connection->error);
$course_row = mysqli_fetch_array($course_query);
$course_id = $course_row['course_id'];
?>
<?php
$query_class = mysqli_query($connection, "select * from class where teacher_id='$session_id' and class_id='$get_id'") or die($connection->error);
$row_class = mysqli_fetch_array($query_class);
$id_class = $row_class['class_id'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modules</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="src/css/a.css">
    

    <!-- Bootstrap Css -->
</head>

<body>

    <?php include('sidebar.php'); ?>


    <script src="assets/libs/parsleyjs/parsley.min.js"></script>
    <!-- 
        <script src="assets/js/pages/form-validation.init.js"></script>
 -->
    <script src="assets/js/app.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>


    <?php include 'alert_message.php'; ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">


                            <h4 class="card-title">Upload Modules</h4>
                            <p class="category text-muted">DAGATAN SENIOR HIGH SCHOOL</p>
                            <hr class="pb-0">

                        </div>
                        <div class="card-content table-responsive">
                            <?php if ($row_class['delete_status'] == 0) echo '   <a type="button" class="btn btn-info btn-md text-white" data-toggle="modal" data-target="#myModal">Add Module</a> ' ?>

                            <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                <br><br>
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Date Uploaded</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = 'module_class';
                                    $query = mysqli_query($connection, "select * from module_class where class_id = '$get_id' ") or die($connection->error);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $class_id = $row['class_id'];

                                    ?>
                                        <tr>
                                            <!-- script -->

                                            <!-- end script -->

                                            <td><?php echo $row['file_name'] ?></td>
                                            <td><?php echo date("F d, Y", strtotime($row['date_uploaded'])) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $id ?>"><i class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                        include 'delete_ModalClass.php';
                                    } ?>
                                    <?php include 'moduleAddModal.php' ?>

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>