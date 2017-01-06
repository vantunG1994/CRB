<?php
    require_once TEMPLATEPATH . '/lib/Mobile_Detect.php';
    require_once TEMPLATEPATH . '/inc/job-meta.php';
    require_once TEMPLATEPATH . '/inc/resume-meta.php';
    require_once TEMPLATEPATH . '/inc/company-meta.php';
    $detect = new Mobile_Detect;
   
// Any mobile device (phones or tablets).
    if ( $detect->isMobile() ) {
        define('DEVICE','mobile') ;
    } else if( $detect->isTablet() ){
        define('DEVICE','tablet') ;
    } else {
        define('DEVICE','desktop') ;
    }
 
    require_once TEMPLATEPATH . '/lib/Themater.php';
    $theme = new Themater('Yuna');
    $theme->options['includes'] = array('featuredposts');
    
    $theme->options['plugins_options']['featuredposts'] = array('image_sizes' => '615px. x 300px.', 'speed' => '400', 'effect' => 'scrollHorz');
    
    unset($theme->admin_options['Ads']);

    

    $theme->admin_options['Layout']['content']['featured_image_width']['content']['value'] = '150';
    $theme->admin_options['Layout']['content']['featured_image_height']['content']['value'] = '90';
    
    // Footer widgets
    $theme->admin_option('Layout', 
        'Footer Widgets Enabled?', 'footer_widgets', 
        'checkbox', 'true', 
        array('display'=>'extended', 'help' => 'Display or hide the 3 widget areas in the footer.', 'priority' => '15')
    );


    $theme->load();
    
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'themater'),
        'id' => 'sidebar_primary',
        'description' => __('The primary sidebar widget area', 'themater'),
        'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
    
    $theme->add_hook('sidebar_primary', 'sidebar_primary_default_widgets');
    
    function sidebar_primary_default_widgets ()
    {
        global $theme;

        $theme->display_widget('Search');
        $theme->display_widget('Tabs');
        $theme->display_widget('Facebook', array('url'=> 'https://www.facebook.com/FlexiThemes'));
        $theme->display_widget('Banners125', array('banners' => array('<a href="https://flexithemes.com/wp-content/pro/b125-1.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-1.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-2.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-2.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-13.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-3.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-4.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-4.gif" alt="Check for details" /></a>')));
        $theme->display_widget('Archives');
        $theme->display_widget('Tag_Cloud');
        $theme->display_widget('Text', array('text' => '<div style="text-align:center;"><a href="https://flexithemes.com/wp-content/pro/b260.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b260.gif" alt="Check for details" /></a></div>'));
    }
    
    // Register the footer widgets only if they are enabled from the FlexiPanel
    if($theme->display('footer_widgets')) {
        register_sidebar(array(
            'name' => 'Footer Widget Area 1',
            'id' => 'footer_1',
            'description' => 'The footer #1 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => 'Footer Widget Area 2',
            'id' => 'footer_2',
            'description' => 'The footer #2 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => 'Footer Widget Area 3',
            'id' => 'footer_3',
            'description' => 'The footer #3 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => 'Footer Widget Area 4',
            'id' => 'footer_4',
            'description' => 'The footer #4 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        $theme->add_hook('footer_1', 'footer_1_default_widgets');
        $theme->add_hook('footer_2', 'footer_2_default_widgets');
        $theme->add_hook('footer_3', 'footer_3_default_widgets');
        $theme->add_hook('footer_4', 'footer_4_default_widgets');
        
        function footer_1_default_widgets ()
        {
            global $theme;
            $theme->display_widget('Links');
        }
        
        function footer_2_default_widgets ()
        {
            global $theme;
            $theme->display_widget('Recent_Posts', array('number' => '6'));
        }
        
        function footer_3_default_widgets ()
        {
            global $theme;
            $theme->display_widget('Search');
            $theme->display_widget('Tag_Cloud');
            
        }
        
        function footer_4_default_widgets ()
        {
            global $theme;
            $theme->display_widget('Text', array('title' => 'Contact', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nis.<br /><br /> <span style="font-weight: bold;">Our Company Inc.</span><br />2458 S . 124 St.Suite 47<br />Town City 21447<br />Phone: 124-457-1178<br />Fax: 565-478-1445'));
        }
    }

    function get_nav_menu_item_children( $parent_id, $nav_menu_items, $depth = true ) {
        $nav_menu_item_list = array();
        foreach ( (array) $nav_menu_items as $nav_menu_item ) {
            if ( $nav_menu_item->menu_item_parent == $parent_id ) {
                $nav_menu_item_list[] = $nav_menu_item;
            if ( $depth ) {
        if ( $children = get_nav_menu_item_children( $nav_menu_item->ID, $nav_menu_items ) )
        $nav_menu_item_list = array_merge( $nav_menu_item_list, $children );
        }
          }
        }
        return $nav_menu_item_list;
    }


function login_failed() {
    if ( ! is_page_template( 'template-login.php' ) ) {
        $login_page = home_url('/login/');
        wp_redirect($login_page . '?login=failed');
        exit;
    }
}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password )
{
    if ( ! is_page_template( 'template-login.php' ) ){
        $username=$_POST['log'];
        $password=$_POST['pwd'];
        $login_page = home_url('/login/');
        if(isset($_POST['wp-submit'])){
            if ($username == "" || $password == "") {
                wp_redirect($login_page . "?login=empty");
                exit;
            }
        }}
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

function custom_rewrite_tag() {
    add_rewrite_tag('%nganh%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule_job() {
    add_rewrite_rule('^nganh-nghe-tuyen-dung/([^/]*)/?','index.php?page_id=3176&nganh=$matches[1]','top');

}
add_action('init', 'custom_rewrite_rule_job', 10, 0);

function custom_rewrite_resume_page() {
    add_rewrite_rule('^ung-vien-theo-nganh-nghe/([^/]*)/?','index.php?page_id=3186&nganh=$matches[1]','top');
}
add_action('init', 'custom_rewrite_resume_page', 10, 0);

function post_type_jobs() {
    $labels = array(
        'name' => _x('Jobs', 'post type general name', 'themesdojo'),
        'singular_name' => _x('Jobs', 'post type singular name', 'themesdojo'),
        'add_new' => _x('Add New Job', 'book', 'themesdojo'),
        'add_new_item' => __('Add New Job', 'themesdojo'),
        'edit_item' => __('Edit Job', 'themesdojo'),
        'new_item' => __('New Job', 'themesdojo'),
        'view_item' => __('View Job', 'themesdojo'),
        'search_items' => __('Search Jobs', 'themesdojo'),
        'not_found' =>  __('No Jobs found', 'themesdojo'),
        'not_found_in_trash' => __('No Jobs found in Trash', 'themesdojo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'viec-lam'),
        'capability_type' => 'post',
        'has_archive'=>true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('thumbnail'),
        'menu_icon' => 'dashicons-menu'
    );

    register_post_type( 'job', $args );
//        flush_rewrite_rules();
}

add_action('init', 'post_type_jobs');

function post_type_menus() {
    $labels = array(
        'name' => _x('Resumes', 'post type general name', 'themesdojo'),
        'singular_name' => _x('Resumes', 'post type singular name', 'themesdojo'),
        'add_new' => _x('Add New Resume', 'book', 'themesdojo'),
        'add_new_item' => __('Add New Resume', 'themesdojo'),
        'edit_item' => __('Edit Resume', 'themesdojo'),
        'new_item' => __('New Resume', 'themesdojo'),
        'view_item' => __('View Resume', 'themesdojo'),
        'search_items' => __('Search Resumes', 'themesdojo'),
        'not_found' =>  __('No Resumes found', 'themesdojo'),
        'not_found_in_trash' => __('No Resumes found in Trash', 'themesdojo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' =>  array( 'slug' => 'ho-so-ung-vien' ),
        'capability_type' => 'post',
        'has_archive'=>true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('thumbnail'),
        'menu_icon' => 'dashicons-menu',
    );

    register_post_type( 'resume', $args );
    flush_rewrite_rules();

}

add_action('init', 'post_type_menus');
function post_type_company() {
    $labels = array(
        'name' => _x('Companies', 'post type general name', 'themesdojo'),
        'singular_name' => _x('Companies', 'post type singular name', 'themesdojo'),
        'add_new' => _x('Add New Company', 'book', 'themesdojo'),
        'add_new_item' => __('Add New Company', 'themesdojo'),
        'edit_item' => __('Edit Company', 'themesdojo'),
        'new_item' => __('New Company', 'themesdojo'),
        'view_item' => __('View Company', 'themesdojo'),
        'search_items' => __('Search Companies', 'themesdojo'),
        'not_found' =>  __('No Companies found', 'themesdojo'),
        'not_found_in_trash' => __('No Companies found in Trash', 'themesdojo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'cong-ty' ),
        'capability_type' => 'post',
        'has_archive'=>true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('thumbnail'),
        'menu_icon' => 'dashicons-menu'
    );

    register_post_type( 'company', $args );
    flush_rewrite_rules();
}

add_action('init', 'post_type_company');


require_once('global-functions.php');

function format_gia($vnd_price){
    $value = intval($vnd_price);

    if($value<10 || $value==0){
        return 'Thoả thuận';
    }

    else if($value<1000000 ) {

        $output = number_format ($value,0,',','.').' Đ';

    } else if($value<1000000000 ) {

        if ($value%1000000==0) {

            $output = number_format ($value/1000000,0,',','.');
        } else if ($value%100000==0) {

            $output = number_format ($value/1000000,1,',','.');
        }else {
            $output = number_format ($value/1000000,2,',','.');
        }
        $output='<b>'.$output.'</b> triệu';

    }  else {

        if ($value%1000000000==0) {
            $output = number_format ($value/1000000000,0,',','.');
        }else if ($value%100000000==0) {
            $output = number_format ($value/1000000000,1,',','.');
        }else{
            $output = number_format ($value/1000000000,2,',','.');
        }
        $output='<b>'.$output.'</b> tỷ';
    }
    return $output;


}
function sw_human_time_diff($id_post) {
    $date = get_the_time('G', $id_post);;
    $langs = array('giây', 'phút', 'giờ', 'ngày', 'tuần', 'tháng', 'năm');
    $chunks = array(
        array( 60 * 60 * 24 * 365 , __( $langs[6], 'swhtd' ), __( $langs[6], 'swhtd' ) ),
        array( 60 * 60 * 24 * 30 , __( $langs[5], 'swhtd' ), __( $langs[5], 'swhtd' ) ),
        array( 60 * 60 * 24 * 7, __( $langs[4], 'swhtd' ), __( $langs[4], 'swhtd' ) ),
        array( 60 * 60 * 24 , __( $langs[3], 'swhtd' ), __( $langs[3], 'swhtd' ) ),
        array( 60 * 60 , __( $langs[2], 'swhtd' ), __( $langs[2], 'swhtd' ) ),
        array( 60 , __( $langs[1], 'swhtd' ), __( $langs[1], 'swhtd' ) ),
        array( 1, __( $langs[0], 'swhtd' ), __( $langs[0], 'swhtd' ) )
    );
    if ( !is_numeric( $date ) ) {
        $time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
        $date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
        $date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
    }
    $current_time = current_time( 'mysql', $gmt );
    $newer_date = ( !$newer_date ) ? strtotime( $current_time ) : $newer_date;
    $since = $newer_date - $date;
    if ( 0 > $since )
        return __( 'Gần đây', 'swhtd' );
    for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        if ( ( $count = floor($since / $seconds) ) != 0 )
            break;
    }
    $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
    if ( !(int)trim($output) ){
        $output = '0 ' . __( $langs[0], 'swhtd' );
    }
    $output .= __(' trước', 'swhtd');

    if(strrpos($output,"ngày") >0)
    {
        $output="Gần đây";
    }
    return $output;
}
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if(empty($first_img)) {
        $first_img = get_template_directory_uri()."/images/no_images.jpg";
    }else{
        $first_img.='.thumb-120.mvlpng';
    }

    return $first_img;
}
function WPJobus_admin_enqueue() {

    wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/js/admin_script.js', array( 'jquery' ), '2013-07-18', true );

    wp_enqueue_script( 'admin-google-maps-script', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array( 'jquery' ), '2013-07-18', true );

    wp_enqueue_script( 'admin-gmap-script', get_template_directory_uri() . '/js/gmap3.min.js', array( 'jquery' ), '2013-07-18', true );

    wp_enqueue_script( 'admin-geo-google-map', get_template_directory_uri() . '/js/getlocation-map-script.js', array( 'jquery' ), '2013-07-18', true );

    global $post_type;
    if( 'resume' == $post_type OR 'job' == $post_type OR 'company' == $post_type )
        wp_enqueue_script( 'admin-jquery-ui-script', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array( 'jquery' ), '2013-07-18', true );

}

add_action( 'admin_enqueue_scripts', 'WPJobus_admin_enqueue' );
function WPJobus_scripts_styles() {


    wp_enqueue_script( 'WPJobus-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );
    wp_enqueue_script( 'WPJobus-script', get_template_directory_uri() . '/js/desktop.js', array( 'jquery' ), '2013-07-18', true );
    wp_enqueue_script( 'WPJobus-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '2013-07-18', true );



}
add_action( 'wp_enqueue_scripts', 'WPJobus_scripts_styles' );
function filter_handler( $data , $postarr ){
    global $post, $id;


    if(('job' == $data['post_type'] && isset($data['post_type']))) {

        $id = $postarr['ID'];

        if($id) {

            $title = $_POST['ID'];
            $post_title= $_POST['wpjobus_job_fullname']." ".$title;
            $post_title_fontend=$_POST['fullName']." ".$title;

            $wpjobus_title = esc_attr(get_post_meta($title, 'wpjobus_post_title',true));
            $wpjobus_title=$wpjobus_title." ".$title;
            $post_name = sanitize_title($post_title);
          if(!empty($post_title)){
                $data['post_title'] = $_POST['wpjobus_job_fullname'];
                $post_name = sanitize_title($post_title);
            }
          else if(!empty($wpjobus_title)) {
                $data['post_title'] =esc_attr(get_post_meta($title, 'wpjobus_post_title',true));
                $post_name = sanitize_title($wpjobus_title);

            }
            else if(!empty($_POST['fullName'])){
                $data['post_title'] =$_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            if(isset($_POST['fullName'])!="")
            {
                $data['post_title'] =$_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            $data['post_name'] =  $post_name;

        }

    }
    if(('company' == $data['post_type'] && isset($data['post_type']))) {

        $id = $postarr['ID'];

        if($id) {

            $title = $_POST['ID'];
            $post_title= $_POST['wpjobus_company_fullname']." ".$title;
            $post_title_fontend=$_POST['fullName']." ".$title;
            $wpjobus_title = esc_attr(get_post_meta($title, 'wpjobus_post_title',true));
            $wpjobus_title =$wpjobus_title ." ".$title;
            if(!empty($post_title)) {
                $data['post_title'] =$_POST['wpjobus_company_fullname'];
                $post_name = sanitize_title($wpjobus_title);

            }

            else if(!empty($wpjobus_title)){
                $data['post_title'] = esc_attr(get_post_meta($title, 'wpjobus_post_title',true));

                $post_name = sanitize_title($post_title);
            }
            else if(!empty($post_title_fontend)){
                $data['post_title'] =$_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            if(isset($_POST['fullName'])!="")
            {
                $data['post_title'] =$_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            $data['post_name'] =  $post_name;
        }

    }
    if(( 'resume' == $data['post_type'] && isset($data['post_type']))) {

        $id = $postarr['ID'];

        if($id) {


            $title = $_POST['ID'];
            $post_title= $_POST['wpjobus_resume_fullname']." ".$title;
            $post_title_fontend=$_POST['fullName']." ".$title;

            $wpjobus_title = esc_attr(get_post_meta($title, 'wpjobus_post_title',true));
            $wpjobus_title =$wpjobus_title ." ".$title;
            if(!empty($post_title)){
                $data['post_title'] =$_POST['wpjobus_resume_fullname'];
                $post_name = sanitize_title($post_title);
            }
           else  if(!empty($wpjobus_title)) {
               $data['post_title'] = esc_attr(get_post_meta($title, 'wpjobus_post_title',true));
               $post_name = sanitize_title($wpjobus_title);

           }
           else if(!empty($post_title_fontend)){
                $data['post_title'] = $_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            if(isset($_POST['fullName'])!="")
            {
                $data['post_title'] = $_POST['fullName'];
                $post_name = sanitize_title($post_title_fontend);

            }
            $data['post_name'] =  $post_name;
        }

    }

    return $data;
}

add_filter( 'wp_insert_post_data' , 'filter_handler' , '99', 2 );

if ( current_user_can('subscriber') && current_user_can('upload_files') )
    add_action('admin_init', 'WPJobus_allow_contributor_uploads');
function WPJobus_allow_contributor_uploads() {
    $contributor = get_role('subscriber');
    $contributor->add_cap('upload_files');
}

function WPJobus_wpcads_insert_attachment($file_handler,$td_post_id,$setthumb='false') {

    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, $td_post_id );

    if ($setthumb) update_post_meta($td_post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}


function WPJobus_get_attachment_id_from_src($image_src) {

    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;

}

function WPJobus_author_comment_count($author_email){

    $oneText = '1';
    $moreText = '%';

    global $wpdb;

    $td_result = $wpdb->get_var('
		SELECT
			COUNT(comment_ID)
		FROM
			'.$wpdb->comments.'
		WHERE
			comment_author_email = "'.$author_email.'"'
    );

    echo $td_result;

}

/**
 * Check if page exist by slug
 */
function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}
require get_template_directory() . '/inc/function_ajax.php';
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
?>

