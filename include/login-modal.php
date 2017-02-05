<?php
	// include for login modal
	echo '<!-- Modal for login-->
	<div id="logggin" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
					<form class="form-vertical" action="form-processors/login.php" method="post">
						<p><br><br>
						Username<br>
						<input class="col-xs-12" type="text" id="username" name="username" placeholder="Username or Email Address">
						Password<br>
						<input class="col-xs-12" type="password" id="password" name="password" placeholder="Password">
						<br><br>
						<input type="submit" class="btn btn-primary col-xs-12" name="submit" value="Submit">
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div><!--end login modal-->';
?>
