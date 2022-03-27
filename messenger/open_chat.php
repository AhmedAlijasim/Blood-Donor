<?php 
	session_start();
	include("../connect.php");
	//my personal informations ( Sender )
	@$result = mysqli_query($con,"SELECT * FROM client where id ='".$_SESSION['client_id']."'");
	@$row=mysqli_fetch_array($result);
	@$_SESSION['from_id'] = $row['id'];//sender
?>
<!--================================================= -->
<section class="open_chat">
	<div class="row">
		<div class="col-sm-12">
			<button id="close_but" class="glyphicon glyphicon-off"></button>
			<div class="username_chat">
			<?php
				/* fetch Id value of the user from open_chat() 
				function that found in chat.js */
				@$_SESSION['to_id'] = $_POST['client_id']; //Receiver
				//Your personal informations ( Receiver )
				@$result = mysqli_query($con,"SELECT * FROM client where id ='".$_POST['client_id']."'");
				@$row=mysqli_fetch_array($result);
				echo'<h4 class="text-center" id="receive_cilentName">'.$row['fullName'] .'</h4>';
			?>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="chat_details">
				<div class="user_chat_box"> <!-- Here display messages --> </div>
			</div>
		</div>
		<!--***** Write Message And Send It To Database *****-->
		<div class="col-sm-12">
			<div class="send_chat">
				<form method="post" onsubmit="return insert_message();">
					<?php 
					echo'<textarea id="message" onkeyup="return start_write_message
					(\'' . $_SESSION['from_id'] . '\' , \'' . $_SESSION['to_id'].'\')"></textarea>';
					?>
					<button type="submit" class="btn btn-primary">Send</button>
					<div id='error_msg'></div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--*** Update state of message To Become Seen On click Button (nNotification )***-->
<?php 
if($_POST['openState'] ==='open')
{
	@$sql=mysqli_query($con, "UPDATE chat_message SET status = '0' WHERE 
	from_user_id='".$_SESSION['to_id']."' AND to_user_id='".$_SESSION['from_id']."' AND status = '1'");
}
?>
<script>
$(document).ready(function () {
    "use strict";
    //********* Change Language Chat To Arabic **********
    if ($("#cookie_lang").text()==='rtl') {
        $("#close_but").css({"borderRadius":"0 14px 0 0", "height":"41px"});
        $(".send_chat button").text("ارسال");
        $("#open_chat").css("left", "0");
        if($("body").width() > 768){
        	$("#open_chat").css("left", "15px");
	    }
    }
});
</script>