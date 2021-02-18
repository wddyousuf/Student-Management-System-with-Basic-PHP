<?php
require_once 'dbcon.php';
session_start();
	if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$photo_name=$username.'.'.$photo;

	$input_error = array();

	if (empty($name)) {
		$input_error['name']="Name is required";
	}
	if (empty($email)) {
		$input_error['email']="Email is required";
	}
	if (empty($username)) {
		$input_error['username']="Username is required";
	}
	if (empty($password)) {
		$input_error['password']="Password is required";
	}
	if (empty($cpassword)) {
		$input_error['cpassword']="Confirm Password Field is required";
	}
	if (empty($photo)) {
		$input_error['photo']="Photo is required";
	}

	if (count($input_error)==0) {
		$email_check=mysqli_query($link,"SELECT * FROM `user` WHERE `email`='$email';");
		if (mysqli_num_rows($email_check)==0) {
			$username_check=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username';");
			if (mysqli_num_rows($username_check)==0) {
					if (strlen($username)>7) {
							if (strlen($password)>5) {
								if ($password==$cpassword) {
									$password=md5($password);
									$query="INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
									$result=mysqli_query($link,$query);
									if ($result) {
										$_SESSION['data_insert_success']="Data Insert Successful";
										move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
										header('location: register.php');
									}else {
										$_SESSION['data_insert_failure']="Data Insert Failed";
									}

								}else {
									$cpass_error="Password did not match";
								}
							}else {
								$pass_error="Password Should be atleast 6 character";
							}
					}else {
						$userchar_error="Username Should be atleast 8 character";
					}
			}
			else {
				$username_error="Username Already exists";
			}
		}else {
			$email_error="This Email address is already exists";
		}
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

		<div class="container">
			<br>
			<h1 class="text-center text-primary">User Registration Form</h1>
			<?php if (isset($_SESSION['data_insert_success'])) {
				echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';
			} unset($_SESSION['data_insert_success']); ?>
			<?php if (isset($_SESSION['data_insert_failure'])) {
				echo '<div class="alert alert-warning">'.$_SESSION['data_insert_failure'].'</div>';
			} unset($_SESSION['data_insert_failure']); ?>
			<hr><br>
			<div class="row justify-content-center">
				<div class="col-sm-12">
					<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2 " for="name">Name</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="text" id="name" class="form-control " name="name" placeholder="Enter Your Name" value="<?php if (isset($name)) {echo $name;} ?>">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['name'])) {
										echo $input_error['name'];
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 " for="email">Email</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="email" id="email" class="form-control " name="email" placeholder="Enter Your Email" value="<?php if (isset($email)) {echo $email;} ?>">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['email'])) {
										echo $input_error['email'];
									}
								?>
							</label>
							<label class="error">
								<?php
									if (isset($email_error)) {
										echo $email_error;
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 " for="username">Username</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="text" id="username" class="form-control " name="username" placeholder="Enter Your Username" value="<?php if (isset($username)) {echo $username;} ?>">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['username'])) {
										echo $input_error['username'];
									}
								?>
							</label>
							<label class="error">
								<?php
									if (isset($username_error)) {
										echo $username_error;
									}
								?>
							</label>
							<label class="error">
								<?php
									if (isset($userchar_error)) {
										echo $userchar_error;
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 " for="password">Password</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="password" id="password" class="form-control " name="password" placeholder="Enter Your Password" value="<?php if (isset($password)) {echo $password;} ?>">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['password'])) {
										echo $input_error['password'];
									}
								?>
							</label>
							<label class="error">
								<?php
									if (isset($pass_error)) {
										echo $pass_error;
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 " for="cpassword">Confirm Password</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="password" id="cpassword" class="form-control " name="cpassword" placeholder="Enter Password again" value="<?php if (isset($cpassword)) {echo $cpassword;} ?>">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['cpassword'])) {
										echo $input_error['cpassword'];
									}
								?>
							</label>
							<label class="error">
								<?php
									if (isset($cpass_error)) {
										echo $cpass_error;
									}
								?>
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2 " for="photo">Photo</label>
							<div class="col-sm-4 d-inline-flex">
								<input type="file" id="photo" class="form-control " name="photo">
							</div>
							<label class="error">
								<?php
									if (isset($input_error['photo'])) {
										echo $input_error['photo'];
									}
								?>
							</label>
						</div>
						<div class="col-sm-4" style="margin-left: 120px;">
							<input type="submit" class="form-control pull-right btn btn-success justify-content-center" name="submit" value="Register" >
						</div>
					</form>
					<div>
						<br><br>
						<p class="text-center col-sm-6">Already have an account? <a href="login.php">Login</a></p>
					</div>
				</div>
			</div>
			<hr>
			<footer>
				<p>Copyright &copy; 2016 - <?= date('Y') ?> All Rights Reserved.</p>
			</footer>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
