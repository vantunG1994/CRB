<?php



/**
 * WPJobus functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WPJobus
 * @since WPJobus 2.0.10
 */
$cli_path=dirname(__FILE__).'/../../../cli/';
require($cli_path.'config.php');
require_once($cli_path.'wp2es.php');
$wp2es=new wp2es($es_host,$es_post_index,$es_type);
function load_resumes(){
    global $wpdb;
    $resumes=$wpdb->get_results('select * from crb_meta where meta_group="resume_industry"');
    $mvl_resumes = array();
    foreach($resumes as $resume){
        $mvl_resumes[$resume->meta_key] = $resume->meta_value;

    }
    return $mvl_resumes;

}



add_filter('wp_title', 'filter_pagetitle');
function filter_pagetitle($title) {
    global $post,$wpdb;
    $job_field=$wpdb->get_results('select * from job_field ');
    $job_province=$wpdb->get_results('select * from job_province ');
    if($post->ID==3186)
    {
        $pos=strrpos(get_pagenum_link(),"?");
        if($pos !="")
        {
            $url=substr(get_pagenum_link(),0,$pos);
            $url = rtrim($url, "/");
        }
        else{
            $url = rtrim(get_pagenum_link(), "/");
        }

        $pos=strrpos(get_pagenum_link(),"?");
        if($pos !="")
        {
            $url=substr(get_pagenum_link(),0,$pos);
            $url = rtrim($url, "/");
        }
        else{
            $url = rtrim(get_pagenum_link(), "/");
        }


        $pos = strrpos($url, "/");
        $sub_string = substr($url, $pos + 1);
        $job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');

        $job_type=$job_field->name;
        $url_page=$_SERVER["REQUEST_URI"];
        $pos=strrpos($url_page,"?");
        if($pos !="")
        {
            $url_page=substr($url_page,0,$pos);
            $url_page = rtrim($url_page, "/");
        }
        else{
            $url_page=$_SERVER["REQUEST_URI"];
        }
        $url_page= rtrim( $url_page, "/");
        $pos = strrpos( $url_page, "/");
        $num = substr( $url_page, $pos + 1);
        if($num !="" && (is_numeric($num)) )
        {
            $page="  Trang ".$num;
        }
        else{$page="";}
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

            if($salary==2500000)
            {
                $salary_name="1-3 triệu";
            }
            if($salary==4000000)
            {
                $salary_name="3-5 triệu";
            }
            if($salary==6000000)
            {
                $salary_name="5-7 triệu";
            }
            if($salary==8500000)
            {
                $salary_name="7-10 triệu";
            }
            if($salary==11000000)
            {
                $salary_name="10-12 triệu";
            }
            if($salary==13500000)
            {
                $salary_name="12-15 triệu";
            }
            if($salary==17500000)
            {
                $salary_name="15-20 triệu";
            }
            if($salary==22500000)
            {
                $salary_name="20-25 triệu";
            }
            if($salary==27500000)
            {
                $salary_name="25-30 triệu";
            }
            if($salary==30000000)
            {
                $salary_name="30 triệu trở lên";
            }


        }
        else{

            $salary_name='';


        }
        $title= "Ứng viên  ".$job_type." ".$location." ".$salary_name." ".$page."  ";

    }
    if($post->ID==3176)
    {
        $pos=strrpos(get_pagenum_link(),"?");
        if($pos !="")
        {
            $url=substr(get_pagenum_link(),0,$pos);
            $url = rtrim($url, "/");
        }
        else{
            $url = rtrim(get_pagenum_link(), "/");
        }


        $pos = strrpos($url, "/");
         $sub_string = substr($url, $pos + 1);
        $job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');
        $job_type=$job_field->name;

        $url_page=$_SERVER["REQUEST_URI"];
        $pos=strrpos($url_page,"?");
        if($pos !="")
        {
            $url_page=substr($url_page,0,$pos);
            $url_page = rtrim($url_page, "/");
        }
        else{
            $url_page=$_SERVER["REQUEST_URI"];
        }
        $url_page= rtrim( $url_page, "/");
        $pos = strrpos( $url_page, "/");
        $num = substr( $url_page, $pos + 1);
        if($num !="" && (is_numeric($num)) )
        {
            $page="  Trang ".$num;
        }
        else{$page="";}
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

            if($salary==2500000)
            {
                $salary_name="1-3 triệu";
            }
            if($salary==4000000)
            {
                $salary_name="3-5 triệu";
            }
            if($salary==6000000)
            {
                $salary_name="5-7 triệu";
            }
            if($salary==8500000)
            {
                $salary_name="7-10 triệu";
            }
            if($salary==11000000)
            {
                $salary_name="10-12 triệu";
            }
            if($salary==13500000)
            {
                $salary_name="12-15 triệu";
            }
            if($salary==17500000)
            {
                $salary_name="15-20 triệu";
            }
            if($salary==22500000)
            {
                $salary_name="20-25 triệu";
            }
            if($salary==27500000)
            {
                $salary_name="25-30 triệu";
            }
            if($salary==30000000)
            {
                $salary_name="30 triệu trở lên";
            }


        }
        else{

            $salary_name='';


        }
        $title= "Tuyển dụng ".$job_type." ".$location." ".$salary_name." ".$page."  ";


    }
    if($post->ID==3173 ||$post->ID==571 ||$post->ID==557)
    {
        $url_page=$_SERVER["REQUEST_URI"];
        $pos=strrpos($url_page,"?");
        if($pos !="")
        {
            $url_page=substr($url_page,0,$pos);
            $url_page = rtrim($url_page, "/");
        }
        else{
            $url_page=$_SERVER["REQUEST_URI"];
        }
        $url_page= rtrim( $url_page, "/");
        $pos = strrpos( $url_page, "/");
        $num = substr( $url_page, $pos + 1);
        if($num !="" && (is_numeric($num)) )
        {
            $page="  Trang ".$num;
        }
        else{$page="";}
        if($post->ID==3173){$name="Tuyển dụng";}
        if($post->ID==571){$name="Ứng viên";}
        if($post->ID==557){$name="Doanh nghiệp";}
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

                if($salary==2500000)
                {
                    $salary_name="1-3 triệu";
                }
                if($salary==4000000)
                {
                    $salary_name="3-5 triệu";
                }
                if($salary==6000000)
                {
                    $salary_name="5-7 triệu";
                }
                if($salary==8500000)
                {
                    $salary_name="7-10 triệu";
                }
                if($salary==11000000)
                {
                    $salary_name="10-12 triệu";
                }
                if($salary==13500000)
                {
                    $salary_name="12-15 triệu";
                }
                if($salary==17500000)
                {
                    $salary_name="15-20 triệu";
                }
                if($salary==22500000)
                {
                    $salary_name="20-25 triệu";
                }
                if($salary==27500000)
                {
                    $salary_name="25-30 triệu";
                }
                if($salary==30000000)
                {
                    $salary_name="30 triệu trở lên";
                }


        }
        else{

            $salary_name='';


        }
        if(($_GET["industry"])!="" )
        {
            $job_types=$_GET["industry"];
            $job_type="";

            foreach ($job_field as $industry) {
                if ($job_types == $industry->slug) {
                    $job_type .= $industry->name;
                }
            }

        }else{

            $job_type='';

        }

        $title= $name." ".$job_type." ".$location." ".$salary_name." ".$page."  ";


    }

        if(get_post_type( $post->ID ) == 'resume' ) {
            $wpjobus_resume_fullname = get_post_meta($post->ID, 'wpjobus_resume_fullname', true);
            $wpjobus_resume_prof_title = get_post_meta($post->ID, 'wpjobus_resume_prof_title', true);
            $title=$wpjobus_resume_prof_title.' '.$wpjobus_resume_fullname;

        }
        if(get_post_type( $post->ID ) == 'job' ) {
            $wpjobus_job_fullname= get_post_meta($post->ID, 'wpjobus_job_fullname', true);
            $job_company= get_post_meta($post->ID, 'job_company', true);
            $wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
            $title=$wpjobus_job_fullname.' '.$wpjobus_company_fullname;

        }
        if(get_post_type( $post->ID ) == 'company' ) {
        $wpjobus_company_fullname=get_post_meta($post->ID, 'wpjobus_company_fullname', true);
            $title=$wpjobus_company_fullname;

        }

    return $title;
}

function add_meta_tags() {
    global $post,$wpdb;
    $job_field=$wpdb->get_results('select * from job_field ');

    if($post->ID==3176) {
        $pos=strrpos(get_pagenum_link(),"?");
        if($pos !="")
        {
            $url=substr(get_pagenum_link(),0,$pos);
            $url = rtrim($url, "/");
        }
        else{
            $url = rtrim(get_pagenum_link(), "/");
        }

        $pos = strrpos($url, "/");
        $sub_string = substr($url, $pos + 1);
        $job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');

        $job_type=$job_field->name;
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=" ".$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

            if($salary==2500000)
            {
                $salary_name=" 1-3 triệu";
            }
            if($salary==4000000)
            {
                $salary_name=" 3-5 triệu";
            }
            if($salary==6000000)
            {
                $salary_name=" 5-7 triệu";
            }
            if($salary==8500000)
            {
                $salary_name=" 7-10 triệu";
            }
            if($salary==11000000)
            {
                $salary_name=" 10-12 triệu";
            }
            if($salary==13500000)
            {
                $salary_name=" 12-15 triệu";
            }
            if($salary==17500000)
            {
                $salary_name=" 15-20 triệu";
            }
            if($salary==22500000)
            {
                $salary_name=" 20-25 triệu";
            }
            if($salary==27500000)
            {
                $salary_name=" 25-30 triệu";
            }
            if($salary==30000000)
            {
                $salary_name=" 30 triệu trở lên";
            }


        }
        else{

            $salary_name='';


        }
        $meta_description="Hàng 100.000+ việc làm ".$job_type." chất lượng lương cao, tuyển dụng nhanh và đãi ngộ cực tốt từ hàng trăm ngàn nhà tuyển dụng hàng đầu. Truy cập ngay để tìm việc và ứng tuyển, miễn phí cực hot!";
        $meta = "Tuyển dụng - ".$job_type."-".$location."-".$salary_name."-".$meta_description;
        $metakeywords = "Tuyển dụng ".$job_type.$job_type.",".$location.",".$salary_name.",".get_option( 'blogname' ).",".get_option( 'blogdescription' );

        echo '<meta name="description" content="' . $meta . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";
    }
    if(get_post_type( $post->ID ) == 'resume' ) {
        $wpjobus_resume_fullname = get_post_meta($post->ID, 'wpjobus_resume_fullname', true);
        $wpjobus_resume_prof_title = get_post_meta($post->ID, 'wpjobus_resume_prof_title', true);
        $meta_description=$wpjobus_resume_prof_title.','.$wpjobus_resume_fullname;
        $metakeywords = $wpjobus_resume_fullname.','.$wpjobus_resume_prof_title.','.get_option( 'blogname' ).",".get_option( 'blogdescription' );

        echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";

    }
    if(get_post_type( $post->ID ) == 'job' ) {
        $wpjobus_job_fullname= get_post_meta($post->ID, 'wpjobus_job_fullname', true);
        $job_company= get_post_meta($post->ID, 'job_company', true);
        $wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
        $meta_description=$wpjobus_job_fullname.' '.$wpjobus_company_fullname;
        $metakeywords = $wpjobus_job_fullname.','.$wpjobus_company_fullname.','.get_option( 'blogname' ).",".get_option( 'blogdescription' );

        echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";

    }
    if(get_post_type( $post->ID ) == 'company' ) {
        $wpjobus_company_fullname=get_post_meta($post->ID, 'wpjobus_company_fullname', true);
        $meta_description=$wpjobus_company_fullname;
        $metakeywords = $wpjobus_company_fullname.','.get_option( 'blogname' ).",".get_option( 'blogdescription' );

        echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";

    }
    if($post->ID==3186) {
        $pos=strrpos(get_pagenum_link(),"?");
        if($pos !="")
        {
            $url=substr(get_pagenum_link(),0,$pos);
            $url = rtrim($url, "/");
        }
        else{
            $url = rtrim(get_pagenum_link(), "/");
        }

        $pos = strrpos($url, "/");
        $sub_string = substr($url, $pos + 1);
        $job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=" ".$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

            if($salary==2500000)
            {
                $salary_name=" 1-3 triệu";
            }
            if($salary==4000000)
            {
                $salary_name=" 3-5 triệu";
            }
            if($salary==6000000)
            {
                $salary_name=" 5-7 triệu";
            }
            if($salary==8500000)
            {
                $salary_name=" 7-10 triệu";
            }
            if($salary==11000000)
            {
                $salary_name=" 10-12 triệu";
            }
            if($salary==13500000)
            {
                $salary_name=" 12-15 triệu";
            }
            if($salary==17500000)
            {
                $salary_name=" 15-20 triệu";
            }
            if($salary==22500000)
            {
                $salary_name=" 20-25 triệu";
            }
            if($salary==27500000)
            {
                $salary_name=" 25-30 triệu";
            }
            if($salary==30000000)
            {
                $salary_name=" 30 triệu trở lên";
            }


        }
        else{

            $salary_name='';


        }
        $job_type=$job_field->name;
        $meta_description="Hơn 1.000.000+ hồ sơ người tìm việc và cv ứng viên ".$job_type." tài năng, chất lượng cao, năng động và đầy đủ thông tin được cập nhật mới hàng ngày. Truy cập ngay để tuyển dụng nhanh, cực hot!";
        $meta = "Ứng viên - ".$job_type."-".$location."-".$salary_name."-".$meta_description;
        $metakeywords = "Ứng viên ".$job_type.",".$location.",".$salary_name.",".get_option( 'blogname' ).",".get_option( 'blogdescription' );

        echo '<meta name="description" content="' . $meta . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";
    }
    if($post->ID==3173 ||$post->ID==571 ||$post->ID==557) {
        $url_page=$_SERVER["REQUEST_URI"];
        $pos=strrpos($url_page,"?");
        if($pos !="")
        {
            $url_page=substr($url_page,0,$pos);
            $url_page = rtrim($url_page, "/");
        }
        else{
            $url_page=$_SERVER["REQUEST_URI"];
        }
        $url_page= rtrim( $url_page, "/");
        $pos = strrpos( $url_page, "/");
        $num = substr( $url_page, $pos + 1);
        if($num !="" && (is_numeric($num)) )
        {
            $page=" - Trang ".$num;
        }
        if($post->ID==3173){
            $name="Tuyển dụng";
            $meta_description=" Hàng 1.000.000+ việc làm chất lượng lương cao, tuyển dụng nhanh và đãi ngộ cực tốt từ hàng trăm ngàn nhà tuyển dụng hàng đầu. Truy cập ngay để tìm việc và ứng tuyển, miễn phí cực hot!";

        }
        if($post->ID==571){
            $name="Ứng viên";
            $meta_description=" Hàng 10.000+ hồ sơ người tìm việc và cv ứng viên tài năng, chất lượng cao, năng động và đầy đủ thông tin được cập nhật mới hàng ngày. Truy cập ngay để tuyển dụng nhanh, cực hot!";

        }
        if($post->ID==557){$name="Doanh nghiệp";
            $meta_description=get_option('blogname') . "-" . get_option('blogdescription');

        }
        if(($_GET["resume_location"])!="")
        {
            $locations=$_GET["resume_location"];

            $location=" ".$locations;

        }else{
            $location='';
        }
        if(($_GET["salary"])!="")
        {
            $salarys=$_GET["salary"];
            $salary=$salarys;

            if($salary==2500000)
            {
                $salary_name=" 1-3 triệu";
            }
            if($salary==4000000)
            {
                $salary_name=" 3-5 triệu";
            }
            if($salary==6000000)
            {
                $salary_name=" 5-7 triệu";
            }
            if($salary==8500000)
            {
                $salary_name=" 7-10 triệu";
            }
            if($salary==11000000)
            {
                $salary_name=" 10-12 triệu";
            }
            if($salary==13500000)
            {
                $salary_name=" 12-15 triệu";
            }
            if($salary==17500000)
            {
                $salary_name=" 15-20 triệu";
            }
            if($salary==22500000)
            {
                $salary_name=" 20-25 triệu";
            }
            if($salary==27500000)
            {
                $salary_name=" 25-30 triệu";
            }
            if($salary==30000000)
            {
                $salary_name=" 30 triệu trở lên";
            }


        }
        else{

            $salary_name='';


        }
        if(($_GET["industry"])!="" )
        {
            $job_types=$_GET["industry"];
            $job_type="";

            foreach ($job_field as $industry) {
                if ($job_types == $industry->slug) {
                    $job_type .=" ".$industry->name;
                }
            }

        }else{

            $job_type='';

        }


        $meta = $name. " " .$job_type." ".$location." ".$salary_name."-" . $meta_description;
        $metakeywords =$name.$job_type.$location.$salary_name." " . get_option('blogname') . "," . get_option('blogdescription');

        echo '<meta name="description" content="' . $meta . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";
    }


}
add_action( 'wp_head', 'add_meta_tags' , 2 );

function vn_str_filter ($str){

    $unicode = array(

        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd'=>'đ',

        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i'=>'í|ì|ỉ|ĩ|ị',

        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'D'=>'Đ',

        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach($unicode as $nonUnicode=>$uni){

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);

    }

    return $str;

}
function createSlug($string) {

    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'D', 'đ'=>'d', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c','ổ'=>'o','ẩ'=>'a',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','ẹ'=>'e','ố'=>'o',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O','ề'=>'e','ủ'=>'u',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a','ă'=>'a', 'â'=>'a','ấ'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ạ'=>'a','ả'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e','ệ'=>'e','ế'=>'e','ể'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ĩ'=>'i','ị'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o','ơ'=>'o',
        'ợ'=>'o','ị'=>'i','ụ'=>'u','ư'=>'u','ử'=>'u','Ứ'=>'u','ỹ'=>'y','ậ'=>'a','ễ'=>'e','ầ'=>'a','ộ'=>'o','ữ'=>'u',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o','ờ'=>'o', 'ơ'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u','ư'=>'u','ứ'=>'u','ự'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', 'ỳ'=>'y','/' => '-', ' ' => '-', '-' => '-','%C3%A1n' => 'an'
    );

    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
    return strtolower(strtr($string, $table));
}
add_action('admin_menu', 'import_add_page');

function import_add_page()
{
    $page = add_menu_page(__('Import Data', 'menu-test'), __('Import Data', 'menu-test'), 'manage_options', __FILE__, 'api_pages');
}
function api_pages() {
    require get_template_directory() . '/insert_api.php';
}

global $mvl_jobs;
function load_jobs(){
    global $wpdb;
    $jobs=$wpdb->get_results('select * from crb_meta where meta_group="job_industry"');
    $mvl_jobs = array();
    foreach($jobs as $job){
        $mvl_jobs[$job->meta_key] = $job->meta_value;

    }
    return $mvl_jobs;

}



$mvl_jobs = load_jobs();
global $mvl_jobs;

function load_stats(){
    global $wpdb;
    $stats=$wpdb->get_results('select * from crb_meta where meta_group="stats"');
    $mvl_stats = array();
    foreach($stats as $row){
        $mvl_stats[$row->meta_key] = $row->meta_value;

    }
    return $mvl_stats;

}



$mvl_stats = load_stats();
global $mvl_stats;





function add_queue($type,$data){
    global $wpdb;

    $wpdb->query('insert into crb_queue set type="'.$type.'",data="'.addslashes(json_encode($data)).'"');

    return;

}



add_action('admin_menu','wphidenagupdate');
function wphidenagupdate() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}


add_action( 'admin_menu', 'sale_staff' );

function sale_staff()
{

    require_once(get_template_directory() . '/template-admin-sale-staff.php');

    add_menu_page(
        'Sale Staff',
        'Sale Staff',
        'moderate_comments',
        'sale-staff',
        'sale_staff_my_customer'
    );

    add_submenu_page( 'sale-staff', 'Khách hàng', 'Khách chưa được chăm sóc',
        'moderate_comments','sale-staff-all-customer','sale_staff_all_customer');
    add_submenu_page( 'sale-staff', 'DS doanh nghiệp hỗ trợ đký', 'DS doanh nghiệp hỗ trợ đký',
        'moderate_comments','all-employer-register','all_employer_register');
    add_submenu_page( 'sale-staff', 'DS ứng viên hỗ trợ đký', 'DS ứng viên hỗ trợ đký',
        'moderate_comments','all-seeker-register','all_seeker_register');

}


add_filter( 'wp_mail_from', 'new_mail_from' );
add_filter( 'wp_mail_from_name', 'new_mail_from_name' );
function all_employer_register()
{

    require get_template_directory() . '/all_employer_register.php';
}
function all_seeker_register()
{

    require get_template_directory() . '/all_seeker_register.php';
}
function new_mail_from( $old ) {
    return "mvlgroup68@gmail.com";
}
function new_mail_from_name( $old )
{
    return get_option('blogname');


}

if ( strpos($_SERVER['REQUEST_URI'],'nganh-nghe-tuyen-dung/') ||strpos($_SERVER['REQUEST_URI'],'ung-vien-theo-nganh-nghe/') ) {
    remove_action( 'wp_head', 'rel_canonical' );
    add_action( 'wp_head', 'rel_canonical_with_industry',1 );
}




function rel_canonical_with_industry( )
{
    $_SERVER['fixed_canonical']=true;
    $uri=explode('/',$_SERVER['REQUEST_URI']);
    $industry=explode('?',$uri[2]);

    //


    echo '<link rel="canonical" href="'.esc_url( home_url( '/' ) ).$uri[1].'/'.$industry[0].'" />'."\n";


}


// đặt giá trị ngày cuối cùng đăng nhập
add_action('wp_login','set_last_login', 0, 2);
function set_last_login($login, $user) {
    $user = get_user_by('login',$login);
    $time = current_time( 'timestamp' );
    $last_login = get_user_meta( $user->ID, '_last_login', 'true' );
    if(!$last_login){
        update_usermeta( $user->ID, '_last_login', $time );
    }else{
        update_usermeta( $user->ID, '_last_login_prev', $last_login );
        update_usermeta( $user->ID, '_last_login', $time );
    }
}
// lấy giá trị ngày cuối đăng nhập
function get_last_login($user_id,$prev=null){
    $last_login = get_user_meta($user_id);
    $time = current_time( 'timestamp' );
    if(isset($last_login['_last_login_prev'][0]) && $prev){
        $last_login = get_user_meta($user_id, '_last_login_prev',
            'true' );
    }else if(isset($last_login['_last_login'][0])){
        $last_login = get_user_meta($user_id, '_last_login', 'true' );
    }else{
        update_usermeta( $user_id, '_last_login', $time );
        $last_login = $last_login['_last_login'][0];
    }
    return $last_login;
}
add_action( 'admin_menu', 'admin_menu' );

function admin_menu()
{
    add_menu_page(
        'Quản lý gói VIP',
        'Quản lý gói VIP',
        'manage_options',
        'package-vip',
        'admin_vip'
    );


}
function admin_vip()
{
    require get_template_directory() . '/template_admin_package.php';

}

add_action( 'admin_menu', 'list_new_resume' );

function list_new_resume()
{
    add_menu_page(
        'Ứng viên mới nhất',
        'Ứng viên mới nhất',
        'moderate_comments',
        'ung-vien-moi-nhat',
        'new_resume'
    );


}
function new_resume()
{
    require get_template_directory() . '/inc/send_mail_robot.php';
}
// Post views
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching


function WPJobus_track_post_views ($td_post_id) {
    if ( !is_single() ) return;
    if ( empty ( $td_post_id) ) {
        global $post;
        $td_post_id = $post->ID;
    }
    wpb_set_post_views($td_post_id);
}


function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}



// Profile views
function wpb_set_profile_views($authorID) {
    $count_key = 'wpb_profile_views_count';
    $count = get_user_meta($authorID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_user_meta($authorID, $count_key);
        update_user_meta($authorID, $count_key, '0');
    }else{
        $count++;
        update_user_meta($authorID, $count_key, $count);
    }
}

function wpb_get_profile_views($authorID){
    $count_key = 'wpb_profile_views_count';
    $count = get_user_meta($authorID, $count_key, true);
    if($count==''){
        delete_user_meta($authorID, $count_key);
        update_user_meta($authorID, $count_key, '0');
        return "0";
    }
    return $count;
}
function ajax_login_init(){

wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') );
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Tên đăng nhập hoặc mật khẩu không đúng.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Đăng nhập thành công.')));
    }

    die();
}
// Hide text editor in resume back end
add_action('init', 'init_remove_support_resume',100);
function init_remove_support_resume(){
    $post_type = 'resume';
    remove_post_type_support( $post_type, 'editor');
}

// Hide text editor in job back end
add_action('init', 'init_remove_support_job',100);
function init_remove_support_job(){
    $post_type = 'job';
    remove_post_type_support( $post_type, 'editor');
}

// Hide text editor in job back end
add_action('init', 'init_remove_support_company',100);
function init_remove_support_company(){
    $post_type = 'company';
    remove_post_type_support( $post_type, 'editor');
}


function WPJobus_getUrl() {
    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
    $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
    return $url;
}


function user_vip_view_resume()
{
    global $current_user,$post;
    $current_user =  wp_get_current_user();
    $user_id= $current_user->ID ;

    $count_view_resume=get_user_meta($user_id, 'user_cv_view_count', true);
    $date_expierd=get_user_meta($user_id, 'vip_expire', true);
    $date_expierd=strtotime($date_expierd);
    $today = date('Y-m-d');
    $date_expierd = strftime("%Y-%m-%d",$date_expierd);
    $up_package_id=get_user_meta($user_id, 'up_package_id',true);
    $user_up_count=get_user_meta($user_id, 'user_up_count',true);
    $user_up_expire=get_user_meta($user_id, 'user_up_expire',true);
    if($user_up_expire <= $today )
    {
        delete_user_meta($user_id, 'up_package_id');
        delete_user_meta($user_id, 'user_up_count');
        delete_user_meta($user_id, 'user_up_expire');
    }
    if($date_expierd <= $today )
    {
        delete_user_meta($user_id, 'vip_level');
        delete_user_meta($user_id, 'vip_package_id');
        delete_user_meta($user_id, 'vip_star');
        delete_user_meta($user_id, 'vip_expire');
        delete_user_meta($user_id, 'user_daily_max_post');
        delete_user_meta($user_id, 'user_monthly_max_post');
        delete_user_meta($user_id, 'user_cv_view_expire');
        delete_user_meta($user_id, 'user_cv_view_count');

    }


}
add_action('wp_head','user_vip_view_resume');

function change_pos_auth($post_id){
    if ( ! wp_is_post_revision( $post_id ) ){

        remove_action('save_post','change_pos_auth');

    }
}
add_action('save_post', 'change_pos_auth');
function encrypt_phone($phone){
    $string_array=str_split($phone);
    $rand=rand(0,6);
    foreach( $string_array as $char){
        $hashstring.=dechex(rand(1,15)).strval(dechex(intval($char)+$rand)).dechex(rand(1,15));
    }
    $hashstring.=dechex($rand+9);
    return $hashstring;
}
add_filter('manage_edit-resume_columns', 'my_columns_resume');
function my_columns_resume($columns) {
    $columns['views'] = 'Tác giả';
    return $columns;
}
add_action( 'manage_resume_posts_custom_column', 'my_manage_resume_columns', 10, 2 );

function my_manage_resume_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {
        case 'views' :
            $author = get_post_field( 'post_author', $post_id );
            $name_author =the_author_meta( 'user_login' , $author );

            echo $name_author;

            break;
    }
}
add_filter('manage_edit-job_columns', 'my_columns');
function my_columns($columns) {
    $columns['views'] = 'Tác giả';
    return $columns;
}
add_action( 'manage_job_posts_custom_column', 'my_manage_job_columns', 10, 2 );

function my_manage_job_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {
        case 'views' :
            $author = get_post_field( 'post_author', $post_id );
            $name_author =the_author_meta( 'user_login' , $author );

            echo $name_author;

            break;
    }
}
add_filter('manage_edit-company_columns', 'my_columns_company');
function my_columns_company($columns) {
    $columns['views'] = 'Tác giả';
    return $columns;
}
add_action( 'manage_company_posts_custom_column', 'my_manage_company_columns', 10, 2 );

function my_manage_company_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {
        case 'views' :
            $author = get_post_field( 'post_author', $post_id );
            $name_author =the_author_meta( 'user_login' , $author );

            echo $name_author;

            break;
    }
}

function save_crb_wp2es($post_id){
    global $wpdb;
    $author = get_post_field( 'post_author', $post_id );
    $crb_wp2es_up = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$post_id' AND uid= '$author' AND sync_type ='edit'");

    if($crb_wp2es_up==""||$crb_wp2es_up==0) {
        $wpdb->insert("crb_wp2es", array(
            "uid" =>$author,
            "is_synced" => 1,
            "sync_type" => "edit",
            "post_id" => $post_id,
            "sync_at" => date('Y-m-d H:i:s'),
        ));

    }
    else{
        $wpdb->update("crb_wp2es", array(
                "is_synced" => 1,
                "sync_at" => date('Y-m-d H:i:s'))
            ,array("uid" =>$author, "post_id" =>$post_id,"sync_type" => "edit")
        );
    }
}
add_action('save_post', 'save_crb_wp2es');