<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>

</head>

<body>
    <link rel="stylesheet" href="nsb/assets/css/styless.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


 
    <header>

        <nav class="nav container">
            <div class="container">


                <div class="container" style="display: none;">
                    <?php echo $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>
                </div>

                <header class="header" id="header">
                    <nav class="nav container">

                        <a href="#" class="nav__logo" style="font-family: Times New Roman;"> <img
                                src="img/dagatanlogo.png" alt="" class="" style=" height:50px; width:50px; ">DAGATAN SHS
                        </a>

                        <div class="nav__menu" id="nav-menu">
                            <ul class="nav__list">


                                <li class="nav__item">
                                    <a href="studentclass.php"
                                        class="nav__link <?= $page == 'studentclass.php' ? 'active-link' : '' ?> ">
                                        <i class='bx bx-user nav__icon'></i>
                                        <span class="nav__name">Class</span>
                                    </a>
                                </li>

                                <li class="nav__item">
                                    <a href="studentOverallgrade.php"
                                        class="nav__link <?= $page == 'studentOverallgrade.php' ? 'active-link' : '' ?> ">
                                        <i class='bx bx-stats nav__icon'></i>
                                        <span class="nav__name">Overall Grades</span>
                                    </a>
                                </li>

                                <li class="nav__item">
                                    <a href="arclass.php"
                                        class="nav__link <?= $page == 'arclass.php' ? 'active-link' : '' ?>">
                                        <i class='bx bx-book-alt nav__icon'></i>
                                        <span class="nav__name">Archive Class</span>
                                    </a>
                                </li>





                                <li class="nav__item">
                                    <a href="logout.php" class="nav__link">
                                        <i class='bx bx-briefcase-alt nav__icon'></i>
                                        <span class="nav__name">Logout</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <?php


$conn = connection();
error_reporting(0);
$get_id = $_GET['id'];
$query = mysqli_query($connection, "select * from student where student_id = '$session_id' ") or die($connection->error);
while ($row = mysqli_fetch_array($query)) {
    $student_id = $row['student_id'];


?>



                        <img src="uploads/<?php echo $row['location']; ?>" alt="" class="nav__img">
                    </nav>
                    <?php } ?>
                </header>

                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="students.php" class="nav-link active">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentclass.php" class="nav-link active">
                                Class
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentOverallgrade.php" class="nav-link active">
                                Overall Grades
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link active">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>



            </div>


        </nav>
    </header>
    <div style="position: relative; background-color:aquamarine; top:0%; width:100%;">
    <?php $query = mysqli_query($connection, "select * from student where student_id = '$session_id' ") or die($connection->error);
    while ($row = mysqli_fetch_array($query)) {
        $student_id = $row['student_id'];


    ?>
   
    <p class="text-center text-white" style="background-color: #2f448c;"> <span style="font-size: 20px;"><?php echo $row['lastname'] ." ". $row['firstname']." ". $row['middle_name']?> </span> </p>
    <?php }?>
   </div>
</body>

<script src="nsb/assets/js/main.js"></script>

</html>