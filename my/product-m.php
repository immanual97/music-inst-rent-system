<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="test2";

$violin="violin";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con)
	echo mysqli_connect_error();
$sql="SELECT brand,model,img1,iname,iid FROM instrument WHERE iname='$violin' AND status=1";
$result=mysqli_query($con,$sql);
mysqli_close($con);
?>
<html>
<head>
<title>View</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>

<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<!--product start here-->
<div id="gridview">
<div class="heading">Violins</div>
<?php
while($rows=$result->fetch_assoc())
{
?>
<link href="css/style-2.css" rel="stylesheet" type="text/css" media="all"/> 
 
	<div class="image">
            <a href="single.php?inid=<?php echo htmlentities($rows['iid']);?>"><img src="<?php echo $rows['img1'];?>" /></a>
						<div class="home-product-bottom">
								<h3><a href="single.php?inid=<?php echo htmlentities($rows['iid']);?>">View Details</a></h3>
								<p style="text-transform: uppercase"> Brand:<?php echo $rows['brand'];?></p>	
								<p style="text-transform: uppercase"> Model No:<?php echo $rows['model'];?></p>	
						</div>
    </div>	
	<?php
	}
	?>
  </div>	
	
<!--product end here-->
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