<?php
include("../connect.php");
session_start();
include("cookies.php");
if(isset($_SESSION['client_id'] )){ header('location:../index.php');}
	if (@$_SESSION['lang']=='rtl') {
		$msgErrEmailPass1 ="عذرا انت مسجل لدينا سابقا قم بادخال بريدك الالكتروني  وكلمة السر";
		$msgErrEmailPass2 ="مرحبا بك تم تسجيلك بنجاح قم بادخال بريدك الالكتروني  وكلمة السر للانتقال للصفحة الرئيسية";
		$title ="أنشاء حساب جديد";
		$name_label ="الاسم";
		$email_label ="البريد الالكتروني";
		$password_label ="كلمة السر";
		$birthdate_label ="تاريخ الميلاد";
		$sex_label ="الجنس";
		$sex_male_label ="ذكر";
		$sex_female_label ="انثى";
		$blood_group_label="فصيلة الدم";
		$phone_label="رقم الهاتف";
		$country_label="البلد";
		$city_label="المدينة";
		$signup_label="تسجيل";
	} else {
		$msgErrEmailPass1 ="Sorry You Registered At Site Please Enter Your mail And Password";
		$msgErrEmailPass2 ="Welcome To You Have Been Registered Successfully Please Enter Your mail And Password To Move For The Main Page";
		$title ="Create A new Account";
		$name_label ="Name";
		$email_label ="Email";
		$password_label ="Password";
		$birthdate_label ="Birth Date";
		$sex_label ="Sex";
		$sex_male_label ="Male";
		$sex_female_label ="Female";
		$blood_group_label="Blood Group";
		$phone_label="Mobile Number";
		$country_label="Country";
		$city_label="City";
		$signup_label="Sign Up";
	}

$fullName = $email = $password = $selectDate = $selectMonth = $selectYear = $gender = $bloodGroup = $mobileNo = $country = $city = " "; 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{   //Call The Function :- test_input()
	@$fullName   	= filter_var(test_input($_POST["fullName"]), FILTER_SANITIZE_STRING);//Convert Html Tag to String
	@$email_val_str = filter_var(test_input($_POST["email"]), FILTER_SANITIZE_STRING);
	@$email   	    = filter_var($email_val_str, FILTER_VALIDATE_EMAIL);
	@$password 		= filter_var(test_input($_POST["password"]), FILTER_SANITIZE_STRING);

	@$selectDate    = filter_var(test_input($_POST["selectDate"]), FILTER_SANITIZE_NUMBER_INT);
	@$selectMonth   = filter_var(test_input($_POST["selectMonth"]), FILTER_SANITIZE_NUMBER_INT);
	@$selectYear    = filter_var(test_input($_POST["selectYear"]), FILTER_SANITIZE_NUMBER_INT);
	@$fullDate		= $selectDate . " / " . $selectMonth . " / " . $selectYear ;

	@$gender    	= filter_var(test_input($_POST["gender"]), FILTER_SANITIZE_STRING);
	@$bloodGroup    = filter_var(test_input($_POST["bloodGroup"]), FILTER_SANITIZE_STRING);
	@$mobileNo 		= filter_var(test_input($_POST["mobileNo"]), FILTER_SANITIZE_STRING);
	@$country  		= filter_var(test_input($_POST["country"]), FILTER_SANITIZE_STRING);
	@$city 			= filter_var(test_input($_POST["city"]), FILTER_SANITIZE_STRING);

	@$result = mysqli_query($con,"SELECT * FROM client where email ='$email'");
	@$row=mysqli_fetch_array($result);
	@$email_from_db	= $row['email'];

	if (@$email == @$email_from_db)
	{
		$_SESSION['msgErr']=$msgErrEmailPass1; 
		header("Location:client_login.php");
	}

	else{
		@$sql = "INSERT INTO client (fullName, email, password, brithDate, gender, bloodGroup, mobileNo, country, city)
				VALUES('$fullName', '$email', '$password', '$fullDate', '$gender', '$bloodGroup', '$mobileNo', '$country', '$city')";
		@$res=mysqli_query($con,$sql);
		if($res==true)
		{
			$_SESSION['msgErr']=$msgErrEmailPass2; 
			header("Location:client_login.php");
		}
		mysqli_close($con);
	}
}

function test_input($data) // create protected function
{
	@$data  =  trim($data);//remove space before and after string
	@$data  =  stripcslashes($data);//remove backslash
	@$data  =  htmlspecialchars($data);//convert html tags into string
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
	<link rel="shortcut icon"	href="#" type="image/x-icon"/> 
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
		<!-- Start Register As Donor -->
		<div class="register">
			<?php include'toolbox.php'; ?>
			<img src="../images/usericon.png" class="center-block img-responsive">
			<h3 class="text-center"><?php echo $title; ?></h3><hr>
			<section class="signup">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="signup">
					<div class="row">
						<div class="col-xs-12">
							<label for="fullName" class="col-xs-4"><?php echo $name_label; ?></label>
							<input type="text" name="fullName" id="fullname"  required="" class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="fnamestatus"></span></div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label for="email" class="col-xs-4"><?php echo $email_label; ?></label>
							<input type="email" name="email" id="email" required="" autocomplete="" class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="emailstatus"></span></div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label for="password" class="col-xs-4"><?php echo $password_label; ?></label>
							<input type="password" name="password" id="password" required="" autocomplete = "current-password"  class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="pastatus"></span></div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label class="col-xs-4"><?php echo $birthdate_label; ?></label>
							<div class="col-xs-8 selectdate">
								<?php 
								echo"<select name='selectDate' required=''>";
								for ($i=1; $i <=31 ; $i++) { 
									echo"<option value='$i'>" . $i . "</option>";	
								}echo"</select>";
								echo"<select name='selectMonth' required=''>";
								for ($i=1; $i <=12 ; $i++) { 
									echo"<option value='$i'>" . $i . "</option>";	
								}echo"</select>";
								echo"<select name='selectYear' required=''>";
								$dateNow = date('Y');
								for ($i=1950; $i <=$dateNow ; $i++) { 
									echo"<option value='$i'>" . $i . "</option>";	
								}echo"</select>";
								?>
							</div> 
						</div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label class="col-xs-4"><?php echo $sex_label; ?></label>
							<select name="gender" required="" class="col-xs-8">
								<option></option>
								<option value="male"><?php echo $sex_male_label; ?></option>
								<option value="female"><?php echo $sex_female_label; ?></option>
							</select>
						</div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label class="col-xs-4"><?php echo $blood_group_label; ?></label>
							<select name="bloodGroup" required="" class="col-xs-8">
								<option ></option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
							</select>
						</div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label for="mobileNo" class="col-xs-4"><?php echo $phone_label; ?></label>
							<input type="text" name="mobileNo" id="mobileNo" maxlength="11"  required=""  class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="mostatus"></span></div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label for="country" class="col-xs-4"><?php echo $country_label; ?></label>
							<input type="text" name="country" id="country" required="" class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="costatus"></span></div>
					</div>

					<hr style="margin: 5px;">

					<div class="row">
						<div class="col-xs-12">
							<label for="city" class="col-xs-4"><?php echo $city_label; ?></label>
							<input type="text" name="city" id="city" required="" class="col-xs-8">
						</div>
						<div class="col-xs-12"><span id="cistatus"></span></div>
					</div>

					<hr style="margin: 5px;">
					
					<div class="row">
						<div class="col-xs-12 text-center">
							<button type="submit" id="checkFields" class="btn btn-primary"><?php echo $signup_label; ?></button>
						</div>
					</div>
				</form>
			</section>
		</div>
	</section><!-- End Register As Donor -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/signup.js"></script>
	<script src="../js/toolbox.js"></script>
</body>
</html>