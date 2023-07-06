<?php
require('../session.php');
include('../connection.php');
$connection = connection();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strands</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link rel="stylesheet" href="css/cards.css">
</head>

<body>



    <?php
    if (isset($_POST['save'])) {


        $strand = $_POST['strand'];
        $sd = $_POST['sd'];


        $query = mysqli_query($connection, "SELECT * from strand_list where strands = '$strand'");
        if (mysqli_num_rows($query) > 0) {
            echo ('<script>alert("Data Existed");</script>');
        } else {
            mysqli_query($connection, "INSERT into strand_list (strands, strand_description) values ('$strand','$sd')") or die($connection->error);
            echo ('<script>location.href = "courselist.php"</script>');
        }
    }
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $course = mysqli_query($conn, "SELECT * FROM strand_list where strand_id = {$_GET['id']}");
                        foreach (mysqli_fetch_array($course) as $k => $v) {
                            $$k = $v;
                        }
                    }
                    ?>
                    <form class="form-horizontal" method="POST">

                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Strand</label>
                            <div class="controls">
                                <input type="text" name="strand" class="form-control" value="<?php echo isset($strand) ? $strand : '' ?>" placeholder="Strands" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Strands Description</label>
                            <div class="controls">
                                <input type="text" name="sd" class="form-control sd"  placeholder="Strands Description" value="<?php echo isset($sd) ? $sd : '' ?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!---ENDMODAL--->


    <!-- ##########################################################EDIT###################################################################################### -->

    <div class="modal fade" id="editcourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update_strand.php" class="form-horizontal" method="POST">
                    <div class="modal-body">




                        <input type="hidden" name="strand_id" id="strand_id">
                        <div class="control-group">
                            <label class="control-label">Strands</label>
                            <div class="controls">
                                <input type="text" name="strand" id="strand" class="form-control" value="<?php echo isset($strand) ? $strand : '' ?>" placeholder="Strands" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Strands Description</label>
                            <div class="controls">
                                <input type="text" name="sd" class="form-control sd"  placeholder="Strands Description" value="<?php echo isset($sd) ? $sd : '' ?>">
                            </div>
                        </div>



                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updatedata" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                            </div>
                        </div>

                </form>
            </div>

        </div>
    </div>
    </div>

    <!-- ##########################################################EDIT###################################################################################### -->

    <?php include('sidebar.php'); ?>
    <main id="content">
        <div class="container">

            <div class="row-fluid">
                <div class="span2">

                </div>
                <div class="span10">
                    <div class="hero-unit-3">

                        <table class="table table-striped table-bordered text-center table-responsive-md" id="datatable">
                            <br>
                            <div class="" id="card">
                                <h1 class="">Strand List</h1>
                                <hr>
                            </div>

                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Strands</button>
                            </div>
                            <thead>
                                <tr>

                                    <th>Strands</th>
                                    <th>Strands Description</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from strand_list") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $strand_id = $row['strand_id'];
                                ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $row['strands']; ?></td>
                                        <td><?php echo $row['strand_description']; ?></td>


                                        <td>
                                            <button type="button" class="btn btn-success editcourse"><i class='bx bxs-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $strand_id ?>"><i class='bx bxs-trash'></i>
                                                </button>
                                        </td>



                                        <!-- user delete modal -->
                                        <div id="strand_id<?php echo $strand_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">Are you Sure you Want to
                                                    <strong>Delete</strong>&nbsp; this Course?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                                <a href="deleteteacher.php<?php echo '?id=' . $strand_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                            </div>
                                        </div>
                                        <!-- end delete modal -->

                                    </tr>
                                <?php

                                    include('delete_strand.php');
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    </main>

    <script>
        $(document).ready(function() {
            $('.editcourse').on('click', function() {
                $('#editcourse').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#strand_id').val(data[0]);
                $('#strand').val(data[0]);
                $('.sd').val(data[1]);



            })
        });
    </script>

</body>

</html>