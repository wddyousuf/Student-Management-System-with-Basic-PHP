<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-book"></i> All Courses <small class="text-muted"> All Courses info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-book"></i> All Courses</li>
	</ol>
</nav>
<div class="table-responsive text-center">
	<table id="data" class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Course Code</th>
			<th>Course Name</th>
			<th>Year</th>
			<th>Semester</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$dbshow=mysqli_query($link,"SELECT * FROM `courses` ;");
			while ($row=mysqli_fetch_assoc($dbshow)) {?>



		<tr>
			<td><?php echo $row['course_id']; ?></td>
			<td><?php echo ucwords($row['course_name']); ?></td>
			<td><?php echo $row['class']; ?></td>
			<td><?php echo $row['semester']; ?></td>
      <td>
        <a href="index.php?page=updatecourse&id=<?php echo base64_encode($row['course_id']); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="deletecourse.php?id=<?php echo base64_encode($row['course_id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
      </td>
		</tr>
		<?php
			}
		 ?>
	</tbody>
</table>
</div>
