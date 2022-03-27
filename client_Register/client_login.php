<?php
	include("../connect.php");
	session_start();
	include("cookies.php");
	if(isset($_SESSION['client_id'] )){ header('location:../index.php');}
	if (@$_SESSION['lang']=='rtl') {
		$msgErrEmailPass1 ="عذرا كلمة السر غير صحيحة";
		$msgErrEmailPass2 ="عذرا هذا الايميل غير مسجل لدينا";
		$title ="تسجيل الدخول";
		$email_label ="البريد الالكتروني";
		$password_label ="كلمة السر";
		$forget_password_label ="نسيت كلمة السر ؟ ";
		$create_account_label ="ليس لديك حساب ؟ ";
		$create_label ="انشئ حساب جديد الان";
	} else {
		$msgErrEmailPass1 ="Sorry Password Isn't Correct";
		$msgErrEmailPass2 ="Sorry This Email Isn't Register";
		$title ="Log in";
		$email_label ="Email";
		$password_label ="Password";
		$forget_password_label ="Forget Password ? ";
		$create_account_label ="You Don't Have An account ? ";
		$create_label ="Create Your Account Now";
	}
	$email = $password = $msgErr = " "; 
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{   //Call The Function :- test_input()
		@$email_val_str = filter_var(test_input($_POST["email"]), FILTER_SANITIZE_STRING);
		@$email   	    = filter_var($email_val_str, FILTER_VALIDATE_EMAIL);
		@$filterPassword = filter_var(test_input($_POST["password"]), FILTER_SANITIZE_STRING);//Convert Html Tag to String
		@$result = mysqli_query($con,"SELECT * FROM client where email ='$email'");
		@$count	 = mysqli_num_rows($result);
		if ($count > 0) 
		{
			while ($row = mysqli_fetch_array($result)) 
			{
				if ($filterPassword === $row['password'])
				{
					$_SESSION['client_id'] = $row['id'];
					$_SESSION['user_image'] = $row['user_image'];
					@$query  = "SELECT * FROM client_active WHERE email = '".$row['email']."'";
					@$result_active = mysqli_query($con, $query);
					@$row_active = mysqli_fetch_array($result_active);
					@$count	 = mysqli_num_rows($result_active);
					if($count == 0)
					{
							@$sql1	  = "INSERT INTO client_active (email, client_id) VALUES ('".$row['email']."','".$_SESSION['client_id']."')";
							@$result1 = mysqli_query($con, $sql1);
							$_SESSION['login_last_id'] = mysqli_insert_id($con);
					}
					else 
					{
						@$sql4 	= "DELETE FROM client_active WHERE email = '$email'";
					    @mysqli_query($con, $sql4);
						@$sql1	= "INSERT INTO client_active (email, client_id) VALUES ('".$row['email']."','".$_SESSION['client_id']."')";
						@$result1 = mysqli_query($con, $sql1);
						$_SESSION['login_last_id'] = mysqli_insert_id($con);
					}
					header("Location:../index.php");
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
	<link rel="stylesheet"  	href="../css/bootstrap.css">
	<link rel="stylesheet"  	href="../css/style.css">
	<link rel="stylesheet"  	href="../css/register.css">
	<!--[if It IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section class="container">
		<!-- Start Login As Donor -->
		<div class="register">
			<?php include'toolbox.php'; ?>
			<img src="../images/usericon.png" class="center-block img-responsive">
			
			<h3 class="text-center"><?php echo $title; ?></h3><hr>
			<div class="msgSuccess"><?php echo @$_SESSION['msgErr'];?></div>
			<section class="signup">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					<div class="row">
						<div class="col-xs-12">
							<label for="email" class="col-xs-4"><?php echo $email_label; ?></label>
							<input type="email" name="email" id="email" required="" class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="emailstatus"></span></div>
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
						<div class="col-xs-4"><span id="pastatus"></span></div>
					</div><hr style="border-color: #a39e9e85;">
					<div class="row">
						<div class="col-xs-12 text-center"><button type="submit" class="btn btn-warning" style="margin-top: -65px;"><?php echo $title; ?></button></div>
					</div>
					<div class="row">
						<div class="col-xs-12"><strong><?php echo $msgErr; ?></strong></div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="link"><a href="forgot_password.php" class="btn btn-warning"> <?php echo $forget_password_label; ?></a></div>
						</div>
					</div>
				</form>
			</section>
			<div class="row">
				<div class="col-xs-12">
					<div class="link"><?php echo $create_account_label; ?><a href="client_signin.php" class="btn btn-success"><?php echo $create_label; ?></a></div>
				</div>
			</div>
		</div>
		<!-- End Login As Donor -->
	</section>

	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/toolbox.js"></script>
</body>
</html>	
<script>
    $(document).ready(function (){
    	$(".msgSuccess").fadeOut(30000);
    	//Start slideToggle register Donar
        $(".register").delay().fadeIn(3000);
    	var email         = document.getElementById("email"),
    		emailstatus   = document.getElementById("emailstatus");
    	//Start Validate email Field
		email.onkeyup = function () {
		    "use strict";
		    var substring = email.value.substring(0, 1),
		        pattern = /^[\u0600-\u06FF]*$/; // Write Arabic Characters
		    email.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
		    //Write With English Or Arabic
		    if (email.dir === 'rtl' || email.dir === 'ltr') {
		        if (!isNaN(substring)) {
		            email.value = email.value.replace(/[^\a-z]*$/igm, '');
		        } else {
		            email.value = email.value.replace(/[^\a-z 0-9 . @]*$/igm, '');
		            emailstatus.innerHTML =" ";
		        }
		    }
		};

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
        //Convert To Arabic
        if ($("#cookie_lang").text()==='rtl') {
	        //NavBar Edit HTML
	        $(".signup .col-xs-4").addClass("col-xs-push-8");
	        $(".signup .col-xs-8").addClass("col-xs-pull-4");
	        $(".signup #showpass").css({"float":"left","margin-left":"0"});
	        $(".signup #password").attr("autocomplete","كلمة السر الحالية");
	    }
    });	
</script>
