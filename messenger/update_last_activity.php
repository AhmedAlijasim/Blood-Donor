<?php
//update_last_activity.php
include('../connect.php');
session_start();
@$query = "UPDATE client_active SET login_time = now() WHERE id = '".$_SESSION['login_last_id']."'";
@$result = mysqli_query($con, $query);
?>