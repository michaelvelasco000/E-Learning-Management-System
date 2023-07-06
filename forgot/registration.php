<?php 

    require ('../connection.php');
    $conn=connection();
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendmail($email,$reset_token){
        
        require ('Mailer/src/PHPMailer.php');
        require ('Mailer/src/Exception.php');
        require ('Mailer/src/SMTP.php');

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = 'dagatanshsotp@gmail.com';
            $mail->Password   = 'ysldqhymqhxqofdc';                    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
            $mail->Port       = 465;                           

            $mail->setFrom('dagatanshsotp@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset link';
            $mail->Body    = "we got a request form you to reset Password! <br>Click the link bellow: <br>
            <a href='http://localhost/elmsdagatan/forgot/updatePassword.php?email=$email&reset_token=$reset_token'>reset password</a>";

            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }
    }

    
 
    if (isset($_POST['send-link'])) {
        
        $email = $_POST['email'];

        $sql="SELECT * FROM teacher WHERE email = '$email'";
        $result = $conn->query($sql);
        
        $sqll ="SELECT * FROM student WHERE email = '$email'";
        $resultt = $conn->query($sqll);

            
            if ($row = $result->fetch_assoc()) {
                
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata');
                $date = date("Y-m-d");

                $reset = "UPDATE teacher SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

                if (($conn->query($reset)===TRUE) && sendmail($email,$reset_token )===TRUE) {
                        echo "
                            <script>
                                alert('Password reset link send to mail.');
                                window.location.href='../index.php'    
                            </script>"; 
                    }else{
                        echo "
                            <script>
                                alert('No Email Existed');
                                window.location.href='forgotPassword.php'
                            </script>";
                    }

            }else if($row = $resultt->fetch_assoc()){

                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata');
                $date = date("Y-m-d");

                $resett = "UPDATE student SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

                if (($conn->query($resett)===TRUE) && sendmail($email,$reset_token )===TRUE) {
                        echo "
                            <script>
                                alert('Password reset link send to mail.');
                                window.location.href='../index.php'    
                            </script>"; 
                    }else{
                        echo "
                            <script>
                                alert('No Email Existed');
                                window.location.href='forgotPassword.php'
                            </script>";
                    }

            }
    
}