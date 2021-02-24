<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-dashboard"></i> Dashboard <small class="text-muted"> Statistics Overview</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-dashboard"></i> Dashboard</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';
$countst=mysqli_query($link,"SELECT * FROM `student_info`");
$stnmbr=mysqli_num_rows($countst);
$countuser=mysqli_query($link,"SELECT * FROM `user`");
$usernmbr=mysqli_num_rows($countuser);
$countcrs=mysqli_query($link,"SELECT * FROM `courses`");
$crsnmbr=mysqli_num_rows($countcrs);
 ?>

	<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header  bg-primary">
					<div class="row text-white">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 ml-auto mr-2">
							<div class=" float-right carddddd"><?php echo $stnmbr; ?></div>
							<div class="clearfix"></div>
							<div class="float-right">Number of Registered Student</div>
						</div>
					</div>
				</div>
				<a href="index.php?page=allstudent">
					<div class="card-footer">
					<span class="float-left">All Students</span>
					<span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
					<div class="clearfix"></div>
				</div>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header  bg-primary">
					<div class="row text-white">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 ml-auto mr-2">
							<div class=" float-right carddddd"><?php echo $usernmbr; ?></div>
							<div class="clearfix"></div>
							<div class="float-right">Number of Registered Admin</div>
						</div>
					</div>
				</div>
				<a href="index.php?page=alluser">
					<div class="card-footer">
					<span class="float-left">All Admins</span>
					<span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
					<div class="clearfix"></div>
				</div>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header  bg-primary">
					<div class="row text-white">
						<div class="col-xs-3">
							<i class="fa fa-book fa-5x"></i>
						</div>
						<div class="col-xs-9 ml-auto mr-2">
							<div class=" float-right carddddd"><?php echo $crsnmbr; ?></div>
							<div class="clearfix"></div>
							<div class="float-right">Number of Registered Courses</div>
						</div>
					</div>
				</div>
				<a href="index.php?page=allcourse">
					<div class="card-footer">
					<span class="float-left">All Courses</span>
					<span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
					<div class="clearfix"></div>
				</div>
				</a>
			</div>
		</div>
	</div>
<hr>
<h3>All Students</h3>
<div class="table-responsive text-center">
	<table id="data" class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Roll</th>
			<th>Class</th>
			<th>Semester</th>
			<th>City</th>
			<th>Contact</th>
			<th>Photo</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$dbshow=mysqli_query($link,"SELECT * FROM `student_info` ;");
			while ($row=mysqli_fetch_assoc($dbshow)) {?>



		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo ucwords($row['name']); ?></td>
			<td><?php echo $row['roll']; ?></td>
			<td><?php echo $row['class']; ?></td>
			<td><?php echo $row['semester']; ?></td>
			<td><?php echo ucwords($row['city']); ?></td>
			<td><?php echo $row['pcontact']; ?></td>
			<td> <img style="height: 75px;" src="stimages/<?php echo $row['photo']; ?>" alt=""> </td>
			<td>
        <a href="index.php?page=updatestudent&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="deletestudent.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
      </td>
		</tr>
		<?php
			}
		 ?>
	</tbody>
</table>
</div>
