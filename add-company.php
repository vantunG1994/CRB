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
global $current_user;

$td_user_id = $current_user->ID;
if($_GET['company_id']!="") {
    $post_author_id = get_post_field('post_author', $_GET['company_id']);

    if ($post_author_id == $td_user_id) {
        $error_job=0;

    }
    else{
        $error_company=1;
    }
}
if ($error_company==1){
    ?>
    <section id="need-company-profile">

        <div class="container">

            <div class="resume-skills">


                <h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Xin lỗi đây không phải là hồ sơ công ty của bạn!', 'themesdojo' ); ?></h3>

                <div class="divider"></div>

                <div class="full" style="margin-bottom: 0; text-align: center;">
                </div>

            </div>

        </div>

    </section>

    <?php

}
else {

    if (DEVICE == 'mobile') {
        include 'mobile/add-company.php';
    } else {
        include 'desktop/add-company.php';
    }
}

    get_footer();
?>