<?php
require_once 'dbcon.php';
session_start();
if (isset($_SESSION['user_login'])) {
	header('location: dashboard.php');
}
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];



	$username_check=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username';");
	if (mysqli_num_rows($username_check)>0) {
		$row=mysqli_fetch_assoc($username_check);
		if ($row['password']==md5($password)) {
			if ($row['status']=='active') {
				$_SESSION['user_login']=$username;
				header('location: index.php');
			}else {
				$inactive="User status is inactive";
			}
		}else {
			$nomatch="Enter correct Password";
		}
	}else {
		$nouser="Username Not Found";
	}
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
</head>
	<body>
		<div class="container ">
			<br>
			<h1 class="text-center text-primary">Student Management System</h1>
			<br>
			<div class="row justify-content-center">
				<div class="col-sm-4">
					<h2 class="text-center text-primary">Admin Login</h2>
					<br><br>
					<form action="login.php" method="POST">
						<div class="mb-2">
							<input type="text" name="username" placeholder="Username" required="" class="form-control" value="<?php if (isset($username)) {echo $username;} ?>">
						</div>
						<div class="mb-2">
							<input type="password" name="password" placeholder="Password" required="" class="form-control" value="<?php if (isset($password)) {echo $password;} ?>">
						</div>
						<div>
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Login">
						</div>
					</form>
					<br>
					<p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
					<br>
					<?php if (isset($nouser)) { echo '<div class="alert alert-danger col-sm-12">'.$nouser.'</div>';} ?>
					<?php if (isset($nomatch)) { echo '<div class="alert alert-danger col-sm-12">'.$nomatch.'</div>';} ?>
					<?php if (isset($inactive)) { echo '<div class="alert alert-danger col-sm-12">'.$inactive.'</div>';} ?>
				</div>
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
