<?php 
session_start();
include '../connect.php';
/* When You Start Write The Message The State Of Message Is Become Seen */
if((isset($_POST['from'])) && (isset($_POST['to'])))
{
	$sql=mysqli_query($con, "UPDATE chat_message SET status = '0' WHERE from_user_id='".$_POST['to']."' AND to_user_id='".$_POST['from']."' AND status = '1'");
}
?>	