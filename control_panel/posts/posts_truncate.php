<?php
include '../../connect.php';
$sql=mysqli_query($con, "DELETE FROM donate");
if ($sql==true) {
	echo'Delete All Posts By Successfully';
}
?>