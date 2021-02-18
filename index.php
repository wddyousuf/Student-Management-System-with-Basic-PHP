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

		<div class="container">
			<br>
			
			<a href="admin/login.php" class="btn btn-primary float-right">Login</a>
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
									<option value="">1st Year</option>	
									<option value="1">1st Year</option>	
									<option value="2">2nd Year</option>	
									<option value="3">3rd Year</option>	
									<option value="4">4th Year</option>	
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

		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
