<?php
include '../../connect.php';
@$sql=mysqli_query($con, "SELECT * FROM client");
@$count = mysqli_num_rows($sql);
echo'
<div class="row">
	<div class="col-xs-12">
		<div class="users_details">
			<div class="row">
					<div class="col-xs-6">Number Of Users : '.@$count.'</div>
					<div class="col-xs-6"><a href="" onclick="return users_truncate();">All Delete</a></div>
			</div>
			<div class="row">
					<div class="col-xs-6"><div class="user_label">User Name</div></div>
					<div class="col-xs-6">
						<div class="col-xs-6 user_detail">Details</div>
						<div class="col-xs-6 user_detail">Delete</div>
					</div>
			</div>';
			if ($count == 0) {
				echo'
				<div class="row user_label2">
					<div class="col-xs-12">Not Found Users</div>
				</div>';
			} else {
				while($row=mysqli_fetch_array($sql)){
					@$id=$row['id'];
					echo'
					<div class="row user_label2">
						<div class="col-xs-6">'.@$row['fullName'].'</div>
						<div class="col-xs-6">
							<div class="col-xs-6"><a href="" onclick="return users_details('.$id.');">Details</a></div>
							<div class="col-xs-6"><a href="" onclick="return users_delete('.$id.');">Delete</a></div>
						</div>
					</div>';
				}
			}
echo'
		</div>
	</div>
</div>';
?>