<?php
/**
 * Template name: Add Company
 */
	 get_header();
if ( !is_user_logged_in() ) {

    $login = home_url('/')."login";
    ?>
    <script>
        window.location.href="<?php echo $login; ?>"
    </script>
    <?php


}

      if(DEVICE == 'mobile') {
          include 'mobile/add-company.php';
      } else {
         include 'desktop/add-company.php';
      }

    get_footer();
?>