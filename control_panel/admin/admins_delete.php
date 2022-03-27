<?php
include '../../connect.php';
$sql=mysqli_query($con, "DELETE FROM admin WHERE id='".$_POST['id']."'");
if ($sql==true) {
	echo'Delete This Admin By Successfully';
}
?>