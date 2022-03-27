<?php
session_start(); 
include'../connect.php';
//***************** Start Show Notification unseen ************************//
//Join tow tables and fetch info from them.
$query = mysqli_query($con, "SELECT * FROM notification JOIN donate ON donate.id=notification.donate_id WHERE 
	donate.id=notification.donate_id AND
	notification.from_id !='".$_SESSION['client_id']."' AND
	notification.to_id ='".$_SESSION['client_id']."' AND notification.status='1'
	ORDER BY donate.date DESC");

while($notification_row = mysqli_fetch_array($query))
{	
	//show data from client table
	$sql_client = mysqli_query($con,"SELECT * FROM client WHERE id='".$notification_row['from_id']."'");
	$client_row = mysqli_fetch_array($sql_client);
	//show data from donate table
	if (@$_SESSION['lang']=='rtl') { 
		$all = ' العمر '.$notification_row['sickAge'].' سنة  <bdi>فصيلة الدم '.$notification_row['sickGblood']."</bdi>";
	} else { 
		$all = ' Age '.$notification_row['sickAge'].' Years  <bdi>Type Blood '.$notification_row['sickGblood']."</bdi>";
	}
			
	$id = $notification_row['donate_id'];
	$from = $notification_row['from_id'];
	$to = $notification_row['to_id'];

	if (empty($client_row['user_image'])) {
		if (($client_row['gender']=='male') || ($client_row['gender']=='ذكر')) { @$image="<img src='images/male_user.png' class='img-responsive'>";}
		else{ @$image="<img src='images/female_user.jpg' class='img-responsive'>";}
	}
	else{ $image = "<img src=uploaded_img/".$client_row['user_image']." class='img-responsive'>"; }

	echo'
	<a href="#id'.$notification_row['donate_id'].'" onclick="update_status(\''.$id . '\',\'' . $from . '\' , \'' . $to.'\')" id="part_notifi">
		<div class="notification_div">
			<span>'.@$client_row['fullName'].'</span>
			'.@$image."
			<div id='notification_text'><p>".@$all."</p><br></div>
		</div>
	</a>";	
}
if(mysqli_num_rows($query) <= 0){
	echo'<div class="msg_notifi" style="padding:20px;">Not Found New Notifications</div>';
}
?>
<script>
//Edit Css Property Of Notification When Be The Site Is Arabic .
$(document).ready(function () {
	if ($("#cookie_lang").text()==='rtl') {
		$(".msg_notifi").text("لم يتم العثور على اشعارات جديدة");
		if ($("body").width() < 798) {
	        $(".notification_div span").css("right","42px");
			$(".notification_div img").css("right","0");
			$(".notification_div #notification_text").css("right","42px");
	    } else {
	    	$("#notification_box").css({"right":"325px","top":"51px"});
			$(".notification_div span").css("right","80px");
			$(".notification_div img").css("right","5px");
			$(".notification_div #notification_text").css({"marginRight":"80px"});
	    }
	}
});
</script>