<?php
include '../connect.php';
session_start();
$query = mysqli_query($con, "SELECT * FROM donate WHERE id='".$_POST['id']."'");
$row = mysqli_fetch_array($query);
if (@$_SESSION['lang']=='rtl'){
	$donate_type_ready="انا أريد التبرع بدمي";
	$donate_type_need="انا أحتاج لشخص ما يتبرع لي";
	$donate_button="تحديث";
	if ($row['donate_type']=='readydonate') {$donate_type="انا أريد التبرع بدمي";}
	else {$donate_type="انا أحتاج لشخص ما يتبرع لي";}
} else {
	$donate_type_ready="Ready To Donate";
	$donate_type_need="Need To Donate";
	$donate_button="Update";
	if ($row['donate_type']=='readydonate') {$donate_type="Ready To Donate";}
	else {$donate_type="Need To Donate";}
}

echo'
		<form action="" method="get" onsubmit="return false;">
			<textarea id="textDonate" value=""  placeholder="Write Text Here">'.$row['textDonate'].'</textarea>
			<br> 
			<input type="number" value="'.$row['sickAge'].'" id="sickAge" placeholder="Age"><br>
			<select id="sickGblood" required="" title="Choose Blood Type">
				<option value="'.$row['sickGblood'].'" style="background:red;">'.$row['sickGblood'].'</option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
			</select><br>
			<input type="text"   value="'.$row['sickCountry'].'" id="sickCountry" placeholder="Country"><br>
			<input type="text"   value="'.$row['sickCity'].'" id="sickCity" placeholder="City"><br>
			<input type="number" value="'.$row['sickPhone'].'" id="sickPhone" placeholder="Phone"><br>
			<select id="donate_type" required="" title="Choose Donate Type">
				<option value="'.$row['donate_type'].'" style="background:red;">'.$donate_type.'</option>
				<option value="readydonate">'.$donate_type_ready.'</option>
				<option value="needdonate">'.$donate_type_need.'</option>
			</select><br>
			<input type="hidden" value="'.$_POST['id'].'" id="id_donate">
			<br>
			<button class="btn btn-success" onclick="return update_donate();">'.$donate_button.'</button>
		</form>';
?> 