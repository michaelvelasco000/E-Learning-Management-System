<?php include('teachersession.php');
$connection = $con;
?>

<?php
 $get_id = $_GET['id']; 
 
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

                            <form method="post" action="">
                                <button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add Student</button>
                                <br>
                                <br>

                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">

                                    <thead>

                                        <tr>

                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Track</th>
                                            <th>School Year</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php


                                        $a = 0;
                                        $query = mysqli_query($connection, "select * from student where delete_status = 0") or die("error selecting student");
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['student_id'];
                                            $a++;

                                        ?>
                                            <tr>
                                                <input type="hidden" name="test" value="<?php echo $a; ?>">
                                                <td width="70"><img class="img-rounded" src="admin/<?php echo $row['location']; ?>" height="50" width="40"></td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td><?php echo $row['strand']; ?></td>
                                                <td><?php echo $row['sy']; ?></td>

                                                <td width="80">
                                                    <select name="addstudent<?php echo $a; ?>" class="form-control">
                                                        <option></option>
                                                        <option>Add</option>
                                                    </select>


                                                    <input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="class_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
                                                    <input type="hidden" name="teacher_id<?php echo $a; ?>" value="<?php echo $session_id; ?>">

                                                </td>

                                            <?php } ?>
                                            </tr>
                                    </tbody>
                                </table>

                            </form>
                            <?php
                            if (isset($_POST['submit'])) {

                                $test = $_POST['test'];
                                for ($b = 1; $b <=  $test; $b++) {
                                    $test1 = "student_id" . $b;
                                    $test2 = "class_id" . $b;
                                    $test3 = "teacher_id" . $b;
                                    $test4 = "addstudent" . $b;
                                  

                                    $id = $_POST[$test1];
                                    $class_id = $_POST[$test2];
                                    $teacher_id = $_POST[$test3];
                                    $Add = $_POST[$test4];
                                 

                                    $query = mysqli_query($connection, "select * from student_class where student_id = '$id' and class_id = '$class_id' ") or die("error ");
                                    $count = mysqli_num_rows($query);

                                    if ($count > 0) {


                                        $_SESSION['status'] = "Error! Already Added";
                                        $_SESSION['status_code'] = "error";
                                        header("Location: class.php?id=$class_id");
                            ?>

                                    <?php
                                    } else  
                                if ($Add == 'Add') {
                                        $one =  mysqli_query($connection, "insert into student_class (student_id,class_id,teacher_id) values('$id','$class_id','$teacher_id') ") or die("error ");
                                        
                                        if($one){
                                            $one =  mysqli_query($connection, "insert into grade (student_id,class_id) values('$id','$class_id')") or die($conn->error);
                                        }
                                        $_SESSION['status'] = "Added Successfully. Thank you!";
                                        $_SESSION['status_code'] = "success";
                                        header("Location: class.php?id=$class_id");
                                    } else {
                                    } ?>
                                    <script>
                                        window.location = "class.php<?php echo '?id=' . $get_id; ?>";
                                    </script>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/pages/datatables.init.js"></script>
</body>

</html>