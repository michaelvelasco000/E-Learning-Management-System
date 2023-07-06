<?php
session_start();
include('../connection.php');
$connection = connection();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include('sidebar.php'); ?>

    <main id="content">

        <div class="container">
            <div class="row-fluid">

                <a href="department.php" class="btn btn-success "><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>


            </div>
            <?php
            if (isset($_GET['id'])) {
                $dept = mysqli_query($connection, "SELECT * FROM department where dep_id = {$_GET['id']}");
                foreach (mysqli_fetch_array($dept) as $k => $v) {
                    $$k = $v;
                }
            }
            ?>
            <form class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Department:</label>
                    <div class="controls">
                        <input type="text" name="d" id="inputPassword" placeholder="Department" value="<?php echo isset($department) ? $department : '' ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Person In Charge:</label>
                    <div class="controls">
                        <input type="text" name="p" value="<?php echo isset($incharge) ? $incharge : '' ?>" id="inputPassword" placeholder="Person In Charge" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Title:</label>
                    <div class="controls">
                        <input type="text" name="t" id="inputPassword" value="<?php echo isset($title) ? $title : '' ?>" placeholder="Title" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">

                        <button type="submit" name="updatedata" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Department</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['save'])) {


                $d = $_POST['d'];
                $p = $_POST['p'];
                $t = $_POST['t'];


                if (empty($_POST['id']))
                    mysqli_query($connection, "insert into department (department,incharge,title) values ('$d','$p','$t')") or die($connection->error);
                else
                    mysqli_query($connection, "UPDATE department set department = '$d',incharge = '$p',title = '$t' where dep_id = {$_POST['id']} ") or die($connection->error);

                echo ('<script>location.href="department.php"</script>');
            }
            ?>
        </div>
        </main>

</body>

</html>