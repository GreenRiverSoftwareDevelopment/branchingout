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

	<title>Email users - Branching Out</title>

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

	//build query for users who opted in for emails
	$query = "SELECT first_name, email "
	. "FROM users "
	. "WHERE recieve_emails = TRUE;";

	//build query for the last week of internships
	$query2 = "SELECT job_number, job_title, company_name, catagory, location, job_description, post_date, expiration, url_link "
	. "FROM job_table "
	. "WHERE visibility = TRUE "
	."AND post_date BETWEEN (CURDATE() - INTERVAL 7 DAY) and (NOW());";

	//Connect to db
	include '../include/connect-to-db.php';

	// run the for user emails
	$result = mysqli_query($connection, $query);
	$resul2 = mysqli_query($connection, $query2);

	$fullIntershipString ="\r\n";
	$fullTitle =": ";
	while ($rows = mysqli_fetch_array($resul2)) {
		$fullTitle .= $rows['job_title'];
		$fullIntershipString .= $rows['url_link'];
	}


	// close connection to the database
	mysqli_close($connection);

	if (!$result) {
		echo '<h1>Query failed</h1>';
		echo '</section>';
		echo '</body>';
		echo '</html>';
		exit();
	}
		while ($row = mysqli_fetch_array($result)) {
			$to = $row['email'];		//send to Dr. Monica Paulson Priebe as a test mpriebe@greenriver.edu
			$subject = 'Natural Resources internships for the last week';

			$message = 'Hello '. $row['first_name'] .' , below are the most recent internships from the last week: '
 			. $fullTitle . ',  ' . $fullIntershipString;
			$message = wordwrap($message, 70);

			$headers = 'From: admin@branchingout.greenrivertech.net' . "\r\n" .
				'Reply-To: admin@branchingout.greenrivertech.net' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
    }
	?>

	<h2 class="center-text">Check your email - the email has been sent!</h2>
	</section>
	<footer class="container-fluid">
		<?php
		  include '../include/child-footer.php';
		 ?>
	</footer>
  </body>
</html>
