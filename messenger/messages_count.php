<?php
	session_start();
	include '../connect.php';
	/* Count Of The Total Messages */
	@$query = mysqli_query($con, "SELECT * FROM chat_message 
	WHERE to_user_id ='".@$_SESSION['client_id']."' AND status = '1'");
	@$count = mysqli_num_rows($query);
	if($count > 0)
	{
	 	echo'<span class="label label-danger">'.$count.'</span>';
	}
?>