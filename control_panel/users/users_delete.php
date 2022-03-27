<?php
include '../../connect.php';
@$id=$_GET['id'];
@$query=mysqli_query($con,"SELECT user_image FROM client WHERE id='$id'");
	@$row=mysqli_fetch_array($query);
	@$dir_image=$_SERVER['DOCUMENT_ROOT'].'\Bloodnew\uploaded_img\\'.$row['user_image'];//On localhost
	//@$dir_image=realpath(dirname(getcwd())).'/uploaded_img/'.$row['user_image'];//On Server
if (file_exists($dir_image)){ @unlink($dir_image); }
@$sql=mysqli_query($con, "DELETE FROM client WHERE id='$id'");
if ($sql==true) {
	echo'Delete This User By Successfully';
}
?>