<?php
	// include for standard page nav header
	echo '<img src="pictures/TopBanner1.jpg" class="img-responsive" alt="Branching Out" />
	<nav class="navbar navbar-default"> <!--id="top"-->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		</div>
		<div class="navbar-collapse collapse" id="myNavbar" role="navigation" aria-expanded="false" style="height: 1px;">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="#" class="current" target="_self">Home</a></li>
				<li><a href="#" target="_self" data-toggle="modal" data-target="#conUs">Contact Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right log-border">
				<li class="log-list-nav">';
				if(!empty($userLogged)) {
					echo '<a href="form-processors/logout.php" target="_self">Logout</a></li>';
				}
				else {
					echo '<a href="#" target="_self" data-toggle="modal" data-target="#logggin">Login</a></li>';
					echo '<li class="log-list-nav"><a href="#" target="_self" data-toggle="modal" data-target="#signup">Sign-up</a></li>';
				}
				echo '
			</ul>
		</div>
	</nav>';
?>
