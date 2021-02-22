<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}
include_once 'dbcon.php';
$curr_date= date('Y-m-d');
$date=base64_decode($_GET['date']);
$class=base64_decode($_GET['class']);
$sem=base64_decode($_GET['semester']);
$db_data=mysqli_query($link,"SELECT * FROM `attendance` WHERE `time`='$date' and `class`='$class' and `semester`='$sem';");


 ?>
<h1 class="text-primary"> <i class="fa fa-bar-chart"></i> View Attendance <small class="text-muted"> View Attendance Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-bar-chart"></i> View Attendance</li>
	</ol>
</nav>

<div class="row">
  <div class="col-sm-12 text-center bg-secondary text-white" style="padding-top: 18px;">
    <?php echo "Attendance of Date: ".$date; ?>
    <br><br>
  </div>
  <div class="col-sm-12">
    <form class="form-group" action="" method="post">
      <table class="table table-bordered table-striped text-center">
        <tr>
          <td>Roll</td>
          <td>Name</td>
          <td>Class</td>
          <td>Semester</td>
          <td>Action</td>
        </tr>
        <?php while ($db_row=mysqli_fetch_assoc($db_data)) {
          $i=$db_row['roll'];
          $classsfetch=mysqli_query($link,"SELECT * FROM `student_info` WHERE `roll`='$i';");
          $rrowfetch=mysqli_fetch_assoc($classsfetch);

          ?>


        <tr>
          <td><?php echo $db_row['roll']; ?></td>
          <td><?php echo $rrowfetch['name']; ?></td>
          <td><?php echo $db_row['class']; ?></td>
          <td><?php echo $db_row['semester']; ?></td>
          <td>
            <select class="form-control" name="atnd[<?php echo $db_row['roll']; ?>]">
              <option value="">Select</option>
              <option <?php echo $db_row['attend']=='Present' ? 'selected=""':''; ?> value="Present">Present</option>
              <option <?php echo $db_row['attend']=='Absent' ? 'selected=""':''; ?> value="Absent">Absent</option>
              <option <?php echo $db_row['attend']=='Leave' ? 'selected=""':''; ?> value="Leave">Leave</option>
            </select>
          </td>
        </tr>
        <?php } ?>
      </table>
      <input type="submit" name="submt" value="Update Attendance" class="btn btn-success">
    </form>
  </div>
</div>
<?php
if (isset($_POST['submt'])) {
$atnds=$_POST['atnd'];
foreach ($atnds as $at_key => $at_value) {
  if ($at_value=="Present") {
    $attts=mysqli_query($link,"UPDATE `attendance` SET `attend`='Present' WHERE `roll`='$at_key' and `time`='$date';");
  }elseif ($at_value=="Absent") {
    $attts=mysqli_query($link,"UPDATE `attendance` SET `attend`='Absent' WHERE `roll`='$at_key' and `time`='$date';");
  }elseif($at_value=="Leave") {
    $attts=mysqli_query($link,"UPDATE `attendance` SET `attend`='Leave' WHERE `roll`='$at_key' and `time`='$date';");
  }
}
}
 ?>
