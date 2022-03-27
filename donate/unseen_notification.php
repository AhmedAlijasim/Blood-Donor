<?php
session_start();
//***************** Start number Notification unseen ************************//	
include'../connect.php';
@$query = mysqli_query($con, "SELECT * FROM notification WHERE 
	from_id !='".$_SESSION['client_id']."' AND to_id='".$_SESSION['client_id']."'
	AND status='1'");
@$count = mysqli_num_rows($query);	 
if($count > 0)
{
	echo @$count;
}
//***************** End number Notification unseen ************************// 
?>