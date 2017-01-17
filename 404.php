<?php
/**
* The template for displaying 404 pages (Not Found).
*/
get_header(); ?>
<?php
include (get_template_directory() . "/part-sliders.php");
?>
<style>
@media only screen and (max-width: 768px) {
#ads-homepage iframe {
width: 100%;
}
section#ads-homepage {
margin: 10px !important;
}
}
</style>
<section id="seacrh-result-title">
    <div class="container">
        <h1 style="text-align: center;padding-top: 20px !important;"><?php _e( 'LỖI 404!', 'wpads' ); ?></h1>
    </div>
</section>
<section id="ads-homepage" style="margin: 30px;text-align: center;">
    <div class="container">
        <h2><?php _e( 'Có lỗi xảy ra. Trang này không tồn tại...', 'wpads' ); ?></h2>
        <p><?php _e( ' Có thể bạn vừa truy cập một trang không còn tồn tại nữa hoặc đã có lỗi xảy ra. Làm phiền bạn thử lại hoặc gọi cho chúng tôi (08) 2222 2236 để được hỗ trợ tốt nhất.', 'wpads' ); ?></p>
        <iframe width="720" height="360" src="https://www.youtube.com/embed/A-Cgw9Hebpg?rel=0&showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
    </div>
</section>
<?php get_footer(); ?>