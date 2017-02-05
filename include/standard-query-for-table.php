<?php
	$query = "SELECT job_number, job_title, company_name, catagory, location, job_description, "
	. "post_date, expiration, url_link "
	. "FROM job_table "
	. "WHERE visibility = TRUE;";
?>
