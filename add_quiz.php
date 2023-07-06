<?php

include_once("connection.php");

include('session.php');

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
					<div class="card" style="min-height: px">

						<div class="container">


							<form class="form-horizontal" method="post">
								<div class="row">
									<div class="col-md-6 pl-4">
										<div class="control-group text-center">
											<label class="control-label" for="inputEmail">Quiz Title</label>
											<div class="controls">
												<input class="form-control" type="text" name="quiz_title" id="inputEmail" placeholder="Quiz Title">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="control-group text-center">
											<label class="control-label " for="inputPassword">Quiz Description</label>
											<div class="controls">
												<input class="form-control" type="text" class="span8" name="description" id="inputPassword" placeholder="Quiz Description" required>
											</div>
										</div>
									</div>
								</div>

								<div class="container">
									<div class="control-group">
										<div class="controls ">
											<button name="save" type="submit" class="btn btn-success"><i class="icon-save "></i> Save</button>
											<a href="teacher_quiz.php" class="btn btn-info "><i class="icon-arrow-left"></i> Back</a>
										</div>
									</div>
								</div>

							</form>
							<?php
							if (isset($_POST['save'])) {
								$quiz_title = $_POST['quiz_title'];
								$description = $_POST['description'];
								mysqli_query($connection, "insert into quiz (quiz_title,quiz_description,date_added,teacher_id) values('$quiz_title','$description',NOW(),'$session_id')") or die($conn->error);
							?>
								<script>
									window.location = 'teacher_quiz.php';
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


</body>

</html>