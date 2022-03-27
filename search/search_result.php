<?php 
include'../connect.php';
session_start();
@$bl_group =$_GET['blood_type'];
@$do_type =$_GET['donate_type'];
@$city_search = $_GET['city_search'];
@$query = mysqli_query($con, "SELECT * FROM donate WHERE sickGblood='$bl_group' AND donate_type !='$do_type' AND from_id!='".$_SESSION['client_id']."' AND sickCity LIKE '%$city_search%' ORDER BY date DESC  LIMIT 50");
if (@$_SESSION['lang']=='rtl') {
	$Name ="الاسم";
	$Age ="العمر";
	$Blood ="فصيلة الدم";
	$Address ="العنوان";
	$Donate ="نوع التبرع";
	$Phone ="الهاتف";
	$Date ="تاريخ النشر";
	$message ="رسالة";
	$message_title="أرسل رسالة له الان";
	$search_result="نأسف لا توجد نتائج لهذا البحث";
} else {
	$Name ="Name";
	$Age ="Age";
	$Blood ="Blood Type";
	$Address ="Address";
	$Donate ="Donate Type";
	$Phone ="Phone";
	$Date ="Date";
	$message ="message";
	$message_title="Send A Message For Him";
	$search_result="Sorry Not Found Result For This Search";
}
echo'
	<table class="table">
		<thead>
			<tr>
				<th scope="col">'.$Name.'</th>
				<th scope="col">'.$Age.'</th>
				<th scope="col">'.$Blood.'</th>
				<th scope="col">'.$Address.'</th>
				<th scope="col">'.$Donate.'</th>
				<th scope="col">'.$Phone.'</th>
				<th scope="col">'.$Date.'</th>
				<th scope="col">'.$message.'</th>
			</tr>
		</thead>';
$count=mysqli_num_rows($query);
	if($count > 0){
$i=1;
while ($row_search=mysqli_fetch_array($query)){
	$sql_client = mysqli_query($con,"SELECT * FROM client WHERE id='".$row_search['from_id']."'");
	$client_row = mysqli_fetch_array($sql_client);
	if (empty($client_row['user_image'])) {
		if (($client_row['gender']=='male') || ($client_row['gender']=='ذكر')) { @$image="<img src='images/male_user.png' class='img-responsive'>";}
		else{ @$image="<img src='images/female_user.jpg' class='img-responsive'>";}
	}
	else{ $image = "<img src=uploaded_img/".$client_row['user_image']." class='img-responsive'>"; }
		
		if ($row_search['donate_type']=='readydonate') {
			if (@$_SESSION['lang']=='rtl') { $donate_type="انا أريد التبرع بدمي"; }
			else { $donate_type="Ready To Donate"; }
		} else {
			if (@$_SESSION['lang']=='rtl') { $donate_type="انا أحتاج لشخص ما يتبرع لي"; }
			else { $donate_type="Need To Donate"; }
		}
	echo'
		<tbody>
			<tr>
				<td title="'.$client_row['fullName'].'" id="show_profile" onclick="return user_profile('.$client_row['id'].')" title="Show Profile Of The User">'.$image.'</td>
				<td>'.$row_search['sickAge'].'</td>
				<td>'.$row_search['sickGblood'].'</td>
				<td>'.$row_search['sickCountry'].' / '.$row_search['sickCity'].'</td>
				<td>'.$donate_type.'</td>
				<td>'.$row_search['sickPhone'].'</td>
				<td>'.$row_search['date'].'</td>
				<td id="user_chat">
					<a href=""  onclick="return open_chat('.$row_search['from_id'].')" title="'.$message_title.'"><i class="glyphicon glyphicon-envelope"></i>
					</a>
				</td>
			</tr>
		</tbody>
	';
}

	} else {
	echo'
		<tbody>
			<tr>
				<td colspan="7">'.$search_result.'</td>
			</tr>
		</tbody>
	';
	}
echo'</table>';
?>
<script>
	// open message on click on username of clients
	$("#user_chat a").on("click", function (event) {
		event.preventDefault();
		$("#chat_box").fadeOut();
		$("#open_chat").fadeIn();
	});
</script>