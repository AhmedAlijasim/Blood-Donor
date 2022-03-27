<?php
include'../connect.php';
@$result=mysqli_query($con, "DELETE FROM donate WHERE id='".@$_POST['id']."'");
?>