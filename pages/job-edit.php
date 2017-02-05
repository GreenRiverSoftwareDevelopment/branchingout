<?php
	// script for connecting to database for editing job postings
	session_start();
	$userLogged = $_SESSION['username'];
	$admin = $_SESSION['admin_user'];
?>
<!-- Jacob Laqua/Dan Capps/Mike Peterson/Mackenzie Larson
	IT 305
	12.8.2016
	job-edit.php
	Assignment Branching Out project-->
<!DOCTYPE html>
 <html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Job Edit - Branching Out</title>

		<!-- Bootstrap -->
		<link href="../bootstrap-css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="modernizr-1.5.js"></script>
		<link href="../css/branching-out.css" rel="stylesheet" />
		<link rel="shortcut icon" href="../pictures/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../pictures/favicon.ico" type="image/x-icon">
	</head>

	<body>
	<!--header-->
		<header>
			<?php
				include '../include/child-header.php';
			 ?>
		</header>

		<!-- begin section -->
		<section class="container-fluid">
			<div class ="row">
				<div class="col-xs-12 col-md-12">
					<h2>Edit Posting</h2>
					<?php
					//include for database connection
					include '../include/connect-to-db.php';

					$jobnum = $_GET['id'];

					// database query for job edit
					$query =
						"SELECT job_number, job_title, company_name, catagory, location, job_description, "
						. "post_date, expiration, url_link "
						. "FROM job_table "
						. "WHERE job_number = $jobnum;";

					// run the query
					$result = mysqli_query($connection, $query);

					if (!$result) {
						echo '<h1>Query failed</h1>';
						echo '</section>';
						echo '</body>';
						echo '</html>';
						exit();
					}

					$row = mysqli_fetch_array($result);
					echo '<form class="form-vertical" action="../form-processors/process-job-edit.php?id=' . $jobnum .'" method="post">
						<p>Title:<input class="col-xs-12 col-md-12"  type="text" id="title" name="title" value="'. $row['job_title'] .'"><!--&nbsp;-->
						<br>Company:<input class="col-xs-12 col-md-12" type="text" id="company" name="company" value="'. $row['company_name'] .'">
						<br>Location:<input class="col-xs-12 col-md-12" type="text" id="location" name="location" value="'. $row['location'] .'">
						<br>Url:<input class="col-xs-12" type="text" id="url" name="url" value="'. $row['url_link'] .'">

						<div>
							Enter the job description:
							<textarea class="form-control" id="description" name="description" rows="5"> '. $row['job_description'] .' </textarea><br><br>
						</div>

						<input id="submit" type="submit" class="btn btn-primary col-xs-12" name="submit" value="Submit Changes">
					</form>';

					// close connection to database
					mysqli_free_result($result);
					mysqli_close($connection);
				?>
				</div>
			</div>
		</section>  <!-- section -->

		<!-- footer -->
		<footer class="container-fluid">
			<?php
				include '../include/child-footer.php';
			?>
		</footer>
	</body>
</html>
