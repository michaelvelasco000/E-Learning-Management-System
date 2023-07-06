<?php
include('teachersession.php');
$connection = $con;




$get_id = $_GET['id'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Students Grades</title>
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="iconly/bold.css">
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>


    <?php include('teachersidebar.php'); ?>


    <main id="content">

        <div class="container">

            <div class="row p-0">
                <div class="col-md-12 pt-1">

                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <a href="grades.php">
                                    <h1>
                                        <box-icon name='arrow-back'></box-icon>
                                    </h1>
                                </a>
                            </div>
                            <div class="col-11" id="card">
                                <h1 class="">EDIT GRADES</h1>
                            </div>

                        </div>

                        <hr>
                    </div>



                    <?php
                    if (isset($_GET['id'])) {
                        $subject = mysqli_query($connection, "SELECT * FROM student where student_id = {$_GET['id']}");
                        foreach (mysqli_fetch_array($subject) as $k => $v) {
                            $$k = $v;
                        }
                    }
                    ?>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">


                        <div class="row">
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">First Sem</label>
                                    <div class="controls">
                                        <input type="number" name="f" id="inputEmail" placeholder="First Sem" class="form-control" value="<?php echo isset($firstgrading) ? $firstgrading : "" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Second Sem</label>
                                    <div class="controls">
                                        <input type="number" name="s" id="inputEmail" placeholder="Second Sem" class="form-control" value="<?php echo isset($secondgrading) ? $secondgrading : "" ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Third Grading</label>
                                    <div class="controls">
                                        <input type="number" name="t" id="" placeholder="Third Grading" class="form-control" value="<?php echo isset($thirdgrading) ? $thirdgrading : "" ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Fourth grading</label>
                                    <div class="controls">
                                        <input type="number" name="ft" id="inputEmail" placeholder="Fourth grading" class="form-control" required value="<?php echo isset($fourthgrading) ? $fourthgrading : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </form>


                    <?php

                    if (isset($_POST['submit'])) {

                        $f = $_POST['f'];
                        $s = $_POST['s'];
                        $t = $_POST['t'];
                        $ft = $_POST['ft'];





                        mysqli_query($connection, "UPDATE student SET firstgrading = '$f', secondgrading = '$s',thirdgrading='$t',fourthgrading='$ft' where student_id = {$_POST['id']} ") or die($connection->error);

                        echo ('<script>location.href = "grades.php"</script>');
                    }

                    ?>

                </div>
            </div>

        </div>
    </main>
</body>

</html>