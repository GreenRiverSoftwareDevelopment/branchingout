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
	process-contact-us.php
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

		<!--<link href="css/normalize.css" rel="stylesheet" />-->
		<link href="../css/branching-out.css" rel="stylesheet" />
	</head>

	<body>
		<!-- header -->
		<header>
			<?php
				include '../include/child-header.php';
			?>
		 </header>

		<!-- begin section -->
		<section class="container-fluid">

		<!-- Begin script for processing contact us data for database -->
		<?php
			// Create an empty array to hold error strings
			// if there are one or more errors
			$errors = array();

			// Read in all of the variables from the form
			// and do some basic data validation.
			// first name assignment
			if(!empty($_POST['firstname'])) {
				$firstname = $_POST['firstname'];
			}
			else {
				$firstname = NULL;
				echo "<p> The first name is required.</p>";
			}

			// last name assignment
			if(!empty($_POST['lastname'])) {
				$lastname = $_POST['lastname'];
			}
			else {
				$lastname = NULL;
				echo "<p> The last name is required.</p>";
			}

			// email assignment
			if(!empty($_POST['email'])) {
				$email = $_POST['email'];
			}
			else {
				$email = NULL;
				echo "<p> The email is required.</p>";
			}

			// reason for contacting assignment
			// email assignment
			if(!empty($_POST['comment'])) {
				$help = $_POST['comment'];
			}
			if(!empty($_POST['question'])) {
				$help = $_POST['question'];
			}
			if(!empty($_POST['interest'])) {
				$help = $_POST['interest'];
			}
			if (empty(help)) {
			  // invalid data
			  $help = null;
			  $errors[] = 'Illegal value received for reason for contacting.';
			}

			$fullOptions ="";
			// Are you: section assignment
			if(!empty($_POST['enrolled'])) {
				$currently = $_POST['enrolled'];
				$fullOptions = $currenty;
			}
			if(!empty($_POST['NR associate\'s degree'])) {
				$natDegree = $_POST['NR associate\'s degree'];
				if(empty($fullOptions)) {
					$fullOptions = $natDegree;
				}
				else {
					$fullOptions = $fullOptions . ', ' . $natDegree;
				}
			}
			if(!empty($_POST['Other_BA/AA'])) {
				$otherDegree = $_POST['Other_BA/AA'];
				if(empty($fullOptions)) {
					$fullOptions = $otherDegree;
				}
				else {
					$fullOptions = $fullOptions . ', ' . $otherDegree;
				}
			}
			if(!empty($_POST['Other_situation'])) {
				$other = $_POST['Other_situation'];
				if(empty($fullOptions)) {
					$fullOptions = $other;
				}
				else {
					$fullOptions = $fullOptions . ', ' . $other;
				}
			}

			// Notes assignment
			if(!empty($_POST['description'])) {
				$notes = $_POST['description'];
			}


			// the $errors array is not empty, so print out each error
			if (!empty($errors)) {
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

			// if there are no errors in the form, then we can move forward
		  // with trying to place a new row into the database table
			include '../include/connect-to-db.php';

		  if (mysqli_connect_errno()) {
		    echo '<h1>Unable to connect to database</h1>';
			  echo '</section>';
		    echo '</body>';
		    echo '</html>';
		    exit();
		  }

		  //Escape string fields
		  $firstname = mysqli_real_escape_string($connection, $firstname);
		  $lastname = mysqli_real_escape_string($connection, $lastname);
		  $notes = mysqli_real_escape_string($connection, $notes);


		  $query = "INSERT INTO inquiry "
		          . "("
		          . "first_name, "
		          . "last_name, "
		          . "email, "
		          . "inquiry_reason, "
		          . "user_status, "
		          . "typed_notes "
		          . ") "
		          . "VALUES "
		          . "("
		          . "'$firstname', "
		          . "'$lastname', "
		          . "'$email', "
		          . "'$help', "
		          . "'$fullOptions', "
		          . "'$notes' "
		          . ");";

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
		?>
		<h2 class="center-text">Your support request has been submitted</h2>
	</section>

		<!-- print out confirmation details -->

		<!-- footer -->
		<footer class="container-fluid">
			<?php
				include '../include/child-footer.php';
			?>
		</footer>
	</body>
</html>
