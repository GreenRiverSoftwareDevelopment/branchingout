<?php

	$errors = array();

		$username = $_POST['username'];
		$password = $_POST['password'];
		$userFirstName = "";

		//$hash the password//$hash is ehat we will store in the db
		$hash = password_hash($password, PASSWORD_DEFAULT);


		//connect to db
		include '../include/connect-to-db.php';

		//check to see if the username eitis in the users table
		$query = "SELECT first_name, username, password, admin_user FROM users WHERE username = '$username';";

    $result = mysqli_query($connection, $query);


    $rows = mysqli_fetch_array($result);

    //get the hashed password from the query result
    $hash = $rows['password'];
		$userFirstName = $rows['first_name'];
		$admin = $rows['admin_user'];

    //check to see if the password matches what the user entered
    // function will has $password and se if it matches the hash

	//password_verify isnt working
    //$status = password_verify($password, $hash);
	$status = ($password === $hash);
    //status is a boolean

		//if the login is a success, start a session-wide cookie with the username and close the previous db connection
    if($status)
		{
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['first_name'] = $userFirstName;
			$_SESSION['admin_user'] = $admin;
			mysqli_close($connection);
		}

		if (!$result)
			{
				echo 'Query failed';
				exit();
			}

			//if you want to redirect users
			if(empty($errors)) {
				header("Location: ../index.php");//only works if no html has been displayed yet
				exit();
			}

	?>
