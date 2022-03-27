<?php 
include'../connect.php';
session_start();
if (isset($_GET['random_token'])) {
	$random_token = $_GET['random_token'];
	$sql = mysqli_query($con, "SELECT * FROM password_reset WHERE random_token='$random_token'");
	if (mysqli_num_rows($sql) > 0) {
		$row=mysqli_fetch_array($sql);
		$_SESSION['email'] = $row['email'];
	}else{
		header("location:client_login.php");
	}
}

if (isset($_POST['send'])) {
	$newpass = $_POST['password'];
	if (strlen($newpass)<6) {
		$msg='<div class="alert alert-danger">Password Must be 6 or more than 6.</div>';
	}else{
		$sql2=mysqli_query($con,"UPDATE client SET password='$newpass' WHERE email='".$_SESSION['email'] ."'");
		$sql3=mysqli_query($con,"DELETE FROM password_reset WHERE email='".$_SESSION['email'] ."'");
		$msg='<div class="alert alert-success">Password Update successfully. </div>';
	}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<span><?php echo @$msg; ?></span>
	<input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
	<input type="password" name="password" value="" placeholder="enter new password">
	<button name="send">send</button>
</form>


<style>
form{background: green;padding: 20px;}
input{padding: 20px;}
</style>