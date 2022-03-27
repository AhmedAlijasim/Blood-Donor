<!-- Start Main Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li>
						<a href="control.php" title="Home">
							<span class="hidden-xs home">Home</span>
							<i class="glyphicon glyphicon-home" style="color: red;"></i>
						</a>
					</li>

					<li>
						<a href="" title="users" onclick="return users();">
							<span class="hidden-xs personal"> Users</span>
							<i class="glyphicon glyphicon-user" style="color: red;"></i>
						</a>
					</li>

					<li>
						<a href="" title="Posts" onclick="return posts();">
							<span class="hidden-xs personal"> Posts</span>
							<i class="glyphicon glyphicon-tint" style="color: red;"></i>
						</a>
					</li>
					<li>
						<a href="" title="Messages" onclick="return messages();">
							<span class="hidden-xs personal"> Messages</span>
							<i class="glyphicon glyphicon-envelope" style="color: red;"></i>
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
						<a href="" title="Admin" onclick="return admin();">
							<span class="hidden-xs personal"> Admin</span>
							<i class="glyphicon glyphicon-bishop" style="color: red;"></i>
						</a>
					</li>
					<li id="logout">
						<a href="login/logout.php">
							<i class="glyphicon glyphicon-log-out" style="color: red;"></i>
							<span class="hidden-xs personal">Log Out</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- End Main Navbar -->