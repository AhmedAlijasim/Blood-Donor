<?php
include("../connect.php");
session_start();
if (empty($_POST["text"]) || empty($_POST["sickAge"]) || empty($_POST["sickGblood"]) || empty($_POST["donateBlood"]) || empty($_POST["sickCountry"])|| empty($_POST["sickCity"]) || empty($_POST["sickPhone"])) 
{ 
	if ($_SESSION['lang']=='rtl') { echo"رجاءا املئ كل الحقول";}
	else { echo"Please Fill In All Fields";}
} else{
	//Call The Function :- test_input() And Convert Html Tag to String
	@$text  = filter_var(test_input($_POST["text"]), FILTER_SANITIZE_STRING);
	@$sickAge  = filter_var(test_input($_POST["sickAge"]), FILTER_SANITIZE_STRING);
	@$gr = $_POST["sickGblood"];
	if(($gr==="Apos")||($gr==="Bpos")|| ($gr==="ABpos")|| ($gr==="Opos"))
	{
		@$groub_blood = str_replace('pos', '+', $_POST["sickGblood"]);
	}
	else
	{
		@$groub_blood = str_replace('neg', '-', $_POST["sickGblood"]);
	}
	@$sickGblood  = filter_var(test_input($groub_blood), FILTER_SANITIZE_STRING);
	@$donateBlood = filter_var(test_input($_POST["donateBlood"]), FILTER_SANITIZE_STRING);
	@$sickCountry = filter_var(test_input($_POST["sickCountry"]), FILTER_SANITIZE_STRING);
	@$sickCity = filter_var(test_input($_POST["sickCity"]), FILTER_SANITIZE_STRING);
	@$sickPhone   = filter_var(test_input($_POST["sickPhone"]), FILTER_SANITIZE_STRING);
	//Insert the data into donate table.
	@$result=mysqli_query($con,"INSERT INTO donate (textDonate, sickAge, sickGblood, donate_type, sickCountry, sickCity, sickPhone,from_id)
	VALUES('$text', '$sickAge', '$sickGblood', '$donateBlood', '$sickCountry', '$sickCity', '$sickPhone','".$_SESSION['client_id']."')");
	
	if (@$result===TRUE)
	{
		if (@$_SESSION['lang']=='rtl') { echo"تم نشر منشورك بنجاح";}
		else { echo"Your Post Was Published Successfully";}
		//fetch some info from donate of last row inserted
		@$sql=mysqli_query($con,"SELECT id,from_id FROM donate 
			ORDER BY id DESC LIMIT 1");
		@$row=mysqli_fetch_array($sql);
		//fetch All info from client to send notification for every one of them
		@$sql2=mysqli_query($con,"SELECT * FROM client");
		while($row2=mysqli_fetch_array($sql2))
		{
			@mysqli_query($con,"INSERT INTO notification(donate_id,from_id,to_id,status)
			VALUES('".$row['id']."', '".$row['from_id']."', '".$row2['id']."','1')
			");
		}
	}
	else{
		echo"لم يتم النشر بنجاح";
	}
	mysqli_close($con);
	//header("location:../index.php");
}
function test_input($data) // create protected function
{
	@$data  =  trim($data);
	@$data  =  stripcslashes($data);//remove backslash
	@$data  =  htmlspecialchars($data);
	return $data;
}
?>