<?php
 session_start();
 include 'filesLogic.php';
 
 
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
$sql="SELECT * FROM files ";
$result=mysqli_query($con,$sql);

if(isset($_POST['delete']))
{
    $id= $_SESSION['id'];
	$sql="DELETE FROM files where id=$id";
	 if(mysqli_query($con,$sql))
	 {
		echo '<script>alert("Record Deleted") </script>';
	    header('location:downloads.php');
	 }
	 else
		 echo '<script>alert("Try again") </script>';
}


 ?>

<!DOCTYPE HTML5>
<html>
<head>
<title>Downloads</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
   <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rinstruments.php">Delete Rent Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="city.php">City</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="instruments.php">Instruments</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="brands.php">Brands</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Details</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="regusers.php">Registerd Users</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="changeap.php">Change admin password</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
  
      <div class="container">
        <div class="row"> 
          <div class="col-lg-5">
            <h1>Files Uploaded</h1>
          </div>          
      </div>
         
		 
  <table class="table table-dark">
      <thead>
        <tr>
		  <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Downloads</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
    <tbody>
        <?php
          while ($row= $result->fetch_assoc()): ?>
        <tr>
		  <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['name'] ?></td>
		  <td><?php echo $row['downloads'] ?></td>
          <td>
                 <form method="POST">
					<div class="form-group">
						<?php $_SESSION['id']=$row['id'];  ?>
						<input type="submit" name="delete" value="Delete" class="btn btn-primary"></input>
						<td><a href="../downloads.php?file_id=<?php echo $row['id'] ?> "class="btn btn-primary">Download</a></td>
					</div>
				 </form>
          </td>
        </tr>
          <?php endwhile; ?>
      </tbody>
    </table>
    </div>
	<?php mysqli_close($con);  ?>

</body>
</html>