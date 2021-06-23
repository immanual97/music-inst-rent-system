<?php
session_start();
 /*if($_SESSION['a']==10)
 {
	 
 }
 else
 {
	header("location:loginr.php");
 }
 */
$servername="localhost";
$username="root";
$cpassword="";
$dbname="test2";
$con = mysqli_connect($servername,$username,$cpassword,$dbname);
if(!$con)
	echo mysqli_connect_error();

if(isset($_POST['update']))
{
	$inid=$_GET['inid'];
	$pid=$_SESSION['pid'];
	$instrument=$_POST['instrument'];
	$brand=$_POST['brand'];
	$model=$_POST['model'];
	
	$imname = $_FILES["imfile"]["name"];
	$tmpimname = $_FILES["imfile"]["tmp_name"];
	$path="images/".$imname;
	$img1=$path;
	move_uploaded_file($tmpimname, $path);
	
	$rentperday=$_POST['rentperday'];
	$advance=$_POST['advance'];
	$overview=$_POST['overview'];
	$pick=$_POST['pick'];
	$kepo=$_POST['kepo'];
	$stand=$_POST['stand'];
	$footpedal=$_POST['footpedal'];	
	$adapter=$_POST['adapter'];
	$stick=$_POST['stick'];
	
	$sql="UPDATE instrument SET iname='$instrument',brand='$brand',model='$model',img1='$img1',rentperday='$rentperday',advance='$advance',overview='$overview',pick='$pick',kepo='$kepo',stand='$stand',footpedal='$footpedal',adapter='$adapter',stick='$stick' WHERE iid=$inid";
	if (mysqli_query($con,$sql))
	{
		echo '<script>alert("Data Entered")</script>';
		header("location:index.php");
	}
	
	else 
        echo '<script>alert("Sorry Some error occured..PLease try again")</script>';
	}

?>

<html>
<head>
<title>Rent</title>

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
	<!-- post Ad -->
	<div class="banner text-center">
	  <div class="container">   
			<h1 style="background: #000000">Post your instrument to <span class="segment-heading"> Rent it</span> and earn money</h1>
		  	<p style="background: #000000">Post your instruments here so that it would be taken for rent.Give the required details for communication.</p>
	  </div>
	</div>
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
	  <div class="container-2" style="background: white">
			<h2 class="head" style="color: black">Post an Instrument</h2>
			<div class="post-ad-form">
			
				<form method="post" enctype="multipart/form-data">
				
					<label>Select Instrument <span>*</span></label>
					<select class=""  name="instrument">
						<?php
						$sqli="SELECT * FROM instruments GROUP BY instrument";
						$result=mysqli_query($con,$sqli);
						while($rows=$result->fetch_assoc())
						{
							?>
					<option style="text-transform: uppercase" value="<?php echo htmlentities($rows['instrument']);?>"><?php echo htmlentities($rows['instrument']);?></option>
						<?php }?>
					</select>
					
					<div class="clearfix"></div>
					<label>Brand of Instrument<span>*</span></label>
					<select class=""  name="brand">
					  <?php
						$sqlb="SELECT * FROM brand GROUP BY brand";
						$result=mysqli_query($con,$sqlb);
						while($rows=$result->fetch_assoc())
						{
							?>
					<option style="text-transform: uppercase" value="<?php echo htmlentities($rows['brand']);?>"><?php echo htmlentities($rows['brand']);?></option>
						<?php }?>
					</select>

					<div class="clearfix"></div>					
					<label>Model <span>*</span></label>
					<input name="model" type="text" class="" placeholder="">
					<div class="clearfix"></div>
					
					<label>Advance <span>*</span></label>
					<input name="advance" type="text" class="" placeholder="">
					<div class="clearfix"></div>	

					<label>Rent per day <span>*</span></label>
					<input name="rentperday" type="text" class="" placeholder="">
					<div class="clearfix"></div>
					
					<label>Overview <span>*</span></label>
					<textarea name="overview" class="mess" placeholder="Write few lines about your product"></textarea>
					<div class="clearfix"></div>
						
						
						
				<label>Pick<span>*</span></label>
					<input type="radio" class="" name="pick" value="included" > Inculded
					<br>
					<input type="radio" class="" name="pick" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				<hr>
				<label>Kepo<span>*</span></label>
					<input type="radio" class="" name="kepo" value="included" > Inculded
					<br>
					<input type="radio" class="" name="kepo" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				<hr>
				<label>Stand<span>*</span></label>
					<input type="radio" class="" name="stand" value="included" > Inculded
					<br>
					<input type="radio" class="" name="stand" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				 <hr>
				<label>Footpedal<span>*</span></label>
					<input type="radio" class="" name="footpedal" value="included" > Inculded
					<br>
					<input type="radio" class="" name="footpedal" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				<hr>
				<label>Adapter<span>*</span></label>
					<input type="radio" class="" name="adapter" value="included" > Inculded
					<br>
					<input type="radio" class="" name="adapter" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				<hr>	
				<label>Stick<span>*</span></label>
					<input type="radio" class="" name="stick" value="included" > Inculded
					<br>
					<input type="radio" class="" name="stick" value="not inlcuded" > Not inlcuded </input>
					<div class="clearfix"></div>
				
				<div class="upload-ad-photos">
				<label>Photo for instrument of size (700*700)pixels :</label>	
					<div class="photos-upload-view">
						 <div>
							<input type="file" name="imfile" />
						 </div>
	   			    </div>
					
					<script src="js/filedrag.js"></script>
					<div class="clearfix"></div>
				</div>
				
				
					<input type="submit" name="update" value="Update"/>					
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