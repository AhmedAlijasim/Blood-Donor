<?php
include '../connect.php';
session_start();
//fetch data from donate table.
$query = mysqli_query($con, "SELECT * FROM donate WHERE id='".$_GET['id']."'");

////////////////////////////////////////////
	while ($row_donate=mysqli_fetch_array($query)) 
	{
		//fetch info for all users

		$sql2=mysqli_query($con,"SELECT * FROM client WHERE 
		id='".$row_donate['from_id']."'");
		$row_client=mysqli_fetch_array($sql2);
		
		if (empty($row_client['user_image'])) {
			if (($row_client['gender']=='male') || ($row_client['gender']=='ذكر')) { @$image="<img src='images/male_user.png'>";}
			else{ @$image="<img src='images/female_user.jpg'>";}
		}
		else{ $image = "<img src=uploaded_img/".$row_client['user_image'].">"; }

		$sql3=mysqli_query($con, "SELECT * FROM notification 
			WHERE donate_id='".$row_donate['id']."' AND to_id='".$_SESSION['client_id']."'");
		$row3=mysqli_fetch_array($sql3);
		$id = $row3['donate_id'];
		$from = $row3['from_id'];
		$to = $row3['to_id'];
		/***** Start fetch data from donate table *******/
	echo'<div class="row">
			<div class="col-xs-12">
				<div id="edit_donate"></div>
			</div>
		</div>'; 
	echo'
	<div class="donate_part">';
		if($from == $_SESSION['client_id']){
			echo show_donate_options($id);
		}
		echo'<div class="row donate_head">';
				if ($row_client['id']===$_SESSION['client_id']) {
					echo'<div class="col-xs-12">
							<a href="personal_file/personal_file.php" title="Personal File">
								'.@$image.'
								<span class="text-capitalize">'.$row_client['fullName'].'</span>
							</a>
						</div>';
				}
				else{
					echo'<div class="col-xs-12">
						<a href="" id="user_chat" onclick="return open_chat('.$row_client['id'].')" title="Message">
							'.@$image.'
							<span class="text-capitalize">'.$row_client['fullName'].'</span>
						</a>
					</div>';
				}
		echo'</div>';
		//****************************************************
		if ($row_donate['donate_type']=='readydonate') {
			if (@$_SESSION['lang']=='rtl') { $donate_type="انا أريد التبرع بدمي"; }
			else { $donate_type="Ready To Donate"; }
		} else {
			if (@$_SESSION['lang']=='rtl') { $donate_type="انا أحتاج لشخص ما يتبرع لي"; }
			else { $donate_type="Need To Donate"; }
		}
	echo'<div class="row donate_middle">
			<div class="col-sm-12">
				<p><bdi>'.$row_donate['textDonate'].'</bdi><p>
				<ul class="list-unstyled">
					<li><span>Age : </span><bdi>'.$row_donate['sickAge'].'</bdi></li>
					<li><span>Blood Type :</span><strong id="blG"><bdi> '.$row_donate['sickGblood'].'</bdi></strong></li>
					<li><span>Donate Type :</span><strong id="blG"><bdi> '.$donate_type.'</bdi></strong></li>
					<li><span>Address : </span><bdi>'.$row_donate['sickCountry'].' / '.$row_donate['sickCity'].'</bdi></li>
					<li><span>Phone Number : </span><bdi>'.$row_donate['sickPhone'].'</bdi></li>
				</ul>
			</div>
		</div>
		<div class="row share_date">
			<div class="col-xs-12">
				<span>نشر في <b>'.$row_donate['date'].'</b></span>
			</div>
		</div>
		<div class="row donate_footer">	
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-6 text-left">';
					if ($row_client['id']!==$_SESSION['client_id']) {
					echo'<a href="" id="user_chat" onclick="return open_chat('.$row_client['id'].')" title="Send A Message For Him"><i class="glyphicon glyphicon-envelope"></i>
						</a>';
					}
					echo'</div>
				</div>
			</div>
		</div>';
	echo'</div>';
	}
?>
<script>
$(function () {
    "use strict";
    // open message on click on username of clients
	$(".donate_part #user_chat").on("click", function (event) {
		event.preventDefault();
		$("#chat_box").fadeOut();
		$("#open_chat").fadeIn();
	});
    // When click on Links at list item delete or edit
    $(".donate_part .ellipsis-open li a,.donate_part .donate_head #user_chat").on("click", function(event) {
        event.preventDefault();
    });
    $(".donate_part .ellipsis-open li .show_edit").on("click", function() {
        $("#edit_donate").fadeToggle(1000);
    });
    //********* Change Language ellipsis-open list To Arabic **********
    if ($("#cookie_lang").text()==='rtl'){
    	$(".donate_part .ellipsis-open li .show_delete b").text("حذف").attr("title","حذف منشورك");
    	$(".donate_part .ellipsis-open li .show_edit b").text("تعديل").attr("title","تعديل منشورك");
    	$(".donate_part .donate_head a").attr("title","ملفك الشخصي");
    	$(".donate_part .donate_head #user_chat").attr("title","رسالة");
    	$(".donation .donate_middle ul").css("marginRight","-42px");
    	$(".donation .donate_middle ul li span").eq(0).text("العمر : ");
    	$(".donation .donate_middle ul li span").eq(1).text("فصيلة الدم : ");
    	$(".donation .donate_middle ul li span").eq(2).text("العنوان : ");
    	$(".donation .donate_middle ul li span").eq(3).text("رقم الهاتف : ");
    }
});
</script>