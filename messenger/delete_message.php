<?php
include'../connect.php';
//Delete Messages to all
if (isset($_POST['message_id'])) 
{
	@$query=mysqli_query($con,"DELETE FROM chat_message WHERE chat_message_id='".$_POST['message_id']."'");
	mysqli_close($con);
}
//Delete Messages For Me
if (isset($_POST['me_message_id']))
{
	@$query=mysqli_query($con,"UPDATE chat_message SET status='2' WHERE chat_message_id='".$_POST['me_message_id']."'");
	mysqli_close($con);
}
//Delete Messages From Sender For Me
if (isset($_POST['sender_message_id']))
{
	@$query=mysqli_query($con,"UPDATE chat_message SET second_status='3' WHERE chat_message_id='".$_POST['sender_message_id']."'");
	mysqli_close($con);
}
/*
//Remove Chat Messages For Me
if (isset($_POST['from_id']) && isset($_POST['to_id']))
{
	@$query=mysqli_query($con,
	"UPDATE chat_message SET third_status='4' WHERE 
	(to_user_id='".$_POST['to_id']."' AND from_user_id='".$_POST['from_id']."') OR 
	(from_user_id='".$_POST['to_id']."' AND to_user_id='".$_POST['from_id']."')
	");	
	if ($query===true) {

		//echo"Remove chat from: ".$_POST['from_id'];
		//echo"<br> And to : ".$_POST['to_id'];
	}
	else echo"not removed";
	mysqli_close($con);
}
*/
?>