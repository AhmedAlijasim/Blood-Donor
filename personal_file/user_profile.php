<?php
session_start();
include '../connect.php';
$result = mysqli_query($con,"SELECT * FROM client WHERE id ='".$_POST['user_id']."'");
$count=mysqli_num_rows($result);
if ((empty($_SESSION['client_id'])) || ($count == 0)){ header('location:client_Register/client_login.php'); }
else{
	// Start Fetching Client Information from Database 
	$row=mysqli_fetch_array($result);
	$id	= $row['id'];
	$fullName	= $row['fullName'];	
	$brithDate	= $row['brithDate'];	
	$gender		= $row['gender'];	
	$bloodGroup	= $row['bloodGroup'];	
	$mobileNo	= $row['mobileNo'];	
	$country	= $row['country'];	
	$city		= $row['city'];	
	$image 		= "<img src=uploaded_img/".$row['user_image'].">";

	if (@$_SESSION['lang']=='rtl') { 
		$Name ="الاسم : ";
		$Blood_Group ="فصيلة الدم : ";
		$Birth_Date ="تاريخ الميلاد : ";
		$Sex ="الجنس : ";
		$Phone_Number ="رقم الهاتف : ";
		$Country ="البلد : ";
		$City ="المدينة : ";
		$back = 'العودة للصفحة الرئيسية';
	}
	else { 
		$Name ="Name : ";
		$Blood_Group ="Blood Group : ";
		$Birth_Date ="Birth Date : ";
		$Sex ="Sex : ";
		$Phone_Number ="Phone Number : ";
		$Country ="Country : ";
		$City ="City : ";
		$back = 'Back To The Home Page';
	}
}
?>	<div id="protofile">
		<div class="row">
			<div class="col-lg-12">
				<div class="head">
					<div class="image">
						<?php
						if (empty($row['user_image'])) {
							if (($gender=='male') || ($gender=='ذكر')) { echo @$image="<img src='images/male_user.png'>"; } 
							else { echo @$image="<img src='images/female_user.jpg'>"; }
						} else { echo @$image; }
						?>
					</div>
				</div>			
				<div class="info lead">
					<?php echo'
					<a href="" onclick=" return hide_user_protofile();" class="btn btn-warning">'.$back.'</a>';?>
					<?php echo'<div><span>'.$Name.'</span> '.@$fullName.'</div><br>
					<div><span>'.$Blood_Group.'</span> '.@$bloodGroup.'</div><br>
					<div><span>'.$Birth_Date.'</span>'.@$brithDate.'</div><br>
					<div><span>'.$Sex.'</span>'.@$gender.'</div><br>
					<div><span>'.$Phone_Number.'</span>'.@$mobileNo.'</div><br>
					<div><span>'.$Country.'</span>'.@$country.'</div><br>
					<div><span>'.$City.'</span>'.@$city.'</div><br>';?>
				</div>
			</div>
		</div>
	</div>