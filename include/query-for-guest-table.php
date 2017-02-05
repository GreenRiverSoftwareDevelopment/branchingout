<?php
	//Query to only the first 5 internships from three weeks ago jobs for guests
	$query = "SELECT job_number, job_title, company_name, catagory, location, job_description, "
	. "post_date, expiration, url_link "
	. "FROM job_table "
	. "WHERE visibility = TRUE "
	. "AND post_date BETWEEN (CURDATE() - INTERVAL 21 DAY) and (CURDATE() - INTERVAL 14 DAY) "
	. "LIMIT 5 ;";
?>
