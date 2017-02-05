<?php
	// include for contact us form modal
	echo '<!-- Modal for contact-us-->
	<div id="conUs" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Contact Us</h4>
				</div>
				<div class="modal-body">
					<form action="form-processors/process-contact-us.php" method="post" class="form-group">
						<p class="form-text text-muted justify-text">If you would like to make an appointment with a Program Manager,
						fill out the form below and specify which program you are interested in
						and a Program Manager will contact you.</p>

						First name:<br>
						<input class="col-xs-12 col-md-12" type="text" name="firstname" id="firstname" placeholder="Required" required>
						<br>
						Last name:<br>
						<input class="col-xs-12 col-md-12" type="text" name="lastname" id="lastname" placeholder="Required" required>
						<br>
						Email Address:<br>
						<input class="col-xs-12 col-md-12" type="text" name="email" placeholder="Required" required>

						<br><br>
						How can we help you?<br>
						<select>
							<option value="comment">Comment</option>
							<option value="question">Question</option>
							<option value="interest">Interested in program</option>
						</select>

						<br><br>
						Are you:
						<br>
						<label><input type="checkbox" name="enrolled" value="Currently enrolled"> Currently enrolled</label>
						<br>
						<label><input type="checkbox" name="NR associate\'s degree" value="Holding a Natural Resources Associate\'s Degree"> Holding a Natural Resources Associate\'s Degree</label>
						<br>
						<label><input type="checkbox" name="Other_BA/AA" value="Holding a Bachelor/Associate Degree in another field"> Holding a Bachelor/Associate Degree in another field</label>
						<br>
						<label><input type="checkbox" name="Other_situation" value="Other"> Other</label>
						<br>

						Feel free to add a note
						<textarea class="form-control" id="description" name="description" rows="5"></textarea><br><br>

						<input id="submit" type="submit" class="btn btn-primary col-xs-12" name="submit" value="Submit">
					</form>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div><!--end contact-us modal-->';
?>
