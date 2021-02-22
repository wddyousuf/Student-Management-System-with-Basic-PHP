<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-users"></i> All Students <small class="text-muted"> All Students info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-users"></i> All Student</li>
	</ol>
</nav>
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
