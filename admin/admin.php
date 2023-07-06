<?php
include '../connection.php';
require 'session.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>
    <link rel="stylesheet" href="css/cards.css">
 

    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">

</head>

<body>


    <?php include 'sidebar.php'; ?>


    <main id="content">

        <div class="container-fluid">

            <div class="row p-0">
                <div class="col-md-12 pt-1">

                    <div class="" id="card">
                        <h1 class="">ADMIN DASHBOARD</h1>
                    </div>

                </div>

                <!--COUNT THE ROWS-->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="" id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue">
                                    <i class='bx bxs-user' style="color: white;"></i><br>
                                    </div>

                                    <div class="media-body text-center">

                                        <?php
                                        $query =
                                            'SELECT * FROM student where delete_status = 0';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>

                                        <span>Students</span>
                                        <li class="bi bi-people-fill"></li>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="" id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue">
                                    <i class='bx bxs-user' style="color: white;"></i><br>
                                    </div>
                                    <div class="media-body text-center">

                                        <?php
                                        $query =
                                            'SELECT * FROM teacher where status = 0';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>
                                        <span>Teachers</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class=" " id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue">
                                    <i class='bx bxs-user' style="color: white;"></i><br>
                                    </div>
                                    <div class="media-body text-center">

                                        <?php
                                        $query = 'SELECT * FROM superadmin';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>

                                        <span>Admin</span>

                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--COUNT THE ROWS-->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="" id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue" >
                                    <i class='bx bxs-buildings' style="color: white;"></i> <br>
                                    </div>

                                    <div class="media-body text-center">

                                        <?php
                                        $query = 'SELECT * FROM department ';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>

                                        <span>Department</span>
                                        <li class="bi bi-people-fill"></li>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--COUNT THE ROWS-->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="" id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue">
                                    <i class='bx bxs-book-content' style="color: white;" ></i><br>
                                    </div>

                                    <div class="media-body text-center">

                                        <?php
                                        $query = 'SELECT * FROM subject ';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>

                                        <span>Subjects</span>
                                        <li class="bi bi-people-fill"></li>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="" id="cInfo">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="stats-icon blue">
                                    <i class='bx bxs-book-open ' style="color: white;"></i><br>
                                    </div>

                                    <div class="media-body text-center">

                                        <?php
                                        $query = 'SELECT * FROM announcement ';
                                        $query_run = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        if (
                                            $user_total = mysqli_num_rows(
                                                $query_run
                                            )
                                        ) {
                                            echo '<h4 class="mb-0">' .
                                                $user_total .
                                                '</h4>';
                                        } else {
                                            echo 'no data';
                                        }
                                        ?>

                                        <span>Announcements</span>
                                        <li class="bi bi-people-fill"></li>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!--END COUNT ROWS-->



            </div>
            <hr>
        </div>
    </main>
</body>

</html>