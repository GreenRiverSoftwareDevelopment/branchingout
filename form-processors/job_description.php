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

    <title>Job Description - Branching Out</title>

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

	 <header>
		 <?php
		 		include '../include/child-header.php'
		  ?>
	 </header>

	<section class="container-fluid">
		<div class ="row">
			<div class="col-xs-12 col-md-12">
			<h2></h2>

		<?php
      include '../include/connect-to-db.php';

			$jobnum = $_GET['id'];

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

				echo '<h2 class="center-text">' . $row['job_title'] . '</h2>';
        echo '<h3 class="center-text">' . $row['company_name'] . ', located in '. $row['location'] .'</h3>';
        echo '<h4 class="center-text"> The application was posted on ' . $row['post_date'] . '</h4>';
        echo '<h4 class="center-text"> Applicable career fields include: ' . $row['catagory'] . '</h4>';
				echo '<p class="center-text"> Description: <br>' . $row['job_description'] . '</p>';
        echo '<h5 class="center-text"><a href="' . $row['url_link'] . '" target="_clear">Apply</a></h5><br>';
        echo '<h5 class="center-text"> Application deadline: ' . $row['expiration'] . '</h5>';
				//echo '<p>' . $row['job_number'] . '</p>';

			mysqli_free_result($result);
			mysqli_close($connection);
		?>
	<!-- <p>
		Tips on Marketing yourself</a></li>
	</p> -->

	</div>
	</div>
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
