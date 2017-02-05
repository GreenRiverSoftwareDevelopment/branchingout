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
	12.8.16
	Assignment Branching Out project-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Delete - Branching Out</title>

    <!-- Bootstrap -->
	<link href="../bootstrap-css/bootstrap.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="../pages/modernizr-1.5.js"></script>

	<link rel="shortcut icon" href="../pictures/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../pictures/favicon.ico" type="image/x-icon">

	<!--<link href="css/normalize.css" rel="stylesheet" />-->
	<link href="../css/branching-out.css" rel="stylesheet" />
  </head>
  <body>

	 <header>
        <img src="../pictures/TopBanner1.jpg" class="img-responsive" alt="Branching Out" />
		<nav class="navbar navbar-default"> <!--id="top"-->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../index.php" target="_self">Home</a></li>
					<li><a href="../pages/employer-submission.html" target="_self">Employer Submission</a></li>
					<li><a href="../pages/contact-us.html" target="_self">Contact Us</a></li>
					<li><a href="../pages/additional-resources.html" target="_self">Additional Resources</a></li>
				</ul>
			</div>
		</nav>
	 </header>

  <section class="container-fluid">
 <?php
 	// Create an empty array to hold error strings
	// if there are one or more errors

	$errors = array();

	// Read in all of the variables from the form
	// and do some basic data validation.
	// I've done it for a text field and for a radio button
	// you will need to follow the pattern to validate all of
	// the fields.

   $jobnum = $_GET['id'];


	if (!empty($errors)) {

    // the $errors array is not empty, so print out each error

    echo '<h1>Form Submission Error</h1>';
    echo '<p>The following errors were detected in the form:</p>';
    echo '<ul>';
    foreach ($errors as $e) {

      echo "<li>$e</li>";

    }

    echo '</ul>';
    echo '</body>';
    echo '</html>';

    exit();
  }

  // if there are no errors in the form, then we can move forward
  // with trying to place a new row into the database table
  // TODO: we will move these constants to another file later
  // NOTE: CHANGE THESE VALUES TO BE YOUR DATABASE VALUES!

  include '../include/connect-to-db.php';

  if (mysqli_connect_errno()) {

    echo '<h1>Unable to connect to database</h1>';

    // FOR DEBUGGING ONLY /////////////////////////////
    // warning: error message reveals system internals
    echo mysqli_connect_error();
    ///////////////////////////////////////////////////
	  echo '</section>';
    echo '</body>';
    echo '</html>';
    exit();
  }

$query = "UPDATE job_table "
          . "SET "
          .  'visibility = 0'
            . " WHERE job_number = $jobnum;";

  // run the query
  $result = mysqli_query($connection, $query);

  // close connection to the database
  mysqli_close($connection);

  if (!$result) {
    echo '<h1>Query failed</h1>';
	   echo '</section>';
    echo '</body>';
    echo '</html>';
    exit();
  }

  echo'<h2 class="center-text">The job has been deleted</h2>';
  echo'<h4 class="center-text">If you would like to show the job again, contact the site manager</h4>';
	?>

	</section>
	<footer class="container-fluid">
    <?php
      include '../include/child-footer.php';
     ?>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
