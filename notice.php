<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Notice Section</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="css/font-awesome.min.css">
  	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
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
    <div class="container" style="min-height:920px;">
      <br><br><br>
      <h1 class="text-primary text-center"> <i class="fa fa-bell"></i> Notice Board</h1>
      <hr><hr>
      <br><br><br><br>
      <div class="col-sm-12">
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
      include_once 'admin/dbcon.php';
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
      			<td> <a href="admin/index.php?page=downloadfile&name=<?php echo $row['notice_name']; ?>"><i class="fa fa-download"></i> Download </a> </td>
      		</tr>
      		<?php
        }}
      		 ?>
      	</tbody>
      </table>
      </div>
    </div>
    <footer class="footer-area">
      <p>Copyright &copy; 2016 - <?= date('Y') ?> Student Management System.All Rights Reserved.</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
