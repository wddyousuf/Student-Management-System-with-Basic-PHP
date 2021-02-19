<?php
require_once 'dbcon.php';
  $id=base64_decode($_GET['id']);
  mysqli_query($link,"DELETE FROM `user` WHERE `id`='$id';");
  header('location: index.php?page=alluser')
 ?>
