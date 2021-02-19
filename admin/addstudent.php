<h1 class="text-primary"> <i class="fa fa-user-plus"></i> Add Student <small class="text-muted"> Add New Student</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user-plus"></i> Add Student</li>
	</ol>
</nav>

<?php
if (isset($_POST['submitdata'])) {
  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $class=$_POST['class'];
  $city=$_POST['city'];
  $contact=$_POST['contact'];

  $photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$photo_name=$roll.'.'.$photo;
  $query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$contact','$photo_name');";
  $result=mysqli_query($link,$query);
  if ($result) {
    move_uploaded_file($_FILES['photo']['tmp_name'],'stimages/'.$photo_name);
    $success="Data Inserted Successfully";
    header('location: index.php?page=addstudent');
  }else {
    $errorrr="Data insert failed";
  }
}

 ?>

<div class="row">
  <?php if (isset($success)) {echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
  <?php if (isset($errorrr)) {echo '<p class="alert alert-danger col-sm-6">'.$errorrr.'</p>';} ?>
</div>
<div class="row">
  <div class="col-sm-4">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="stname">Student Name</label>
        <input type="text" name="name" id="stname" class="form-control" placeholder="Enter Student Name" required="">
      </div>
      <div class="form-group">
        <label for="stroll">Student Roll</label>
        <input type="text" name="roll" id="stroll" class="form-control" placeholder="Enter Student Roll" pattern="[0-9]{6}" required="" >
      </div>
      <div class="form-group">
        <label for="stclass">Student Class</label>
        <select class="form-control" name="class" id="stclass" required="" >
          <option value="">Select</option>
          <option value="1st">1st Year</option>
          <option value="2nd">2nd Year</option>
          <option value="3rd">3rd Year</option>
          <option value="4th">4th Year</option>
        </select>
      </div>
      <div class="form-group">
        <label for="stname">Student City</label>
        <input type="text" name="city" id="stcity" class="form-control" placeholder="Enter Student City" required="" >
      </div>
      <div class="form-group">
        <label for="stcntct">Contact Number</label>
        <input type="text" name="contact" id="stcntct" class="form-control" placeholder="01*********" pattern="01[5|6|7|8|9][0-9]{8}" required="" >
      </div>
      <div class="form-group">
        <label for="stphoto">Student Photo</label>
        <input type="file" name="photo" id="stphoto" class="form-control" required="">
      </div>
      <div class="form-group">
        <input type="submit" name="submitdata" class="form-control btn btn-success" value="Add Student">
      </div>
    </form>
  </div>
</div>
