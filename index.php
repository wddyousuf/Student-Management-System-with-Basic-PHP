<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid bg-info" style="min-height: 960px;">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <br><br><br>
            <h1 class="text-center text-white">Welcome to Student Management System</h1>
          </div>
          <div class="col-sm-12">
            <br>
            <h2 class="text-center text-white">Please Select Your Desired Area From Below</h2>
            <br><br><br>
          </div>
          <div class="col-sm-3 justify-content-center text-center">
            <a href="student.php" class="btn btn-light" style="padding: 45px;">Student Info</a>
          </div>
          <div class="col-sm-3 justify-content-center text-center">
            <a href="result.php" class="btn btn-light" style="padding: 45px;">Result Corner</a>
          </div>
          <div class="col-sm-3 justify-content-center text-center">
            <a href="atndnc.php" class="btn btn-light" style="padding: 45px;">Attendance Corner</a>
          </div>
          <div class="col-sm-3 justify-content-center text-center">
            <a href="Notice.php" class="btn btn-light" style="padding: 45px;">Notice Corner</a>
          </div>
          <div class="col-sm-12">
            <br><br><br>
            <p class="text-center text-white">Not a student? <a href="teacher.php" class="text-light btn btn-danger">Click Here</a></p>
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
