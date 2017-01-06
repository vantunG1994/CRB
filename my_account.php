<?php
/**
 * Template name: My Account
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
          include 'mobile/my-account.php';
      } else {
         include 'desktop/my-account.php';
      }

    get_footer();
?>