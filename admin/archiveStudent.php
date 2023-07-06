<?php

require('session.php');


$connection = $con;


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/cards.css">
    <title>Students Archive</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">

</head>



<body>

    <?php include('sidebar.php'); ?>

    <?php
    if (isset($_POST['submit'])) {

        $p = $_POST['p'];
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $mn = $_POST['mn'];
        $e = $_POST['em'];
        $s = $_POST['st'];
        $lrn = $_POST['lrn'];


        if (!empty($_FILES["image"]["tmp_name"])) {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $_FILES["image"]["name"]);
            $location = "../uploads/" . $_FILES["image"]["name"];
        }

        if (empty($_POST['id']))
            mysqli_query($connection, "insert into student (password,firstname,lastname,middle_name,location,email,strand,lrn)
            values ('$p','$fn','$ln','$mn','$location','$e','$s',$lrn)                                    
            ") or die($connection->error);
        else {
            if (!empty($p)) {
                $pw = " , password='$p' ";
            } else {
                $pw = '';
            }
            if (isset($location)) {
                $loc = " , location='$location' ";
            } else {
                $loc = '';
            }
            mysqli_query($connection, "UPDATE student set
            firstname = '$fn',
            lastname = '$ln',
            middle_name = '$mn',
            email = '$e',
            strand = '$s',
            lrn = '$lrn'
            $loc
            $pw where student_id = {$_POST['id']}                                    
            ") or die($connection->error);
        }

        echo ('<script>location.href = "students.php"</script>');
    }
    ?>




    <!-- Modal -->
    <?php
    if (isset($_GET['id'])) {
        $course = mysqli_query($conn, "SELECT * FROM course where course_id = {$_GET['id']}");
        foreach (mysqli_fetch_array($course) as $k => $v) {
            $$k = $v;
        }
    }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">LRN</label>
                            <div class="controls">
                                <input type="number" name="lrn" id="lrn" placeholder="LRN" class="form-control" <?php echo (isset($lrn)) ? "" : 'required' ?>>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="password" name="p" id="inputPassword" placeholder="Password" class="form-control" <?php echo (isset($password)) ? "" : 'required' ?>>
                                <?php echo (isset($password)) ? "<i>Leave this blank if you dont want to change your password.</i>" : '' ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="password" name="p" id="inputPassword" placeholder="Password" class="form-control" <?php echo (isset($password)) ? "" : 'required' ?>>
                                <?php echo (isset($password)) ? "<i>Leave this blank if you dont want to change your password.</i>" : '' ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Firstname</label>
                            <div class="controls">
                                <input type="text" name="fn" id="inputEmail" placeholder="Firstname" class="form-control" required value="<?php echo isset($firstname) ? $firstname : "" ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Lastname</label>
                            <div class="controls">
                                <input type="text" name="ln" id="inputEmail" placeholder="Lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Middlename</label>
                            <div class="controls">
                                <input type="text" name="mn" id="inputEmail" placeholder="Middlename" class="form-control" value="<?php echo isset($middle_name) ? $middle_name : "" ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                                <input type="email" name="em" id="inputEmail" placeholder="Email" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Strand:</label>
                            <div class="controls">
                                <input type="text" name="st" id="" placeholder="Strand" class="form-control" value="<?php echo isset($strand) ? $strand : "" ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Image:</label>
                            <div class="controls">
                                <input type="file" name="image" class="font" <?php echo (isset($location)) ? "" : 'required' ?>>
                            </div>
                        </div>
                        <img src="<?php echo isset($location) && is_file($location) ? $location : '' ?>" alt="">
                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---ENDMODAL--->



    <main id="content">
        <div class="container-fluid">

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <div class="pt-3" id="card">
                        <h1 class="">Archive Teacher</h1>
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 mt-3">


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <th>Photos</th>
                                <th>LRN</th>
                                <th>Name</th>
                                <th>Email </th>

                                <th>Password</th>
                                <th>Strand</th>
                                <th>Action</th>

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
                                $query = mysqli_query($connection, "select * from student where delete_status = 1") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $student_id = $row['student_id'];
                                ?>
                                    <tr>
                                        <td><img class="rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
                                        <td><?php echo $row['lrn']; ?></td>
                                        <td><?php echo $row['firstname'] . " " . $row['middle_name'] . " " . $row['lastname']; ?>
                                        </td>
                                        <td><?php echo $row['email']; ?></td>

                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['strand']; ?></td>
                                        <td class="">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#restore<?php echo $student_id ?>"> Restore</button>
                                        </td>

                                    </tr>
                                <?php
                                    include('restoreStudentmodal.php');
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </main>



    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>



</body>

</html>