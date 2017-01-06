<?php
/**
 * Template name: Page price
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/page-price.php';
      } else {
         include 'desktop/page-price.php';
      }

    get_footer();
?>