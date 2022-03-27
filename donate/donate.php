<?php  
include '../connect.php';
session_start();
if (empty($_SESSION['client_id'])){
	header('location:../client_Register/client_login.php');
}
$sql2=mysqli_query($con,"SELECT * FROM client WHERE id='".$_SESSION['client_id']."'");
$row=mysqli_fetch_array($sql2);
if (empty($row['user_image'])) {
	if (($row['gender']=='male') || ($row['gender']=='ذكر')) { @$image="<img src='../images/male_user.png' class='img-responsive'>";}
	else{ @$image="<img src='../images/female_user.jpg' class='img-responsive'>";}
}
else{ $image = "<img src=../uploaded_img/".$row['user_image']." class='img-responsive'>"; }
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
	<title>Donate Blood</title>
	<link rel="shortcut icon" href="#" type="image/x-icon"/> 
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
	<div class="container">
		<span id='cookie_lang' style='display:none'><?php echo $_SESSION['lang']; ?></span>
		<div class="my_Donate_Form">
			<div class="row">
				<div class="col-xs-12">
					<div class="head_image"> <?php echo $image; ?> </div>
				</div>
			</div>
			
			<h2 class="text-center">Donate Blood</h2>

			<div class="text-center">
				<span id="give_blood"> Do You Want To Donate Your Blood ? </span>
				<span id="need_blood"> Do You Need Someone To Donate To You ?</span>
			</div>
			<div id="error_msg"></div>

			<div class="row">
				<div class="col-xs-12">
					<form onsubmit="return insert_form();">
						<textarea placeholder="Write Text Here ......" required=""></textarea><br>
						<p id="textMsg"></p>
						<input type="number" placeholder="Age" required=""><br>
						<select id="sickGblood" required="" title="Choose Blood Type">
							<option value="Apos">A+</option>
							<option value="Aneg">A-</option>
							<option value="Bpos">B+</option>
							<option value="Bneg">B-</option>
							<option value="ABpos">AB+</option>
							<option value="ABneg">AB-</option>
							<option value="Opos">O+</option>
							<option value="Oneg">O-</option>
						</select>
						<br>
						<select id="donate-type" required="" title="Choose Donate Type">
							<option value="readydonate">Ready To Donate</option>
							<option value="needdonate">Need To Donate</option>
						</select>
						<br>
						<input type="text" placeholder="Country" required=""><br>
						<input type="text" placeholder="City" required=""><br>
						<input type="number" placeholder="Phone Number" required=""><br>
						<button class="btn btn-primary">Post</button>
						<a href="../index.php" class="btn btn-danger"> Back To The Home Page </a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/insert_donate.js"></script>
</body>
</html>