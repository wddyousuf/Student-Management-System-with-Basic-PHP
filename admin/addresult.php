<h1 class="text-primary"> <i class="fa fa-edit"></i> Add Result <small class="text-muted"> Add Result Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Add Result</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';
if (isset($_POST['submitresult'])) {
  $rid=$_POST['id'];
  $rname=$_POST['name'];
  $rroll=$_POST['roll'];
  $rsem=$_POST['choose'];
  $rgpa=$_POST['gpa'];
  $rclass=$_POST['choose1'];
  $rquery=mysqli_query($link,"INSERT INTO `result`(`id`, `name`, `roll`,`class`, `semester`, `point`) VALUES ('$rid','$rname','$rroll','$rclass','$rsem','$rgpa');");
  if ($rquery) {
    header("location: index.php?page=addresult");
  }
}

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
        if (mysqli_num_rows($query)) {?>
      		<div class="row justify-content-center">
      			<div class="col-sm-8 ">
              <form class="form-group" action="" method="post">
                <table class="table table-bordered table-hover text-center">
                  <tr>
                    <td>Id</td>
                    <td><input class="form-control" type="number" id="idd" name="id" placeholder="001" value="<?php echo $dbdata['id']; ?>"></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td><input class="form-control" type="name" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $dbdata['name']; ?>"></td>
                  </tr>
                  <tr>
                    <td>Roll</td>
                    <td><input class="form-control" type="number" id="roll" name="roll" pattern="[0-9]{6}" placeholder="160601" value="<?php echo $dbdata['roll']; ?>"></td>
                  </tr>
                  <tr>
      							<td>Class</td>
      							<td>
      								<select class="form-control" name="choose1" id="choose1">
      									<option value="">Select</option>
                        <option <?php echo $dbdata['class']=='1st' ? 'selected=""':''; ?> value="1st">1st Year</option>
                        <option <?php echo $dbdata['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd Year</option>
                        <option <?php echo $dbdata['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd Year</option>
                        <option <?php echo $dbdata['class']=='4th' ? 'selected=""':''; ?> value="4th">4th Year</option>
      								</select>
      							</td>
      						</tr>
                  <tr>
                    <td>Semester</td>
                    <td>
                      <select class="form-control" name="choose" id="choose">
      									<option value="">Select</option>
      									<option value="1st">1st Semester</option>
      									<option value="2nd">2nd Semester</option>
      								</select>
                    </td>
                  </tr>
                  <tr>
                    <td>CGPA (Out of 4.00)</td>
                    <td><input class="form-control" type="text" id="gpa" name="gpa" placeholder="3.80"></td>
                  </tr>
                  <tr>
      							<td colspan="2"><input class="btn btn-primary" type="submit" value="Submit Result" name="submitresult"></td>
      						</tr>
                </table>
              </form>
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
