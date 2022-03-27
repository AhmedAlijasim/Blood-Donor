<?php
include'../connect.php';
session_start();
//********* Start update status Notification to seen ***********//
if (isset($_POST['id']) && isset($_POST['from']) && isset($_POST['to'])) {
	@mysqli_query($con, "UPDATE notification SET status='0'
	WHERE (donate_id='".$_POST['id']."' AND from_id='".$_POST['from']."'
	AND to_id='".$_POST['to']."') AND status='1' ");
}
//***************** End update status Notification to seen ************************//
?>