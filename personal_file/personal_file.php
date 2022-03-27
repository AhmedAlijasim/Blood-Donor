<?php  
session_start();
include '../connect.php';
$result = mysqli_query($con,"SELECT * FROM client where id ='".$_SESSION['client_id']."'");
$count=mysqli_num_rows($result);
if ((empty($_SESSION['client_id'])) || ($count == 0)){ header('location:../client_Register/client_login.php'); }
else{
	// Start Fetching Client Information from Database 
	$row=mysqli_fetch_array($result);
	$id	= $row['id'];
	$fullName	= $row['fullName'];	
	$email   	= $row['email'];	
	$password	= $row['password'];	
	$brithDate	= $row['brithDate'];	
	$gender		= $row['gender'];	
	$bloodGroup	= $row['bloodGroup'];	
	$mobileNo	= $row['mobileNo'];	
	$country	= $row['country'];	
	$city		= $row['city'];	
	$image 		= "<img src=../uploaded_img/".$row['user_image'].">";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<meta name="format-detection" content="telephone=no">
	<title><?php
		if (@$_SESSION['lang']=='rtl') { echo'الملف الشخصي'; }
			else { echo'Personal File'; }
		?>
	</title>
	<link rel="stylesheet"  href="../css/bootstrap.css">
	<link rel="stylesheet"  href="../css/style.css">
	<!--
		<link href ='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet'>  fetch this line from internet
	-->
	<!--[if It IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section class="container">
		<div class="row">
			<span id='cookie_lang' style='display:none'><?php echo @$_SESSION['lang']; ?></span>
			<div class="col-lg-12">
				<div class="head">
					<div class="image">
						<?php
						if (empty($row['user_image'])) {
							if (($gender=='male') || ($gender=='ذكر')) { echo @$image="<img src='../images/male_user.png'>"; } 
							else { echo @$image="<img src='../images/female_user.jpg'>"; }
						} else { echo @$image; }
						?>
						<a href="personal_image_edit.php">
						<?php echo'
							<i class="glyphicon glyphicon-camera" onclick=" return edit_personal_image('.$id.')"  title="Edit Your Profile Picture">
							</i>'; ?>
						</a>
					</div>
					<div id="edit_personal_image" style="display: none;"></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="show_person_edit"></div>
					</div>
				</div>
					
				<div class="info lead">
					<?php 
						if (!empty($_GET['msg_error'])) {
							echo "<h4>".$_GET['msg_error']."</h4>"; 
						}
					?>
					<?php echo'
					<a href="../index.php" class="btn btn-warning"> Back To The Home Page </a>
					<a href="" class="btn btn-danger" onclick=" return edit_personal_info('.$id.')" >  Edit Your Personal Information </a> ';?>
					<div><span>Name : </span><?php echo @$fullName;?></div><br>
					<div><span>Email : </span><?php echo @$email?></div><br>
					<div><span>Blood Group : </span><?php echo @$bloodGroup?></div><br>
					<div><span>Birth Date: </span><?php echo @$brithDate?></div><br>
					<div><span>Sex : </span><?php echo @$gender?></div><br>
					<div><span>Password : </span>
						<form>
							<input type="password" id="password"
							value="<?php echo @$password?>" autocomplete="current_password">
							<button type="button" id="showpass">
								<i class="glyphicon glyphicon-eye-close" ></i>
							</button>
						</form>
					</div><br>

					<div><span>Phone Number : </span><?php echo @$mobileNo?></div><br>
					<div><span>Country : </span><?php echo @$country?></div><br>
					<div><span>City : </span><?php echo @$city?></div><br>
				</div>
			</div>
		</div>
	</section>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/personal_file.js"></script>
	<script src="../js/toolbox.js"></script>
</body>
</html>