<?php
/**
 * Company Page
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/single-company.php';
      } else {
         include 'desktop/single-company.php';
      }

    get_footer();
?>