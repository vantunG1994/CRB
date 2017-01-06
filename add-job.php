<?php
/**
 * Template name: Add job
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
          include 'mobile/add-job.php';
      } else {
         include 'desktop/add-job.php';
      }

    get_footer();
?>