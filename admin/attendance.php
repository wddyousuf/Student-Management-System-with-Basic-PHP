<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

$curr_date= date('Y-m-d');
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
<?php if(isset($scss_msg)){ echo  '<div class="alert alert-success">'.$scss_msg.'</div>';}?>
<?php if(isset($atnd_error)){ echo  '<div class="alert alert-success">'.$atnd_error.'</div>';}?>

<?php
if (isset($_POST['sbmtatnd'])) {
	$classsfetch=mysqli_query($link,"SELECT * FROM `student_info`;");
	$rrowfetch=mysqli_fetch_assoc($classsfetch);
	$atnd=$_POST['actionn'];
	$aid=$rrowfetch['id'];
	$aname=$rrowfetch['name'];
	$aroll=$rrowfetch['roll'];
	$classs=$rrowfetch['class'];
	$seme=$rrowfetch['semester'];

	$acheck=mysqli_query($link,"SELECT DISTINCT `time` FROM `attendance`;");
	$bfetch=mysqli_fetch_assoc($acheck);
	if ($bfetch['time']==$curr_date) {
		$atnd_error="Attendance Already Taken";
	}else {
		foreach ($atnd as $at_key => $at_value) {
			if ($at_value=="Present") {
				$attts=mysqli_query($link,"INSERT INTO `attendance`(`class`,`semester`,`roll`,`attend`,`time`) VALUES ('$classs','$seme','$at_key','Present',now());");
			}elseif ($at_value=="Absent") {
				$attts=mysqli_query($link,"INSERT INTO `attendance`(`class`,`semester`,`roll`,`attend`,`time`) VALUES ('$classs','$seme','$at_key','Absent',now());");
			}elseif($at_value=="Leave") {
				$attts=mysqli_query($link,"INSERT INTO `attendance`(`class`,`semester`,`roll`,`attend`,`time`) VALUES ('$classs','$seme','$at_key','Leave',now());");
			}
		}
		if (isset($attts)) {
			$scss_msg="Data Inserted Successfully";
			}
	}
}

 ?>

<?php
require_once 'dbcon.php';
if (isset($_POST['showinfo'])) {
	$class=$_POST['class'];
	$sem=$_POST['semester'];
	$classfetch=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class' and `semester`='$sem';");
	if (mysqli_num_rows($classfetch)) {?>
		<div class="col-sm-12 text-center bg-secondary text-white" style="padding-top: 18px;">
			<?php echo "Date: ".$curr_date; ?>
			<br><br>
		</div>
		<div class=" col-sm-12 table-responsive text-center">
			<br>
			<form class="form-group" action="" method="post">
				<table id="data" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Roll</th>
						<th>Class</th>
						<th>Action</th>
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
							<div class="form-group">
								<input type="radio" name="actionn[<?php echo $rowfetch['roll']; ?>]" value="Present" id="present">
								<label for="present">Present</label>
							</div>
							<div class="form-group">
								<input type="radio" name="actionn[<?php echo $rowfetch['roll']; ?>]" value="Absent" id="absent">
								<label for="absent">Absent</label>
							</div>
							<div class="form-group">
								<input type="radio" name="actionn[<?php echo $rowfetch['roll']; ?>]" value="Leave" id="leave">
								<label for="leave">Leave</label>
							</div>

					</td>
				</tr>
		<?php }?>
	</tbody>
	</table>
			<br><br>
			<div class="col-sm-12">
			<div class="row float-right">
					<input type="submit" name="sbmtatnd" value="Submit Attendance" class="btn btn-success">
		</form>
		</div>
		</div>
		</div>
<?php
	}
}

 ?>
