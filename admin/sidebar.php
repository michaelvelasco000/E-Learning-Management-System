<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styless.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <title>ADMIN</title>
    <style>
        body {
            background-color: #F2F7FF !important;
        }

        html {
            scrollbar-width: normal;
            scrollbar-color: #777 #555;
        }

        html::-webkit-scrollbar {
            width: 5px;
        }

        html::-webkit-scrollbar-thumb {
            background-color: #7775;
        }

        html::-webkit-scrollbar-thumb-hover {
            background-color: #777;
        }

        html::-webkit-scrollbar-track {
            background-color: #5555;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">

        <div class="container" style="display: none;">
            <?php echo $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?></div>

        <a href="admin.php" class="brand">

            <img src="../img/dagatanlogo.ico" class=" rounded img-responsive" style="width:100%;"> </img>

        </a>

        <ul class="side-menu top">

            <li class="<?= $page == 'admin.php' ? 'active' : '' ?>">
                <a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Admin Dashboard</span>
                </a>
            </li>



            <li class="<?= $page == 'teachers.php' ? 'active' : '' ?>">
                <a href="teachers.php">
                    <i class='bx bxs-user-badge'></i>
                    <span class="text">Teachers</span>

                </a>
            </li>


            <li class="<?= $page == 'students.php' ? 'active' : '' ?>">
                <a href="students.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="text">Students</span>
                </a>
            </li>
            <li class="<?= $page == 'department.php' ? 'active' : '' ?>">
                <a href="department.php">
                    <i class='bx bxs-school'></i>
                    <span class="text">Department</span>
                </a>
            </li>
            <li class="<?= $page == 'course.php' ? 'active' : '' ?>">
                <a href="course.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="text">Class </span>
                </a>
            </li>
          
            <li class="<?= $page == 'subjects.php' ? 'active' : '' ?>">
                <a href="subjects.php">
                    <i class='bx bxs-book-open'></i>
                    <span class="text">Subjects</span>
                </a>
            </li>

            <li class="<?= $page == 'grades.php' ? 'active' : '' ?>">
                <a href="grades.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Grades</span>

                </a>
            </li>
            <li class="<?= $page == 'teacherclasses.php' ? 'active' : '' ?>">
                <a href="teacherclasses.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Teacher Classes</span>

                </a>
            </li>
            <li class="<?= $page == 'announcement.php' ? 'active' : '' ?>">
                <a href="announcement.php">
                    <i class='bx bxs-megaphone'></i>
                    <span class="text">Announcement</span>

                </a>
            </li>
            <li class="<?= $page == 'useradmin.php' ? 'active' : '' ?>">
                <a href="useradmin.php">
                    <i class='bx bxs-user'></i>
                    <span class="text">Admin Management</span>

                </a>
            </li>
            <li class="<?= $page == 'user_log.php' ? 'active' : '' ?>">
                <a href="user_log.php">
                    <i class='bx bxs-user'></i>
                    <span class="text">User Log</span>

                </a>
            </li>

            <hr>
            <li class="<?= $page == 'archiveTeacher.php' ? 'active' : '' ?>">
                <a href="archiveTeacher.php">
                    <i class='bx bxs-book-open'></i>
                    <span class="text">Teacher Archive</span>
                </a>
            </li>

            <li class="<?= $page == 'archiveStudent.php' ? 'active' : '' ?>">
                <a href="archiveStudent.php">
                    <i class='bx bxs-book-open'></i>
                    <span class="text">Student Archive</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="bx bxs-log-out"></i><span>Logout</span></a>
            </li>

        </ul>


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



    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">

            </form>
            <!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a> -->
            <a href="#" class="profile">


            </a>
        </nav>


    </section>



    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
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
    <script src="../assets/js/pages/datatables.init.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            if (!$.browser.webkit) {
                $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
            }
        });
    </script>
</body>

</html>