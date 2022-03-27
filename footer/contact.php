<?php
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['send'])) {
	@$first_name = $_POST['first_name'];
	@$last_name = $_POST['last_name'];
	@$email = $_POST['email'];
	@$telephone = $_POST['telephone'];
	@$subject = $_POST['subject'];
	@$comments = $_POST['comments'];
	require_once '../PHPMailer/PHPMailer/Exception.php';
	require_once '../PHPMailer/PHPMailer/PHPMailer.php';
	require_once '../PHPMailer/PHPMailer/SMTP.php';
	$mail = new PHPMailer;
	$mail-> isSMTP();
	$mail-> Host = "smtp.gmail.com";
	$mail-> SMTPAuth = true;
	$mail-> Username = "ammar@gmail.com";
	$mail-> Password = "iraq2020";
	$mail-> SMTPSecure = "ssl"; // tls
	$mail-> Port = "587";

	$mail-> isHtml(true);
	$mail-> setFrom("$email","$first_name");
	$mail-> addAddress("$email");
	$mail-> addReplyTo("info@example.com",'information');
	$mail-> Subject = $subject;
	$mail-> Body = $comments;

	if ($mail->send()) {
		$result ='<div class="alert alert-success">success send</div>';
	} else{
		$result ='<div class="alert alert-danger">faild send</div>';
	}
	echo $result;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>تواصل معنا</title>
	<link rel="stylesheet"  href="../css/bootstrap.css">
	<link rel="stylesheet"  href="../css/style.css">
</head>
<body>
	<div class="contact">
		<h2 class="text-center">تواصل معنا</h2>
		<form name="contactform" method="post" action=""> 
			<label for="first_name">الاسم الاول *</label><br>
			<input type="text" name="first_name" maxlength="50" required=""><br>
			<label for="last_name">الاسم الثاني *</label><br>
			<input type="text" name="last_name" maxlength="50"  required=""><br>
			<label for="email">البريد الالكتروني *</label><br>
			<input type="email" name="email" maxlength="80"  required=""><br>
			<label for="telephone">رقم الهاتف</label><br>
			<input type="number" name="telephone" maxlength="30"  required=""><br>
			<label for="subject">موضوع الرسالة *</label><br>
			<input type="text" name="subject" maxlength="50" required=""><br>
			<label for="comments">نص الرسالة *</label><br>
			<textarea  name="comments" maxlength="1000"  required=""></textarea><br>
			<button class="btn btn-primary" name="send">ارسال</button>
			<button class="btn btn-warning"><a href="../index.php">العودة للصفحة الرئيسية</a></button>
		</form>
	</div>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>