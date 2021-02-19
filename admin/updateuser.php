<h1 class="text-primary"> <i class="fa fa-edit"></i> Update User <small class="text-muted"> Update Listed User</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=alluser"><i class="fa fa-users"></i> All Users</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Update User</li>
	</ol>
</nav>
<?php
require_once 'dbcon.php';
$id=base64_decode($_GET['id']);
$db_data=mysqli_query($link,"SELECT * FROM `user` WHERE `id`='$id';");
$db_row=mysqli_fetch_assoc($db_data);


if (isset($_POST['submitdata'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $status=$_POST['status'];



  $query="UPDATE `user` SET `name`='$name',`email`='$email',`status`='$status' WHERE `id`='$id';";
  $result=mysqli_query($link,$query);
  if ($result) {
    header('location: index.php?page=alluser');
  }
}
?>


<div class="row">
  <div class="col-sm-4">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="stname">User Name</label>
        <input type="text" name="name" id="stname" class="form-control" placeholder="Enter User Name" required="" value="<?php echo $db_row['name']; ?>">
      </div>
      <div class="form-group">
        <label for="stroll">User Email</label>
        <input type="email" name="email" id="stroll" class="form-control" placeholder="Enter User Email" required="" value="<?php echo $db_row['email']; ?>">
      </div>
      <div class="form-group">
        <label for="stclass">Status</label>
        <input type="text" name="status" id="stclass" class="form-control" required="" value="<?php echo $db_row['status']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" name="submitdata" class="form-control btn btn-success" value="Update User">
      </div>
    </form>
  </div>
</div>
