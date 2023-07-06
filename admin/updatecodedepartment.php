<?php
require_once('../connection.php');
require('../session.php');



    if(isset($_POST['updatedata']))
    {   
     

        $dep_id = $_POST['dep_id'];
        $department = $_POST['department'];
        $dc = $_POST['dc'];
        $incharge = $_POST['incharge'];
        $title = $_POST['title'];
       
        $query=  "UPDATE department set department = '$department',s_desc = '$dc', incharge = '$incharge',title = '$title' where department = '$dep_id' ";
      
        $query_run = mysqli_query($connection, $query);

        if
        ($query_run)
        {
           
           echo '<script> alert("Data Updated"); </script>';
           header('Location: department.php'); 
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>      