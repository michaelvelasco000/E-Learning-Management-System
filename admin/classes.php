<?php
error_reporting(0);


include('session.php');
$connection = $con;
$get_id = $_GET['id'];
$user_query = mysqli_query($connection, "select * from teacher") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">

    <!-- Bootstrap Css -->

</head>
<style>
#card {
    color: #25396f;
    font-family: 'Franklin Gothic Medium';
    font-weight: 100px;
}

#cInfo {
    margin: 5px;
    padding: 5px;
    border: 2px;
    border-radius: 10px;
    background-color: white;

}
</style>

<body>

    <?php include('sidebar.php'); ?>

    <main id="content">
        <div class="container-fluid">
            <div class="row p-0">
                <div class="col-md-12 mt-3">

                    <div class="table-responsive">
                        <div class="pt-3" id="card">
                            <h1 class="">ALL STUDENTS</h1>
                            <?php

$query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);
$userTotal = mysqli_num_rows($query);
?>
                           
                                <?php echo   " <h3>Total Students: " . $userTotal . "</h3>" ?>
                        <hr>
                          
                        </div>

                        <a href="addstudents.php<?php echo '?id=' . $get_id ?>" type="button"
                            class="btn btn-info btn-md">Add Students</a>
                        <?php

                            $query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);

                            while ($row = mysqli_fetch_array($query)) {

                                $class_id = $row['class_id'];


                            ?>


                        <?php } ?>
                        <table class="table table-striped table-bordered dt-responsive nowrap text-center" id="datatable">


                            <br><br>
                            <thead>
                                <tr>
                                    <th>LRN</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                            


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $page = 'student_class';
                                    $query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);
                                    $userTotal = mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $class_id = $row['class_id'];

                                        $student_query = mysqli_query($connection, "select * from student where student_id='" . $row['student_id'] . "'") or die($connection->error);
                                        $student_row = mysqli_fetch_array($student_query);


                                    ?>

                                <tr class="odd gradeX" id="username">
                                <td>&nbsp;<?php echo $student_row['lrn'] ?></td>
                                    <td width=""><img class="img-rounded" src="<?php echo $student_row['location']; ?>"
                                            height="50" width="50"></td>

                                    <td>&nbsp;<?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?> </td>

                                   
                                    <!-- end delete modal -->
                                </tr>

                                <?php
                                
                                    } ?>


                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="../assets/js/pages/form-validation.init.js"></script>

    <script src="../assets/js/app.js"></script>

    <!-- Datatable init js -->
    <script src="../assets/js/pages/datatables.init.js"></script>



    <script>
    const submitButton = document.getElementById("submit");
    const in = document.getElementById("username");
    </script>

<?php include '../alert_message.php'; ?>
</body>

</html>