<?php
include('../connection.php');
require('session.php');

$connection = connection();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <title>Teacher Information</title>
    <link href="../src/css/a.css" rel="stylesheet" type="text/css">
    <link href="css/cards.css" rel="stylesheet" type="text/css">
</head>
<style>
    .categorychecklist li {
        display: inline-block;

    }

    #cont {
        background-color: white;
        width: 99%;
    }
</style>

<body>

    <?php include('sidebar.php'); ?>
    <?php include('mailTeachers.php'); ?>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-md" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Teachers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="form-label" for="inputEmail">User ID</label>
                                    <div class="controls">
                                        <input type="number" id="inputEmail" name="empid" class="form-control" placeholder="USER-ID" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="control-group">
                                    <label class="form-label" for="inputEmail">E-mail</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="E-mail" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">First Name</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="firstname" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Last Name</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" class="form-control" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middle Initial</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" class="form-control" placeholder="Middle Initial" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">

                                        <select name="department" class="form-control span4" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query($connection, "select * from department");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option><?php echo $row['department']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">

                                        <div class="upload-container">
                                        <div id="display-image" style="position: absolute; top:120px; left:0%; color:#468d94; width:100%;"></div>
                                            <input type="file" name="image" class="font" style="border:1px solid black" onchange="getImage(this.value);" required>
                                         
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="position:relative; left:-10px;">
                            <div class="control-group" id="cb">

                                <label class="control-label " for="">Class Day <span class="text-danger font-weight-bold">*REQUIRED*</span></label>
                                <div class="controls ">
                                   
                                           <div class="container">
                                            <div class="row">
                                                <div class="col-12 text-center"> <input type="checkbox" name="day[]" value="Monday">Monday
                                         
                                         <input type="checkbox" name="day[]" value="Tuesday" > Tuesday
                                  
                                   
                                         <input type="checkbox" name="day[]" value="Wednesday"> Wednesday
                                  
                                   
                                         <input type="checkbox" name="day[]" value="Thursday"> Thursday </div>
                                                <div class="col-12 text-center">  <input type="checkbox" name="day[]" value="Friday"> Friday
                                           
                                         
                                           <input type="checkbox" name="day[]" value="Saturday"> Saturday
                                      
                                     
                                           <input type="checkbox" name="day[]" value="Sunday"> Sunday</div>
                                               
                                            </div>
                                        </div>
                                             
                                           
                                            
                                           
                                              
                                            
                                      
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="control-group ">
                            <div class="controls">
                                <hr>
                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <br>
                            </div>
                        </div>
                </div>





                </form>
            </div>

        </div>
    </div>
    </div>
    <!---ENDMODAL--->
    <script src="../fileupload.js"></script>

    <main id="content">

        <div class="container-fluid" id="cont">

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <div class="alert-success"><?php echo $alert ?></div>
                    <div class="" id="card">
                        <h1 class="">TEACHERS' MANAGEMENT</h1>
                        <hr>
                    </div>

                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target=".bd-example-modal-md"> Add Teacher</button>
                    <a href="teacher_print.php" class="btn btn-primary mb-1 bx bxs-printer"></a>
                </div>
                <div class="col">

                </div>
                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>User ID</th>
                                <th>Image</th>
                                <th>E-mail</th>

                                <th>Name</th>
                                <th>Department</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from teacher where status = 0") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $teacher_id = $row['teacher_id'];
                                ?>
                                    <script type="text/javascript">
                                        $(document).ready(function() {

                                            $('#e<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#e<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function() {

                                            $('#d<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#d<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>



                                    <tr>
                                        <td><?php echo $row['user_idlogin'] ?></td>
                                        <td><a href="<?php echo $row['location']; ?>" target="_blank"><img class="rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></a></td>
                                        <td><?php echo $row['email']; ?></td>

                                        <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
                                        </td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['day']; ?></td>

                                        <td>
                                            <a rel="tooltip" title="Edit Teacher" id="e<?php echo $teacher_id; ?>" href="editTeacher.php<?php echo '?id=' . $teacher_id; ?>" class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;</a>
                                            <button class="btn btn-danger btn-md " title="Delete Teacher" data-toggle="modal" data-target="#delete<?php echo $teacher_id ?>"><i class='bx bxs-archive'></i> </button>

                                        </td>

                                    </tr>



                                <?php
                                    include('deleteTeachermodal.php');
                                } ?>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </main>
    <script>
        function getImage(imagename) {
            $('#display-image').html(imagename);
        }
    </script>

</body>

</html>