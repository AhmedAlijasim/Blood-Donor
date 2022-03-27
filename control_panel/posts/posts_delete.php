<?php
include '../../connect.php';
if (isset($_GET['id_all'])) {
	$sql=mysqli_query($con, "DELETE FROM donate WHERE from_id LIKE '".$_GET['id_all']."'");
	if ($sql==true) { echo'Delete This Posts By Successfully'; }
}
if (isset($_GET['id'])) {
	$sql=mysqli_query($con, "DELETE FROM donate WHERE id='".$_GET['id']."'");
	if ($sql==true) { echo'Delete This Post By Successfully'; }
}
?> 