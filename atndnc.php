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
    <div class="container"style="min-height: 920px;">
      <div class="col-sm-12">
        <br><br><br>
        <h1 class="text-primary text-center"> <i class="fa fa-bar-chart"></i> Attendance Check</h1>
        <hr><hr>
        <br><br><br><br>
      	<form class="form-group" action="" method="post">
      			<div class="col-sm-6">
      				<label for="class" >Select Class</label>
      						<select name="class" id="class" class="form-control">
      							<option class="form-control" value="" disabled>select</option>
      							<option class="form-control" value="1st" >1st Year</option>
      							<option class="form-control" value="2nd" >2nd Year</option>
      							<option class="form-control" value="3rd" >3rd Year</option>
      							<option class="form-control" value="4th" >4th Year</option>
      						</select>
      			</div>
      			<div class="col-sm-6">
      				<label for="semester" >Select Semester</label>
      						<select name="semester" id="semester" class="form-control">
      							<option class="form-control" value="" disabled>select</option>
      							<option class="form-control" value="1st" >1st Semester</option>
      							<option class="form-control" value="2nd" >2nd Semester</option>
      						</select>
      			</div>
            <div class="col-sm-6">
              <label for="roll">Roll</label>
              <input type="number" name="roll" placeholder="160601" class="form-control" pattern="[0-9]{6}" id="roll" required>
            </div>
            <div class="col-sm-6">
              <label for="stdate">Start Date</label>
              <input type="date" name="date" class="form-control" id="stdate" required>
            </div>
            <div class="col-sm-6">
              <label for="edate">End Date</label>
              <input type="date" name="edate" id="edate" class="form-control" required>
            </div>
      			<div class="col-sm-4">
      				<br><br>
      					<input type="submit" name="showinfo" value="Show Students" class="btn btn-success">
      			</div>
        </div>
      	</form>
        <?php
           include_once 'admin/dbcon.php';
           if (isset($_POST['showinfo'])) {
           	$class=$_POST['class'];
           	$sem=$_POST['semester'];
            $roll=$_POST['roll'];
           	$sdate=$_POST['date'];
            $edate=$_POST['edate'];
             $query=mysqli_query($link,"SELECT * FROM `attendance` WHERE `roll`='$roll' and `class`='$class' and `semester`='$sem' and `time` BETWEEN '$sdate' and '$edate';");
             if (mysqli_num_rows($query)) {?>
               <div class="row">
                 <div class="col-sm-12">
                   <table class="table table-bordered table-striped text-center">
                     <tr>
                       <td>Date</td>
                       <td>Status</td>
                     </tr>
                     <?php while ($row=mysqli_fetch_assoc($query)) {?>
                       <tr>
                         <td><?= $row['time']; ?></td>
                         <td><?= $row['attend']; ?></td>
                       </tr>
                    <?php } ?>
                   </table>
                 </div>
               </div>
             <?php
           }
         }
         ?>

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
