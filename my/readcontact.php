<?php
session_start();
$servername="localhost";
$username="root";
$cpassword="";
$dbname="test2";
$con = mysqli_connect($servername,$username,$cpassword,$dbname);
if(!$con)
	echo mysqli_connect_error();


if(isset($_POST['submit']))
{
	$pid=$_SESSION['pid'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$sql="INSERT INTO contact (c_id,p_id,phone,city,address) VALUES('','$pid','$phone','$city','$address')";
		if (mysqli_query($con, $sql))
		{
			echo '<script>alert("Records added")</script>';
	
			header("location:rent.php");
		}
		else 
			echo mysqli_error($con);
}


?>

<!DOCTYPE HTML5>
<html>
<head>
<title>Register</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>

<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--<script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom Them e files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href="//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'">
<link href="//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css' ">
<!-- start-smoth-scrolling -->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>	
</head>

<body>
<!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" style="color: white" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					    </div>
					    <!--/.navbar-header-->
					 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
							<li><a href="index.php" class="logo">MSQRent</a></li>
							<li><a href="index.php">Home</a></li>
							<li><a href="rent.php">Post Instrument</a></li>
							<li><a href="search.php">Search Instrument</a></li>
							<li><a href="downloads.php">Download</a></li>
							<li><a href="upload.php">Upload</a></li>
							<li><a href="feedback.php">Feedback</a></li>
					      </ul>
					 </div>
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right">
				<div class="search"> 
				<?php if(isset($_SESSION['a'])) { ?>
					<div class="head-signin">
						<h5><a href="logout.php"><i class="fa fa-sign-out" style="font-size:25px;color:white"></i> Logout</a></h5>
					</div>  
				<?php } else { ?>
					<div class="head-signin">
						<h5><a href="login.php"><i class="fa fa-sign-in" style="font-size:25px;color:white"></i>  Login</a></h5>
					</div>
				<?php }?>     
           	      <div class="clearfix"> </div>					
				</div>
			</div>
			 <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--header end here-->
	<div class="container0">
		<p>Time: <span id="time"></span></p>
		<p>Date: <span id="date"></span></p>
		<script>
			var today = new Date;
			document.getElementById("date").innerHTML= today.toDateString();
			function setTime() {
				var d = new Date(),el = document.getElementById("time");
				el.innerHTML = formatAMPM(d);
				setTimeout(setTime, 1000);
			}
			function formatAMPM(date) {
				var hours = date.getHours(),minutes = date.getMinutes(),seconds = date.getSeconds(),ampm = hours >= 12 ? 'pm' : 'am';
				hours = hours % 12;
				hours = hours ? hours : 12; // the hour '0' should be '12'
				minutes = minutes < 10 ? '0'+minutes : minutes;
				var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
				return strTime;
			}
			setTime();
		</script>
	</div>

<!--banner strat here-->
<!--banner end here-->
	
<!--block-layer2 start here-->
<div class="blc-layer2">
	<div class="container">
		<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Add contact Details</h1>
						<form method="post" action="">
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Phone Number * :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="phone" required=""/>
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class="sign-u">
						<div class="sign-up1">
							<h4>City * :</h4>
						</div>
							<div class="sign-up2">
							<select name="city" id="city" style="width:90%;outline:none;border:1px solid #BEBEBE;min-height:40px;">
					  <?php
						$sqlb="SELECT * FROM city";
						$result=mysqli_query($con,$sqlb);
						while($rows=$result->fetch_assoc())
						{
							?>
						<option style="text-transform: uppercase" value="<?php echo htmlentities($rows['city']);?>"><?php echo htmlentities($rows['city']);?></option>
						<?php }   mysqli_close($con);  ?>
							</select>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="textarea" name="address" required=" "/>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								<input type="submit" name="submit" value="Add">
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="index.php">Home</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						</form>
					</div>
				</div>
	  </div>
	</div>
</div>
<!--block-layer2 end here-->
	
<!--footer start here-->
		<footer>
		<div class="main-content">
			<div class="left box">
			 <h2>About Us</h2>
				<div class="content">
					<p>This is a simple webpage to rent your musical insruments.You can find the contacts to take an instrument as rent.You can also find musical noatations and rhythm files of different songs to download.You can also share these files in this webpage.</p>
					<div class="social">
						<a href="#"><span class="fab fa-facebook-f"></span></a>
						<a href="#"><span class="fab fa-twitter"></span></a>
						<a href="#"><span class="fab fa-instagram"></span></a>
						<a href="#"><span class="fab fa-youtube"></span></a>
					</div>
				</div>
			</div>
			<div class="center box">
			 <h2>Contact Info</h2>
			<div class="content">
				<div class="place">
					<span class="fas fa-map-marker-alt"></span>
					<span class="text">Ernakulam,Kerala</span>
				</div>
				<div class="phone">
					<span class="fas fa-phone-alt"></span>
					<span class="text">9123456789</span>
				</div>
				<div class="place">
					<span class="fas fa-envelope"></span>
					<span class="text">123@gmail.com</span>
				</div>
			</div>
		   </div>
		</div>
		<div class="bottom">
			<center>
				<span class="credit">Created By <a href="#">ImmanualJ</a> | </span>
				<span class="far fa-copyright"></span><span>2020 All rights reserved.</span>
			</center>
		</div>
	</footer>
<!--footer end here-->
</body>
</html>