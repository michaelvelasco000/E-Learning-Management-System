<?php
require_once('../connection.php');
require('../session.php');



    if(isset($_POST['updatedata']))
    {   
     

        $scc = $_POST['subject_id'];
        $sc = $_POST['subject_code'];
        $st = $_POST['subject_title'];
        $c = $_POST['category'];

        $query= "UPDATE subject SET subject_code = '$sc', subject_title ='$st' , category = '$c' WHERE subject_code = '$scc' ";
        
        $query_run = mysqli_query($connection, $query);

        if
        ($query_run)
        {
           
           echo '<script> alert("Data Updated"); </script>';
           header('Location: subjects.php'); 
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>      