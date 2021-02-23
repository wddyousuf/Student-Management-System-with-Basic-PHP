<?php
	if (!isset($_SESSION['user_login'])) {
		header('location: login.php');
	}

 ?>
<h1 class="text-primary"> <i class="fa fa-book"></i> Course Registration <small class="text-muted"> Course Registration Desk</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="breadcrumb-item active" aria-current="page"> <a href="index.php?page=addresult"><i class="fa fa-edit"></i> Add Result</a> </li>
		<li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-book"></i> Course Registration</li>
	</ol>
</nav>

<?php
require_once 'dbcon.php';
if (isset($_POST['sbmt'])) {
  $year=$_POST['class'];
  $sem=$_POST['smstr'];
  $crsname=$_POST['crsname'];
  $crscd=$_POST['crscode'];
  $query=mysqli_query($link,"INSERT INTO `courses`(`class`, `semester`, `course_name`, `course_id`) VALUES ('$year','$sem','$crsname','$crscd');");
  if ($query) {
    ?>
    <script>
      alert('Course Created Successfully');
    </script>
    <?php
  }else {
    ?>
    <script>
      alert('Course Creation Error');
    </script>
    <?php
  }
}

 ?>

 <div class="container">
   <div class="row">
     <div class="col-sm-6">
       <form class="form-group" action="" method="post" enctype="multipart/form-data">
         <table class="table table-bordered text-center">
           <tr>
             <td>Year</td>
 						<td>
 					    <select class="form-control" name="class" id="stclass" required="">
 					       <option value="" disabled>Select</option>
 					       <option value="1st">1st Year</option>
 					       <option value="2nd">2nd Year</option>
 					       <option value="3rd">3rd Year</option>
 					       <option value="4th">4th Year</option>
 					     </select>
 						</td>
           </tr>
 					<tr>
             <td>Semester</td>
 						<td>
 					    <select class="form-control" name="smstr" id="smstr" required="">
 					       <option value="" disabled>Select</option>
 					       <option value="1st">1st Semester</option>
 					       <option value="2nd">2nd Semester</option>
 					     </select>
 						</td>
           </tr>
 					<tr>
 						<td>Course Name</td>
 						<td> <input type="text" name="crsname" value="" placeholder="Ex: Data Structure and Algorithm" class="form-control"  required> </td>
 					</tr>
          <tr>
 						<td>Course Code</td>
 						<td> <input type="text" name="crscode" value="" placeholder="Ex: ICE-2101" class="form-control"  required> </td>
 					</tr>
 					<tr>
 						<td colspan="2"> <input type="submit" name="sbmt" value="Create Course" class="form-control btn btn-success"> </td>
 					</tr>
         </table>
       </form>
     </div>
   </div>
 </div>
