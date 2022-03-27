<?php
include '../../connect.php';
$sql=mysqli_query($con, "SELECT * FROM chat_message ORDER BY message_time DESC");
$count = mysqli_num_rows($sql);
$sql=mysqli_query($con, "SELECT * FROM client ORDER BY id");
echo'
<div class="row">
	<div class="col-xs-12">
		<div class="posts_details">
			<div class="row">
					<div class="col-xs-6">Total Messages No. : '.@$count.'</div>
					<div class="col-xs-6"><a href="" onclick="return messages_truncate();">Truncate</a></div>
			</div>
			<div class="row">
					<div class="col-xs-6">
						<div class="col-xs-6 publish_label">Sender Name</div>
						<div class="col-xs-6 publish_label">Messages No.</div>
					</div>
					<div class="col-xs-6">
						<div class="col-xs-6 publish_detail">Details</div>
						<div class="col-xs-6 publish_detail">Delete</div>
					</div>
			</div>';
			
			while($row=mysqli_fetch_array($sql)){
				$sql2=mysqli_query($con, "SELECT * FROM chat_message WHERE from_user_id='".$row['id']."'");
				$count = mysqli_num_rows($sql2);
				$row2=mysqli_fetch_array($sql2);
				$id=$row2['chat_message_id'];
				$to=$row2['to_user_id'];
				$from=$row2['from_user_id'];
				echo'
				<div class="row publish_label2">
					<div class="col-xs-6">
						<div class="col-xs-6">'.@$row['fullName'].'</div>
						<div class="col-xs-6">'.@$count.'</div>
					</div>
					<div class="col-xs-6">
						<div class="col-xs-6">
							<a href="" onclick="return messages_details(\''.$id . '\',\'' . $from . '\' , \'' . $to.'\');">Details</a>
						</div>
						<div class="col-xs-6"><a href="" onclick="return messages_all_delete('.$from.');">Delete</a></div>
					</div>
				</div>';
			}
echo'
		</div>
	</div>
</div>';
?>