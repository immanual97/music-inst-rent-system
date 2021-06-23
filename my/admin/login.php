<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="test2";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con)
	echo mysqli_connect_error();

if(isset($_POST['submit']))
  {
	$uname=$_POST['email'];
    $pas=$_POST['password'];
	$passw=md5($pas);
	$sql="SELECT password,email FROM admin WHERE email='$uname'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
			$row=mysqli_fetch_assoc($result);	
			$email=$row["email"];
			$passw1=$row["password"];
			if($uname==$email)
			{
				if($passw==$passw1)
				{
					
					$_SESSION['ad']=1;
					header('location:index.php');
				}
				else
					echo '<script>alert("Wrong password or email")</script>';
			}
 	}
  }	
mysqli_close($con);
?>




<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>register</title>
<link rel="stylesheet" href="css/login.css"  type="text/css">
</head>
<body>
	<div class="loginbg">
		<div class="logincontainer">
			<div class="logbutton-box">
				<div id="btn1"></div>
				<h1 style="text-align:center;">Login</h1>
			</div>
			<form id="login" class="logininput-grp" method="post">
				<input type="email" class="logininput-field" placeholder="Email" name="email" required>
				<input type="password" class="logininput-field" placeholder="Password" name="password" required>
				<button type="submit" class="submit-btn" name="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>