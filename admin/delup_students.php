<?php
session_start();
include('../connection.php');
$connection = connection();
$get_id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM student where student_id = '$get_id'");
$row_query = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <title>Edit Student</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link rel="stylesheet" href="../src/css/a.css">
</head>

<body>

    <?php include('sidebar.php'); ?>





    <main id="content">



        <div class="container">

            <div class="row-fluid">

                <div class="span12">

                    <div class="hero-unit-3">
                        <div class="col-md-12 pt-1">
                            <div class="alert alert-info ">

                                <strong><i class="icon-user icon-large"></i>&nbsp;Update Student Informartion</strong>
                            </div>
                            <a href="students.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            <br><br>
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
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="control-label" for="">LRN</label>
                                            <div class="controls">
                                                <input type="number" name="lrn" id="inputEmail" placeholder="LRN" class="form-control" value="<?php echo isset($lrn) ? $lrn : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="control-label" for="">user_idlogin</label>
                                            <div class="controls">
                                                <input type="number" name="user_idlogin" id="inputEmail" placeholder="user_idlogin" class="form-control" value="<?php echo isset($user_idlogin) ? $user_idlogin : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">E-mail</label>
                                            <div class="controls">
                                                <input type="text" name="em" id="inputEmail" placeholder="E-mail" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password</label>
                                            <div class="controls">
                                                <input type="password" name="p" id="inputPassword" class="form-control" placeholder="Password || Leave this blank if you dont want to change your password." <?php echo (isset($password)) ? "" : 'required' ?>>
                                                <?php echo (isset($password)) ? "<i>" : '' ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Firstname</label>
                                            <div class="controls">
                                                <input type="text" name="fn" id="inputEmail" placeholder="Firstname" class="form-control" required value="<?php echo isset($firstname) ? $firstname : "" ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Lastname</label>
                                            <div class="controls">
                                                <input type="text" name="ln" id="inputEmail" placeholder="Lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Middle Initial</label>
                                            <div class="controls">
                                                <input type="text" name="mn" id="inputEmail" placeholder="Middle Initial" class="form-control" value="<?php echo isset($middle_name) ? $middle_name : "" ?>" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">School Year</label>
                                            <div class="controls">
                                                <input type="text" name="sy" id="inputEmail" placeholder="School Year" class="form-control" value="<?php echo isset($sy) ? $sy : "" ?>" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Track | Year and Section </label>
                                            <div class="controls">


                                                <select name="st" class="form-control span4" required>
                                                    <option class=" bg-secondary text-white"> <?php echo isset($strand) ? $strand : "" ?></option>
                                                    <?php
                                                    $query = mysqli_query($connection, "select * from course");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option><?php echo $row['cys']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-6">

                                        <div class="control-group">
                                            <label class="control-label" for="input01">Image:</label>
                                            <div class="controls">

                                                <div class="upload-container">
                                                    <input type="file" name="image" class="font">
                                                </div>

                                            </div>
                                        </div>

                                        <img class="rounded" src="../uploads/<?php echo $row_query['location']; ?>" height="50" width="50">
                                    </div>


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

                                $p = $_POST['p'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $mn = $_POST['mn'];
                                $sy = $_POST['sy'];
                                $e = $_POST['em'];
                                $s = $_POST['st'];
                                $lrn = $_POST['lrn'];
                                $user_idlogin = $_POST['user_idlogin'];

                                if (!empty($_FILES["image"]["tmp_name"])) {
                                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);
                                    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $_FILES["image"]["name"]);
                                    $location = "../uploads/" . $_FILES["image"]["name"];
                                }

                                if (empty($_POST['id'])) {
                                    mysqli_query($conn, "insert into student (password,firstname,lastname,middle_name,sy,location,email,strand,user_idlogin,lrn)
                                           values ('$p','$fn','$ln','$mn',$sy,'$location', '$e','$s','$user_idlogin','$lrn')                                    
                                           ") or die($connection->error);
                                } else {
                                    if (!empty($p)) {
                                        $pw = " , password='$p' ";
                                    } else {
                                        $pw = '';
                                    }
                                    if (isset($location)) {
                                        $loc = " , location='$location' ";
                                    } else {
                                        $loc = '';
                                    }
                                    mysqli_query($connection, "UPDATE student set
                                              
                                               firstname = '$fn',
                                               lastname = '$ln',
                                               middle_name = '$mn',
                                               sy = '$sy',
                                               email = '$e',
                                               strand = '$s',
                                               user_idlogin = '$user_idlogin',
                                               lrn = '$lrn'
                                               $loc
                                               $pw where student_id = {$_POST['id']}                                    
                                               ") or die($connection->error);
                                }

                                echo ('<script>location.href = "students.php"</script>');
                            }

                            ?>

                        </div>
                    </div>

                </div>
            </div>

        </div>




    </main>
    <script src="../fileupload.js"></script>
</body>

</html>