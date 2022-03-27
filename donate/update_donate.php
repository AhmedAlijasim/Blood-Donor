<?php
include '../connect.php';
if (isset($_POST['id_donate'])) {
	@$textDonate  = filter_var(test_input($_POST['textDonate']), FILTER_SANITIZE_STRING);
	@$sickAge = filter_var(test_input($_POST["sickAge"]), FILTER_SANITIZE_STRING);
	@$sickGblood = filter_var(test_input($_POST["sickGblood"]), FILTER_SANITIZE_STRING);
	@$sickCountry = filter_var(test_input($_POST["sickCountry"]), FILTER_SANITIZE_STRING);
	@$sickCity   = filter_var(test_input($_POST["sickCity"]), FILTER_SANITIZE_STRING);
	@$sickPhone   = filter_var(test_input($_POST["sickPhone"]), FILTER_SANITIZE_STRING);
	@$donate_type   = filter_var(test_input($_POST["donate_type"]), FILTER_SANITIZE_STRING);

	$update = mysqli_query($con, "UPDATE donate SET textDonate='$textDonate', sickAge='$sickAge', sickGblood='$sickGblood', sickCountry='$sickCountry',  sickCity='$sickCity', sickPhone='$sickPhone',donate_type='$donate_type' WHERE id='".$_POST['id_donate']."'");
}
if ($update==true) {
	echo("error");
}
echo "<br>textDonate".$textDonate;
echo "<br>sickAge".$sickAge;
echo "<br>sickGblood".$sickGblood;
echo "<br>sickCountry".$sickCountry;
echo "<br>sickCity".$sickCity;
echo "<br>sickPhone".$sickPhone;
echo "<br>donate_type".$donate_type;
function test_input($data) // create protected function
	{
		@$data  =  trim($data);
		@$data  =  stripcslashes($data);//remove backslash
		@$data  =  htmlspecialchars($data);
		return $data;
	}
?>