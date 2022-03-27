<?php
include '../connect.php';
session_start();
if (isset($_POST['update'])) {
	$update = mysqli_query($con, "UPDATE client SET 
		fullName='".$_POST['fullName']."',
		email='".$_POST['email']."',
		password='".$_POST['password']."',
		brithDate='".$_POST['brithDate']."',
		gender='".$_POST['gender']."',
		bloodGroup='".$_POST['bloodGroup']."',
		mobileNo='".$_POST['mobileNo']."',
		country='".$_POST['country']."',
		city='".$_POST['city']."' WHERE id='".$_POST['id']."'");
	if($update==true){
		header("location:personal_file.php");
	}
}
$query = mysqli_query($con, "SELECT * FROM client WHERE id='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
echo'
	<form action="'.$_SERVER['PHP_SELF'].'" method="post">
		<input type="text"   value="'.$row['fullName'].'"   name="fullName"   placeholder="الاسم"><br>		
		<input type="text"   value="'.$row['email'].'"      name="email"      placeholder="الايميل"><br>
		<input type="text"   value="'.$row['password'].'"   name="password"   placeholder="كلمة السر"><br>
		<input type="text"   value="'.$row['brithDate'].'"  name="brithDate"  placeholder="تاريخ الميلاد"><br>
		<input type="text"   value="'.$row['gender'].'"     name="gender"     placeholder="الجنس"><br>
		<input type="text"   value="'.$row['bloodGroup'].'" name="bloodGroup" placeholder="فصيلة الدم"><br>
		<input type="text"   value="'.$row['mobileNo'].'"   name="mobileNo"   placeholder="رقم الهاتف"><br>
		<input type="text"   value="'.$row['country'].'"    name="country"    placeholder="البلد"><br>
		<input type="text"   value="'.$row['city'].'"       name="city"       placeholder="المدينة"><br>
		<input type="hidden" name="id" value="'.$_GET['id'].'"><br>';?>
		<button class="btn btn-primary" name="update">
			<?php 
				if (@$_SESSION['lang']=='rtl') { echo'تحديث'; }
				else { echo'Update'; }
			?>		
		</button>
		<button class="btn btn-danger" id="back">
			<?php 
				if (@$_SESSION['lang']=='rtl') { echo'رجوع'; }
				else { echo'Back'; }
			?>
		</button>
	</form>
?>
<script>
$(function () {
    "use strict";
	$("#back").on("click",function(event){
    	event.preventDefault();
	    $("#show_person_edit").fadeOut();
	    $(".info").fadeToggle(2000);
	});
});
</script>