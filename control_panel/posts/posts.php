<?php
include '../../connect.php';
$sql=mysqli_query($con, "SELECT * FROM donate ORDER BY date");
$count = mysqli_num_rows($sql);
$sql=mysqli_query($con, "SELECT * FROM client ORDER BY id");
echo'
<div class="row">
	<div class="col-xs-12">
		<div class="posts_details">
			<div class="row">
					<div class="col-xs-6">Total Post No. : '.@$count.'</div>
					<div class="col-xs-6"><a href="" onclick="return posts_truncate();">All Delete</a></div>
			</div>
			<div class="row">
					<div class="col-xs-6">
						<div class="col-xs-6 publish_label">Publisher Name</div>
						<div class="col-xs-6 publish_label">Post No.</div>
					</div>
					<div class="col-xs-6">
						<div class="col-xs-6 publish_detail">Details</div>
						<div class="col-xs-6 publish_detail">Delete</div>
					</div>
			</div>';
			
			while($row=mysqli_fetch_array($sql)){
				$sql2=mysqli_query($con, "SELECT * FROM donate WHERE from_id='".$row['id']."'");
				$count = mysqli_num_rows($sql2);
				$row2=mysqli_fetch_array($sql2);
				$id=$row2['from_id'];
				echo'
				<div class="row publish_label2">
					<div class="col-xs-6">
						<div class="col-xs-6">'.@$row['fullName'].'</div>
						<div class="col-xs-6">'.@$count.'</div>
					</div>
					<div class="col-xs-6">
						<div class="col-xs-6"><a href="" onclick="return posts_details('.$id.');">Details</a></div>
						<div class="col-xs-6"><a href="" onclick="return posts_all_delete('.$id.');">Delete</a></div>
					</div>
				</div>';
			}
echo'
		</div>
	</div>
</div>';
?>