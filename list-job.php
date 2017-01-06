<?php
/**
 * Template name:  List Job
 */
	 get_header();

   
          if(DEVICE == 'mobile') {
          include 'mobile/list-job.php';
      } else {
         include 'desktop/list-job.php';
      }
     

    get_footer();
?>