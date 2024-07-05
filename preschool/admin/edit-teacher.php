<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for update teacher details
if(isset($_POST['submit'])){
//Getting Post Values  
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$tsubject=$_POST['tsubject'];
$teacherid=intval($_GET['tid']);



$query=mysqli_query($con,"update tblteachers set fullName='$fname',teacherEmail='$email',teacherMobileNo='$mobileno',teacherSubject='$tsubject' where id='$teacherid'");
if($query){
echo "<script>alert('Teacher details updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-teachers.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | Add Teacher</title>

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Teacher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">

<?php
$teacherid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from tblteachers where id='$teacherid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>


              <div class="card-header">
                <h3 class="card-title">Persoanl Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">

<!--  Full Name--->
   <div class="form-group">
                    <label for="exampleInputFullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Teacher Full Name" value="<?php echo $result['fullName']?>" required>
                  </div>
<!--   Email---->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" value="<?php echo $result['teacherEmail']?>" placeholder="Enter email" required>
                  </div>
<!--Number---->
                  <div class="form-group">
                    <label for="text">Mobile Number</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter email" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo $result['teacherMobileNo']?>" required>
                  </div>


<!--Subject---->
                  <div class="form-group">
                    <label for="text">Subject/Designation</label>
                    <input type="text" class="form-control" id="tsubject" value="<?php echo $result['teacherSubject']?>" name="tsubject" placeholder="Enter Subject/Designation"  required>
                  </div>



  <!--Profile Pic---->
  <div class="form-group">
                    <label for="exampleInputFile">Profile Pic </label>
               <img src="teacherspic/<?php echo $result['teacherPic']?>" width="120">
               <a href="update-teacher-pic.php?tid=<?php echo $result['id'];?>">Update Profile Pic</a>
                  </div>
  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                </div>
      
                </div>
                <!-- /.card-body -->
 <?php } ?>         

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->








    
              </form>
       
  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
