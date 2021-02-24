<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Result</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="css/font-awesome.min.css">
  	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  </head>
  <body>
    <?php
    require_once 'admin/dbcon.php';
     ?>
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
    			<br><br>
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
            $semes=$_POST['smstr'];
          	$roll=$_POST['roll'];
          	$query=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class' and `roll`='$roll' and `semester`='$semes';");
          	$dbdata=mysqli_fetch_assoc($query);
            $rquery=mysqli_query($link,"SELECT * FROM `reslt` WHERE `class`='$class' and `roll`='$roll'and `semester`='$semes';");
          	$rdbdata=mysqli_fetch_assoc($rquery);
          	if (mysqli_num_rows($query)) {?>
          		<div class="row justify-content-center">
          			<div class="col-sm-12 " id="printrslt">
    							<img src="images/pust.png" alt="Pabna University of Science & Technology" class="float-left img-thumbnail" style="max-width: 150px;margin-bottom: 10px;">
    							<h1 class="text-center text-danger">Pabna University of Science & Technology</h1>
    							<h2 class="text-center text-danger">Dept. Of Information and Communication Engineering</h2>
    							<h3 class="text-center text-danger"><?php echo "Result of ".$class." Year ".$semes." Semester ".date('Y'); ?></h3>
    							<br>
          				<table class="table table-bordered table-striped table-hover text-center">
    								<tr>
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
          						<td><?php echo $dbdata['semester']; ?></td>
          					</tr>
                  </table>
                  <div class="col-sm-12 text-center text-light" style="padding:10px;background: #3CA9E8;">
                    <h2>Marks</h2>
                  </div>
                  <table class="table table-bordered table-striped table-hover text-center">
                    <tr>
                      <td>Course Name</td>
                      <td>Marks</td>
                      <td>Grade Point</td>
                    </tr>
    								<?php
    								$rolq=$dbdata['roll'];
                    $classq=$dbdata['class'];
                    $semq=$rdbdata['semester'];
    								$quer1=mysqli_query($link,"SELECT * FROM `reslt` WHERE `roll`='$rolq';");
    								$quer2=mysqli_query($link,"SELECT DISTINCT `course_name` FROM `courses` WHERE `class`='$classq' and `semester`='$semq';");
                    $numrows=mysqli_num_rows($quer2);
                    $rowq=mysqli_fetch_assoc($quer1);
                    while($rowqq=mysqli_fetch_assoc($quer2)){$coursename[]=$rowqq['course_name'];}
                    $marks[0]=$rowq['crs1'];$grd[0]=$rowq['g1'];
                    $marks[1]=$rowq['crs2'];$grd[1]=$rowq['g2'];
                    $marks[2]=$rowq['crs3'];$grd[2]=$rowq['g3'];
                    $marks[3]=$rowq['crs4'];$grd[3]=$rowq['g4'];
                    $marks[4]=$rowq['crs5'];$grd[4]=$rowq['g5'];
                    for ($i=0; $i < $numrows; $i++) {?>
                      <tr>
            						<td><?php echo $coursename[$i]; ?></td>
            						<td><?php echo $marks[$i]; ?></td>
                        <td><?php echo $grd[$i]; ?></td>
            					</tr>
                    <?php }
    								 ?>
                   </table>
                     <div class="col-sm-12 text-center text-light" style="padding:10px;background: #3CA9E8;">
                       <h2>CGPA Information</h2>
                     </div>
                     <table class="table table-bordered table-striped table-hover text-center">
                       <tr>
                         <td colspan="2">CiGi</td>
                         <td><?php echo $rowq['cigi']; ?></td>
                       </tr>
                       <tr>
                         <td colspan="2">Earned Credit</td>
                         <td><?php echo $rowq['tcr']; ?></td>
                       </tr>
                     <tr>
                       <td colspan="2">CGPA</td>
                       <td><?php echo $rowq['cgpa']; ?></td>
                     </tr>
          				</table>
          			</div>
    						<button type="button" name="button" onclick="prf('printrslt')" class="btn btn-success">Print Result</button>
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
    	<script>
    	function printpdf(){
    		window.print()=document.body.innerHTML;
    	}
    	function prf(paravalue){
    		var backup=document.body.innerHTML;
    		var divcntnt=document.getElementById(paravalue).innerHTML;
    		document.body.innerHTML= divcntnt;
    		window.print();
    		document.body.innerHTML= backup;
    	}
    	</script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/jquery-3.5.1.js"></script>
  		<script src="js/jquery.dataTables.min.js"></script>
  		<script src="js/dataTables.bootstrap4.min.js"></script>
  		<script src="js/script.js"></script>
  </body>
</html>
