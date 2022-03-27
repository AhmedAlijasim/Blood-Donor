<?php
	//fetch_user.php

	session_start();
	include("../connect.php");
	///////////////////////////////////////////////////////////////////////
	function fetch_user_last_activity($client_id, $con)
	{
		$query  = "SELECT * FROM client_active WHERE client_id = '$client_id' ORDER BY login_time DESC";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result))
		{
		  return $row['login_time'];
		}
	}
//*****************number messages unread************************//
	function count_unseen_message($from_user_id, $to_user_id, $con)
	{
	 $query = mysqli_query($con, "SELECT * FROM chat_message 
	 WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1'");
	 $count = mysqli_num_rows($query);
	 $output = '';
	 if($count > 0)
	 {
	  $output = $count;
	 }
	 return $output;
	}
 	///////////////////////////////////////////////////////////////
	$query  ="SELECT client.fullName, client.gender, client.user_image, client_active.client_id
	FROM client_active JOIN client ON client.id = client_active.client_id 
	WHERE client.id != '".@$_SESSION['client_id']."' ORDER BY login_time DESC";
	

	$result = mysqli_query($con, $query);
	while($row=mysqli_fetch_array($result))
	{	if (empty($row['user_image'])) {
			if (($row['gender']=='male') || ($row['gender']=='ذكر')) { @$image="<img src='images/male_user.png'>";}
			else{ @$image="<img src='images/female_user.jpg'>";}
		}
		else{ $image = "<img src=uploaded_img/".$row['user_image'].">"; }
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = fetch_user_last_activity($row['client_id'], $con);
		if($user_last_activity > $current_timestamp)
		{
			@$status = '<i class="glyphicon glyphicon-heart" style="color:green;"></i>';
		}
		else
		{
			@$status = '<i class="glyphicon glyphicon-heart" style="color:red;"></i>';
		}
		echo'
		<div class="user_profile">
			<a href="" id="user_chat" onclick="open_chat('.$row['client_id'].')">
				'.$image.'
				<span class="text-capitalize">'. $row['fullName'].'</span>
				<span class="text-capitalize">'.@count_unseen_message($row['client_id'], $_SESSION['client_id'], $con).'</span>
				<span class="text-capitalize">'.$status.'</span>
			</a>
		</div>';
	}
?>
<script>
$(document).ready(function () {
	//start open message on click on username of clients
	$(".user_profile #user_chat").on("click", function (event) {
		event.preventDefault();
		$("#open_chat").fadeIn();
		$("#chat_box").fadeOut();
	});
	//************* Hide box chat On click close_button *************
	$("#close_but").on("click", function(){
		$("#open_chat").fadeOut();
		if ($("html").width() < 768) {
			$(".sub_donation").fadeIn(1000);
			$("#chat_box").fadeOut();
			$(".donation").fadeIn();
			$(".test_agree,#mymenu .navbar-nav").fadeIn();
			$(".footer").fadeIn();
		} else
		{
			$("#chat_box").fadeIn();
		}
	});
	if ($("#cookie_lang").text()==='rtl') {
		$("#chat_box .myName h4").text("المستخدمين النشطين");
	};
});
</script>