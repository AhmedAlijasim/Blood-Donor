<?php
include '../../connect.php';
@$sql=mysqli_query($con, "SELECT * FROM donate WHERE from_id='".@$_GET['id']."'");
$i=1;
@$count = mysqli_num_rows($sql);
if ($count == 0) {
	echo'Not Found Posts';
} else {
	while($row=mysqli_fetch_array($sql)){
		@$id=$row['id'];
		echo'
		<div class="row">
			<div class="col-xs-12">
				<div class="posts_details">
					<div class="row">
							<div class="col-xs-6"><div class="publish_label">'.$i++.' - Column Name</div></div>
							<div class="col-xs-6">
								<div class="publish_detail">Column Value <a href="" onclick="return posts_delete('.$id.');">Delete</a></div>
							</div>
					</div>
					<div class="row">
						<div class="col-xs-6">Text Of Donate :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['textDonate'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Age :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['sickAge'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Blood Type :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['sickGblood'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Country :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['sickCountry'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">City :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['sickCity'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Phone :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['sickPhone'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">date :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['date'].'</div></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Donate Type :</div>
						<div class="col-xs-6"><div class="column_value">'.@$row['donate_type'].'</div></div>
					</div>
				</div>
			</div>
		</div>';
	}
}
?>