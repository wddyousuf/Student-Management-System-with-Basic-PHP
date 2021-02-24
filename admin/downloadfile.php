<?php
require_once 'dbcon.php';
if (!isset($_SESSION['user_login'])) {
  header('location: login.php');
}
  if (isset($_GET['name'])) {
    $name=$_GET['name'];
    $query=mysqli_query($link,"SELECT * FROM `notice` WHERE `notice_name`='$name';");
    $result=mysqli_fetch_assoc($query);
    $file='notice/'.$result['file'];

    if (file_exists($file)) {
      header('Content-Description: File-Transfer');
      header('Content-Type: application/pdf');
      header('Cache-Control: no-cache, must-revalidate');
      header('Expires: 0');
      header('Content-Disposition: attachment; filename="'.basename($file).'", ');
      header('Content-Length: '.filesize($file));
      header('Pragma: public');
      flush();
      readfile($file);

      exit();

    }
    header('location: index.php?page=viewnotice');
  }
 ?>
