<?php

include('../connection.php');
include('session.php');
$connection = connection();
$get_id = $_GET['id'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Overall Grades Student</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
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
                            <h1 class="">STUDENTS GRADES</h1>
                            <hr>
                        </div>


                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <tr>
                                   
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>First Semester</th>
                                    <th>Second Semester</th>
                               

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
                                    <td width=""><img class="img-rounded"
                                            src="../uploads/<?php echo $student_row['location']; ?>" height="50"
                                            width="50"></td>

                                    <td>&nbsp;<?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?>
                                    </td>
                                    <td><?php echo $row['first']; ?></td>
                                    <td><?php echo $row['second']; ?></td>
                                
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
</body>

</html>