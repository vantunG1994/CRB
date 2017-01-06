<?php
/**
 * Template name: Edit job
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/edit-job.php';
      } else {
         include 'desktop/edit-job.php';
      }

    get_footer();
?>