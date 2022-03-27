<?php
include '../../connect.php';
$sql=mysqli_query($con, "TRUNCATE chat_message");
if ($sql==true) {
	echo'TRUNCATE This Table By Successfully';
}
?>