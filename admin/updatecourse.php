<?php
error_reporting(0);
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-edit"></i> Update Course <small class="text-muted"> Update Listed Course</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=allstudent"><i class="fa fa-users"></i> All Students</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-edit"></i> Update Course</li>
	</ol>
</nav>
<?php

  $id=base64_decode($_GET['id']);
  $db_data=mysqli_query($link,"SELECT * FROM `courses` WHERE `id`='$id';");
  $db_row=mysqli_fetch_assoc($db_data);


  if (isset($_POST['submitdata'])) {
    $name=$_POST['name'];
    $iddd=$_POST['idd'];
    $class=$_POST['class'];
    $smstr=$_POST['semester'];


    $query="UPDATE `courses` SET `course_name`='$name',`course_id`='$iddd',`class`='$class',`semester`='$smstr' WHERE `id`='$id';";
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
        <label for="stroll">Course Code</label>
        <input type="text" name="idd" id="stroll" class="form-control" placeholder="Enter Course Code" required="" value="<?php echo $db_row['course_id']; ?>">
      </div>
      <div class="form-group">
        <label for="stname">Course Name</label>
        <input type="text" name="name" id="stname" class="form-control" placeholder="Enter Student Name" required="" value="<?php echo $db_row['course_name']; ?>">
      </div>
      <div class="form-group">
        <label for="stclass">Student Class</label>
        <select class="form-control" name="class" id="stclass" required="" >
          <option value="" disabled>Select</option>
          <option <?php echo $db_row['class']=='1st' ? 'selected=""':''; ?> value="1st">1st Year</option>
          <option <?php echo $db_row['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd Year</option>
          <option <?php echo $db_row['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd Year</option>
          <option <?php echo $db_row['class']=='4th' ? 'selected=""':''; ?> value="4th">4th Year</option>
        </select>
      </div>
			<div class="form-group">
				<label for="choose" >Select semester</label>
          <select class="form-control" name="semsester" id="choose" required="">
            <option value="" disabled>Select</option>
            <option <?php echo $db_row['semester']=='1st' ? 'selected=""':''; ?> value="1st">1st Semester</option>
            <option <?php echo $db_row['semester']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd Semester</option>
          </select>
      </div>
      <div class="form-group">
        <input type="submit" name="submitdata" class="form-control btn btn-success" value="Update Student">
      </div>
    </form>
  </div>
</div>
