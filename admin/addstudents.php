<?php include('session.php');
$connection = $con;
error_reporting(0);
?>

<?php $get_id = $_GET['id'];

  $user_query = mysqli_query($connection, "select * from class where class_id = '$get_id' ") or die($connection->error);
  $user_row = mysqli_fetch_array($user_query);
  $student=$user_row['course_id'];
  $teacher=$user_row['teacher_id'];


  $user_queryyy = mysqli_query($connection, "select * from course where course_id = '$student' ") or die($connection->error);
  $user_rowww = mysqli_fetch_array($user_queryyy);
  $cyss=$user_rowww['cys'];


   ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

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

    <?php include('sidebar.php');
 
     ?>

    <main id="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 mt-3">
                   
                        <div class="table-responsive">
                        <div class="pt-3" id="card">
                            <h1 class="">ADD STUDENTS</h1>
                            <hr>
                        </div>
                  
                                      
                            <form method="post" action="">
                                <button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add All Students</button>
                                <br>
                                <br>

                                <table class="table table-striped table-bordered dt-responsive nowrap text-center"  id="datatable">

                                    <thead>

                                        <tr>

                                            <th>LRN</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Track</th>
                                            <th>School Year</th>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $a = 0;
                                        $query = mysqli_query($connection, "select * from student where strand='$cyss' and delete_status = 0") or die("error selecting student");
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['student_id'];
                                          
                                            $a++;
                                        

                                       
                                        ?>
                                            <tr>
                                                <input type="hidden" name="test" value="<?php echo $a; ?>">
                                                <td><?php echo $row['lrn']; ?></td>
                                                <td width="70"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="40"></td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td><?php echo $row['strand']; ?></td>
                                                <td><?php echo $row['sy']; ?></td>

                                                <td width="" style="display:none;">
                                                    <select name="addstudent<?php echo $a; ?>" class="form-control" hidden>
                                                        
                                                        <option>Add</option>
                                                    </select>

                                                  
                                                    <input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="class_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
                                                    <input type="hidden" name="teacher_id<?php echo $a; ?>" value="<?php echo $teacher ?>">
                                               

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
                                        header("Location: classes.php?id=$class_id");
                            ?>

                                    <?php
                                    } else  
                                if ($Add == 'Add') {
                                    $one =  mysqli_query($connection, "insert into student_class (student_id,class_id,teacher_id) values('$id','$class_id','$teacher_id') ") or die("error ");
                                        
                                        if($one){
                                            $one =  mysqli_query($connection, "insert into teacher_student (teacher_id,student_id) values('$teacher_id','$id')") or die($conn->error);
                                        }
                                        $_SESSION['status'] = "Added Successfully. Thank you!";
                                        $_SESSION['status_code'] = "success";
                                        header("Location: classes.php?id=$class_id");
                                    } else {
                                    } ?>
                                    <script>
                                        window.location = "classes.php<?php echo '?id=' . $class_id; ?>";
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

    <script src="../assets/js/pages/datatables.init.js"></script>

</body>

</html>