<?php
/**
 * Template name: Listting Job
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/listting-job.php';
      } else {
         include 'desktop/listting-job.php';
      }

    get_footer();
?>