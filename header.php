 <?php global $theme; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php is_front_page() ? bloginfo('name') : wp_title(''); ?> |  <?php bloginfo('description'); ?> </title>

   
      <link rel="shortcut icon" href="/wp-content/uploads/2017/01/logo-mvl-60x60.png" type="image/x-icon" />
   
    <meta property="og:image" content="/wp-content/uploads/2017/01/logo-mvl-60x60.png" />


    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        wp_title(''); echo "-"; bloginfo('description');
    }

    ?>" />
    <?php
      if(DEVICE == 'mobile') {
          wp_enqueue_style( 'mobile_style', get_template_directory_uri() . '/mobile/asset/css/main.css', array(), '' );
      } else {
         wp_enqueue_style( 'mobile_style', get_template_directory_uri() . '/desktop/asset/css/main.css', array(), '' );
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
  <link href="<?php echo THEMATER_URL; ?>/css/salary_style.css" rel="stylesheet">
  <link href="<?php echo THEMATER_URL; ?>/css/sweetalert2.min.css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwk4_zWbMqaVQKl4hIhJdxlLO0pEmrRoE&#038;ver=2013-07-18'></script>

    <?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
  


  <?php $theme->hook('head'); ?>
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
