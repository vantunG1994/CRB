<?php
/**
* Template name: Add resume
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
if($_GET['resume_id']!="") {
$post_author_id = get_post_field('post_author', $_GET['resume_id']);
if ($post_author_id == $td_user_id) {
$error_resume=0;
}
else{
$error_resume=1;
}
}
if ($error_resume==1){
?>
<section id="need-company-profile">
    <div class="container">
        <div class="resume-skills">
            <h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Xin lỗi đây không phải là hồ sơ cá nhân của bạn!', 'themesdojo' ); ?></h3>
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
include 'mobile/add-resume.php';
} else {
include 'desktop/add-resume.php';
}
}
get_footer();
?>