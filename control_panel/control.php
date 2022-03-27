<?php  
session_start();
include '../connect.php';
if (empty($_SESSION['id'])){ header('location:login/login.php'); }
	$sql=mysqli_query($con,"SELECT * FROM admin WHERE id='".$_SESSION['id']."'");
	$row=mysqli_fetch_array($sql);
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
	<title>Control Panel</title>
	<link rel="shortcut icon" href="#" type="image/x-icon"/> 
	<link rel="stylesheet"  href="../css/bootstrap.css">
	<link rel="stylesheet"  href="css/control.css">
	<!--
		<link href ='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet'>  fetch this line from internet
	-->
	<!--[if It IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include 'inc/navbar.php'; ?>
	<div class="container-fluid">
		<pre class="pre_notifi h4"><?php echo 'Welcome <b> '.$row['email'].' </b> At The Control Panel';?></pre>
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="control_show"></div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="show_details"></div>
			</div>
		</div>
	</div>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="js/control.js"></script>
</body>
</html>