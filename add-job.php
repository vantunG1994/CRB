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
global $current_user;
$td_user_id = $current_user->ID;
$companies = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company'  and post_author = '".$td_user_id."' ");
if(count($companies) == 0) {
?>
<section id="need-company-profile">
    <div class="container">
        <div class="resume-skills">
            <h1 class="resume-section-title"><i class="fa fa-exclamation-triangle"></i><?php _e( ' Lưu ý!', 'themesdojo' ); ?></h1>
            <h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Bạn cần cập nhật hồ sơ công ty trước khi đăng tin tuyển dụng!', 'themesdojo' ); ?></h3>
            <div class="divider"></div>
            <div class="full" style="margin-bottom: 0; text-align: center;">
                <a class="button-ag-full" href="<?php $new_company = home_url('/')."them-ho-so-cong-ty/"; echo $new_company; ?>" style="display: inline-block; float: none;"><i class="fa fa-check-square-o"></i><?php _e( 'Thêm hồ sơ công ty', 'themesdojo' ); ?></a>
            </div>
        </div>
    </div>
</section>
<?php }
else{
if($_GET['job_id']!="") {
$post_author_id = get_post_field('post_author', $_GET['job_id']);
if ($post_author_id == $td_user_id) {
$error_job=0;
}
else{
$error_job=1;
}
}
if ($error_job==1){
?>
<section id="need-company-profile">
    <div class="container">
        <div class="resume-skills">
            <h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Xin lỗi đây không phải là tin đăng của bạn!', 'themesdojo' ); ?></h3>
            <div class="divider"></div>
            <div class="full" style="margin-bottom: 0; text-align: center;">
            </div>
        </div>
    </div>
</section>
<?php
}
else{
if(DEVICE == 'mobile') {
include 'mobile/add-job.php';
} else {
include 'desktop/add-job.php';
}
}
}
get_footer();
?>