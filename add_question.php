<?php



include 'teachersession.php';
$connection = $con;
$get_id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>




<title>Quiz List</title>
</head>

<body>
    <?php include 'sidebar.php' ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="card" style="min-height: px">

                        <div class="card-header card-header-text">

                            <form class="form-horizontal" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Question</label>
                                    <div class="controls">
                                        <textarea name="question" id="ckeditor_full" required></textarea>
                                    </div>
                                </div>
                                <!-- <div class="control-group">
											<label class="control-label" for="inputEmail">Points</label>
											<div class="controls">

											<input type="number" class="span1" name="points" min=1 max=5 required>
											</div>
										</div> -->
                                <div class="control-group">
                                    <div class="container">
                                        <label class="control-label col-3" for="inputEmail">Question Type:</label>
                                        <div class="controls col-3">
                                            <select id="qtype" name="question_tpye" class="form-control" required>
                                                <option value=""></option>
                                                <?php
                                                $query_question = mysqli_query($conn, "select * from question_type") or die(mysqli_error());
                                                while ($query_question_row = mysqli_fetch_array($query_question)) {
                                                ?>
                                                    <option value="<?php echo $query_question_row['question_type_id']; ?>"><?php echo $query_question_row['question_type']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail"></label>
                                    <div class="controls">
                                        <div id="opt11">
                                            A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
                                            B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
                                            C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
                                            D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
                                        </div>
                                        <div id="opt12">
                                            <input name="correctt" value="True" type="radio">True<br /><br />
                                            <input name="correctt" value="False" type="radio">False<br /><br />
                                        </div>
                                    </div>
                                   
                                </div>
                                

                                <div class="container pb-3 ">
                                    <div class="control-group">
                                        <div class="controls col-3">
                                        <button name="save" type="submit" class="btn btn-info">Save</button>
                                        </div>
                                    </div>
                                </div>


                            </form>

                            <?php
                            if (isset($_POST['save'])) {
                                $question = $_POST['question'];
                                $points = $_POST['points'];
                                $type = $_POST['question_tpye'];
                                $answer = $_POST['answer'];

                                $ans1 = $_POST['ans1'];
                                $ans2 = $_POST['ans2'];
                                $ans3 = $_POST['ans3'];
                                $ans4 = $_POST['ans4'];

                                if ($type == '2') {
                                    mysqli_query($conn, "insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id)
			values('$get_id','$question',NOW(),'" . $_POST['correctt'] . "','$type')") or die(mysqli_error());
                                } else {
                                    mysqli_query($conn, "insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id)
		values('$get_id','$question',NOW(),'$answer','$type')") or die(mysqli_error());
                                    $query = mysqli_query($conn, "select * from quiz_question order by quiz_question_id DESC LIMIT 1") or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
                                    $quiz_question_id = $row['quiz_question_id'];

                                    mysqli_query($conn, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')") or die(mysqli_error());
                                    mysqli_query($conn, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')") or die(mysqli_error());
                                    mysqli_query($conn, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')") or die(mysqli_error());
                                    mysqli_query($conn, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')") or die(mysqli_error());
                                }

                            ?>
                                <script>
                                    window.location = 'quiz_question.php<?php echo '?id=' . $get_id; ?>'
                                </script>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            jQuery("#opt11").hide();
            jQuery("#opt12").hide();
            jQuery("#opt13").hide();

            jQuery("#qtype").change(function() {
                var x = jQuery(this).val();
                if (x == '1') {
                    jQuery("#opt11").show();
                    jQuery("#opt12").hide();
                    jQuery("#opt13").hide();
                } else if (x == '2') {
                    jQuery("#opt11").hide();
                    jQuery("#opt12").show();
                    jQuery("#opt13").hide();
                } else {
                    jQuery("#opt11").hide();
                    jQuery("#opt12").hide();
                    jQuery("#opt13").hide();
                }
            });

        });
    </script>
    <?php include 'scripts.php'; ?>

</body>

</html>