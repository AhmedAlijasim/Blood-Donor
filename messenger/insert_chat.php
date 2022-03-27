<?php
include("../connect.php");
session_start();
if (empty($_POST["message"])) {
	if (@$_SESSION['lang']==='rtl') { echo"لاتستطيع ارسال رسالة فارغة"; }
	else{ echo"You Can't Send Empty Message"; }
	
} else{
	//Call The Function :- test_input() And Convert Html Tag to String
	@$message   = filter_var(test_input($_POST["message"]), FILTER_SANITIZE_STRING);
	@mysqli_query($con,"INSERT INTO chat_message (chat_message, from_user_id, to_user_id, status)
		VALUES('$message', '".$_SESSION['from_id']."', '".$_SESSION['to_id']."', '1')");
	mysqli_close($con);
}
function test_input($data) // create protected function
{
	@$data  =  trim($data);
	@$data  =  stripcslashes($data);
	@$data  =  htmlspecialchars($data);
	return $data;
}
?>