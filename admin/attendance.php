<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}


 ?>
<h1 class="text-primary"> <i class="fa fa-bar-chart"></i> Attendance <small class="text-muted"> Attendance Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-bar-chart"></i> Attendance</li>
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
			<div class="col-sm-4">
				<br><br>
					<input type="submit" name="showinfo" value="Show Students" class="btn btn-success">
			</div>
		</table>
	</form>
</div>


<?php
require_once 'dbcon.php';
if (isset($_POST['showinfo'])) {
	$class=$_POST['class'];
	$classfetch=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class';");
	//$rowfetch=mysqli_fetch_assoc($classfetch);
	if (mysqli_num_rows($classfetch)) {?>
		<div class="table-responsive text-center">
			<table id="data" class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Roll</th>
					<th>Class</th>
					<th>Action</th>
					<th>Photo</th>
				</tr>
			</thead>
			<tbody>
		<?php

		 while ($rowfetch=mysqli_fetch_assoc($classfetch)) {?>
			<tr>
				<td><?php echo $rowfetch['id']; ?></td>
				<td><?php echo ucwords($rowfetch['name']); ?></td>
				<td><?php echo $rowfetch['roll']; ?></td>
				<td><?php echo $rowfetch['class']; ?></td>
				<td>
					<form class="form-group" action="" method="post">
						<div class="form-group">
							<input type="radio" name="actionn" value="1" id="present">
							<label for="present">Present</label>
						</div>
						<div class="form-group">
							<input type="radio" name="actionn" value="0" id="absent">
							<label for="absent">Absent</label>
						</div>
					</form>
				</td>
				<td> <img style="height: 75px;" src="stimages/<?php echo $rowfetch['photo']; ?>" alt=""> </td>
			</tr>



	<?php }?>
</tbody>
</table>
		<br><br>
		<div class="col-sm-12">
		<div class="row float-right">
			<input type="submit" name="sbmtatnd" value="Submit Attendance" class="btn btn-success">
		</div>
		</div>
		</div>
<?php
	}
}

 ?>
