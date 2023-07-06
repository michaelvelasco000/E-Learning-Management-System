<?php
error_reporting(0);


include('teachersession.php');
$connection = $con;
$get_id = $_GET['id'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
   <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

	<!-- Responsive datatable examples -->
	<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->

</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text">
                            <div class="pull-right">

                                <div class="container ">
                                    <div class="row">
                                        <div class="col col-sm-12">
                                            <a href="teacher_quiz.php" class="btn btn-success"><i class="icon-arrow-left"></i>
                                                Back</a>

                                            <a href="add_question.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info"><i class="icon-plus-sign"></i> Add Question</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="delete_quiz_question.php" method="post">
                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                    <div class="container mt-1 mb-1">
                                        <a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i>Delete</a>
                                    </div>
                                    <?php include('modal_delete_quiz_question.php'); ?>
                                    <thead>
                                        <tr>
                                            <th>Delete</th>
                                            <th>Question Text</th>
                                            <!-- <th>Points</th> -->
                                            <th>Question Type</th>
                                            <th>Answer</th>
                                            <th>Date Added</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "select * FROM quiz_question
										LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
										where quiz_id = '$get_id'  order by date_added DESC ") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id  = $row['quiz_question_id'];
                                        ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td >
                                                    <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php echo $row['question_text']; ?></td>
                                                <td><?php echo $row['question_type']; ?></td>
                                                <td><?php echo $row['answer']; ?></td>
                                                <td><?php echo $row['date_added']; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include('scripts.php'); ?>
    
	<script src="assets/js/pages/datatables.init.js"></script>

</body>

</html>