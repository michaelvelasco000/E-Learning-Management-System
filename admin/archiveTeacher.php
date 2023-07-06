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
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <title>Teacher Archive</title>
</head>

<body>

    <?php include('sidebar.php'); ?>



    <!-- Modal -->

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

                                <th>Photo</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "select * from teacher where status = 1") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $teacher_id = $row['teacher_id'];
                                ?>
                                    <tr>
                                        <td width=""><a href="<?php echo $row['location']; ?>"><img class="rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></a></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
                                        </td>
                                        <td><?php echo $row['department']; ?></td>

                                        <td><?php echo $row['day']; ?></td>

                                        <td width="">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#restore<?php echo $teacher_id ?>"> Restore</button>


                                        </td>

                                    </tr>

                                <?php
                                    include('restoreTeachermodal.php');
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