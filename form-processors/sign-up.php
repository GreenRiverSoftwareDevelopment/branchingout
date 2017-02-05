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

 <title>Sign-up - Branching Out</title>

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
    <?php
      include '../include/standard-nav-header-no-contact.php';
    ?>
  </header>

 <section class="container-fluid">
<?php
// Create an empty array to hold error strings
// if there are one or more errors
$errors = array();

// Read in all of the variables from the form
// and do some basic data validation.

// first name
if(!empty($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}
else {
    $firstname = NULL;
    $errors[] = "The first name is required.";
}

// last name
if(!empty($_POST['lastname'])) {
  $lastname = $_POST['lastname'];
}
else {
  $lastname = NULL;
  $errors[] = "The last name is required.";
}

// email
if(!empty($_POST['email'])) {
  $email = $_POST['email'];
}
else {
  $email = NULL;
  $errors[] = "An email address is required is required.";
}

// password, compare passwords
if(!empty($_POST['password'])) {
  $password = $_POST['password'];
  $confirmPassword = $_POST['password-c'];
  if (strcmp($password, $confirmPassword) !== 0) {
      $errors[] = "Your passwords do not match";
  }
  }
else {
  $password = NULL;
  $errors[] = "A password is required.";
}

$receiveEmails = null;
if (isset($_POST['get-emails'])) {
  $receiveEmails = $_POST['get-emails'];

  if ($receiveEmails === 'Yes') {
    $receiveEmails = '1';
  }
  else if ($receiveEmails === 'No') {
    $receiveEmails = '0';
  }
  else {
    // invalid data
    $receiveEmails = null;
    $errors[] = 'Illegal value received for whether or not you want to receive emails.';
  }
}


if (!empty($errors)) {
// the $errors array is not empty, so print out each error
echo '<h2>Form Submission Error</h2>';
echo '<p class="center-text">The following errors were detected in the form:</p>';

foreach ($errors as $e) {
  echo '<p class="center-text">'.$e.'</p>';
}

echo '</section>';
echo '<footer class="container-fluid">';
include '../include/child-footer.php';
echo '</footer>';
echo '</body>';
echo '</html>';
exit();
}

//connect to dv
include '../include/connect-to-db.php';

//escape special characters
$firstname = mysqli_real_escape_string($connection, $firstname);
$lastname = mysqli_real_escape_string($connection, $lastname);
$password = mysqli_real_escape_string($connection, $password);

//build query
$query = "INSERT INTO users "
      . "("
      . "first_name, "
      . "last_name, "
      . "username, "
      . "email, "
      . "password, "
      . "recieve_emails "
      . ") "
      . "VALUES "
      . "("
      . "'$firstname', "
      . "'$lastname', "
      . "'$email', "//usernames are email addresses for standard users
      . "'$email', "
      . "'$password',"
      . "'$receiveEmails'"
      . ");";

// run the query
$result = mysqli_query($connection, $query);

// close connection to the database
mysqli_close($connection);

if (!$result) {
echo '<h2>Query failed</h2>';
echo '</section>';
echo '</body>';
echo '</html>';
exit();
}

//print out confirmation details
echo "<h2>Thank you $firstname, your username to login is your email address ($email).";
?>
</section>
<footer class="container-fluid">
  <?php
    include '../include/child-footer.php';
   ?>
</footer>
</body>
</html>
