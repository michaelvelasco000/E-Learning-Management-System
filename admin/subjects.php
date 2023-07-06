<?php

require_once('../connection.php');
require('session.php');
$connection = connection();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
</head>

<body>

    <?php
    if (isset($_POST['save'])) {


        $sc = $_POST['sc'];
        $st = $_POST['st'];
   


        if (empty($_POST['id'])){


            $query1 = mysqli_query($connection, "SELECT * from subject where subject_code  = '$sc' ");
            if (mysqli_num_rows($query1) > 0) {
                echo ('<script>alert("Data Existed");</script>');
            } else {
                mysqli_query($connection, "insert into subject (subject_code,subject_title) values ('$sc','$st')") or die($connection->error);
                echo ('<script>location.href = "subjects.php"</script>');
            }
           
        
        
        }else{
            echo 'error';

        echo ('<script>location.href = "subjects.php"</script>');
    }
    }
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST">

                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Subject Code:</label>
                            <div class="controls">
                                <input type="text" name="sc" id="inputPassword" placeholder="Subject Code" class="form-control" required value="<?php echo isset($subject_code) ? $subject_code : "" ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Subject Title:</label>
                            <div class="controls">
                                <input type="text" name="st" id="inputPassword" placeholder="Subject Title" class="form-control" required value="<?php echo isset($subject_title) ? $subject_title : "" ?>">
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Subject</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!---ENDMODAL--->


    <!-- ####################################################################################################################################### -->

    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel"> Edit Subject Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecodesubject.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="subject_id" id="subject_id">

                        <div class="form-group">
                            <label> Subject Code </label>
                            <input type="text" name="subject_code" id="subject_code" class="form-control" placeholder="Enter Subject Code">
                        </div>

                        <div class="form-group">
                            <label> Subject Title Name </label>
                            <input type="text" name="subject_title" id="subject_title" class="form-control" placeholder="Enter Subject title">
                        </div>



                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- ####################################################################################################################################### -->

    <?php include('sidebar.php'); ?>
    <main id="content">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span2">

                </div>

                <div class="span10">
                    <div class="order">

                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <br>
                            <div class="" id="card">
                                <h1 class="">SUBJECT'S MANAGEMENT</h1>
                                <hr>
                            </div>

                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal" data-target="#exampleModal"> Add Subjects</button>
                            </div>
                            <thead>
                                <tr>

                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Subject Title</th>
                                 
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from subject") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $subject_id = $row['subject_id'];
                                ?>
                                    <tr class="odd gradeX">


                                        <td><?php echo $row['subject_code']; ?></td>
                                        <td><?php echo $row['subject_title']; ?></td>
                                     


                                        <td>

                                            <button title="Edit" type="button" class="btn btn-success editbtn"><i class='bx bxs-edit'></i></button>
                                            <button title="Delete" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $subject_id ?>"><i class='bx bxs-trash'></i>
                                            </button>
                                        </td>
                                        <!-- user delete modal -->
                                        <div id="subject_id<?php echo $subject_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">Are you Sure you Want to
                                                    <strong>Delete</strong>&nbsp; this Subject?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                                <a href="deletesubj.php<?php echo '?id=' . $subject_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                            </div>
                                        </div>
                                        <!-- end delete modal -->

                                    </tr>
                                <?php
                                    include('deleteSubjectmodal.php');
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
    </main>
    <script src="../assets/js/pages/datatables.init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Page Script -->
    <script src="assets/js/scripts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#updatemodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#subject_id').val(data[0]);
                $('#subject_code').val(data[0]);
                $('#subject_title').val(data[1]);
               


            })
        });
    </script>

</body>

</html>