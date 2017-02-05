<?php
	// include for sign up modal
	echo '<!-- Modal for signup-->
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="signupTitle">Sign-up</h4>
				</div>
				<div class="modal-body">
					<form class="form-vertical" action="form-processors/sign-up.php" method="post">
						<div id="fname" class="form-group">
							<span class="red-astr">*</span> First name:<br>
							<input class="form-control" type="text" maxlength="35" name="firstname"  placeholder="John" required autofocus>
							<br>
						</div>
						<div id="lname" class="form-group">
							<span class="red-astr">*</span> Last name:<br>
							<input class="form-control" type="text" maxlength="35" name="lastname" placeholder="Doe" required>
							<br>
						</div>
						<div id="email" class="form-group">
							<span class="red-astr">*</span> Email:<br>
							<input class="form-control" type="email" name="email" maxlength="254" placeholder="someone@mail.greenriver.edu" required>
							<br>
						</div>
						<div class="form-group">
							<span class="red-astr">*</span> Choose a password<br>
							<input class="form-control" type="password" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
								title="Must contain at least one number, one uppercase and lowercase letter, and be at least 6 or more characters long"
								name="password" placeholder="Choose a password" required>
							<br>
						</div>
						<div id="password-c" class="form-group">
							<span class="red-astr">*</span> Confirm Password:<br>
							<input class="form-control" type="password" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
								title="Must contain at least one number, one uppercase and lowercase letter, and be at least 6 or more characters long"
								name="password-c" placeholder="Confirm password" required>
							<br>
						</div>
						<h4>Would you like to receive occasional emails about the most recent postings?</h4>
						<label><input type="radio" name="get-emails" value="Yes"> Yes</label><br>
						<label><input type="radio" name="get-emails" value="No"> No</label>
						<br><br>
						<input type="submit" class="btn btn-primary col-xs-12" name="submit" value="Submit">
					</form>
				</div>
			<div class="modal-footer"></div></div>
		</div>
	</div>'
?>
