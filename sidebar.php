<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title></title>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="ncss/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/teachersides.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="container" style="display: none;">
                <?php echo $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?></div>
            <div class="sidebar-header">
                <?php


                $conn = connection();
                error_reporting(0);
                $get_id = $_GET['id'];
                $query = mysqli_query($connection, "select * from teacher where teacher_id = '$session_id' ") or die($connection->error);
                while ($row = mysqli_fetch_array($query)) {
                    $teacher_id = $row['teacher_id'];


                ?>
                    <img id="imgT" class="rounded" src="uploads/<?php echo $row['location']; ?>" height="100" width="100">
                    <br>
                    <h2 class="text-center ">
                        <?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
                    </h2>
                    <h6 class=" text-center">TEACHER</h6>

                <?php } ?>
            </div>
            <ul class="list-unstyled components">
                <li class="<?= $page == 'teacherclass.php' ? 'active' : '' ?>">
                    <a href="teacherclass.php" class="dashboard"><i class="material-icons">person</i><span>Teacher
                            Classes</span></a>
                </li>






                <li class="<?= $page == 'teacher_quiz.php' ? 'active' : '' ?>">
                    <a href="teacher_quiz.php" class="dashboard"><i class="material-icons">book</i><span>Quiz
                        </span></a>
                </li>
                <li class="<?= $page == 'classarchive.php' ? 'active' : '' ?>">
                    <a href="classarchive.php" class="dashboard"><i class="material-icons">book</i><span>Class Archive
                        </span></a>
                </li>


                <li class="logout">
                    <a href="#" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="material-icons">logout</i><span>Logout</span></a>
                </li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to Logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="logout.php" type="button" class="btn btn-danger"> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">


                        <h1>Classes</h1>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">

                                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="material-icons">apps</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="material-icons">person</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="material-icons">settings</span>
                  </a>
                </li> -->
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>



        </div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="njs/jquery-3.3.1.slim.min.js"></script>
    <script src="njs/popper.min.js"></script>
    <script src="njs/bootstrap.min.js"></script>
    <script src="njs/jquery-3.3.1.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebarCollapse").on("click", function() {
                // $("#").toggleClass("active");
                // $("#content").toggleClass("active");
            });

            $(".more-button,.body-overlay").on("click", function() {
                $("#sidebar,.body-overlay").toggleClass("show-nav");
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>