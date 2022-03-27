<?php
	include("../connect.php");
	session_start();
	if (@$_SESSION['lang']==='rtl'){ 
		$remove_message = "هذه الرسالة قد حذفت لديك";
		$removeAll='حذف لدى الجميع';
		$removeMe='حذف لدي';
	}
	else{
		$remove_message = "This Message Has Removed For You";
		$removeAll='Remove For All';
		$removeMe='Remove For Me';
	}

	@$query = mysqli_query($con,"SELECT * FROM chat_message WHERE (to_user_id='".$_SESSION['to_id']."' AND from_user_id='".$_SESSION['from_id']."') OR (from_user_id='".$_SESSION['to_id']."' AND to_user_id='".$_SESSION['from_id']."') ORDER BY message_time ASC"); 
	while ($row=mysqli_fetch_array($query)) 
	{	
		// Right side for Sender
		if($row["from_user_id"] === $_SESSION['from_id'])
		{
			@$sql = mysqli_query($con,"SELECT * FROM client where id ='".@$_SESSION['from_id']."'");
			@$row_sub=mysqli_fetch_array($sql);
			if (empty($row_sub['user_image'])) {
				if (($row_sub['gender']=='male') || ($row_sub['gender']=='ذكر')) { @$image="<img src='images/male_user.png'>";}
				else{ @$image="<img src='images/female_user.jpg'>";}
			}
			else{ $image = "<img src=uploaded_img/".$row_sub['user_image'].">"; }
			echo'<div class="float_right">';
			//Mean my messages had removed for me when status equal to 2
			if (@$row['status'] == '2')
			{	echo @$image.'
					<ul class="list-unstyled ellipsis-open">
						<li>
							<a href="" title="'.$removeAll.'" onclick="return delete_all_message('.@$row['chat_message_id'].')">
								<i class="glyphicon glyphicon-remove"></i> 
							</a>
						</li>
					</ul>
					<span class="text-capitalize">'. @$row_sub['fullName'] .'</span><br />
					<p style="color:#000;background:rgba(245, 0, 0, 0.85);opacity:0.7;">'.$remove_message.'</p>
					<span class="message_time">'.@$row['message_time'].'</span>';
			}
			//show my messages when status equal to 0(read) Or 1(unRead)
			else
			{
				echo @$image.'
					<ul class="list-unstyled ellipsis-open">
						<li>
							<a href="" title="'.$removeMe.'" onclick="return delete_me_message('.$row['chat_message_id'].')">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</li>
						<li>
							<a href="" title="'.$removeAll.'" onclick="return delete_all_message('.$row['chat_message_id'].')">
								<i class="glyphicon glyphicon-remove"></i> 
							</a>
						</li>
					</ul>
					<span class="text-capitalize">'. @$row_sub['fullName'] .'</span><br />
					<p>'.@$row['chat_message'].'<br></p>
					<span class="message_time">'.@$row['message_time'].'</span>';
			}
			echo'</div>';
		}
		// Left side for Receiver
		else 
		{	//Mean The messages To Me had removed By me when second_status equal to 3
			@$sql = mysqli_query($con,"SELECT * FROM client where id ='".@$_SESSION['to_id']."'");
			@$row_sub=mysqli_fetch_array($sql);
			if (empty($row_sub['user_image'])) {
				if (($row_sub['gender']=='male') || ($row_sub['gender']=='ذكر')) { @$image="<img src='images/male_user.png'>";}
				else{ @$image="<img src='images/female_user.jpg'>";}
			}
			else{ $image = "<img src=uploaded_img/".$row_sub['user_image'].">"; }
			echo'<div class="float_left">';
				if ($row['second_status'] == '3')
				{	echo @$image.'
						<span class="text-capitalize">'. @$row_sub['fullName'] .'</span><br />
						<p style="color:#000;background:rgba(245, 0, 0, 0.85);opacity:0.7;">'.$remove_message.'</p>
						<span class="message_time">'.@$row['message_time'].'</span>';
				}
				//show my messages when status equal to 0(read) Or 1(unRead)
				else
				{
				echo @$image.'
					<ul class="list-unstyled ellipsis-open">
						<li>
							<a href="#" title="'.$removeMe.'" onclick="return delete_sender_message('.$row['chat_message_id'].')"><i class="glyphicon glyphicon-trash"></i></a>
						</li>
					</ul>
					<span class="text-capitalize">'. @$row_sub['fullName'] .'</span><br />
						<p >'.@$row['chat_message'].'<br></p>
						<span class="message_time">'.@$row['message_time'].'</span>';
				}
			echo'</div>';
		}
	}
?>