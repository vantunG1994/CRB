<?php global $theme; ?>
    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="HandheldFriendly" content="true">
        <title><?php is_front_page() ? bloginfo('name') : wp_title(''); ?> |  <?php bloginfo('description'); ?> </title>
        <meta property="og:title" content="<?php is_front_page() ? bloginfo('name') : wp_title(''); ?> |  <?php bloginfo('description'); ?> ">
        <meta property="og:type" content="article">
        <link rel="shortcut icon" href="<?php echo home_url(); ?>/wp-content/uploads/2017/01/logo-mvl-60x60.png" type="image/x-icon" />

        <meta property="og:image" content="<?php echo home_url(); ?>/wp-content/uploads/2017/01/logo-mvl-60x60.png" />
        <meta property="og:description" content="<?php if ( is_single() ) {
            single_post_title('', true);
        } else {
            wp_title(''); echo "-"; bloginfo('description');
        }
        ?>" />
        <?php
        if(DEVICE == 'mobile') {
            wp_enqueue_style( 'mobile_style', get_template_directory_uri() . '/mobile/asset/css/main_v1.12.css', array(), '' );
        } else {

            wp_enqueue_style( 'mobile_style', get_template_directory_uri() . '/desktop/asset/css/main_v1.12.css', array(), '' );
        }
        ?>


        <?php  wp_head(); ?>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
        <link href="<?php echo THEMATER_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo THEMATER_URL; ?>/css/popup-login.css" rel="stylesheet">
        <link href="<?php echo THEMATER_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/register.css">
        <link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/yuna.css" type="text/css"/>
        <link href="<?php echo THEMATER_URL; ?>/css/select2.min.css" rel="stylesheet" />
        <link href="<?php echo THEMATER_URL; ?>/css/crb_salary_style.css" rel="stylesheet">
        <link href="<?php echo THEMATER_URL; ?>/css/sweetalert2.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
        <?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>

        <?php $theme->hook('head'); ?>
        <style>
            html {
                -webkit-text-size-adjust: none
            }
            i.fa.fa-map-marker {
                padding-right: 5px;
            }
            .text-center{
                margin-top: 5%;
            }
            
            .job-description{
                margin-bottom: 5%;
            }
            .none_skill{
                margin-left:50%;
                width: 50%;
                float: none;
                position: relative;
                margin-bottom: 30px;
            }
            .company-introduction{
                text-align: inherit !important;
            }
            .list-job-detail .comment{
                float: none !important;
            }
            ul.children li {
                width: 100% !important;
            }
            span.main-skills-item-title{
                text-transform: capitalize !important;
            }
        </style>
    </head>
<body <?php body_class(); ?>>
<?php $theme->hook('html_before'); ?>
<?php
if(DEVICE == 'mobile') {
    include 'mobile/header.php';
} else {
    include 'desktop/header.php';
}
?>