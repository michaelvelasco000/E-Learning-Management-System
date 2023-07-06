<?php
error_reporting(0);
include('connection.php');
$conn =connection();
if (isset($_POST['backup_delete'])){
$get_id=$_GET['id'];
$id=$_POST['selector'];
$N = is_array($id) ? count($id) : 0 ;
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM class_quiz where class_quiz_id='$id[$i]'")or die('errorDeleteClassQuiz');
}
?>
<script>
	window.location = "class_quiz.php<?php echo '?id='.$get_id; ?>"
</script>
<?php
}
?>