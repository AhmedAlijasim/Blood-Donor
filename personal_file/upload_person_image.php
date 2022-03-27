<?php
session_start();
include('../connect.php');
if (isset($_POST['update'])) {
/* start upload image      */
//Setting Errors Array
$errors = array();
//Get info from Array
$path=$_FILES['upload']['tmp_name'];
$name=$_FILES['upload']['name'];
$size=$_FILES['upload']['size'];
$type=$_FILES['upload']['type'];
$error=$_FILES['upload']['error'];
//set allowed images extensions
$allowed_exten = array('jpg','gif','jpeg','png');
//get image extension
@$image_exten = strtolower(end(explode('.', $name)));
//get random extension
@$image_random=rand(0, 1000000000).'.'.$image_exten;
@$dir_name=$_SERVER['DOCUMENT_ROOT'].'\Bloodnew\uploaded_img\\'.$image_random;
//@$dir_name=realpath(dirname(getcwd())).'/uploaded_img/'.$image_random; //On Server

//check if file is uploaded	
if ($error == 4)
	{	if ($_SESSION['lang']=='rtl') { $errors[] ='لم يتم تحميل أي صورة'; }
		else { $errors[] ='No Image Is Uploaded'; }
	}
else

{
	//check image size
	if ($size > 5000000) 
		{
			if ($_SESSION['lang']=='rtl') { $errors[] ='حجم الصورة كبير يجب أن لا يزيد عن 5 MB '; }
			else { $errors[] ='The Image Size Is Large Should Not Increase Over 5MB'; }
		}

	//check image type 
	if (!in_array($image_exten, $allowed_exten )) 
		{
			if ($_SESSION['lang']=='rtl') { $errors[] ='الملف ليس صالح يجب ان تكون الصورة تنتهي بأحد هذه الامتدادات jpg , jpeg , png , gif'; }
			else { $errors[] ='The File Is Not Valid , Must Be Finsh The Picture In One Of The Extensions jpg , jpeg , png , gif'; }
		}
} 
//check if has no errors
if(empty($errors))
{
	//////////////////////////////////////////////////////
	@$query=mysqli_query($con,"SELECT user_image FROM client WHERE id='".$_SESSION['client_id']."'");
	@$row=mysqli_fetch_array($query);
	@$dir_image=$_SERVER['DOCUMENT_ROOT'].'Bloodnew\uploaded_img\\'.$row['user_image'];//On localhost
	//@$dir_image=realpath(dirname(getcwd())).'/uploaded_img/'.$row['user_image'];//On Server
 
	if (file_exists($dir_image)){ unlink($dir_image); }
	//////////////////////////////////////////////////////
	@$result=mysqli_query($con,"UPDATE client SET user_image='$image_random' 
				WHERE id='".$_SESSION['client_id']."'");
	@move_uploaded_file($path, $dir_name);
	header('location:../personal_file/personal_file.php');
	mysqli_close($con);
}
else
//if here errors print errors
	foreach ($errors as $key) 
	{
		header('location:../personal_file/personal_file.php?msg_error='.$key.'');
	}
}
?>