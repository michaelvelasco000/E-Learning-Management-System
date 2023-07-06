<?php
error_reporting(0);

include('teachersession.php');
$connection = $con;
$get_id = $_GET['id'];
$user_query = mysqli_query($connection, "select * from teacher where teacher_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);
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
<style>
	#kard {
		border-radius: 10px !important;
	}
</style>

<body>
	<!-- Button trigger modal -->


	<!-- Modal -->

	<?php include('sidebar.php'); ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white " id="exampleModalLabel">Add Quiz</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post">


						<div class="control-group ">
							<label class="control-label" for="inputEmail">Quiz Title</label>
							<div class="controls">
								<input class="form-control" type="text" name="quiz_title" id="inputEmail" placeholder="Quiz Title">
							</div>
						</div>


						<div class="control-group ">
							<label class="control-label " for="inputPassword">Quiz Description</label>
							<div class="controls">
								<input class="form-control" type="text" class="span8" name="description" id="inputPassword" placeholder="Quiz Description" required>
							</div>
						</div>



				


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
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="save" class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div class="main-content">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
					
						<div class="card-header card-header-text">
						<h4 class="card-title">Quiz</h4>
                            <p class="category text-muted">DAGATAN SENIOR HIGH SCHOOL</p>
                            <hr>
							<div class="pull-right pt-4 pl-2 pb-3">
								<a type="button " class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal""><i class=" icon-plus-sign"></i> Add Quiz</a>
								<a href="add_quiz_to_class.php" class="btn btn-success"><i class="icon-plus-sign"></i> Add Quiz to Class</a>
								<a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i>DELETE</a>
							</div>

							<form action="delete_quiz.php" method="post">
								<table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">

									<?php include('modal_delete_quiz.php'); ?>
									<thead>
										<tr>
											<th></th>
											<th>Quiz title</th>
											<th>Description</th>
											<th>Date Added</th>
											<th>Questions</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$query = mysqli_query($conn, "select * FROM quiz where teacher_id = '$session_id'  order by date_added DESC ") or die($conn->error);
										while ($row = mysqli_fetch_array($query)) {
											$id  = $row['quiz_id'];
										?>
											<tr id="del<?php echo $id; ?>">
												<td width="30">
													<input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['quiz_title']; ?></td>
												<td><?php echo $row['quiz_description']; ?></td>
												<td><?php echo $row['date_added']; ?></td>
												<td><a href="quiz_question.php<?php echo '?id=' . $id; ?>" class="btn btn-success">Questions</a></td>
												
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

	<script src="assets/js/pages/datatables.init.js"></script>

</body>

</html>