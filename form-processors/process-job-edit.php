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
	Assignment Branching Out project-->
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Home - Branching Out</title>

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


	<link href="../css/branching-out.css" rel="stylesheet" />
  </head>
  <body>

	 <header>
		 <?php
		 		include '../include/child-header.php';
		  ?>
	 </header>

  <section class="container-fluid">
		<?php
	  	// Create an empty array to hold error strings
	 		// if there are one or more errors
	 	$errors = array();

	 	// Read in all of the variables from the form
	 	// and do some basic data validation.
	    $jobnum = $_GET['id'];

	    $colsToChange = array();
	    $colValues = array();

	 	$job_title = null;
	 	if (!empty($_POST['title'])) {
	     $job_title = $_POST['title'];
	     $colsToChange[] = 'job_title';
	     $colValues[] = $job_title;
	 	}

	 	$company_name = null;
	 	if (!empty($_POST['company'])) {
	     $company_name = $_POST['company'];
	     $colsToChange[] = 'company_name';
	     $colValues[] = $company_name;
	 	}

	   //some jobs may not be posted elsewhere so the url is not required
	   $web_link = null;
	   if (!empty($_POST['url'])) {
	     $web_link = $_POST['url'];
	     $colsToChange[] = 'url_link';
	     $colValues[] = $web_link;
	   }

	 	$location = null;
	 	if (!empty($_POST['location'])) {
	     $location = $_POST['location'];
	     $colsToChange[] = 'location';
	     $colValues[] = $location;
	 	}

	 	$job_description = null;
	 	if (!empty($_POST['description'])) {
	     $job_description = $_POST['description'];
	     $colsToChange[] = 'job_description';
	     $colValues[] = $job_description;
	 	}

	 	if (!empty($errors)) {

	     // the $errors array is not empty, so print out each error

	     echo '<h1>Form Submission Error</h1>';
	     echo '<p>The following errors were detected in the form:</p>';
	     echo '<ul>';
	     foreach ($errors as $e) {
	       echo "<li>$e</li>";
	     }
	     echo '</ul>';
			 echo '</section>';
	     echo '</body>';
	     echo '</html>';

	     exit();
	   }

	   include '../include/connect-to-db.php';

	   if (mysqli_connect_errno()) {

	     echo '<h1>Unable to connect to database</h1>';
	 	   echo '</section>';
	     echo '</body>';
	     echo '</html>';
	     exit();
	   }



	   $updateString = array();
	   foreach (array_combine($colsToChange, $colValues) as $colsToChange => $colValues) {
	     $updateString[] = "$colsToChange ='$colValues', ";
	   }

	   //remove trailing commas
	   $updateString[] = rtrim(array_pop($updateString), ', \t\n\r');

	   //turn the array into a string
	   $stringForm = implode(" ",$updateString);

	 $query = "UPDATE job_table "
	           . "SET " .
	             $stringForm
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

	   echo'<h1 class="center-text">Your edits have been submitted</h2>';

	   //<!-- print out confirmation details -->
	 	echo '<h2 class="center-text">Here are the changes</h2>';
	 	echo '<div class="row col-xs-12"><p>Job Title: '. $job_title .'</p>';
	 	echo "<p>Company Name: $company_name</p>";
	 	echo "<p>Location: $location</p>";
	   echo "<p>URL: $web_link</p>";
	 	echo "<p>Job Description: $job_description</p></div>";

	 	?>

	</section>
	<footer class="container-fluid">
    <?php
      include '../include/child-footer.php';
     ?>
	</footer>
  </body>
</html>
