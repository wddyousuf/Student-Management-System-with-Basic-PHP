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
    	<div class="container-fluid bg-warning">
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
      <div class="container-fluid bg-info">
        <div class="container" style="min-height:950px;">
    			<div class="col-sm-12">
            <br>
      			<br>
      			<h1 class="main_header text-center text-white">Welcome to Student Management System</h1>
      			<br>
            <br>
      			<br>
            <br>
      			<br>
      			<div class="row justify-content-center text-center ">
      				<div class="col-md-3 ">
                <a href="admin/login.php" class="btn btn-light text-primary" style="padding: 50px;">Login</a>
      				</div>
              <div class="col-md-3 ">
                <a href="admin/register.php" class="btn btn-light text-primary" style="padding: 45px;">Register</a>
      				</div>

      			</div>
      			<br><br>
          </div>
    		</div>
      </div>
      </div>
    <footer class="footer-area">
			<p>Copyright &copy; 2016 - <?= date('Y') ?> Student Management System.All Rights Reserved.</p>
		</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
