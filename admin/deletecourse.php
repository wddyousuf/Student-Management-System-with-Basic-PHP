<?php
require_once 'dbcon.php';
if (!isset($_SESSION['user_login'])) {
  header('location: login.php');
}
  $id=base64_decode($_GET['id']);
  mysqli_query($link,"DELETE FROM `courses` WHERE `course_id`='$id';");
  header('location: index.php?page=allcourse')
 ?>
