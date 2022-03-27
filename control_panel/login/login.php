<?php
	include("../../connect.php");
	session_start();
	if(isset($_SESSION['id'] )){ header('location:../control.php');}
		$msgErrEmailPass1 ="Sorry Password Isn't Correct";
		$msgErrEmailPass2 ="Sorry This Email Isn't Register";
		$title ="Log in As Admin";
		$email_label ="Email";
		$password_label ="Password";
	
	$email = $password = $msgErr = " "; 
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{   //Call The Function :- test_input()
		@$email_val_str = filter_var(test_input($_POST["email"]), FILTER_SANITIZE_STRING);
		@$email   	    = filter_var($email_val_str, FILTER_VALIDATE_EMAIL);
		@$filterPassword = filter_var(test_input($_POST["password"]), FILTER_SANITIZE_STRING);//Convert Html Tag to String
		@$result = mysqli_query($con,"SELECT * FROM admin where email ='$email'");
		@$count	 = mysqli_num_rows($result);
		if ($count > 0) 
		{
			while ($row = mysqli_fetch_array($result)) 
			{
				if ($filterPassword === $row['password'])
				{
					$_SESSION['id'] = $row['id'];
					header("Location:../control.php");
				}
				else
				{$msgErr = '<div class="msgErrEmailPass">'.$msgErrEmailPass1.'</div>';}
			}	
		}
		else{$msgErr = '<div class="msgErrEmailPass">'.$msgErrEmailPass2.'</div>';}
	}
	function test_input($data) // create protected function
	{
		$data  =  trim($data);
		$data  =  stripcslashes($data);
		$data  =  htmlspecialchars($data);
		return $data;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title><?php echo $title; ?></title>
	<link rel="stylesheet"  	href="../../css/bootstrap.css">
	<link rel="stylesheet"  	href="../css/control.css">
	<!--[if It IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section class="container">
		<!-- Start Login As Donor -->
		<div class="register">
			<img src="../../images/usericon.png" class="center-block img-responsive">
			<h3 class="text-center"><?php echo $title; ?></h3><hr>
			<section class="signup">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					<div class="row">
						<div class="col-xs-12">
							<label for="email" class="col-xs-4"><?php echo $email_label; ?></label>
							<input type="email" name="email" id="email" required="" class="col-xs-8">
						</div>
					</div>
					<hr style="border-color: #a39e9e85;">
					<div class="row" style="margin-bottom: -40px;">
						<div class="col-xs-12">
							<label for="password" class="col-xs-4"><?php echo $password_label; ?></label>
							<input type="password" name="password" id="password" required="" minlength="8" autocomplete = "Current Password" class="col-xs-8">

							<button type="button" id="showpass">
								<i class="glyphicon glyphicon-eye-close" ></i>
							</button>
						</div>
					</div><hr style="border-color: #a39e9e85;">

					<div class="row">
						<div class="col-xs-12"><strong><?php echo $msgErr; ?></strong></div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 text-center"><button type="submit" class="btn btn-warning"><?php echo $title; ?></button></div>
					</div>

				</form>
			</section>
		</div>
		<!-- End Login As Donor -->
	</section>

	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../js/control.js"></script>
</body>
</html>	
<script>
    $(document).ready(function (){
    	$(".msgSuccess").fadeOut(10000);
    	//Start slideToggle register Donar
        $(".register").delay().fadeIn(3000);
        $("#showpass").on("click", function(){
            var pass = $("#password").attr('type');
            if(pass === 'password'){
                $("#password").attr('type', 'text');
                $(this).html('<i class="glyphicon glyphicon-eye-open" ></i>');
            } else {
                $("#password").attr('type', 'password');
                $(this).html('<i class="glyphicon glyphicon-eye-close" ></i>');
            }
        });
    });	
</script>
