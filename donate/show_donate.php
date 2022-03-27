<!-- Start Div Of Donation --> 
<?php 
include '../connect.php'; 
session_start();
if (isset($_SESSION['page'])) { $page = $_SESSION['page'];} 
else { $page = 1;}
$num_ber_page = 3;
$from_page = ($page - 1)*$num_ber_page;

$query = mysqli_query($con, "SELECT * FROM donate ORDER BY date DESC LIMIT $from_page,$num_ber_page");
//fetch data from donate table.
//****** Show remove Or edit Option donate Post ********//
function show_donate_options($id){
	if (@$_SESSION['lang']=='rtl'){
		$delete_title="حذف المنشور"; 
		$edit_title="تعديل المنشور"; 
		$newClass='position: relative;margin-bottom: -62px;';
	} else {
		$delete_title="Delete Post"; 
		$edit_title="Edit Post"; 
	}
	
	echo'
		<ul class="list-unstyled ellipsis-open" style="'.@$newClass.'">
			<li>
				<a href="" class="show_delete" title="'.$delete_title.'" onclick="return donate_delete_option('.$id.')">
					<i class="glyphicon glyphicon-remove"></i> 
				</a>
			</li>
			<li>
				<a href="" class="show_edit" title="'.$edit_title.'" onclick="return donate_edit_option('.$id.')">
					<i class="glyphicon glyphicon-edit"></i> 
				</a>
			</li>
		</ul>
	';
}
////////////////////////////////////////////
$count = mysqli_num_rows($query);
if ($count > 0) {
	while ($row_donate=mysqli_fetch_array($query)) 
	{	
		//fetch info for all users
		$sql2=mysqli_query($con,"SELECT * FROM client WHERE id='".$row_donate['from_id']."'");
		$row_client=mysqli_fetch_array($sql2);
		if (empty($row_client['user_image'])) {
			if (($row_client['gender']=='male') || ($row_client['gender']=='ذكر')) { @$image="<img src='images/male_user.png'>";}
			else{ @$image="<img src='images/female_user.jpg'>";}
		}
		else{ $image = "<img src=uploaded_img/".$row_client['user_image'].">"; }

		$sql3=mysqli_query($con, "SELECT * FROM notification WHERE donate_id='".$row_donate['id']."' AND to_id='".$_SESSION['client_id']."'");
		$row3=mysqli_fetch_array($sql3);
		$id = $row3['donate_id'];
		$from = $row3['from_id'];
		$to = $row3['to_id'];
		/***** Start fetch data from donate table *******/
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
								<span class="text-capitalize">'.@$row_client['fullName'].'</span>
							</a>
						</div>';
				}
				else{
					echo'<div class="col-xs-12">
						<a href="" id="show_profile" onclick="return user_profile('.$row_client['id'].')" title="Show Profile Of The User">
							'.@$image.'
							<span class="text-capitalize">'.@$row_client['fullName'].'</span>
						</a>
					</div>';
				}
		echo'</div>';
		//****************************************************
		if (@$_SESSION['lang']=='rtl') {
			$Age="العمر : ";
			$Blood_Type="فصيلة الدم : ";
			$Donate_Type="نوع التبرع : ";
			$Address="العنوان : ";
			$Phone_Number="رقم الهاتف : ";
			if ($row_donate['donate_type']=='readydonate') { $donate_type="انا أريد التبرع بدمي";  }
			else { $donate_type="انا أحتاج لشخص ما يتبرع لي";}
		} else {
			$Age="Age : ";
			$Blood_Type="Blood Type : ";
			$Donate_Type="Donate Type : ";
			$Address="Address : ";
			$Phone_Number="Phone Number : ";
			if ($row_donate['donate_type']=='readydonate') {  $donate_type="Ready To Donate"; }
			else { $donate_type="Need To Donate"; }
		}
	echo'<div class="row donate_middle">
			
				<div class="col-xs-12">
					<div id="edit_donate"></div>
				</div>

			<div class="col-sm-12">
				<pre><bdi>'.$row_donate['textDonate'].'</bdi></pre>
				<ul class="list-unstyled">
					<li><span>'.$Age.'</span><bdi>'.$row_donate['sickAge'].'</bdi></li>
					<li><span>'.$Blood_Type.'</span><strong id="blG"><bdi> '.$row_donate['sickGblood'].'</bdi></strong></li>
					<li><span>'.$Donate_Type.'</span><strong id="blG"><bdi> '.$donate_type.'</bdi></strong></li>
					<li><span>'.$Address.'</span><bdi>'.$row_donate['sickCountry'].' / '.$row_donate['sickCity'].'</bdi></li>
					<li><span>'.$Phone_Number.'</span><bdi>'.$row_donate['sickPhone'].'</bdi></li>
				</ul>
			</div>
		</div>
		<div class="row share_date">
			<div class="col-xs-12">
				<p> 
					<span> Posted On  </span> <b>'.$row_donate['date'].'</b>
				</p>
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
}
else{ 
	if (@$_SESSION['lang']=='rtl') { echo"<span class='not_found_post'>لا يوجد منشورات .............</span>"; }
	else {  echo"<span class='not_found_post'>Not Found Posts ............. </span>";}
}
if (@$_SESSION['lang']=='rtl') { 
	$next_page="التالي"; 
	$Prev_page="السابق";
}
else { 
	$next_page="Next"; 
	$Prev_page="Previous";
}
?>
<!-- Start Pagination -->
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-6">
			<?php if(($page - 1) > 0) { ?>
			<div class="page-item text-left">
				<a class="page-link" href="index.php?page=<?php if(($page - 1) > 0){echo $page - 1;}else{echo '1';} ?>"><?php echo @$Prev_page; ?></a>
			</div>
			<?php } ?>
		</div>
		<div class="col-xs-6">
			<?php
			    $query_donate=mysqli_query($con,"SELECT id FROM donate");
			    $Total_donate = mysqli_num_rows($query_donate);
			    $Total_page = ceil($Total_donate/$num_ber_page);
		    ?>
		    <?php if(($page + 1) > $Total_page) { 
			echo '<div class="page-item text-right"></div>'; } else { ?>
				<div class="page-item text-right">
					<a class="page-link" href="index.php?page=<?php if(($page + 1) < $Total_page){ echo $page + 1;}elseif(($page + 1) >= $Total_page){echo $Total_page;} ?>"><?php echo @$next_page; ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<!--End Pagination -->
<!--	/************* End fetch data from donate table *************/
End Div Of Donation -->
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
    //********* Change Language Show_donate page To Arabic **********
    if ($("#cookie_lang").text()==='rtl'){
    	$(".donate_part .ellipsis-open li .show_delete").attr("title","حذف منشورك");
    	$(".donate_part .ellipsis-open li .show_edit").attr("title","تعديل منشورك");
    	$(".donate_part .donate_head a").attr("title","ملفك الشخصي");
    	$(".donate_part .donate_head #show_profile").attr("title","عرض ملفه الشخصي");
    	$(".donate_part .donate_head #user_chat").attr("title","ارسل رسالة له الان");
    	$(".donation .donate_middle ul").css("marginRight","-42px");
    	$(".donation .share_date p span").text("نشر في ");
    	$(".donation .donate_footer #user_chat").attr("title","ارسل رسالة له الان");
    }
});
</script>