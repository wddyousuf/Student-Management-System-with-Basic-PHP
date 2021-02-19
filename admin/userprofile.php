<h1 class="text-primary"> <i class="fa fa-user"></i> User Profile <small class="text-muted"> My Profile</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=alluser"><i class="fa fa-users"></i> All Users</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user"></i> Profile Info</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';
$session_user=$_SESSION['user_login'];
$user_data=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$session_user';");
$db_data=mysqli_fetch_assoc($user_data);

 ?>

<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered table-hover table-striped text-center">
      <tr>
        <td>User Id</td>
        <td><?php echo $db_data['id']; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo ucwords($db_data['name']); ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo $db_data['username']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $db_data['email']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo ucwords($db_data['status']); ?></td>
      </tr>
    </table>
    <a href="index.php?page=updateuser&id=<?php echo base64_encode($db_data['id']); ?>" class="btn btn-success col-sm-7 float-right">Edit Profile</a>
  </div>
  <div class="col-sm-6">
    <a href="#" class="">
      <img src="images/<?php echo $db_data['photo']; ?>" alt="" style="max-height: 300px;" class="img-thumbnail">
    </a>
    <br><br>
<?php
if (isset($_POST['submitphoto'])) {
  $photo=explode('.',$_FILES['photo']['name']);
  $photo= end($photo);
  $photo_name=$session_user.'.'.$photo;

  $upload=mysqli_query($link,"UPDATE `user` SET `photo`='$photo_name' WHERE `username`='$session_user';");
  if ($upload) {
    move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
  }
}

 ?>

    <form class="form-group col-sm-6" action="" method="post" enctype="multipart/form-data">
      <label for="photo" class="form-control">Profile Picture</label>
      <input type="file" name="photo" required="" id="photo" class="form-control">
      <input type="submit" name="submitphoto" value="Change Profile Picture" class="form-control btn btn-success col-sm-12 mt-3">
    </form>
  </div>
</div>
