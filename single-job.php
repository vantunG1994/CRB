<?php
/**
 * Job Page
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/single-job.php';
      } else {
         include 'desktop/single-job.php';
      }

    get_footer();
?>