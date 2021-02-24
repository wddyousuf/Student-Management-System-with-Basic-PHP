<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}
include_once 'dbcon.php';
$curr_date= date('Y-m-d');

 ?>
<h1 class="text-primary"> <i class="fa fa-bell"></i> Notice <small class="text-muted"> Notice Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-bell"></i> Notice</li>
	</ol>
</nav>
<div class="col-sm-6">
	<form class="form-group" action="" method="post">
			<div class="col-sm-6">
				<label for="class" >Select Class</label>
						<select name="class" id="class" class="form-control">
							<option class="form-control" value="">select</option>
							<option class="form-control" value="1st" >1st Year</option>
							<option class="form-control" value="2nd" >2nd Year</option>
							<option class="form-control" value="3rd" >3rd Year</option>
							<option class="form-control" value="4th" >4th Year</option>
						</select>
			</div>
			<div class="col-sm-6">
				<label for="class" >Select Semester</label>
						<select name="semester" id="semester" class="form-control">
							<option class="form-control" value="">select</option>
							<option class="form-control" value="1st" >1st Semester</option>
							<option class="form-control" value="2nd" >2nd Semester</option>
						</select>
			</div>
			<div class="col-sm-4">
				<br><br>
					<input type="submit" name="showinfo" value="Show Students" class="btn btn-success">
			</div>
		</table>
	</form>
</div>
<div class="table-responsive text-center">
<?php
	if (isset($_POST['showinfo'])) {
		$cls=$_POST['class'];
		$sem=$_POST['semester'];
		$query=mysqli_query($link,"SELECT * FROM `notice` WHERE `class`='$cls' and `semester`='$sem';");?>
	<table id="data" class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Notice Name</th>
			<th>Date</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
      while ($row=mysqli_fetch_assoc($query)) {?>
		<tr>
			<td><?php echo $row['notice_name']; ?></td>
			<td><?php echo $row['time']; ?></td>
			<td> <a href="index.php?page=downloadfile&name=<?php echo $row['notice_name']; ?>"><i class="fa fa-download"></i> Download </a> </td>
		</tr>
		<?php
  }}
		 ?>
	</tbody>
</table>
</div>
<!-- <div id="scroller">
	<iframe name="myiframe" id="myiframe" src="notice/<?php echo $row['file']; ?>">
	<img src="notice/<?php echo $row['file']; ?>
</div> -->
