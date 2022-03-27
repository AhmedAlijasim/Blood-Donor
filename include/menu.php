<?php 
if (@$_SESSION['lang']=='rtl') {$search_link ="بحث";}
else {$search_link ="Search";}
?>
<!-- Start Main Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php" title="Home">
							<span class="hidden-xs home">Home</span>
							<i class="glyphicon glyphicon-home"></i>
						</a>
					</li>

					<li>
						<a href="personal_file/personal_file.php" title="Profile">
							<span class="hidden-xs personal"> Profile</span>
							<i class="glyphicon glyphicon-user"></i>
						</a>
					</li>

					<li class="visible-xs">
						<a href="#chat_box" title="Messages" class="chat_box">
							<i class="glyphicon glyphicon-envelope"></i>
							<span class="messages_count"></span>
						</a>
					</li>

					<li>
						<a href="" id="notification" title="Notifications">
							<span class="hidden-xs notifications">Notifications</span>
							<i class="glyphicon glyphicon-bell"></i> 
							<span class="notification_count"></span>
						</a>
					</li>

				</ul>
				<button type="button" data-toggle="collapse" data-target="#mymenu" class="navbar-toggle">
					<span class="sr-only">Navigation Toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="mymenu" class="collapse navbar-collapse">					
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="donate/donate.php">
							<i class="glyphicon glyphicon-heart"></i>
							<span class="donate">Donate</span>
						</a>
					</li>
					<li>
						<a href="" id="search">
							<i class="glyphicon glyphicon-search"></i>
							<span class="search"><?php echo $search_link; ?></span>
						</a>
					</li>
					<li id="logout">
						<a href="client_Register/client_logout.php">
							<i class="glyphicon glyphicon-log-out"></i>
							<span>Log Out</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- End Main Navbar -->