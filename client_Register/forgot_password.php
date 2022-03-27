<?php
include'../connect.php';
if (isset($_POST['send'])) {
	if (empty($_POST['email'])) {
		$msg='<p>عذرا يجب ان لا تترك حقل البريد الالكتروني فارغ</p>';
	}else{
		$sql = mysqli_query($con, "SELECT * FROM client WHERE email='".$_POST['email']."'");
		$row=mysqli_fetch_array($sql);
		if(mysqli_num_rows($sql)>0){
			$db_email = $_POST['email'];
			$random_token = uniqid(md5(time()));
			$sql2=mysqli_query($con, "INSERT INTO password_reset (email, random_token) VALUES('$db_email', '$random_token')");
			if ($sql2===true) {
				$to = $db_email;
				$subject = "Password Reset Link";
				$message = "Click <a href='https://your_website.com/client_Register/reset.php?random_token=$random_token'>Here</a> To Reset Your Password.";
				$headers = "MIME-Version:1.0" . "\r\n".
				"Content-type:text/html;charset=UTF-8" . "\r\n".
				'From: <demo@demo.com' . "\r\n";
				//mail($to, $subject, $message, $headers);
				
				$msg='<div class="alert alert-success" style="padding: 13px;">
					رابط استرجاع كلمة السر قد ارسل الى بريدك الالكتروني رجاءا تحقق من بريدك الالكتروني.
				</div>';
			}
		} else {$msg='<p>هذا الايميل ليس مسجل في قاعدة البيانات</p>';}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>تسجيل الدخول</title>
	<link rel="stylesheet"  	href="../css/style.css">
	<link rel="stylesheet"  	href="../css/register.css">
	<!--[if It IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body style="direction: rtl;">
	<div class="forgot_password h4">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<label>البريد الالكتروني</label><br>
			<input type="email" name="email" placeholder="ادخل الايميل" required=""><br>
			<button name="send">ارسال</button>
			<span><?php echo @$msg; ?></span>
		</form>
	</div>
</body>
</html>	