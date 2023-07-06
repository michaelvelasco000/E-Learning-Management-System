<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
require_once 'Mailer/src/Exception.php';
require_once 'Mailer/src/PHPMailer.php';
require_once 'Mailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['save'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $department = $_POST['department'];
        $day = $_POST['day'];
        $day1 = implode(",", $day);
        $empid = $_POST['empid'];


        


        try{


            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
    
            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $_FILES["image"]["name"]);
            $location = "../uploads/" . $_FILES["image"]["name"];
    
            $queryone = mysqli_query($connection, "SELECT * from teacher where user_idlogin = '$empid' AND  status = 0") or die($connection->error);
            if (mysqli_num_rows($queryone) > 0) {
                echo ('<script>alert("DATA EXISTED");</script>');
                echo ('<script>location.href = "teachers.php"</script>');
            } else {
                mysqli_query($connection, "insert into teacher (username,password,firstname,lastname,middlename,department,location,day,user_idlogin)
                values ('$username','$password','$firstname','$lastname','$middlename','$department','$location','$day1','$empid')         
    ") or die($connection->error);
                echo ('<script>location.href = "teachers.php"</script>');
            }

            $mail->isSMTP();
            $mail->Host ='smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dagatanhigh@gmail.com';
            $mail->Password = 'hqxshopoiovytdlz';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';

            $mail->setFrom('dagatanhigh@gmail.com');
            $mail->addAddress($username);

            $mail->isHTML(true);
            $mail->Subject = 'YOUR ACCOUNT WAS CREATED';
            $mail->Body = "<div style='background-color:red;'>Your  USER-ID is:  $empid </div> <br> Your Password Account is: $password <br> You can now access your account";

            $mail->send();
            $alert = "<div class='alert-success'><span>Message sent</span></div>";
        }catch(Exception $e){
            $alert = "<div class='alert-danger'><span>'" .$e->getMessage(). "'</span></div>";
        }

        
}
