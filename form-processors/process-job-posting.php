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

	<title>Process Posting - Branching Out</title>

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
		 <img src="../pictures/TopBanner1.jpg" class="img-responsive" alt="Branching Out" />
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" role="navigation" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a class="navbar-brand" href="#"></a>
				</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../index.php" target="_self">Home</a></li>
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

	// employer-submission entry form variables
	//combine all fields that will be in the title portion in fullTitle
	$fullTitle = "";
	$job_title = null;
	if (!empty($_POST['title'])) {
    $job_title = $_POST['title'];
		$fullTitle = $job_title;
	}
	else {
		// this is the syntax to add something at the end of the array
		$errors[] = 'Job Title is Required.';
    // $job_title should still be null if there was an error
	}

	$company_name = null;
	if (!empty($_POST['company'])) {
    $company_name = $_POST['company'];
	}
	else {
		// this is the syntax to add something at the end of the array
		$errors[] = 'Company is Required.';
    // $job_title should still be null if there was an error
	}

  //some jobs may not be posted elsewhere so the url is not required
  $web_link = null;
  if (!empty($_POST['url'])) {
    $web_link = $_POST['url'];
  }

	$location = null;
	if (!empty($_POST['location'])) {
    $location = $_POST['location'];
	}
	else {
		// this is the syntax to add something at the end of the array
		$errors[] = 'location is Required.';
    // $job_title should still be null if there was an error
	}

	$expiration = null;
	if (!empty($_POST['date'])) {
    $expiration = $_POST['date'];
	}
	else {
		// this is the syntax to add something at the end of the array
		$errors[] = 'Date is Required.';
    // $job_title should still be null if there was an error
	}

	$paid_job = null;
	if (!empty($_POST['paid'])) {
    $paid_job = $_POST['paid'];
		if(empty($fullTitle)) {
				$fullTitle = $paid_job;
		}
		else {
				$fullTitle = $fullTitle . ', ' . $paid_job;
		}
	}

	$part_time_job = null;
	if (!empty($_POST['part_time'])) {
    $part_time_job = $_POST['part_time'];
		if(empty($fullTitle)) {
				$fullTitle = $part_time_job;
		}
		else {
				$fullTitle = $fullTitle . ', ' . $part_time_job;
		}
	}

	$full_time_job = null;
	if (!empty($_POST['full_time'])) {
    $full_time_job = $_POST['full_time'];
		if(empty($fullTitle)) {
				$fullTitle = $full_time_job;
		}
		else {
				$fullTitle = $fullTitle . ', ' . $full_time_job;
		}
	}

	$other_job = null;
	if (!empty($_POST['Other_situation'])) {
    $other_job = $_POST['Other_situation'];
		if(empty($fullTitle)) {
				$fullTitle = $other_job;
		}
		else {
				$fullTitle = $fullTitle . ', ' . $other_job;
		}
	}

	$job_description = null;
	if (!empty($_POST['description'])) {
    $job_description = $_POST['description'];
	}
	else {
		// this is the syntax to add something at the end of the array
		$errors[] = 'Description is Required.';
    // $job_title should still be null if there was an error
	}

  $combined_category = "";

  if(!empty($_POST['category1'])) {
  	$combined_category = $_POST['category1'];
  }

	if (!empty($_POST['category2'])) {
    if(empty($combined_category)) {
      	$combined_category  = $_POST['category2'];
    }
    else {
        $combined_category = $combined_category . ', ' . $_POST['category2'];
    }
	}

	if (!empty($_POST['category3'])) {
    if(empty($combined_category)) {
        $combined_category  = $_POST['category3'];
    }
    else {
        $combined_category = $combined_category . ', ' . $_POST['category3'];
    }
	}

  if (!empty($_POST['category4'])) {
  	if(empty($combined_category)) {
        $combined_category  = $_POST['category4'];
    }
    else {
        $combined_category = $combined_category . ', ' . $_POST['category4'];
    }
  }

  if (!empty($_POST['category5'])) {
      if(empty($combined_category)) {
          $combined_category  = $_POST['category5'];
    	}
      else {
        $combined_category = $combined_category . ', ' . $_POST['category5'];
      }
    }

    if (!empty($_POST['category6'])) {
        if(empty($combined_category)) {
            $combined_category  = $_POST['category6'];
        }
        else {
        	$combined_category = $combined_category . ', ' . $_POST['category6'];
        }
    	}

    if (!empty($_POST['category7'])) {
        if(empty($combined_category)) {
            $combined_category  = $_POST['category7'];
      	}
        else {
          $combined_category = $combined_category . ', ' . $_POST['category7'];
        }
    }

    if (!empty($_POST['category8'])) {
        if(empty($combined_category)) {
            $combined_category  = $_POST['category8'];
          }
          else {
            $combined_category = $combined_category . ', ' . $_POST['category8'];
          }
      }

    if(empty($combined_category)) {
        $errors[] = 'Illegal value received for career track, atleast one category needs to be selected';
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
  $fullTitle = mysqli_real_escape_string($connection, $fullTitle);
  $company_name = mysqli_real_escape_string($connection, $company_name);
  $combined_category = mysqli_real_escape_string($connection, $combined_category);
  $location = mysqli_real_escape_string($connection, $location);
  $job_description = mysqli_real_escape_string($connection, $job_description);


  $query = "INSERT INTO job_table "
          . "("
          . "job_title, "
          . "company_name, "
          . "catagory, "
          . "location, "
          . "job_description, "
          . "expiration, "
          . "url_link "
          . ") "
          . "VALUES "
          . "("
          . "'$fullTitle', "
          . "'$company_name', "
          . "'$combined_category', "
          . "'$location', "
          . "'$job_description', "
          . "'$expiration', "
          . "'$web_link' "
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

  echo"<h2>Job Posting Submitted</h2>";

  //<!-- print out confirmation details -->
	echo "<h2>Here is what you entered</h2>";
	echo "<p>Job Title: $fullTitle</p>";
	echo "<p>Company Name: $company_name</p>";
	echo "<p>Location: $location</p>";
  echo "<p>URL: $web_link</p>";
	echo "<p>Expiration Date: $expiration</p>";
	echo "<p>Career Track: $combined_category</p>";
	echo "<p>Job Description: $job_description</p>";
	?>
	</section>

	<footer class="container-fluid">
    <?php
      include '../include/child-footer.php';
     ?>
	</footer>
  </body>
</html>
