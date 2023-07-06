<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<?php 
error_reporting(0);
$conn = $con;

?>
<?php $class_quiz_id = $_GET['class_quiz_id']; ?>
<?php $quiz_id = $_GET['quiz_id']; ?>



<?php $query1 = mysqli_query($conn, "select * from student_class_quiz where student_id = '$session_id' and class_quiz_id = '$class_quiz_id' ") or die('errorQuery1');
$count = mysqli_num_rows($query1);
?>

<?php
if ($count > 0) {
} else {
    mysqli_query($conn, "insert into student_class_quiz (class_quiz_id,student_id) values('$class_quiz_id','$session_id')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="src/jq.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script>
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');
    .nextq,
    .s {
        padding: 10px;

    }

    #maincon {
        position: relative;

    }

    #no {
        position: absolute !important;
        top: 50px;
    }

    #quet {
        position: relative !important;
        top: 0px;
    }

    .contain {
        position: relative;
        max-width: 100% !important;
        background-color: #00307d; 
        padding: 2px;
        margin-bottom: 20px;
    }

    .card {
        height: auto;
        padding: 5%;
        background-color: #d6f5ff;
    }

    img {
        position: fixed;
        top: 0;
        height: auto;
        width: 100px;
    }


    .bg {
        position: absolute;
        height: 100vh;
        width: 100%;
    }


    :root {
        --color-black: #232323;
        --color-pink: #8BBCCC;
        --color-dark-pink: #49A7C6;
        --color-purple: #342a47;
        --color-blue: deepskyblue;
        --color-gray: #525252;
        --color-green: #bbe187;

        --transition-fast: 0.1s;
    }
    .txt1{
        font-family: 'Noto Sans', sans-serif;
        color: white !important;
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,700);
/* */
.radio {
    align-items: center;
    margin: 0 35%;
    width: auto;
	background: #454857;
	padding: 3px;
	border-radius: 3px;
	box-shadow: inset 0 0 0 3px rgba(35, 33, 45, 0.3),
		0 0 0 3px rgba(185, 185, 185, 0.3);
	position: relative;
}

.radio input {
	width: auto;
    width: 100%;
	height: 100%;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	outline: none;
	cursor: pointer;
	border-radius: 1px;
	padding: 4px 60px !important;
	background: #00307d;
	color: white;
	font-size: 20px;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
		"Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
		"Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
	transition: all 100ms linear;
}

    .radio input:checked {
	background-image: linear-gradient(180deg, #95d891, #74bbad);
	color: #fff;
	box-shadow: 0 1px 1px #0000002e;
	text-shadow: 0 1px 0px #79485f7a;
    width: 100%;
}

.radio input:before {
	content: attr(label);
	display: inline-block;
	text-align: center;
	width: 100%;
}
@media (max-width: 768px) { 
    .radio{
        margin: 0 10%;
    }
}

</style>


<body>

    <img src="img/quizbg.jpg" alt="" class="bg">
    <?php
    $sqla = mysqli_query($conn, "select * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where class_id = '$get_id' 
										order by date_added DESC ") or die('errorSqla');
    /* $row = mysqli_fetch_array($sqla); */
    $rowa = mysqli_fetch_array($sqla);

    /* $rowa   = $row['quiz_id']; */
    /* $sqla = mysqli_query($conn,"SELECT * FROM class_quiz WHERE course_code = '".$row['course_code']."'"); */

    ?>
    <div class="contain ">
        <img src="img/dagatanlogo.png" alt="" style="position: absolute; top:0;">
        <h4 class="text-center mt-3 txt1">Test Title: <b><?php echo $rowa['quiz_title']; ?></b></h4>
        <p class="text-center txt1 "><b>Description: <?php echo $rowa['quiz_description']; ?></b></p>
    </div>



    <div class="container-fluid" id="maincon">

        <div class="row-fluid">
            <!-- breadcrumb -->

            <!-- end breadcrumb -->

            <!-- block -->



            <?php
            if ($_GET['test'] == 'ok') {
                /* $sqlp = mysqli_query($conn,"SELECT * FROM groupcode WHERE course_code = '".$row['course_code']."'"); */
                $sqlp = mysqli_query($conn, "SELECT * FROM class_quiz WHERE class_quiz_id = '$class_quiz_id'") or die('errorSqlp');
                $rowp = mysqli_fetch_array($sqlp);
                /* mysqli_query($conn,"UPDATE students SET `time-left` = ".$rowp['time']." WHERE stud_id = '".$_SESSION['user_id']."'"); */
                /* echo $rowp['time']; */
                $x = 0;
            ?>
                <!-- ==============================================================================================================================================================================================================================================================================================================                            -->
                <!-- //REMOVE -->
                <!-- <script>
                                    jQuery(document).ready(function() {
                                        var timer = 1;
                                        jQuery(".questions-table input").hide();
                                        setInterval(function() {
                                            var timer = jQuery("#timer").text();
                                            jQuery("#timer").load("timer.ajax.php");
                                            if (timer == 0) {
                                                jQuery(".questions-table input").hide();
                                                jQuery("#submit-test").show();
                                                jQuery("#msg").text("Time's up!!!\nPlease Submit your Answers");
                                            } else {
                                                jQuery(".questions-table input").show();
                                            }
                                        }, 990);
                                    });
                                </script> -->
                <!-- //REMOVE -->

                <!-- ==============================================================================================================================================================================================================================================================================================================                            -->

                <form action="take_test.php<?php echo '?id=' . $get_id; ?>&<?php echo 'class_quiz_id=' . $class_quiz_id; ?>&<?php echo 'test=done' ?>&<?php echo 'quiz_id=' . $quiz_id; ?>" name="testform" method="POST" id="test-form">
                    <?php
                    $sqla = mysqli_query($conn, "select * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where class_id = '$get_id' 
										order by date_added DESC ") or die('errorSqla');
                    /* $row = mysqli_fetch_array($sqla); */
                    $rowa = mysqli_fetch_array($sqla);

                    /* $rowa   = $row['quiz_id']; */
                    /* $sqla = mysqli_query($conn,"SELECT * FROM class_quiz WHERE course_code = '".$row['course_code']."'"); */

                    ?>






                    <script>
                        jQuery(document).ready(function() {
                            jQuery(".questions").each(function() {
                                jQuery(this).hide();
                            });
                            jQuery("#q_1").show();
                        });
                    </script>
                    <script>
                        jQuery(document).ready(function() {
                            var nq = 0;
                            var qn = 0;
                            jQuery(".nextq").click(function() {
                                qn = jQuery(this).attr('qn');
                                nq = parseInt(qn) + 1;
                                jQuery('#q_' + qn).fadeOut();
                                jQuery('#q_' + nq).show();
                            });
                        });
                    </script>
                    <div class="card text-center">

                    <table class="questions-table table">
<tr>
<th>#</th>
<th>Question</th>
</tr>
<?php
	$sqlw = mysqli_query($conn,"SELECT * FROM quiz_question where quiz_id = '$quiz_id'  ORDER BY RAND()");
	$qt = mysqli_num_rows($sqlw); 
	while($roww = mysqli_fetch_array($sqlw)){
?>
<tr id="q_<?php echo $x=$x+1;?>" class="questions">
<td width="30" id="qa"><?php echo $x;?></td>
<td id="qa">
<?php echo $roww['question_text'];?>
<br>
<hr>
<?php
if($roww['question_type_id']=='2'){
?>  
<div class="radio">
	<input name="q-<?php echo $roww['quiz_question_id'];?>" value="True" type="radio" label="True">
</div>
<div class="radio mt-1">
    <input name="q-<?php echo $roww['quiz_question_id'];?>" value="False" type="radio" label="False">
</div>
<?php
} else if($roww['question_type_id']=='1') {
	$sqly = mysqli_query($conn,"SELECT * FROM answer WHERE quiz_question_id = '".$roww['quiz_question_id']."'");
	while($rowy = mysqli_fetch_array($sqly)){
	if($rowy['choices'] == 'A') {
	?>
    <div class="radio">
	<input name="q-<?php echo $roww['quiz_question_id'];?>" value="A" type="radio" label="A. <?php echo $rowy['answer_text'];?>">
	<?php } else if ($rowy['choices'] == 'B') {?> 
    </div>  
    <div class="radio mt-1">
	<input name="q-<?php echo $roww['quiz_question_id'];?>" value="B" type="radio" label="B. <?php echo $rowy['answer_text'];?>"> 
	<?php } else if ($rowy['choices'] == 'C') {?> 
    </div>
        <div class="radio mt-1">
	 <input name="q-<?php echo $roww['quiz_question_id'];?>" value="C" type="radio" label="C. <?php echo $rowy['answer_text'];?>">
	<?php } else if ($rowy['choices'] == 'D') {?>   
        </div>
        <div class="radio mt-1">                              
	<input name="q-<?php echo $roww['quiz_question_id'];?>" value="D" type="radio" label="D. <?php echo $rowy['answer_text'];?>"> 
        </div>
    <?php
		}
	}
}
?>
<br/>
<button onclick="return false;" qn="<?php echo $x;?>" class="nextq btn btn-success" id="next_<?php echo $x;?>">NEXT QUESTION <i class="icon-arrow-right"></i> </button>
<input type="hidden" name="x-<?php echo $x;?>" value="<?php echo $roww['quiz_question_id'];?>">
</td>
</tr>
<?php
	}
?>
<tr>
<td></td>
<td>
<button class="btn btn-info" id="submit-test" name="submit_answer"><i class="icon-check"></i> Submit Answer</button>
<!-- <input type="submit" value="Submit My Answers"  class="btn btn-info" id="submit-test" name="submit_answer"><br /> -->
</td>
</tr>
</table>
                    </div>
        </div>
    </div>
    <input type="hidden" name="x" value="<?php echo $x; ?>">
    </form>



<?php
            } else if (isset($_POST['submit_answer'])) {
                $x1 = $_POST['x'];
                $score = 0;
                for ($x = 1; $x <= $x1; $x++) {

                    $x2 = $_POST["x-$x"];
                    $q = $_POST["q-$x2"];

                    $sql = mysqli_query($conn, "SELECT * FROM quiz_question WHERE quiz_question_id = " . $x2 . "");
                    $row = mysqli_fetch_array($sql);
                    if ($row['answer'] == $q) {
                        $score = $score + 1;
                    }
                } ?>
    <a href="student_quiz_list.php<?php echo '?id=' . $get_id; ?>"><i class="icon-arrow-left"></i> Back</a>
   
    <?php
                /* echo "Your Percentage Grade is : <b>".$per."%</b>"; */
                mysqli_query($conn, "UPDATE student_class_quiz SET  `grade` = '" . $score . " out of " . ($x - 1) . "' WHERE student_id = '$session_id' and class_quiz_id = '$class_quiz_id'") or die('errorGrade');
    ?>
    <script>
        window.location = 'student_quiz_list.php<?php echo '?id=' . $get_id; ?>';
    </script>
<?php


            } /* else { */
?>

<!-- ==============================================================================================================================================================================================================================================================================================================                            -->

<!-- /block -->

</div>

</div>
<script>
    document.onkeydown = function(e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;

        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }

    }

    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>

<?php 

$id = $get_id;

// Generate a hash of the ID using the sha1() function
$hash = sha1($id);

// Use the hash in the URL
$url = "/items/" . $hash;
?>
<script>
    history.pushState(null, null, "test");
</script>

</body>

</html>