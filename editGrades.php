
<?php
error_reporting(0);


include('teachersession.php');
$connection = $con;
$get_id = $_GET['id'];
$user_query = mysqli_query($connection, "select * from teacher where teacher_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);

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

</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">
                        <h2 class="card-title"> Input Student Grade</h2>

                        </div>
                        <div class="card-content table-responsive">

                            <?php
                            if (isset($_GET['id'])) {
                                $subject = mysqli_query($connection, "SELECT * FROM student_class where id = {$_GET['id']}");
                                foreach (mysqli_fetch_array($subject) as $k => $v) {
                                    $$k = $v;
                                }
                            }
                            ?>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">


                                <div class="row">
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="control-label" for="">First Grading</label>
                                            <div class="controls">
                                                <input type="text" name="first" id="inputEmail"
                                                    placeholder="First Grading" class="form-control"
                                                    value="<?php echo isset($first) ? $first : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="control-label" for="">Second Grading</label>
                                            <div class="controls">
                                                <input type="text" name="second" id="inputEmail"
                                                    placeholder="Second Grading" class="form-control"
                                                    value="<?php echo isset($second) ? $second : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                        </div>





                        <div class="control-group" style="padding: 10px; ">
                            <div class="controls">
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info"><i
                                        class="icon-save icon-large" ></i>&nbsp;Save</button>
                            </div>
                        </div>
                        </form>



                        <?php
                            if (isset($_POST['submit'])) {

                                $first = $_POST['first'];
                                $second= $_POST['second'];

                                if (empty($_POST['id'])) {
                                    mysqli_query($conn, "insert into student_class (first,second)
                                           values ('$first','$second')                                    
                                           ") or die($connection->error);
                                } else {
                                   
                                    mysqli_query($connection, "UPDATE student_class set
                                              
                                               first = '$first',
                                               second = '$second'
                                               where id = {$_POST['id']}                                    
                                               ") or die($connection->error);
                                }
                                echo ("<script language='JavaScript'>
                                window.location.href='inputGrade.php?id=$class_id';
                                window.alert('Successfully Added')
                              </script>");
                       
                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>

    <script src="assets/js/app.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>


    <?php include 'alert_message.php'; ?>



</body>

</html>