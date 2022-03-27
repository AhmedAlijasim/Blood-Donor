<?php
include '../../connect.php';
if (isset($_GET['id_all'])) {
	$sql=mysqli_query($con, "DELETE FROM chat_message WHERE from_user_id LIKE '".$_GET['id_all']."'");
	if ($sql==true) { echo'Delete This Message By Successfully'; }
}
if (isset($_GET['id'])) {
	$sql=mysqli_query($con, "DELETE FROM chat_message WHERE chat_message_id='".$_GET['id']."'");
	if ($sql==true) { echo'Delete This Message By Successfully'; }
}
?> 