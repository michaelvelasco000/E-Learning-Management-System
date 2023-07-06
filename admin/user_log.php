<?php

include '../connection.php';

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

    <?php include 'sidebar.php'; ?>
    <?php include 'mailTeachers.php'; ?>

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
                                    <label class="control-label" for="inputEmail">Firstname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="firstname" class="form-control" placeholder="Firstname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Lastname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" class="form-control" placeholder="Lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middlename</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" class="form-control" placeholder="Middlename" required>
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
                                            $query = mysqli_query(
                                                $connection,
                                                'select * from department'
                                            );
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) { ?>
                                                <option><?php echo $row['department']; ?></option>
                                            <?php }
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
                                            <input type="file" name="image" class="font" style="border:1px solid black" required>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="position:relative; left:-10px;">
                            <div class="control-group" id="cb">

                                <label class="control-label " for="">Class Day <span class="text-danger font-weight-bold">*REQUIRED*</span></label>
                                <div class="controls">
                                    <div class="sublist-grid">
                                        <ul class="categorychecklist">
                                            <li>
                                                <input type="checkbox" name="day[]" value="Monday">Monday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Tuesday"> Tuesday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Wednesday"> Wednesday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Thursday"> Thursday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Friday"> Friday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Saturday"> Saturday
                                            </li>
                                            <li>
                                                <input type="checkbox" name="day[]" value="Sunday"> Sunday
                                            </li>
                                        </ul>
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
                    <div class="alert-success"><?php echo $alert; ?></div>
                    <div class="" id="card">
                        <h1 class="">User Log</h1>
                        <hr>
                    </div>

                </div>

                <div class="col">

                </div>
                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>

                                <th>Date Login</th>
                                <th>Date logout</th>
                                <th>Name</th>

                            </thead>
                            <tbody>

                                <?php
                                ($user_query = mysqli_query(
                                    $connection,
                                    'select * from user_log order by user_log_id '
                                )) or die("error");
                                while ($row = mysqli_fetch_array($user_query)) {
                                    $id = $row['user_log_id']; ?>

                                    <tr>

                                        <td><?php echo $row['login_date']; ?></td>
                                        <td><?php echo $row['logout_date']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>



                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

</html>