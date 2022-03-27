<div class="col-lg-3" >
	<div id="chat_box">
	<!-- Start div show active users at site -->
		<div class="col-lg-12">
			<div class="myName"><h4 class="text-center">Active Users</h4></div>
		</div>
		<div class="chat">
			<div class="col-lg-12">
				<!-- fetch information of users are active from main table -->
				<?php 
					include("connect.php");
					@$result = mysqli_query($con,"SELECT * FROM client where id ='".$_SESSION['client_id']."'");
					while ($row=mysqli_fetch_array($result)) 
					{
						echo"<div id='from_id' style='display:none;'>".$_SESSION['client_id']."</div>";
						$_SESSION['fullName'] = $row['fullName'];	
					}
				?>
				<div id="client_details"></div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-5">
	<!-- Call open_chat.php That Show the messages -->
		<div class="row">
			<div class="col-lg-12">
				<div id="open_chat"></div>
			</div>
		</div>
	</div>
</div>
<!-- End div show active users at site -->