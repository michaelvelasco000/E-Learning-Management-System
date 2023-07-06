<?php
include('teachersession.php');
$connection = $con;

date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_add'])) {

$class_id = $_POST['class_id'];
$module = $_FILES['module']['name'];
$date_uploaded = date('Y-m-d');
$file_name = $_POST['file_name'];
$description = $_POST['description'];

 //upload file
    if($module != '')
    {
        $ext = pathinfo($module, PATHINFO_EXTENSION);
   
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'mp4'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from module_class';
            $result = mysqli_query($connection, $sql);
            if ($result > 0)
            {
                $row = mysqli_fetch_array($result);
                $module = ($row['id']+1) . '-' . $module;
            }
            else
                $module = '1' . '-' . $module;
            	
            //set target directory
            $path = 'module_uploaded/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['module']['tmp_name'],($path . $module));
            // insert file details into database
     $sql = mysqli_query($connection,"insert into module_class (class_id, file_name, description, module, date_uploaded) VALUES('$class_id','$file_name','$description','$module','$date_uploaded')") or die(mysqli_error($connection));
            

if($sql)
  {
    //echo "Saved";
    $_SESSION['status'] = "Module Added Successfully. Thank you!";
    $_SESSION['status_code'] = "success";
    header("Location: class_module.php?id=$class_id");
  }else
  {
    $_SESSION['status'] = "Error! Please try again";
    $_SESSION['status_code'] = "error";
    header("Location: class_module.php?id=$class_id");
  }
        }
        else
        {
            header("Location: class_module.php?id=$class_id");
        }
    }
    else
        header("Location: class_module.php?id=$class_id");

}
?>


