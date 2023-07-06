
<?php 
// Include the database configuration file  
require('session.php');
 $connection = $con;
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $announcement = $_POST['announcement'];
    $title = $_POST['title'];
    $datee = $_POST['datee'];
    $status = 'error'; 

    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = mysqli_query($connection, "INSERT into announcement (image,announcement,title,location,datee) VALUES ('$imgContent','$announcement','$title','$location','$datee')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "<script>alert('Success')</script>"; 
                header('Location:announcement.php');
            }
        }else{ 
                $statusMsg = "<script>alert('Failed')</script>"; 
            }  
        }else{ 
            $statusMsg = "<script>alert('only JPG, JPEG, PNG, & GIF files are allowed to upload')</script>"; 
        } }
    else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 

 
// Display status message 
echo $statusMsg; 
?>