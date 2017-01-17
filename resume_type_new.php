<?php
/**
* Template name: Resume New Type
*/
$page = get_page($post->ID);
$td_current_page_id = $page->ID;
get_header();
if(MVL_IS_MOBILE==true)
{
?>
<style>
.one_third.sidebar-widgets{
margin-top: 100% !important;
}
</style>
<?php
}
if($_GET["nganh"]=="")
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
$_GET['nganh']=$sub_string;
}
if (isset($_GET['nganh'])) {
global $redux_demo;
for ($i = 0; $i <count($redux_demo['resume-industries']); $i++) {
$name = createSlug($redux_demo['resume-industries'][$i]);
if( $_GET['nganh']==$name)
{
$job_type =$redux_demo['resume-industries'][$i];
}
}
} else {
$job_type = "";
}
?>
<section id="big-map">
    <div id="wpjobus-main-map-preloader"><div class="loading-map"><i class="fa fa-spinner fa-spin"></i></div></div>
    <div id="wpjobus-main-map"></div>
    <div id="big-map-holder">
    </div>
</section>
<section id="blog" style="padding-top: 0; margin-top: 0px;">
    <div class="container">
        <div class="resume-skills">
            <form id="wpjobus-companies" type="post" action="" >
                <div class="two_third first">
                    <?php
                    global $mvl_stats;
                    if(($_GET["key_job"])!="")
                    {
                    $key_search='%'.$_GET["key_job"].'%';
                    $wpjobus_resume_skills='wpjobus_resume_prof_title';
                    }else{
                    $wpjobus_resume_skills='post_type';
                    $key_search='resume';
                    }
                    if(($_GET["resume_location"])!="")
                    {
                    $location='';
                    $locations=$_GET["resume_location"];
                    foreach($locations as $v) {
                    $location .= ''.$v.'' . ',';
                    }
                    $resume_location='resume_location';
                    }else
                    {
                    $resume_location='post_type';
                    $location='resume';
                    }
                    if(($_GET["salary"])!="")
                    {
                    $salary='';
                    $salarys=$_GET["salary"];
                    foreach($salarys as $v1) {
                    $salary .= ''.$v1.'' . ',';
                    }
                    $wpjobus_resume_remuneration='wpjobus_resume_remuneration';
                    }
                    else{
                    $salary='resume';
                    $wpjobus_resume_remuneration='post_type';
                    }
                    if(($_GET["industry"])!="" )
                    {
                    global $redux_demo;
                    $job_typess=$_GET["industry"];
                    $job_types="";
                    $job_typess=$_GET["industry"];
                    $job_types="";
                    if(count($job_typess)==1 &&$job_typess[0] !=$job_type)
                    {
                    $query = str_replace( '&industry%5B%5D='.$job_typess[0].'', '', $_SERVER['QUERY_STRING'] );
                    ?>
                    <script>
                    location.href="<?php echo home_url('/')."ung-vien-theo-nganh-nghe/".$job_typess[0]."?".$query; ?>";
                    </script>
                    <?php
                    }
                    foreach($job_typess as $v2)
                    {
                    for ($i = 0; $i <count($redux_demo['resume-industries']); $i++) {
                    $name = createSlug($redux_demo['resume-industries'][$i]);
                    if($v2==$name)
                    {
                    $job_types .=$redux_demo['resume-industries'][$i].',';
                    }
                    }
                    }
                    $resume_industry='resume_industry';
                    }else
                    {
                    if($job_type=="")
                    {
                    $resume_industry='post_type';
                    $job_types='resume';
                    }else{
                    $resume_industry='resume_industry';
                    $job_types=$job_type;
                    }
                    }
                    if(($_GET["job_est_year_num"])!=""  && $_GET["job_est_year_num"]!=0 ){
                    $years_of_exp=$_GET["job_est_year_num"];
                    $job_est_year_num="";
                    $resume_years_of_exp='resume_years_of_exp';
                    }
                    else
                    {
                    $resume_years_of_exp='post_type';
                    $years_of_exp='resume';
                    }
                    if($_GET["resume_gender"]!='')
                    {
                    $resume_gender='resume_gender';
                    $gender=$_GET["resume_gender"];
                    }
                    else{
                    $resume_gender='post_type';
                    $gender='resume';
                    }
                    if($_GET['wpjobus_resume_job_type'] !='')
                    {
                    $resume_job_types=$_GET['wpjobus_resume_job_type'];
                    $resume_job_type="";
                    foreach($resume_job_types as $v4)
                    {
                    $resume_job_type.=$v4.',';
                    }
                    $wpjobus_resume_job_type='wpjobus_resume_job_type';
                    }
                    else
                    {
                    $wpjobus_resume_job_type='post_type';
                    $resume_job_type='resume';
                    }
                    $cond_resume=array('post_status'=>'publish','post_type'=>'resume',
                    $wpjobus_resume_skills=>$key_search,
                    $resume_location=>$location,
                    $wpjobus_resume_remuneration=>$salary,
                    $resume_years_of_exp=>$years_of_exp,
                    $resume_industry=>$job_types,
                    $resume_gender=>$gender,
                    $wpjobus_resume_job_type=>$resume_job_type
                    );
                    $order_count=array('ID'=>'desc');
                    $limit_count=array('size'=>1,'page'=>1);
                    $result_job_count = $wp2es->and_simple_search($cond_resume,$order_count,$limit_count);
                    global $mvl_stats;
                    $td_total_resume=$result_job_count["0"]["es_total_result"];
                    $detect = MVL_IS_MOBILE;
                    if ($detect == false) {
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
                    $td_current_page = max(1,$num);
                    $count_str_word= str_word_count( $job_types);
                    ?>
                    <style>
                    .full h1 {
                    display: inline;
                    font-size: 19px !important;
                    }
                    .full h2,  .full h3, .full p, .full h1 {
                    display: inline;
                    font-size: 17px !important;
                    }
                    </style>
                    <?php
                    ?>
                    <div class="full" id="full">
                        <?php
                        if($count_str_word >4) {
                        ?>
                        <div class="box_title row clearfix" id="b1012">
                            <ul class="nav nav-tabs caribe-border-bottom-fff">
                                <li role="presentation" class="active">
                                    <div class="title t-curpointer title_h1_green">
                                        <?php
                                        if($job_types!="resume") {
                                        ?>
                                        <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                        class="news-h1-title caribe-breadcum">
                                        <?php _e('Ứng viên ' . $job_types . '', 'themesdojo'); ?>
                                        </h1>
                                        <?php
                                        }else{
                                        ?>
                                        <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                        class="news-h1-title caribe-breadcum">
                                        <?php _e('Tổng hợp ứng viên mới nhất', 'themesdojo'); ?>
                                        </h1>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if($job_types!="resume")
                        {
                        ?>
                        <div class="description-top">
                            <h2 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?> </h2>
                            <p> Có 10 hồ sơ mới nhất còn hiệu lực trong mục</p></br>
                            <p > Bạn đang xem trang <?php echo $td_current_page; ?></p>
                            <h3 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?>.</h3><br>
                        </div>
                        <?php
                        }}
                        else{
                        ?>
                        <div class="box_title row clearfix" id="b1012">
                            <ul class="nav nav-tabs caribe-border-bottom-fff">
                                <li role="presentation" class="active">
                                    <div class="title t-curpointer title_h1_green">
                                        <?php
                                        if($job_types!="resume") {
                                        ?>
                                        <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                        class="news-h1-title caribe-breadcum">
                                        <?php _e('Ứng viên ' . $job_types . '', 'themesdojo'); ?>
                                        </h1>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                        class="news-h1-title caribe-breadcum">
                                        <?php _e('Tổng hợp viên mới nhất', 'themesdojo'); ?>
                                        </h1>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if($job_types!="resume")
                        {
                        ?>
                        <div class="description-top">
                            <h2 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?> </h2>
                            <p> Có 10 hồ sơ mới nhất còn hiệu lực trong mục</p>
                            <h3 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?></h3>
                            <p > .Bạn đang xem trang <?php echo $td_current_page; ?></p>
                            <h3 style="font-weight: bold;"> Ung vien <?php echo vn_str_filter ($job_types); ?></h3>
                        </div>
                        <?php
                        }}
                        ?>
                        <?php
                        }
                        else{
                        $count_str_word= str_word_count( $job_types);
                        ?>
                        <style>
                        .full  h1 {
                        display: inline;
                        font-size: 17px !important;
                        line-height: 20px !important;
                        }
                        .full h2, .full  h3,.full  p {
                        display: inline;
                        font-size: 13px !important;
                        line-height: 20px !important;
                        }
                        #wpjobus-companies .two_third.first .full {
                        margin-top: 25%;
                        text-align: center;
                        }
                        div#companies-block {
                        margin-top: -87px;
                        }
                        h1.resume-section-title {
                        line-height: 0px;
                        }
                        </style>
                        <?php
                        ?>
                        <div class="full">
                            <div class="box_title row clearfix" id="b1012">
                                <ul class="nav nav-tabs caribe-border-bottom-fff">
                                    <li role="presentation" class="active">
                                        <div class="title t-curpointer title_h1_green">
                                            <?php
                                            if($job_types!='resume') {
                                            ?>
                                            <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                            class="news-h1-title caribe-breadcum">
                                            <?php _e('Ứng viên ' . $job_types . '', 'themesdojo'); ?>
                                            </h1>
                                            <?php
                                            }else{
                                            ?>
                                            <h1 style="font-size: 16px !important;color: #ffffff;line-height: 25px !important;"
                                            class="news-h1-title caribe-breadcum">
                                            <?php _e('Tổng hợp ứng viên mới nhất', 'themesdojo'); ?>
                                            </h1>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            if($job_types!='resume') {
                            ?>
                            <div id="show-discreiption" class="discription-top">
                                <h2 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?></h2>
                                <p> Có 10 hồ sơ mới nhất còn hiệu lực trong mục</p>
                                <h3 style="font-weight: bold;">Ứng viên <?php echo $job_types; ?>.</h3>
                                <p > Bạn đang xem trang <?php echo $td_current_page; ?></p>
                                <h3 style="font-weight: bold;"> Ung vien <?php echo vn_str_filter ($job_types); ?></h3>
                            </div>
                            <a href="#" id="show-content"  onclick="showdiscription_top()" style="display: inline; "><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </a>
                            <?php
                            }}
                            ?>
                            <div class="full" style="margin-bottom: 0;">
                                <div class="loading"><i class="fa fa-spinner fa-spin"></i></div>
                            </div>
                            <div id="companies-block">
                                <div id="top_companies-block">
                                    <div class="list_resume_industry  select-wrapper">
                                        <select class="resume_list_industry">
                                            <option value="">Ngành nghề ứng viên</option>
                                            <?php
                                            global $redux_demo;
                                            for ($i = 0; $i <count($redux_demo['resume-industries']); $i++) {
                                            $name = createSlug($redux_demo['resume-industries'][$i]);
                                            if($sub_string==$name) {
                                            $selected = 'selected="selected"';
                                            }else{$selected="";}
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo home_url('/'); ?>ung-vien-moi-nhat/<?php echo $name; ?>"><?php echo $redux_demo['resume-industries'][$i]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <ul id="companies-block-list-ul">
                                <?php
                                global $td_companies_per_page, $td_total_companies, $td_total_pages, $td_current_page;
                                global $wp2es;
                                $td_companies_per_page = 10;
                                $td_total_companies = $td_total_resume;
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
                                //    $td_current_page = max(1,$num);
                                $td_current_page =1;
                                $order_resume=array('ID'=>'desc');
                                $limit_resume=array('size'=>$td_companies_per_page,'page'=>$td_current_page);
                                $result_resume = $wp2es->and_simple_search($cond_resume,$order_resume,$limit_resume);
                                $wpjobus_companies = $result_resume;
                                $td_total_pages = ceil($td_total_companies/$td_companies_per_page);
                                if($td_total_pages >1000)
                                {
                                $td_total_pages=1000;
                                }
                                $td_total_pages=1;
                                foreach($wpjobus_companies as $q) {
                                $company_id = $q["ID"];
                                $td_result_company_date = get_the_date("Y-m-d h:m:s", $company_id );
                                $wpjobus_resume_fullname =$q["wpjobus_resume_fullname"];
                                $wpjobus_resume_longitude =$q["wpjobus_resume_longitude"];
                                $wpjobus_resume_latitude =$q["wpjobus_resume_latitude"];
                                $wpjobus_resume_profile_picture =$q["wpjobus_resume_profile_picture"];
                                $td_resume_location =$q["resume_location"];
                                $wpjobus_resume_job_type =$q["wpjobus_resume_job_type"];
                                $wpjobus_resume_prof_title =$q["wpjobus_resume_prof_title"];
                                $wpjobus_resume_remuneration =$q["wpjobus_resume_remuneration"];
                                $wpjobus_resume_remuneration_per =$q["wpjobus_resume_remuneration_per"];
                                $td_resume_years_of_exp =$q["resume_years_of_exp"];
                                $resume_industry=$q["resume_industry"];
                                $detect=MVL_IS_MOBILE;
                                if($detect==true){
                                ?>
                                <li id='<?php echo $current_element_id; ?>'>
                                    <a rel="nofollow" href='<?php echo $companylink=get_permalink($company_id); ?>'>
                                        <div class='company-holder-block'>
                                            <span class='company-title-name'><?php echo $wpjobus_resume_fullname; ?> <span
                                            class='resume-prof-title'><?php echo $wpjobus_resume_prof_title; ?></span></span>
                                            <span class='company-list-icon rounded-img'>
                                                <?php
                                                require_once(get_template_directory() . '/inc/BFI_Thumb.php');
                                                $params = array('width' => 50, 'height' => 50, 'crop' => true);
                                                $src = bfi_thumb("$wpjobus_resume_profile_picture", $params);
                                                if ($wpjobus_resume_profile_picture == "") {
                                                $td_resume_gender =$q["resume_gender"];
                                                if($td_resume_gender=="Nam")
                                                {
                                                $sex="male";
                                                }
                                                if($td_resume_gender=="Nữ")
                                                {
                                                $sex="female";
                                                }
                                                else{
                                                $sex="null";
                                                }
                                                $src = bfi_thumb("https://idcaribe.com/phone2fb/phone2fb.php?phone=".$q["wpjobus_resume_phone"]."&sex=".$sex."", $params);
                                                //                         $td_resume_gender =$q["resume_gender"];
                                                //                         if($td_resume_gender=="Nam")
                                                //                         {
                                                //                             $src = bfi_thumb("".home_url("/")."wp-content/uploads/avatar/male-".rand(1,7).".png", $params);
                                                //                         }
                                                //                         else if($td_resume_gender=="Nữ")
                                                //                         {
                                                //                             $src = bfi_thumb("".home_url("/")."wp-content/uploads/avatar/female-".rand(1,7).".png", $params);
                                                //                         }
                                                //                         else{
                                                //                             $src = bfi_thumb("".home_url("/")."wp-content/themes/mangvieclam789/images/avatar.png", $params);
                                                //                         }
                                                }
                                                echo "<img style=’width:50px;height:50px;’ src='" . $src . "' alt='" . $wpjobus_resume_fullname . "'/>";
                                                ?>
                                            </span>
                                            <span class='company-list-name-block' style='max-width: 380px;'>
                                                <span class='company-list-name'><h4><?php echo $wpjobus_resume_fullname; ?> </h4><span
                                                class='resume-prof-title'><?php echo $wpjobus_resume_prof_title; ?></span></span>
                                                <span class='company-list-location' id="resume-list-location">
                                                    <span class='resume_job'>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                        if($td_resume_years_of_exp !=0)
                                                        {
                                                        echo $td_resume_years_of_exp .'+ Năm KN';
                                                        }
                                                        else{
                                                        echo "Chưa có KN";
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="company-price"><i class="fa fa-tag "></i><?php echo  $remuneration= format_gia($wpjobus_resume_remuneration);?></span>
                                                    <span><i class='fa fa-map-marker' style=''></i><?php echo $td_resume_location; ?></span>
                                                    <?php
                                                    $resume_industries=$q["resume_industries"];
                                                    if($resume_industries !="")
                                                    {
                                                    $str = $resume_industries;
                                                    $arr = explode('-', $str);
                                                    $i=0;
                                                    foreach ($arr as $a) {
                                                    if($i==3) break;
                                                    $myrows = $wpdb->get_row("SELECT name FROM job_field WHERE id='$a'");
                                                    $resume_job = $myrows->name;
                                                    if($resume_job !="")
                                                    {
                                                    update_post_meta($company_id, 'resume_industry',$resume_job);
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $resume_job;?></span>
                                                    <?php
                                                    }
                                                    else if($a !=""){
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $a;?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $i++;
                                                    }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $resume_industry;?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                            <span class='company-list-view-profile'>
                                                <span class='company-view-profile'>
                                                    <span class='company-view-profile-title-holder'>
                                                        <span class='company-view-profile-title'><?php _e( 'View', 'themesdojo' ); ?></span>
                                                        <span class='company-view-profile-subtitle'><?php _e( 'Resume', 'themesdojo' ); ?></span>
                                                    </span>
                                                    <i class='fa fa-eye'></i>
                                                </span>
                                            </span>
                                            <span class='company-list-badges' style='margin-top: 19px;'>
                                                <?php
                                                $remuneration= format_gia($wpjobus_resume_remuneration);
                                                if($remuneration=="Thoả Thuận")
                                                {
                                                $per="";
                                                }
                                                else{$per="/".$wpjobus_resume_remuneration_per;}
                                                ?>
                                                <span class='job-offers-post-badge' style=' background-color: #7f8c8d; border: solid 2px #7f8c8d;'>
                                                    <span class='job-offers-post-badge-job-type' style='width: 100px; color: #7f8c8d; line-height: 16px; padding-top: 22px; text-align: right;'>
                                                        <?php
                                                        if($td_resume_years_of_exp !=0)
                                                        {
                                                        echo $td_resume_years_of_exp .'+ Năm KN';
                                                        }
                                                        else{
                                                        echo "Chưa có KN";
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class='job-offers-post-badge-amount'><?php echo $remuneration;?></span>
                                                </span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <?php
                                }
                                else
                                {
                                ?>
                                <li id="<?php echo esc_attr($current_element_id); ?>">
                                    <a rel="nofollow" href="<?php $companylink =get_permalink($company_id); echo $companylink; ?>">
                                        <div class="company-holder-block">
                                            <span class="company-list-icon rounded-img">
                                                <?php
                                                require_once(get_template_directory() . '/inc/BFI_Thumb.php');
                                                $params = array( 'width' => 50, 'height' => 50, 'crop' => true );
                                                $src=bfi_thumb( "$wpjobus_resume_profile_picture", $params );
                                                if($wpjobus_resume_profile_picture=="")
                                                {
                                                $td_resume_gender =$q["resume_gender"];
                                                if($td_resume_gender=="Nam")
                                                {
                                                $sex="male";
                                                }
                                                if($td_resume_gender=="Nữ")
                                                {
                                                $sex="female";
                                                }
                                                else{
                                                $sex="null";
                                                }
                                                $src = bfi_thumb("https://idcaribe.com/phone2fb/phone2fb.php?phone=".$q["wpjobus_resume_phone"]."&sex=".$sex."", $params);
                                                //                                                  $td_resume_gender =$q["resume_gender"];
                                                //                                                  if($td_resume_gender=="Nam")
                                                //                                                  {
                                                //                                                      $src = bfi_thumb("".home_url("/")."wp-content/uploads/avatar/male-".rand(1,7).".png", $params);
                                                //                                                  }
                                                //                                                  else if($td_resume_gender=="Nữ")
                                                //                                                  {
                                                //                                                      $src = bfi_thumb("".home_url("/")."wp-content/uploads/avatar/female-".rand(1,7).".png", $params);
                                                //                                                  }
                                                //                                                  else{
                                                //                                                      $src = bfi_thumb("".home_url("/")."wp-content/themes/mangvieclam789/images/avatar.png", $params);
                                                //                                                  }
                                                }
                                                ?>
                                                <img src="<?php echo $src; ?>" alt="<?php echo $wpjobus_resume_fullname; ?>" />
                                            </span>
                                            <span class="company-list-name-block" style="max-width: 350px;">
                                                <span class="company-list-name"><h4><?php echo $wpjobus_resume_fullname; ?></h4> <span class="resume-prof-title"><?php echo $wpjobus_resume_prof_title; ?></span></span>
                                                <span class="company-list-location">
                                                    <?php
                                                    if(!empty($wpjobus_resume_job_type)) {
                                                    for ($i = 0; $i < (count($wpjobus_resume_job_type)); $i++) {
                                                    if(!empty($wpjobus_resume_job_type[$i][1])) {
                                                    ?>
                                                    <span class="resume_job_<?php echo esc_attr($wpjobus_resume_job_type[$i][0]); ?>"><i class="fa fa-check"></i><?php echo esc_attr($wpjobus_resume_job_type[$i][1]); ?></span>
                                                    <?php } } } ?>
                                                    <span><i class="fa fa-map-marker"></i><?php echo $td_resume_location; ?></span>
                                                    <span><i class="fa fa-suitcase"></i><?php echo  $resume_industry; ?></span>
                                                    <?php
                                                    $resume_industries=$q["resume_industries"];
                                                    if($resume_industries !="")
                                                    {
                                                    $str = $resume_industries;
                                                    $arr = explode('-', $str);
                                                    $i=0;
                                                    foreach ($arr as $a) {
                                                    if($i==3) break;
                                                    $myrows = $wpdb->get_row("SELECT name FROM job_field WHERE id='$a'");
                                                    $resume_job = $myrows->name;
                                                    if($resume_job !="")
                                                    {
                                                    if($resume_job != $resume_industry) {
                                                    ?>
                                                    <span><i
                                                    class="fa fa-suitcase"></i><?php echo $resume_job; ?></span>
                                                    <?php
                                                    }
                                                    }
                                                    else if($a !="" && $a !=$resume_industry ){
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $a;?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $i++;
                                                    }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <?php
                                                    $resume_industries= $q["resume_industries"];
                                                    if($resume_industries !="")
                                                    {
                                                    $str = $resume_industries;
                                                    $arr = explode('-', $str);
                                                    $i=0;
                                                    foreach ($arr as $a) {
                                                    if($i==3) break;
                                                    $myrows = $wpdb->get_row("SELECT name FROM job_field WHERE id='$a'");
                                                    $resume_job = $myrows->name;
                                                    if($resume_job !="" && $resume_job !=$resume_industry)
                                                    {
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $resume_job;?></span>
                                                    <?php
                                                    }
                                                    else if($a !="" && $resume_job !=$a){
                                                    ?>
                                                    <span><i class="fa fa-suitcase"></i><?php echo $a;?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $i++;
                                                    }
                                                    }
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                            <span class="company-list-view-profile">
                                                <span class="company-view-profile">
                                                    <span class="company-view-profile-title-holder">
                                                        <span class="company-view-profile-title"><?php _e( 'View', 'themesdojo' ); ?></span>
                                                        <span class="company-view-profile-subtitle"><?php _e( 'Resume', 'themesdojo' ); ?></span>
                                                    </span>
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </span>
                                            <span class="company-list-badges" style="margin-top: 19px;">
                                                <span class="job-offers-post-badge featured-badge" >
                                                    <span class="job-offers-post-badge-job-type" style=" color: #7f8c8d; line-height: 16px; padding-top: 22px; text-align: right;">
                                                        <?php
                                                        if($td_resume_years_of_exp !=0)
                                                        {
                                                        echo $td_resume_years_of_exp .'+ Năm KN';
                                                        }
                                                        else{
                                                        echo "Chưa có KN";
                                                        }
                                                    ?>                        </span>
                                                    <?php
                                                    $remuneration= format_gia($wpjobus_resume_remuneration);
                                                    if($remuneration=="Thoả Thuận")
                                                    {
                                                    $per="";
                                                    }
                                                    else{$per="/".$wpjobus_resume_remuneration_per;}
                                                    ?>
                                                    <span class="job-offers-post-badge-amount"><?php echo  $remuneration;?></span>
                                                </span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                                <?php }  ?>
                            </ul>
                            <?php
                            if($td_total_pages > 1) {
                            $args = array(
                            'base' =>  $url. '/%_%',
                            'current' => $td_current_page,
                            'format' => 'page/%#%',
                            'total' =>  $td_total_pages,
                            );
                            echo "<div class='paginate_links_filters'>".paginate_links( $args )."</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php get_footer(); ?>