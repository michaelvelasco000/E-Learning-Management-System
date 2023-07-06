<?php

include_once("connection.php");
$connection = connection();
include('session.php');

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learning Materials</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700;800&display=swap');


    .card {
        padding: 15px;
        max-width: auto;
        background: #222;
        font-family: 'Noto Sans', sans-serif;
        border-width: 3px !important;
        border-color: #0019bd !important;
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


    .about {
        margin-top: 10px;
        line-height: 1.6;
    }


    .btn:last-of-type {
        background-color:#0019bd !important;
        border: 1px solid #4f66ff !important;
        border-color: #7ce3ff;
        color: white;
    }

    .btn:hover {
        background: #3b54ff !important;
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
    h1{
        font-family: 'Noto Sans', sans-serif;
        text-align: center;
    }
</style>

<body>
    <?php include('studentsidebar.php'); ?>
<br>
    <h1>·MODULES·</h1>
    
<br>
    <section class="container section__height">

        <div class="container">
            <div class="row">




                <?php
                $query = mysqli_query($connection, "select * from module_class where class_id ='$id'") or die($connection->error);
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['id'];
                    $module = $row['module'];
                ?>

                    <div class="col-md-3">
                        <div class="card mb-3 ">
                            <div class="cover-photo">
                            </div>
                            <br>
                            <p class="about"><b class="text-capitalize"><?php echo 'Title: ' . " " . $row['file_name']; ?><br><?php echo 'Date: ' . " " . date("F d, Y", strtotime($row['date_uploaded'])) ?></b></p><br>
                            <a href="module_uploaded/<?php echo $module ?>" class="btn"><i class="fa fa-download"></i> Download</a>

                        </div>
                    </div>
                <?php } ?>



            </div>

        </div>
    </section>

    </div>
    <?php include('scripts.php'); ?>

</body>

</html>