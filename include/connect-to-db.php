<?php
	// include for connecting to the database
    define('DB_HOST', 'localhost');
    define('DB_USER', 'branchin_php');
    define('DB_PASSWORD', 'Password01');
    define('DB_NAME', 'branchin_tables_db');
    // open connection to the database
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connection, 'utf8');
?>
