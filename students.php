<?php
$get = $_GET['id'];
include_once("connection.php");
$connection = connection();
include('session.php');
$query = mysqli_query($connection, "select * from student_class where student_id='$session_id'") or die($connection->error);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Classes</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <link rel="stylesheet" href="css/std_home.css">

</head>

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap");

.card {
    padding: 15px;
    max-width: auto;
    background: #222;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
    user-select: none;
}

.cover-photo {
    position: relative;
    background: url(https://i.imgur.com/jxyuizJ.jpeg);
    background-size: cover;
    height: 180px;
    border-radius: 5px 5px 0 0;
}

.profile {
    position: absolute;
    width: 150px;
    height: 150px;
    bottom: -60px;
    left: 15px;
    border-radius: 50%;

    background-color: rgba(0, 104, 500, .75);
    padding: 5px;
}

.profile-name {
    font-size: 20%;
    margin: 25px 0 0 120px;
    color: #007bff;
}

.about {
    margin-top: 30px;
    line-height: 1.6;
}

.btn {
    margin: 0px 15px;
    background: transparent;
    padding: 10px 25px;
    border-radius: 3px;
    border: 1px solid #7ce3ff;
    font-weight: bold;
    font-family: Montserrat;
    cursor: pointer;
    color: #222;
    transition: 0.2s;
}

.btn:last-of-type {
    background: transparent;
    border-color: #7ce3ff;
    color: #7ce3ff;
}

.btn:hover {
    background: #7ce3ff;
    color: #222;
}

.icons {
    width: 180px;
    margin: 0 auto 10px;
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.icons i {
    cursor: pointer;
    padding: 5px;
    font-size: 18px;
    transition: 0.2s;
}

.icons i:hover {
    color: #7ce3ff;
}
</style>

<body>
    <?php include('studentsidebar.php'); ?>



    <section class="container section__height">
<div class="container">
    <div class="row ">
        
        <div class="col-xl-3 col-sm-6 col-12 mb-1">
            <div class="card border-info mx-sm-1">
                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-book"
                        aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3">
                    <h4>CLASS</h4>
                </div>
                <?php

                    $query = "SELECT * FROM student_class where student_id='$session_id'";
                    $query_run = mysqli_query($connection, $query);

                    if ($user_total = mysqli_num_rows($query_run)) {
                        echo '<div class="text-info text-center mt-2"> <h1>' . $user_total . '</h1></div>';
                    } else {
                        echo 'no data';
                    }
                    ?>

            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12 mb-1">
            <div class="card border-info mx-sm-1">
                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-book"
                        aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3">
                    <h4>QUIZ</h4>
                </div>
             
        <?php include_once('s.php');?>

                    

            </div>
        </div>
       

    </div>
    </div>
    </section>
    
</body>

</html>