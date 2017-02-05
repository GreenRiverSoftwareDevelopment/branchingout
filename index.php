<?php
	session_start();
	$userLogged = $_SESSION['username'];
	$userFirstName = $_SESSION['first_name'];
	$admin = $_SESSION['admin_user'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <!-- Jacob Laqua/Dan Capps/Mike Peterson/Mackenzie Larson
	IT 305
	12.8.2016
	index.pho
	Assignment Branching Out project-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Home - Branching Out</title>

		<!-- Bootstrap -->
		<link href="bootstrap-css/bootstrap.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!--Icon for tabs and bookmarks-->
		<link rel="shortcut icon" href="pictures/favicon.ico" type="image/x-icon">
		<link rel="icon" href="pictures/favicon.ico" type="image/x-icon">

		<link href="css/branching-out.css" rel="stylesheet" />

		<!--Scripts and original styles for DataTables and Awesome Fonts-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" />
		<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
	</head>

	<body>
		<!-- header -->
		<header>
			<?php
				//Display different headers and features based on admin boolean
				if($admin == true) {
					include 'include/admin-nav-header.php';
					include 'include/employer-submission-form.php';
					include 'include/employer-notify-form.php';
				}
				else {
					include 'include/standard-nav-header.php';
					include 'include/contact-us-form.php';
				}
			?>
		</header>

		<!-- section -->
		<section class="container-fluid">
			<div>
				<?php
					if(empty($userLogged)) {  // If the used is logged in
						echo '<h4 class="center-text">Log in to access the full list of internships</h4>';
						echo '<h4 class="center-text">If you do not have an account you will need to sign up</h4>';
					}
				?>
				<h1 class="center-text">Open Positions</h1>
				<?php
					if(!empty($userLogged)) {  // If the user is not logged in
						echo '<h2 class="center-text" style="color: rgb(148,170,102);">Hello '. $userFirstName .', these are the most current positions offered:</h2>';
					}
					else {
						echo '<h3 class="center-text">As a guest, you will only have access to 5 internships:</h3>';
					}
				?>
			</div>

			<?php
				//Include shared resources
				include 'include/login-modal.php';
				include 'include/signup-modal.php';
			?>

			<!--Start of the table-->
			<div class="table-responsive container-fluid">
				<table id="myTable" class="table table-bordered table-hover table-striped sortable" style="background-color: ghostwhite">
					<?php
						//Display different table head based on admin or not admin
						if($admin == true) {
							include 'include/admin-thead.php';
						}
						else {
							include 'include/standard-thead.php';
						}
					?>
					<!-- table body -->
					<tBody>
						<?php
							//Connect to db
							include 'include/connect-to-db.php';

							//Decide whether to use the standard query table or guest query table
							if(!empty($userLogged)) {
								include 'include/standard-query-for-table.php';
							}
							else {
								include 'include/query-for-guest-table.php';
							}

							// run the query
							$result = mysqli_query($connection, $query);

							//Exit execution if the query failed
							if (!$result) {
								echo '<h1>Query failed</h1>';
								echo '</section>';
								echo '</body>';
								echo '</html>';
								exit();
							}

							//Display different tbody based off admin or not
							if($admin == true) {
								include 'include/admin-tbody.php';
							}
							else {
								include 'include/standard-tbody.php';
							}

							//Close connection
							mysqli_free_result($result);
							mysqli_close($connection);
						?>
					</tbody>
				</table>
			</div>
			<?php
				//Include the initializing script the corresponds to each table
				//standard table has less columns so the default order needs to be different
				if($admin == true) {
					include 'include/admin-data-table-script.php';
				}
				else {
					include 'include/standard-data-table-script.php';
				}
			?>
		</section>  <!-- end of section -->

		<!-- footer -->
		<footer class="container-fluid">
			<!--Brand Logo -->
			<div class="row col-md-3 col-sm-12">
				<a href="http://www.greenriver.edu/bas" target="_blank">
					<h3 class="created-by-text">
						Made with &#9749; by <br> Green River College students
					</h3>
				</a>
			</div>
			<div class="row col-md-3 col-sm-12">
				<!--Plug to main campus-->
				<strong>Main Campus:</strong><br>
				<p class="text-center">
					<a class="footer-link" target="_blank" href="https://www.google.com/maps/place/Green+River+Community+College/@47.3130745,-122.179769,16z/data=!4m2!3m1!1s0x549058a045230aab:0x296322357297393b">
					<span class="contrast">12401 Southeast 320th Street<br>Auburn, WA 98092</span></a>
				</p>
			</div>
			<!-- Social Media Buttons and Icons -->
			<div class="row col-md-3 col-sm-12 social-media">
				<h5>Follow us on:</h5>
				<div class="Social-Media">
					<a class="icons" href="https://www.facebook.com/" target="_blank">
						<i class="fa fa-facebook-square" aria-hidden="true"></i>
					</a>
					<a class="icons" href="http://instagram.com/" target="_blank">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
					<a class="icons" href="https://www.linkedin.com/" target="_blank">
						<i class="fa fa-linkedin-square" aria-hidden="true"></i>
					</a>
				</div>
			</div>
			<!-- login on footer nav bar -->
			<div class="row col-md-3 col-sm-12">
				<ul class="nav navbar-nav navbar-right log-border">
					<li>
					<?php
						if(!empty($userLogged)) {
							echo '<a href="form-processors/logout.php" target="_self">Logout</a></li>';
						}
						else {
							echo '<a href="#" target="_self" data-toggle="modal" data-target="#logggin">Login</a></li>';
							echo '<li><a href="#" target="_self" data-toggle="modal" data-target="#signup">Sign-up</a></li>';
						}
					?>
				</ul>
			</div>
		</footer>
	</body>
</html>
