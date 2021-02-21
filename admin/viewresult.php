<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-area-chart"></i> View Result <small class="text-muted"> View Result Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=addresult"><i class="fa fa-edit"></i> Add Result</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-area-chart"></i> View Result</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';


 ?>

		<div class="container">
			<br>
			<br>

			<div class="row justify-content-center text-center">
				<div class="col-md-6 ">
					<form action="" method="POST">
					<table class="table table-bordered">
						<tr>
							<td colspan="2"><label>Student Result Management System</label></td>
						</tr>
						<tr>
							<td><label for="choose">Choose Class</label></td>
							<td>
								<select class="form-control" name="choose" id="choose">
									<option value="">Select</option>
									<option value="1st">1st Year</option>
									<option value="2nd">2nd Year</option>
									<option value="3rd">3rd Year</option>
									<option value="4th">4th Year</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="roll">Roll No</label></td>
							<td> <input class="form-control" type="text" id="roll" name="roll" pattern="[0-9]{6}" placeholder="160601"> </td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-primary" type="submit" value="Show Info" name="submit"></td>
						</tr>
					</table>

					</form>
				</div>

			</div>
      <br><br>
      <?php
      if (isset($_POST['submit'])) {
      	$class=$_POST['choose'];
      	$roll=$_POST['roll'];

      	$query=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class' and `roll`='$roll';");
      	$dbdata=mysqli_fetch_assoc($query);
        $rquery=mysqli_query($link,"SELECT * FROM `reslt` WHERE `class`='$class' and `roll`='$roll';");
      	$rdbdata=mysqli_fetch_assoc($rquery);
      	if (mysqli_num_rows($query)) {?>
      		<div class="row justify-content-center">
      			<div class="col-sm-8 ">
      				<table class="table table-bordered table-hover text-center">
      					<tr>
      						<td rowspan="7"> <img src="stimages/<?php echo $dbdata['photo']; ?>" alt="" class="img-thumbnail" style="width: 150px;"> </td>
      						<td>Name</td>
      						<td><?php echo $dbdata['name']; ?></td>
      					</tr>
      					<tr>
      						<td>Roll</td>
      						<td><?php echo $dbdata['roll']; ?></td>
      					</tr>
      					<tr>
      						<td>Year</td>
      						<td><?php echo $dbdata['class']; ?></td>
      					</tr>
                <tr>
      						<td>Semester</td>
      						<td><?php echo $rdbdata['semester']; ?></td>
      					</tr>
      						<td>CGPA</td>
      						<td><?php echo $rdbdata['cgpa']; ?></td>
      					</tr>
      				</table>
      			</div>
      		</div>
      		<?php

      	}else {
      		?>
      		<script type="text/javascript">
      			alert('data not found');
      		</script>
      		<?php
      	}
      }
       ?>
	</div>
