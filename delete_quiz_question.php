<?php
error_reporting(0);
include('connection.php');
$conn = connection();
if (isset($_POST['backup_delete'])){
$id=$_POST['selector'];
$get_id=$_POST['get_id'];
$N = is_array($id) ? count($id) : 0 ;
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM quiz_question where quiz_question_id='$id[$i]'");
}
?>
<script>
	window.location = 'quiz_question.php<?php echo '?id='.$get_id ?>';
</script>
<?php
}
?>