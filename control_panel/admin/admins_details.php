<?php
include '../../connect.php';
@$sql=mysqli_query($con, "SELECT * FROM admin WHERE id='".$_POST['id']."'");
@$row=mysqli_fetch_array($sql);
echo'
<div class="row">
	<div class="col-xs-12">
		<div class="users_details">
			<div class="row">
				<div class="col-xs-6"><div class="user_label">Column Name</div></div>
				<div class="col-xs-6"><div class="user_detail">Column Value</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Email :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['email'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Password :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['password'].'</div></div>
			</div>
	</div>
</div>';
?>