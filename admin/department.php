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
    <link rel="stylesheet" href="css/cards.css">
    <title>Department</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
</head>

<body>

    <?php include('sidebar.php'); ?>

    <?php
    if (isset($_POST['save'])) {


        $d = $_POST['d'];
        $dc = $_POST['dc'];
        $p = $_POST['p'];
        $t = $_POST['t'];


        if (empty($_POST['id'])){


            $query1 = mysqli_query($connection, "SELECT * from department where department  = '$d' ");
            if (mysqli_num_rows($query1) > 0) {
                echo ('<script>alert("Data Existed");</script>');
            } else {
                mysqli_query($connection, "insert into department (department,s_desc,incharge,title) values ('$d','$dc','$p','$t')") or die($connection->error);
                echo ('<script>location.href = "department.php"</script>');
            }
            

        }else{
            mysqli_query($connection, "UPDATE department set department = '$d', s_desc = '$dc',incharge = '$p',title = '$t',  where dep_id = {$_POST['id']} ") or die($connection->error);

        echo ('<script>location.href="department.php"</script>');
    }
    }
    ?>

    <!----MODAL FOR ADD---->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $dept = mysqli_query($connection, "SELECT * FROM department where dep_id = {$_GET['id']}");
                        foreach (mysqli_fetch_array($dept) as $k => $v) {
                            $$k = $v;
                        }
                    }
                    ?>
                    <form class="form-horizontal" method="POST">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Department:</label>
                            <div class="controls">
                                <input type="text" name="d" id="inputPassword" placeholder="Department" class="form-control" value="<?php echo isset($department) ? $department : '' ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Description:</label>
                            <div class="controls">
                                <input type="text" name="dc" id="inputPassword" placeholder="Description" class="form-control" value="<?php echo isset($dc) ? $dc : '' ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Person In Charge:</label>
                            <div class="controls">
                                <input type="text" name="p" class="form-control" value="<?php echo isset($incharge) ? $incharge : '' ?>" id="inputPassword" placeholder="Person In Charge" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Position:</label>
                            <div class="controls">
                                <input type="text" name="t" id="inputPassword" class="form-control" value="<?php echo isset($title) ? $title : '' ?>" placeholder="Position" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Department</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!----END---->

    <!-- ###################################EDIT################################################################################################ -->

    <div class="modal fade" id="editdep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecodedepartment.php" class="form-horizontal" method="POST">
                    <div class="modal-body">


                        <input type="hidden" name="dep_id" id="dep_id" class="form-control" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <div class="control-group">
                            <label class="control-label">Department:</label>
                            <div class="controls">
                                <input type="text" name="department" id="department" class="form-control" placeholder="Department" value="<?php echo isset($department) ? $department : '' ?>" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Description:</label>
                            <div class="controls">
                                <input type="text" name="dc" id="s_desc" placeholder="Description" class="form-control" value="<?php echo isset($dc) ? $dc : '' ?>" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Person In Charge:</label>
                            <div class="controls">
                                <input type="text" name="incharge" id="incharge" class="form-control " value="<?php echo isset($incharge) ? $incharge : '' ?>" placeholder="Person In Charge" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Position</label>
                            <div class="controls">
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($title) ? $title : '' ?>" placeholder="Position" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                <button type="submit" name="updatedata" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Department</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>




    <!-- ##################################END########################################################################################################### -->

    <main id="content">
        <div class="container-fluid">

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <div class="" id="card">
                        <h1 class="">DEPARTMENT'S MANAGEMENT</h1>
                        <hr>
                    </div>

                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Department</button>
                </div>
                <div class="col-md-12">


                    <div class="table-responsive ">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <th>Department</th>
                                <th>Description</th>
                                <th>Incharge</th>
                                <th>Position</th>
                                <th>Action</th>

                            </thead>
                            <tbody>

                                <?php
                                $query = mysqli_query($connection, "select * from department") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $dep_id = $row['dep_id'];
                                ?>
                                    <tr>
                                        <td class="text-capitalize"><?php echo $row['department']; ?></td>
                                        <td class="text-capitalize"><?php echo $row['s_desc']; ?></td>
                                        <td class="text-capitalize"><?php echo $row['incharge']; ?></td>
                                        <td class="text-capitalize"><?php echo $row['title']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success editdep" title="Edit"> <i class='bx bxs-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-md" title="Delete" data-toggle="modal" data-target="#delete<?php echo $dep_id ?>"><i class='bx bxs-trash'></i> </button>
                                        </td>
                                    </tr>

                                <?php
                                    include('deleteDepartmentmodal.php');
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
            $('.editdep').on('click', function() {
                $('#editdep').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#dep_id').val(data[0]);
                $('#department').val(data[0]);
                $('#s_desc').val(data[1]);
                $('#incharge').val(data[2]);
                $('#title').val(data[3]);


            })
        });
    </script>
</body>

</html>