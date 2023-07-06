<?php
$get_id = $_GET['id'];
include_once("connection.php");
$connection = connection();
include('session.php');
$user_query = mysqli_query($connection, "select * from student where student_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Student Home</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');

     h1{
        font-family: 'Noto Sans', sans-serif;
        text-align: center;
    }
    </style>
<body>
<br>

    <?php include('studentsidebar.php'); ?>

    <br>
    <section class="container section__height">

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="datatable">
                <thead>


                  
                    <th>1st Semester</th>
                    <th>2nd Semester</th>
             
              



                </thead>
                <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">Are you Sure you Want to
                            <strong>Delete</strong>&nbsp; this Student?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                        <a href="deletestudents.php<?php echo '?id=' . $student_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                    </div>
                </div>
                <tbody>
                    <?php
                    $query = mysqli_query($connection, "select * from student_class where id='$get_id'") or die($connection->error);
                    while ($row = mysqli_fetch_array($query)) {
                        $student_id = $row['id'];
                    ?>
                        <tr>
                           
                            <td><?php echo $row['first']; ?></td>
                            <td><?php echo $row['second']; ?></td>
                            
                         

                          
                        </tr>
                    <?php
                     
                    } ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>