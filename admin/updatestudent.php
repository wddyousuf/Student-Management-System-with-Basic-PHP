<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-edit"></i> Update Student <small class="text-muted"> Update Listed Student</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=allstudent"><i class="fa fa-users"></i> All Students</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Update Student</li>
	</ol>
</nav>
<?php

  $id=base64_decode($_GET['id']);
  $db_data=mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$id';");
  $db_row=mysqli_fetch_assoc($db_data);


  if (isset($_POST['submitdata'])) {
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $class=$_POST['class'];
    $city=$_POST['city'];
    $contact=$_POST['contact'];


    $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$contact' WHERE `id`='$id';";
    $result=mysqli_query($link,$query);
    if ($result) {
      header('location: index.php?page=allstudent');
    }
  }

?>


<div class="row">
  <div class="col-sm-4">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="stname">Student Name</label>
        <input type="text" name="name" id="stname" class="form-control" placeholder="Enter Student Name" required="" value="<?php echo $db_row['name']; ?>">
      </div>
      <div class="form-group">
        <label for="stroll">Student Roll</label>
        <input type="text" name="roll" id="stroll" class="form-control" placeholder="Enter Student Roll" pattern="[0-9]{6}" required="" value="<?php echo $db_row['roll']; ?>">
      </div>
      <div class="form-group">
        <label for="stclass">Student Class</label>
        <select class="form-control" name="class" id="stclass" required="" >
          <option value="">Select</option>
          <option <?php echo $db_row['class']=='1st' ? 'selected=""':''; ?> value="1st">1st Year</option>
          <option <?php echo $db_row['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd Year</option>
          <option <?php echo $db_row['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd Year</option>
          <option <?php echo $db_row['class']=='4th' ? 'selected=""':''; ?> value="4th">4th Year</option>
        </select>
      </div>
      <div class="form-group">
        <label for="stname">Student City</label>
        <input type="text" name="city" id="stcity" class="form-control" placeholder="Enter Student City" required="" value="<?php echo $db_row['city']; ?>">
      </div>
      <div class="form-group">
        <label for="stcntct">Contact Number</label>
        <input type="text" name="contact" id="stcntct" class="form-control" placeholder="01*********" pattern="01[5|6|7|8|9][0-9]{8}" required="" value="<?php echo $db_row['pcontact']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" name="submitdata" class="form-control btn btn-success" value="Update Student">
      </div>
    </form>
  </div>
</div>
