<?php
	// include for notify employer form
	echo '<!-- Modal for employer-notify-form-->
	<div id="notify" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Email Notifications</h4>
				</div>
				<div class="modal-body">
					<form class="form-vertical" action="form-processors/email_users.php" method="post">
						<input id="submit" type="submit" class="btn btn-primary col-xs-12" name="submit" value="Send an email about about internships within the last week">
					</form>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div><!--end employer-submission modal-->';
?>
