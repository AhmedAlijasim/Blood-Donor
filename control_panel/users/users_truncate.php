<?php
include '../../connect.php';
$sql=mysqli_query($con, "DELETE FROM client");
if ($sql==true) {
	echo'Delete All Users By Successfully';
}
?>