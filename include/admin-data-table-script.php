<?php
	//include script: This initiates the table functionality (sort, search)
	//show entries and other table features
	echo'<script type="text/javascript">
	$(document).ready(function() {
		$(\'#myTable\').DataTable( {
		"order": [[ 6, "desc" ]]
		} );
	} );
	</script>';
?>
