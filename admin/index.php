<?php
require_once'dbcon.php';
	session_start();
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0" >
	<title>Student Management System</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">

</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index.php?page=dashboard">SMS</a>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php?page=dashboard"><i class="fa fa-user"></i> Welcome</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="register.php"><i class="fa fa-user-plus"></i> Add User</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="index.php?page=userprofile"><i class="fa fa-user"></i> Profile</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Log Out</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-sm-3">
					<div class="list-group">
					  <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
							<i class="fa fa-dashboard"></i>
						     Dashboard
					  </a>
					  <a href="index.php?page=addstudent" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
					  <a href="index.php?page=updatestudent" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Update Student</a>
					  <a href="index.php?page=allstudent" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
					  <a href="index.php?page=alluser" class="list-group-item list-group-item-action disabled"><i class="fa fa-users"></i> All users</a>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="content">
						<?php
						if (isset($_GET['page'])) {
							$page=$_GET['page'].'.php';
						}else{
							$page="dashboard.php";
						}

						if (file_exists($page)) {
							require_once $page;
						}else {
							require_once '404.php';
							//echo "<h1 class='text-danger'>File Not Found!!!</h1>";
						}
						 ?>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer-area">
			<p>Copyright &copy; 2016 - <?= date('Y') ?> All Rights Reserved.</p>
		</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-3.5.1.js"></script>
		<script src="../js/jquery.dataTables.min.js"></script>
		<script src="../js/dataTables.bootstrap4.min.js"></script>
		<script src="../js/script.js"></script>
	</body>
</html>
