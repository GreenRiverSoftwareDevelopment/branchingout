<?php
	// include script for standard page table body
    while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td><a href="form-processors/job_description.php?id=' . $row['job_number'] . '" target="_blank">' . $row['job_title'] . '</a>' . '</td>';
		echo '<td>' . $row['company_name'] . '</td>';
		echo '<td>' . $row['catagory'] . '</td>';
		echo '<td>' . $row['location'] . '</td>';
		echo '<td>' . $row['post_date'] . '</td>';
		echo '<td>' . $row['expiration'] . '</td>';
		echo '<td class="center-text">' . '<a href="'. $row['url_link'] . '" target="_blank"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>' . '</td>';
		echo '</tr>';
    }
?>
