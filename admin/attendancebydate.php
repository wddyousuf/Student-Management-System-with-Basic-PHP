<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

$curr_date= date('Y-m-d');
 ?>

<h1 class="text-primary"> <i class="fa fa-bar-chart"></i> View Attendance <small class="text-muted"> View Attendance Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-bar-chart"></i> View Attendance</li>
	</ol>
</nav>
<div class="col-sm-6">
	<form class="form-group" action="" method="post">
			<div class="col-sm-6">
				<label for="class" >Select Class</label>
						<select name="class" id="class" class="form-control">
							<option class="form-control" value="">select</option>
							<option class="form-control" value="1st" >1st Year</option>
							<option class="form-control" value="2nd" >2nd Year</option>
							<option class="form-control" value="3rd" >3rd Year</option>
							<option class="form-control" value="4th" >4th Year</option>
						</select>
			</div>
			<div class="col-sm-6">
				<label for="semester" >Select Semester</label>
						<select name="semester" id="semester" class="form-control">
							<option class="form-control" value="">select</option>
							<option class="form-control" value="1st" >1st Semester</option>
							<option class="form-control" value="2nd" >2nd Semester</option>
						</select>
			</div>
			<div class="col-sm-4">
				<br><br>
					<input type="submit" name="showinfo" value="Show Students" class="btn btn-success">
			</div>
		</table>
  </div>
	</form>
  <?php
     include_once 'dbcon.php';
     if (isset($_POST['showinfo'])) {
     	$class=$_POST['class'];
     	$sem=$_POST['semester'];
       $query=mysqli_query($link,"SELECT DISTINCT `time` FROM `attendance` WHERE `class`='$class' and `semester`='$sem';");
       if (mysqli_num_rows($query)) {?>
         <div class="row">
           <div class="col-sm-6">
             <table class="table table-bordered table-striped text-center">
               <tr>
                 <td>Date</td>
                 <td>Action</td>
               </tr>
               <?php while ($row=mysqli_fetch_assoc($query)) {?>
                 <tr>
                   <td><?= $row['time']; ?></td>
                   <td>
                     <a href="index.php?page=viewattendance&date=<?php echo base64_encode($row['time']); ?>&class=<?php echo base64_encode($class); ?>&semester=<?php echo base64_encode($sem); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Update Attendance</a>
                   </td>
                 </tr>
              <?php } ?>
             </table>
           </div>
         </div>
       <?php
     }
   }
   ?>
