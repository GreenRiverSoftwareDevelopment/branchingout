<?php
	//include for employer submission form
	echo '<!-- Modal for employer-submission-->
	<div id="empSub" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create a job posting</h4>
				</div>
				<div class="modal-body">
					<form class="form-vertical" action="form-processors/process-job-posting.php" method="post">
						<p>
						<input class="col-xs-12 col-md-12" type="text" id="title" name="title" maxlength="100" placeholder="Job Title"  required autofocus><!--&nbsp;-->
						<input class="col-xs-12 col-md-6" type="text" id="company" name="company" maxlength="35" placeholder="Company Name" required>
						<input class="col-xs-12 col-md-6" type="text" id="location" name="location" maxlength="50" placeholder="Work Location" required>
						<input class="col-xs-12" type="text" id="url" name="url" maxlength="300" placeholder="Link to original post">

						Expiration<br>
						<input class="col-xs-12 col-md-12" type="date" id="date" name="date">
						</p>
						<div>
							<br><strong>Select all that apply for the job:</strong><br>
							<label><input type="checkbox" name="paid" value="Paid"> Paid</label><br>
							<label><input type="checkbox" name="part_time" value="Part-Time"> Part-time</label><br>
							<label><input type="checkbox" name="full_time" value="Full-Time"> Full-time</label><br>
							<label><input type="checkbox" name="Other_situation" value="Other"> Other</label><br>
						</div>

						<fieldset class="form-group">
							<legend><br>Applicable Career Track:</legend>
							<div class="col-xs-12">
								<div class="checkbox">
									<label><input type="checkbox" name="category1" value="GIS">GIS</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="catagory2" value="Forestry">Forestry</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category3" value="Water Quality">Water Quality</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category4" value="Park Management">Park Management</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category5" value="Restoration">Restoration</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category6" value="Conservation">Conservation</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category7" value="Fish and Wildlife">Fish and Wildlife</label><br>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="category8" value="Wildland Fire">Wildland Fire</label><br><br>
								</div>
							</div>
						</fieldset>

						<div>
							Enter the job description:
							<textarea class="form-control" id="description" name="description" maxlength="1500" rows="5"></textarea><br><br>
						</div>
						<input id="submit" type="submit" class="btn btn-primary col-xs-12" name="submit" value="Submit">
					</form>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div><!--end employer-submission modal-->';
?>
