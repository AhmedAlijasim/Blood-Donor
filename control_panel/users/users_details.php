<?php
include '../../connect.php';
@$sql=mysqli_query($con, "SELECT * FROM client WHERE id='".$_GET['id']."'");
@$row=mysqli_fetch_array($sql);
@$gender = $row['gender'];
if (empty($row['user_image'])) {
	if (($gender=='male') || ($gender=='ذكر')) { @$image="<img src='../images/male_user.png'>"; } 
	else { @$image="<img src='../images/female_user.jpg'>"; }
} else { @$image = "<img src=../uploaded_img/".$row['user_image'].">"; }
echo'
<div class="row">
	<div class="col-xs-12">
		<div class="users_details">
			<div class="row">
				<div class="col-xs-6"><div class="user_label">Column Name</div></div>
				<div class="col-xs-6"><div class="user_detail">Column Value</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">User Name :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['fullName'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Email :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['email'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Password :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['password'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Brith Date :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['brithDate'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Gender :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['gender'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Blood Type :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['bloodGroup'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Phone :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['mobileNo'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">Country :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['country'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">City :</div>
				<div class="col-xs-6"><div class="column_value">'.@$row['city'].'</div></div>
			</div>
			<div class="row">
				<div class="col-xs-6">User Image :</div>
				<div class="col-xs-6"><div class="column_value">'.@$image.'</div></div>
			</div>
	</div>
</div>';
?>