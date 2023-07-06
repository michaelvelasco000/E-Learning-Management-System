
<?php

session_start();
if (!isset($_SESSION['id']) == 0) {
  header('Location:index.php');
  exit;
}
$session_id = $_SESSION['id'];
?>