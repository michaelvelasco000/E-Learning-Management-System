<?php
require('session.php');

$connection = connection();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" href="dist/css/fullcalendar.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<title>Student Information</title>
<!DOCTYPE html>
<html>
<style type="text/css" media="print">
@media print {

    .noprint,
    .noprint * {
        display: none !important;
    }
}

body {
    font-style: Sans-serif;
}
</style>
<style type="text/css">
.container {
    /*border: 1px solid black;*/
    border: 40px solid transparent;
    /* border-image: url(logo.png) 80 stretch;*/
    padding: 0px;
}

p {
    text-align: justify;
}
</style>

<body onload="print()">
    <!--  <body>  -->

    <div class="container">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="row align-items-center">
                        <div class="col-sm-1 text-center text-sm-left "><img id="logo" src="images/1.png"
                                height="190" />
                        </div>
                        <div class="form-group col-sm-9 text-center" style="padding-left: 80px">

                            <h4>Republic of the Philippines</h4>
                            <h4>Region IV-A Calabarzon</h4>
                            <h4 class="">Dagatan National High School</h4>
                            <h4>Senior High Department</h4>
                            <h3><strong>Brgy. Dagatan Dolores Quezon</strong></h3>

                        </div>
                        <div class="col-sm-1 text-center text-sm-left"><img id="logo" src="images/2.png" height="190" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr style="border: bolder">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-center" id="datatable">
                                <thead>

                                    <th>Photo</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Strand</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($connection, "select * from student where delete_status = 0") or die($connection->error);
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>
                                        <td width=""><a href="<?php echo $row['location']; ?>" target="_blank"><img
                                                    class="rounded" src="<?php echo $row['location']; ?>" height="50"
                                                    width="50"></a></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['middle_name']; ?></td>
                                        <td><?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['strand']; ?></td>
                                    </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="form-group mt-5" style="float: left">
            <button type="" class="btn btn-danger noprint" onclick="window.location.replace('students.php');">Cancel
                Printing</button>
        </div>
    </div>

</body>

</html>