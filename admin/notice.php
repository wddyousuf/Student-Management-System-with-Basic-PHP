<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}
	require_once 'dbcon.php';
	if (isset($_POST['sbmt'])) {

		$year=$_POST['class'];
		$sem=$_POST['smstr'];
		$ntcnm=$_POST['notice_name'];
		$photo=explode('.',$_FILES['photo']['name']);
		$photo=end($photo);
		$photo_name=$ntcnm.'.'.$photo;
		$query=mysqli_query($link,"INSERT INTO `notice`(`class`, `semester`, `notice_name`, `file`) VALUES ('$year','$sem','$ntcnm','$photo_name');");
		if ($query) {
			move_uploaded_file($_FILES['photo']['tmp_name'],'notice/'.$photo_name);
			header('location: index.php?page=notice');
		}
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-bell"></i> Notice <small class="text-muted"> Notice Section</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=alluser"><i class="fa fa-users"></i> All Users</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-bell"></i> Notice Desk</li>
	</ol>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form class="form-group" action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered text-center">
          <tr>
            <td>Year</td>
						<td>
					    <select class="form-control" name="class" id="stclass" required="">
					       <option value="" disabled>Select</option>
					       <option value="1st">1st Year</option>
					       <option value="2nd">2nd Year</option>
					       <option value="3rd">3rd Year</option>
					       <option value="4th">4th Year</option>
					     </select>
						</td>
          </tr>
					<tr>
            <td>Semester</td>
						<td>
					    <select class="form-control" name="smstr" id="smstr" required="">
					       <option value="" disabled>Select</option>
					       <option value="1st">1st Semester</option>
					       <option value="2nd">2nd Semester</option>
					     </select>
						</td>
          </tr>
					<tr>
						<td>Notice Name</td>
						<td> <input type="text" name="notice_name" value="" placeholder="Ex: NoticeAboutExam" class="form-control"  required> </td>
					</tr>
					<tr>
						<td>Notice</td>
						<td> <input type="file" id="photo" class="form-control " name="photo"> </td>
					</tr>
					<tr>
						<td colspan="2"> <input type="submit" name="sbmt" value="Upload Notice" class="form-control btn btn-success"> </td>
					</tr>
        </table>
      </form>
    </div>
  </div>
</div>
