<?php
  echo'<script type="text/javascript">
  //This initiates the table functionality (sort, search)
  $(document).ready(function() {
      $(\'#myTable\').DataTable( {
          "order": [[ 4, "desc" ]]
      } );
  } );
  </script>';
?>
