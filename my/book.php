<?php
session_start();
 if($_SESSION['a'])
 {
	 
 }
 else
 {
	header("location:login.php");
 }
$_SESSION['total']=0;
$servername="localhost";
$username="root";
$cpassword="";
$dbname="test2";
$con = mysqli_connect($servername,$username,$cpassword,$dbname);
if(!$con)
	echo mysqli_connect_error();

$inid=$_GET['inid'];




if(isset($_POST['calculate']))
{
	$insid=$inid;
	$from=$_POST['from'];
	$to=$_POST['to'];

    $diff = strtotime($from) - strtotime($to);
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    $n=ceil(abs($diff / 86400));
	
	$sql="SELECT rentperday,advance FROM instrument WHERE iid=$inid";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$rent=intval($row['rentperday']);
	$advance=intval($row['advance']);
	$total=$advance+($n*$rent);
	$_SESSION['total']=$total;
}
	


if(isset($_POST['book']))
{
	
	$insid=$inid;
	$pid=$_SESSION['pidtotake'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	
	
	$sql="INSERT INTO book VALUES('','$insid','$pid','$from','$to')";
	if (mysqli_query($con,$sql))
	{
		echo '<script>alert("Booked.... Pay Cash While Taking Instrument")</script>';
		header("location:search.php");
	}
	else 
        echo '<script>alert("Sorry Some error occured..PLease try again")</script>';
}

?>

<html>
<head>
<title>Book</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--  <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
<!-- Custom Theme files -->
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

	<!-- Book -->
	<div class="banner text-center">
	  <div class="container">   
			<h1 style="background: #000000">Book Instruments</h1>
	</div>
	</div>
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
	  <div class="container-2" style="background: white">
			<div class="post-ad-form">
			
				<form method="post" enctype="multipart/form-data">

					
					<div class="clearfix"></div>					
					<label>From <span>*</span></label>
					<input name="from" type="date"  value="<?php echo date("Y-m-d");?>" style="width:30%;color: green;height:50px;margin-top:0px;">
					<div class="clearfix"></div>
					<br>
					<label>To <span>*</span></label>
					<input name="to" type="date"  value="<?php echo date("Y-m-d");?>" style="width:30%;color: green;height:50px;margin-top:0px;">
					<div class="clearfix"></div>
					
					<input type="submit" name="calculate" value="calculate"/>
					
					<label>You should pay <span>*</span></label>
					<input  type="text" class="" placeholder="<?php echo $_SESSION['total'];?>" disabled>
					<div class="clearfix"></div>
						
						
					
					<input type="submit" name="book" value="Book Now"/>					
					<div class="clearfix"></div>
				
					</form>
					
			</div>
		</div>	
	</div>
	<?php mysqli_close($con);?>
	<!-- // Submit intrument end -->

	

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