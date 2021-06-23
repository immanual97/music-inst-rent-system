<?php
session_start();

if(isset($_SESSION['ad']))
{
}
else
{
 header('location:login.php');
}
$servername="localhost";
$username="root";
$password="";
$dbname="test2";

$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con)
	echo mysqli_connect_error();


if(isset($_POST['update']))
{
    $oldpass= $_POST['id'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	if($password1==$password2)
	{
		$oldp=md5($oldpass);
		$pas=md5($password1);
		$sql="UPDATE admin SET password='$pas' WHERE password='$oldp'";
		if(mysqli_query($con,$sql))
		{
			echo '<script>alert("Changed")</script>';
			header('location:index.php');
		}
		else
			echo '<script>alert("Try again")</script>';
	}
	else
	echo '<script>alert("Different password entered")</script>';	
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>admin</title>

</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
	<div class="sidenav" style="height:500px;">
        <a class="navbar-brand" href="index.php">Dashboard</a>
        
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="rinstruments.php">Instruments To Rent</a>
                <a class="nav-link" href="city.php">City</a>
                <a class="nav-link" href="instruments.php">Instruments</a>
                <a class="nav-link" href="brands.php">Brands</a>
                <a class="nav-link" href="contact.php">Contact Details</a>
                <a class="nav-link" href="regusers.php">Registerd Users</a>
                <a class="nav-link" href="changeap.php">Change admin password</a>
				<a class="nav-link" href="feedback.php">View Feedbacks</a>
				<a class="nav-link" href="downloads.php">Uploaded Files</a>
				<a class="nav-link" href="../rent.php">Post Instrument</a>
				<a class="nav-link" href="logout.php">Logout</a>
				
		</div>
    </nav>
	
	<div class="main">
		<h1>Details</h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <h5 class="card-title">Registerd Users</h5>
		<?php $sql="SELECT * FROM instposter ";$result=mysqli_query($con,$sql);$num=mysqli_num_rows($result); ?>
        <p class="card-text"><?php echo $num; ?> users have registered in our system</p>
        <a href="regusers.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <h5 class="card-title">Posts</h5>
		<?php $sql="SELECT * FROM instrument ";$result=mysqli_query($con,$sql);$num=mysqli_num_rows($result); ?>
        <p class="card-text"><?php echo $num; ?> instruments are posted for rent in our system</p>
        <a href="rinstruments.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
    <div class="col-sm-6">
    <div class="card text-white bg-danger mb-3">
      <div class="card-body">
        <h5 class="card-title">Feedbacks</h5>
       <?php $sql="SELECT * FROM feedback ";$result=mysqli_query($con,$sql);$num=mysqli_num_rows($result); ?>
        <p class="card-text"><?php echo $num; ?> feedbacks received</p>
        <a href="feedback.php" class="btn btn-primary">View</a></div>
    </div>
  </div>
    <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Number Downloads</h5>
		<?php   $d=0; $sql="SELECT downloads FROM files "; $result=mysqli_query($con,$sql);while($rows=$result->fetch_assoc()) { $d=$d+$rows['downloads'];} ?>
        <p class="card-text"><?php echo $d; ?> files are downloaded from our system </p>
        <a href="downloads.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <h5 class="card-title">No of visitors</h5>
		<?php $sql="SELECT count FROM count "; $result=mysqli_query($con,$sql);$rows=$result->fetch_assoc();$d=$rows['count']; ?>
		<p class="card-text"><?php echo $d; ?> times the website was accessed </p>
      </div>
    </div>
  </div>
</div>

<br>
<div class="clearfix"> </div>

	<div class="container">
        <div class="row"> 
          <div class="col-lg-5">
            <h1>Change Password</h1>
          </div>          
      </div>
	<div class="row justify-content-center">
    <form method="POST">
      <div class="form-group">
      <label>Enter Old password *</label>
      <input type="password" name="id" class="form-control">
	  <label>New Password *</label>
	  <input type="password" name="password1" class="form-control">
	  <label>Confirm New Password *</label>
	  <input type="password" name="password2" class="form-control">
      </div>
      <div class="form-group">
         <button type="submit" name="update" class="btn btn-info">Change</button>
      </div>
    </form>
    </div>
    </div>
	</div>
	<?php mysqli_close($con) ?>
</body>
</html>