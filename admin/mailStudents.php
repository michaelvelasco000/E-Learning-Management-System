<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'Mailer/src/Exception.php';
require_once 'Mailer/src/PHPMailer.php';
require_once 'Mailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
    $p = $_POST['p'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $mn = $_POST['mn'];
    $sy = $_POST['sy'];
    $e = $_POST['em'];
    $s = $_POST['st'];
    $lrn = $_POST['lrn'];
    $uid = $_POST['uid'];

    try {

        if (!empty($_FILES["image"]["tmp_name"])) {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $_FILES["image"]["name"]);
            $location = "../uploads/" . $_FILES["image"]["name"];
        }

        $queryone = mysqli_query($connection, "SELECT * from student where user_idlogin = '$uid' AND status = 0") or die($connection->error);
        if (mysqli_num_rows($queryone) > 0) {
            echo ('<script>alert("DATA EXISTED")</script>');
            echo ('<script>location.href = "students.php"</script>');
        } else {


            if (empty($_POST['id']))
                mysqli_query($connection, "insert into student (password,firstname,lastname,middle_name,sy,location,email,strand,user_idlogin,lrn)
        values ('$p','$fn','$ln','$mn','$sy','$location','$e','$s',$uid,'$lrn')                                    
        ") or die($connection->error);
            else {
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
        user_idlogin = '$uid',
        lrn = '$lrn';
        $loc
        $pw where student_id = {$_POST['id']}                                    
        ") or die($connection->error);
            }

            echo ('<script>location.href = "students.php"</script>');
        }

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dagatanhigh@gmail.com';
        $mail->Password = 'hqxshopoiovytdlz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('dagatanhigh@gmail.com');
        $mail->addAddress($e);

        $mail->isHTML(true);
        $mail->Subject = 'YOUR ACCOUNT WAS CREATED';
        $mail->Body = "Your USER-ID is:  $uid <br> Your Password Account is: $p <br> You can now access your account";

        $mail->send();
        $alert = "<div class='alert-success'><span>Message sent</span></div>";
    } catch (Exception $q) {
        $alert = "<div class='alert-danger'><span>'" . $q->getMessage() . "'</span></div>";
    }
}
