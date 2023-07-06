<?php
require_once('../connection.php');
require('../session.php');



    if(isset($_POST['updatedata']))
    {   


        $strand_id = $_POST['strand_id'];
        $strand = $_POST['strand'];
        $sd = $_POST['sd'];


        $query1 = mysqli_query($connection, "SELECT * from strand_list where strands = '$strand'");

       if($query1){
            mysqli_query($connection, "UPDATE strand_list SET strands = '$strand',strand_description ='$sd' WHERE strands = '$strand_id' ");
            echo ('<script>location.href = "courselist.php"</script>');
        }

       

       

      
    }
?>      