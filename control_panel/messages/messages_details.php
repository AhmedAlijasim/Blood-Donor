<?php
include '../../connect.php';
$sql=mysqli_query($con, "SELECT * FROM chat_message WHERE from_user_id='".$_GET['from']."'");
$i=1;
@$count = mysqli_num_rows($sql);
if ($count == 0) { echo'Not Found Messages'; }
else {
	while($row=mysqli_fetch_array($sql)) {
		@$id=$row['chat_message_id'];
		//Name Of Receiver
		$sql2=mysqli_query($con, "SELECT * FROM client WHERE id='".$_GET['to']."'");
		$row2=mysqli_fetch_array($sql2);
		//Name Of Sender
		$sql3=mysqli_query($con, "SELECT * FROM client WHERE id='".$_GET['from']."'");
		$row3=mysqli_fetch_array($sql3);

		$status = $row['status'];
		$status2 = $row['second_status'];
		if ($status == 0) { $state = "The Message Was Viewed By ".$row2['fullName']; }
		if ($status == 1) { $state = "The Message Isn't View By ".$row2['fullName']; }
		if ($status == 2) { $state = "The Message Of ".$row3['fullName']." Has Been Deleted At Only ".$row3['fullName']; }
		if ($status2 == 3) { $second_status = "The Message Of ".$row3['fullName']." Has Been Deleted At Only ".$row2['fullName']; }
		else { $second_status = "Not Found Effects"; }
		if (empty(@$row2['fullName'])) {
			@$Receiver_found = "This Receiver Is Removed From The Site";
		} else {@$Receiver_found = $row2['fullName'];}
		echo'
		<div class="row">
			<div class="col-xs-12"> 
				<div class="posts_details">
					<div class="row">
							<div class="col-xs-6"><div class="publish_label">Column Name</div></div>
							<div class="col-xs-6"><div class="publish_detail">Column Value <a href="" onclick="return messages_delete('.$id.');">Delete</a></div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Sender :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row3['fullName'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Receiver :</div>
						<div class="col-xs-6"><div class="column_value">'.@$Receiver_found.'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Text Of The Message :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['chat_message'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">The Time Of The Message:</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['message_time'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">First status :</div>
						<div class="col-xs-6"><div class="column_value">'.@$state.'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Second status :</div>
						<div class="col-xs-6"><div class="column_value">'.@$second_status.'</div></div>
					</div>
				</div>
			</div>
		</div>';
	}
}
?>