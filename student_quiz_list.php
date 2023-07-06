<?php include('header_dasboard.php'); ?>
<?php include('session.php'); ?>

$conn = $con;

?>


<?php $get_id = $_GET['id']; 

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quiz List</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">


</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');


    .card {
        padding: 15px;
        max-width: auto;
        background: #222;
        font-family: 'Noto Sans', sans-serif;
        border-width: 3px !important;
        border-color: #0019bd !important;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
        user-select: none;
    }


    .cover-photo {
        position: relative;
        background: url(https://i.imgur.com/jxyuizJ.jpeg);
        background-size: cover;
        height: 180px;
        border-radius: 5px 5px 0 0;
    }


    .about {
        margin-top: 10px;
        line-height: 1.6;
    }


    .btn:last-of-type {
        background-color:#0019bd !important;
        border: 1px solid #4f66ff !important;
        color: white !important;
        
    }

    .btn:hover {
        background: #3b54ff !important;
        color: #222;
    }

    .icons {
        width: 180px;
        margin: 0 auto 10px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .icons i {
        cursor: pointer;
        padding: 5px;
        font-size: 18px;
        transition: 0.2s;
    }

    .icons i:hover {
        color: #7ce3ff;
    }
    h1{
        font-family: 'Noto Sans', sans-serif;
        text-align: center;
    }
</style>

<body>
    <?php include('studentsidebar.php'); ?>

<br> <h1> ·QUIZZES· </h1>
<br>


    <form method="post">

        <section class="container section__height">

            <div class="conatainer">
                <div class="row">


                    <?php
                    $query = mysqli_query($conn, "select * FROM class_quiz 
                                    LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
                                    where class_id = '$get_id'  order by class_quiz_id DESC ") or die($conn->error);
                    while ($row = mysqli_fetch_array($query)) {
                        $id  = $row['class_quiz_id'];
                        $quiz_id  = $row['quiz_id'];


                        $query1 = mysqli_query($conn, "select * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'");
                        $row1 = mysqli_fetch_array($query1);
                        $grade = $row1['grade'] ?? null;

                    ?>
                        <div class="col-md-3">
                            <div class="card mt-3 ">
                                <div class="cover-photo">
                                </div>
                                <br>
                                <p class="about"><b class="text-capitalize"><?php echo $row['quiz_title'] . "<br>" . $row['quiz_description']; ?> </b></p><br>

                                <?php if ($grade == "") { ?>
                                    <a data-placement="bottom" class="btn" title="Take This Quiz" id="<?php echo $id; ?>Download" href="take_test.php<?php echo '?id=' . $get_id ?>&<?php echo 'class_quiz_id=' . $id; ?>&<?php echo 'test=ok' ?>&<?php echo 'quiz_id=' . $quiz_id; ?>"><i class="icon-check icon-large"></i> Take This Quiz</a>
                                <?php } else { ?>
                                    <b>Already <i><u>TAKEN</i></u> the Quiz <br><i>Score: <?php echo $grade; ?></b></i>
                                <?php } ?>

                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#<?php echo $id; ?>Take This Quiz').tooltip('show');
                                $('#<?php echo $id; ?>Take This Quiz').tooltip('hide');
                            });
                        </script>


                    <?php } ?>

                </div>
            </div>
        </section>
        </div>

    </form>





    <?php include('scripts.php'); ?>

    <!-- /block -->



</body>

</html>