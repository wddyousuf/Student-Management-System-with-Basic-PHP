<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-edit"></i> Add Result <small class="text-muted"> Add Result Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Add Result</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';
$rcrs1=0;$rcr1=0;$g1=0;
$rcrs2=0;$rcr2=0;$g2=0;
$rcrs3=0;$rcr3=0;$g3=0;
$rcrs4=0;$rcr4=0;$g4=0;
$rcrs5=0;$rcr5=0;$g5=0;
if (isset($_POST['submitresult'])) {
  $rid=$_POST['id'];
  $rname=$_POST['name'];
  $rroll=$_POST['roll'];
  $rsem=$_POST['choose'];
  $rcrs1=$_POST['course1'];
	$rcr1=$_POST['credit1'];
  $rclass=$_POST['choose1'];
	$rcrs2=$_POST['course2'];
	$rcr2=$_POST['credit2'];
	$rcrs3=$_POST['course3'];
	$rcr3=$_POST['credit3'];
	if (null !==$_POST['crsno']) {
		if ($_POST['crsno']=5) {
			$rcrs4=$_POST['course4'];
			$rcr4=$_POST['credit4'];
			$rcrs5=$_POST['course5'];
			$rcr5=$_POST['credit5'];
		}
	}
	if (null !==$_POST['crsno']) {
		if ($_POST['crsno']=4) {
			$rcrs4=$_POST['course4'];
			$rcr4=$_POST['credit4'];
		}
	}
	print_r($rcrs5);
	if ($rcrs1<0 or $rcrs1>100) {
		$crs1="Please Enter Valid Marks";
	}elseif ($rcrs1<=100 and $rcrs1>=80) {
		$g1=4.00;
	}elseif ($rcrs1<80 and $rcrs1>=75) {
		$g1=3.75;
	}elseif ($rcrs1<75 and $rcrs1>=70) {
		$g1=3.50;
	}elseif ($rcrs1<70 and $rcrs1>=65) {
		$g1=3.25;
	}elseif ($rcrs1<65 and $rcrs1>=60) {
		$g1=3.00;
	}elseif ($rcrs1<60 and $rcrs1>=55) {
		$g1=2.75;
	}elseif ($rcrs1<55 and $rcrs1>=50) {
		$g1=2.50;
	}elseif ($rcrs1<50 and $rcrs1>=45) {
		$g1=2.25;
	}elseif ($rcrs1<45 and $rcrs1>=40) {
		$g1=2.00;
	}elseif ($rcrs1<40 and $rcrs1>=0) {
		$g1=0.00;
	}
	if ($rcrs2<0 or $rcrs2>100) {
		$crs2="Please Enter Valid Marks";
	}elseif ($rcrs2<=100 and $rcrs2>=80) {
		$g2=4.00;
	}elseif ($rcrs2<80 and $rcrs2>=75) {
		$g2=3.75;
	}elseif ($rcrs2<75 and $rcrs2>=70) {
		$g2=3.50;
	}elseif ($rcrs2<70 and $rcrs2>=65) {
		$g2=3.25;
	}elseif ($rcrs2<65 and $rcrs2>=60) {
		$g2=3.00;
	}elseif ($rcrs2<60 and $rcrs2>=55) {
		$g2=2.75;
	}elseif ($rcrs2<55 and $rcrs2>=50) {
		$g2=2.50;
	}elseif ($rcrs2<50 and $rcrs2>=45) {
		$g2=2.25;
	}elseif ($rcrs2<45 and $rcrs2>=40) {
		$g2=2.00;
	}elseif ($rcrs2<40 and $rcrs2>=0) {
		$g2=0.00;
	}
	if ($rcrs3<0 or $rcrs3>100) {
		$crs3="Please Enter Valid Marks";
	}elseif ($rcrs3<=100 and $rcrs3>=80) {
		$g3=4.00;
	}elseif ($rcrs3<80 and $rcrs3>=75) {
		$g3=3.75;
	}elseif ($rcrs3<75 and $rcrs3>=70) {
		$g3=3.50;
	}elseif ($rcrs3<70 and $rcrs3>=65) {
		$g3=3.25;
	}elseif ($rcrs3<65 and $rcrs3>=60) {
		$g3=3.00;
	}elseif ($rcrs3<60 and $rcrs3>=55) {
		$g3=2.75;
	}elseif ($rcrs3<55 and $rcrs3>=50) {
		$g3=2.50;
	}elseif ($rcrs3<50 and $rcrs3>=45) {
		$g3=2.25;
	}elseif ($rcrs3<45 and $rcrs3>=40) {
		$g3=2.00;
	}elseif ($rcrs3<40 and $rcrs3>=0) {
		$g3=0.00;
	}
	if ($rcrs4<0 or $rcrs4>100) {
		$crs4="Please Enter Valid Marks";
	}elseif ($rcrs4<=100 and $rcrs4>=80) {
		$g4=4.00;
	}elseif ($rcrs4<80 and $rcrs4>=75) {
		$g4=3.75;
	}elseif ($rcrs4<75 and $rcrs4>=70) {
		$g4=3.50;
	}elseif ($rcrs4<70 and $rcrs4>=65) {
		$g4=3.25;
	}elseif ($rcrs4<65 and $rcrs4>=60) {
		$g4=3.00;
	}elseif ($rcrs4<60 and $rcrs4>=55) {
		$g4=2.75;
	}elseif ($rcrs4<55 and $rcrs4>=50) {
		$g4=2.50;
	}elseif ($rcrs4<50 and $rcrs4>=45) {
		$g4=2.25;
	}elseif ($rcrs4<45 and $rcrs4>=40) {
		$g4=2.00;
	}elseif ($rcrs4<40 and $rcrs4>=0) {
		$g4=0.00;
	}
	if ($rcrs5<0 or $rcrs5>100) {
		$crs5="Please Enter Valid Marks";
	}elseif ($rcrs5<=100 and $rcrs5>=80) {
		$g5=4.00;
	}elseif ($rcrs5<80 and $rcrs5>=75) {
		$g5=3.75;
	}elseif ($rcrs5<75 and $rcrs5>=70) {
		$g5=3.50;
	}elseif ($rcrs5<70 and $rcrs5>=65) {
		$g5=3.25;
	}elseif ($rcrs5<65 and $rcrs5>=60) {
		$g5=3.00;
	}elseif ($rcrs5<60 and $rcrs5>=55) {
		$g5=2.75;
	}elseif ($rcrs5<55 and $rcrs5>=50) {
		$g5=2.50;
	}elseif ($rcrs5<50 and $rcrs5>=45) {
		$g5=2.25;
	}elseif ($rcrs5<45 and $rcrs5>=40) {
		$g5=2.00;
	}elseif ($rcrs5<40 and $rcrs5>=0) {
		$g5=0.00;
	}
	$cigi=$rcr1*$g1+$rcr2*$g2+$rcr3*$g3+$rcr4*$g4+$rcr5*$g5;
	$tcr=$rcr1+$rcr2+$rcr3+$rcr4+$rcr5;
	$cgpa=$cigi/$tcr;
  $rquery=mysqli_query($link,"INSERT INTO `reslt`(`id`, `name`, `roll`, `class`, `semester`, `crs1`, `g1`, `cr1`, `crs2`, `g2`, `cr2`, `crs3`, `g3`, `cr3`, `crs4`, `g4`, `cr4`, `crs5`, `g5`, `cr5`, `cigi`, `tcr`, `cgpa`) VALUES ('$rid','$rname','$rroll','$rclass','$rsem','$rcrs1','$g1','$rcr1','$rcrs2','$g2','$rcr2','$rcrs3','$g3','$rcr3','$rcrs4','$g4','$rcr4','$rcrs5','$g5','$rcr5','$cigi','$tcr','$cgpa');");
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
									<option value="" disabled>Select</option>
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
							<td><label for="crsno">Number of Course</label></td>
							<td>
								<select class="form-control" name="crsno" id="crsno" required="">
									<option value="" disabled>Select</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-primary" type="submit" value="Proceed" name="submit"></td>
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
      									<option value="" disabled>Select</option>
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
                      <select class="form-control" name="choose" id="choose" required="">
      									<option value="" disabled>Select</option>
      									<option value="1st">1st Semester</option>
      									<option value="2nd">2nd Semester</option>
      								</select>
                    </td>
                  </tr>
                  <?php if (isset($_POST['crsno']))
									// print_r($_POST['crsno']);
									$crsnumber=$_POST['crsno'];
									for ($i=1; $i <= $crsnumber; $i++) {?>
										<tr>
	                    <td>Cousre No <?= $i ?></td>
	                    <td><input class="form-control" type="number" name="course<?php echo $i; ?>" placeholder="75" required=""></td>
	                  </tr>
										<tr>
	                    <td>Credit of Cousre No <?= $i ?> </td>
	                    <td><input class="form-control" type="number" name="credit<?php echo $i; ?>" placeholder="75" required="" step="0.01"></td>
	                  </tr>

									<?php
									}
									 ?>


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
