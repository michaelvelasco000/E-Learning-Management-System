<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        
        require ('../connection.php');
        $conn=connection();

        if (isset($_GET['email']) && isset($_GET['reset_token'])) {

            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            
            $email = $_GET['email'];    
            $reset_token = $_GET['reset_token'];

            $sql="SELECT * FROM student WHERE email = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
            $result = $conn->query($sql);

            
            $sqll="SELECT * FROM teacher WHERE email = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
            $resultt = $conn->query($sqll);

                if ($result->num_rows == 1) {
                    echo '
                        <div class="container d-flex justify-content-center mt-5 pt-5">
                            <div class="card mt-5" style="width:500px">
                                <div class="card-header">
                                    <h1 class="text-center">Creat New Password</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mt-2">
                                            <label for="Password">Password : </label>
                                            <input type="password" name="Password" class="form-control" placeholder="Create New Password">
                                            <input type="password" name="Passwordd" class="form-control mt-1" placeholder="Confirm New Password">
                                            <input type="hidden" name="email" class="form-control" value='.$email.'>
                                        </div>
                                        <div class="mt-4 text-end">
                                            <input type="submit" name="update" value="update" class="btn btn-primary">
                                            <a href="../index.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>';
                }
             else 
                if ($resultt->num_rows == 1) {
                    echo '
                        <div class="container d-flex justify-content-center mt-5 pt-5">
                            <div class="card mt-5" style="width:500px">
                                <div class="card-header">
                                    <h1 class="text-center">Creat New Password</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mt-2">
                                            <label for="Password">Password : </label>
                                            <input type="password" name="Password" class="form-control" placeholder="Create New Password">
                                            <input type="password" name="Passwordd" class="form-control mt-1" placeholder="Confirm New Password">
                                            <input type="hidden" name="email" class="form-control" value='.$email.'>
                                        </div>
                                        <div class="mt-4 text-end">
                                            <input type="submit" name="updatte" value="update" class="btn btn-primary">
                                            <a href="../index.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                
            }

        
        }else{
            echo "
                <script>
                    alert('server down!!');
                    window.location.href='../index.php'
                </script>";
        }
        
        if (isset($_POST['update'])) {
            $pass = $_POST['Password'];
            $pass2 = $_POST['Passwordd'];
            $email = $_POST['email'];
            if($pass==$pass2)
            {
            $update = "UPDATE student SET password='$pass',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";

            if ($conn->query($update)===TRUE) {
                echo "
                    <script>
                        alert('New Password Created Successfully');
                        window.location.href='../index.php'                
                        </script>"; 
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
                echo "
                    <script>
                    alert('Password not updated');
                    window.location.href='../index.php'                     
                    </script>";
            }
        }else{
            echo "
            <script>
                alert('Password not match');               
                </script>"; 
        }
  
        } 

        if (isset($_POST['updatte'])) {
            $pass = $_POST['Password'];
            $pass2 = $_POST['Passwordd'];
            $email = $_POST['email'];
            if($pass==$pass2)
            {
                $updatee = "UPDATE teacher SET password='$pass',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";

                if($conn->query($updatee)===TRUE){
                     echo "
                     <script>
                         alert('New Password Created Successfully');
                         window.location.href='../index.php'                
                         </script>"; 
                 }else{
                     echo "Error: ".$sql."<br>".$conn->error;
                     echo "
                         <script>
                         alert('Password not updated');
                         window.location.href='../index.php'                     
                         </script>";
                 }
            }else{
                echo "
                <script>
                    alert('Password not match');               
                    </script>"; 
            }
      
        } 
    ?>
</body>
</html>