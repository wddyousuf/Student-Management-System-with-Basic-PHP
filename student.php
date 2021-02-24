<?php require_once 'admin/dbcon.php';


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0" >
	<title>Student Management System</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<body>

    <div class="container-fluid  bg-info">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student.php">Student Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="result.php">Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="atndnc.php">Attendance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notice.php">Notice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher.php">Teacher</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
		<div class="container" style="min-height:900px;">



			<br>
			<br>
			<h1 class="main_header text-center text-primary">Welcome to Student Management System</h1>
			<br>

			<div class="row justify-content-center text-center">
				<div class="col-md-6 ">
					<form action="" method="POST">
					<table class="table table-bordered">
						<tr>
							<td colspan="2"><label>Student Management System</label></td>
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
							<td><label for="choose">Choose Semester</label></td>
							<td>
								<select class="form-control" name="smstr" id="smstr">
									<option value="">Select</option>
									<option value="1st">1st Semester</option>
									<option value="2nd">2nd Semester</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="roll">Roll No</label></td>
							<td> <input class="form-control" type="text" id="roll" name="roll" pattern="[0-9]{6}" placeholder="160601"> </td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-primary" type="submit" value="Show Info" name="show_info"></td>
						</tr>
					</table>

					</form>
				</div>

			</div>
			<br><br>

<?php
if (isset($_POST['show_info'])) {
	$class=$_POST['choose'];
  $sem=$_POST['smstr'];
	$roll=$_POST['roll'];

	$query=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class' and `roll`='$roll' and `semester`='$sem';");
	$dbdata=mysqli_fetch_assoc($query);
	if (mysqli_num_rows($query)) {?>
		<div class="row justify-content-center">
			<div class="col-sm-8 ">
				<table class="table table-bordered table-hover text-center">
					<tr>
						<td rowspan="7"> <img src="admin/stimages/<?php echo $dbdata['photo']; ?>" alt="" class="img-thumbnail" style="width: 150px;"> </td>
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
						<td><?php echo $sem; ?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?php echo $dbdata['city']; ?></td>
					</tr>
					<tr>
						<td>Contact No</td>
						<td><?php echo $dbdata['pcontact']; ?></td>
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
    <footer class="footer-area">
			<p>Copyright &copy; 2016 - <?= date('Y') ?> Student Management System.All Rights Reserved.</p>
		</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
