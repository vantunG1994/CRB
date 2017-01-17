<?php
global $td_this_post_id;
$td_this_post_id = $post->ID;
if(empty($td_this_post_id)) {
$page = get_page($post->ID);
$td_this_post_id = $page->ID;
}
$cond=array('post_status'=>'publish','post_type'=>'job','ID'=>$post->ID);
$order=array('ID'=>'desc');
$limit=array('size'=>1,'page'=>1);
$result_job = $wp2es->and_simple_search($cond,$order,$limit);
// echo "<pre>";
    // print_r($result_job);
    foreach($result_job as $job)
    {
        $td_Id = $job['ID'];
        $wpjobus_job_cover_image =$job["wpjobus_job_cover_image"];
        $wpjobus_job_fullname =$job["wpjobus_job_fullname"];
        $job_company =$job["job_company"];
        $td_job_location =$job["job_location"];
        $td_job_sex =$job["job_sex"];
        $td_job_type =$job["job_type"];
        $td_job_time_trial = $job["job_time_trial"];
        $td_job_education =$job["job_education"];
        $td_job_career_level =$job["job_career_level"];
        $td_job_gender = $job["job_sex"];
        $td_job_expired = $job['wpjobus_job_expired'];
        $wpjobus_post_title = $job['wpjobus_post_title'];
    //$td_job_presence_type = esc_attr(get_post_meta($post->ID, 'job_presence_type',true));
    //$wpjobus_job_type = esc_attr(get_post_meta($post->ID, 'wpjobus_job_type',true));
        $wpjobus_job_remuneration_per =$job["wpjobus_job_remuneration_per"];
        $wpjobus_job_remuneration =$job["wpjobus_job_remuneration"];
        $wpjobus_job_benefits = get_post_meta($post->ID, 'wpjobus_job_benefits',true);
        $td_job_industry  =$job["job_industry"];
        $job_about_me = html_entity_decode($job["job-about-me"]);
        $td_job_years_of_exp = $job["job_years_of_exp"];
        $wpjobus_resume_profile_picture =$job["wpjobus_resume_profile_picture"];
        $wpjobus_resume_prof_title =$job["wpjobus_resume_prof_title"];
        $td_resume_career_level =$job["resume_career_level"];
        $wpjobus_job_comm_level =$job["wpjobus_job_comm_level"];
        $wpjobus_job_comm_note =$job["wpjobus_job_comm_note"];
        $wpjobus_job_comm_note = preg_replace('#timviecnh(.*?).com#is','MangViecLam.com',$wpjobus_job_comm_note);
        $wpjobus_job_org_level =$job["wpjobus_job_org_level"];
        $wpjobus_job_org_note =$job["wpjobus_job_org_note"];
        $wpjobus_job_job_rel_level =$job["wpjobus_job_job_rel_level"];
        $wpjobus_job_job_rel_note =$job["wpjobus_job_job_rel_note"];
        $wpjobus_job_job_rel_note = preg_replace('#timviecnh(.*?).com#is','MangViecLam.com',$wpjobus_job_job_rel_note);
        $wpjobus_job_skills = get_post_meta($post->ID, 'wpjobus_job_skills',true);
        $wpjobus_job_native_language = esc_attr(get_post_meta($post->ID, 'wpjobus_job_native_language',true))?:"Tiếng Việt";
        $wpjobus_job_languages = get_post_meta($post->ID, 'wpjobus_job_languages',true);
        $wpjobus_job_hobbies =$job["wpjobus_job_hobbies"];
        $wpjobus_job_address =$job["wpjobus_job_address"];
        $wpjobus_job_phone = $job["wpjobus_job_phone"];
        $wpjobus_job_website = $job["wpjobus_job_website"];
        $wpjobus_job_email =$job["wpjobus_job_email"];
        $wpjobus_job_publish_email =$job["wpjobus_job_publish_email"];
        $wpjobus_job_facebook = $job["wpjobus_job_facebook"];
        $wpjobus_job_linkedin =$job["wpjobus_job_linkedin"];
        $wpjobus_job_twitter =$job["wpjobus_job_twitter"];
        $wpjobus_job_googleplus = $job["wpjobus_job_googleplus"];
        $wpjobus_job_googleaddress =$job["wpjobus_job_googleaddress"];
    //$wpjobus_job_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_job_longitude',true));
    //$wpjobus_job_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_job_latitude',true));
    }
    //echo $job_company;die;
    $wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
    $_SERVER['extra_title'] = $wpjobus_company_fullname;
    add_filter( 'wp_title', 'crb_job_new_title', 9, 3 );
    if(!function_exists('crb_job_new_title')){
        function crb_job_new_title( $title) {
            $title = $title . ' '.$_SERVER['extra_title'].' | ';
            return $title;
        }
    }
    $contact_email = esc_attr(get_post_meta($post->ID, 'wpjobus_job_email',true));
    $wpcrown_contact_email_error = esc_attr($redux_demo['contact-email-error']);
    $wpcrown_contact_name_error = esc_attr($redux_demo['contact-name-error']);
    $wpcrown_contact_message_error = esc_attr($redux_demo['contact-message-error']);
    $wpcrown_contact_thankyou = esc_attr($redux_demo['contact-thankyou-message']);
    $wpcrown_contact_test_error = esc_attr($redux_demo['contact-test-error']);
    $dictrict = esc_attr(get_post_meta($post->ID, 'job_dictrict', true));
    if($job_company=="")
    {
        $job_company = esc_attr(get_post_meta($post->ID, 'job_company',true));
    }
    if($td_job_location=="")
    {
        $td_job_location = esc_attr(get_post_meta($post->ID, 'job_location', true));
    }
$dictrict = esc_attr(get_post_meta($post->ID, 'job_dictrict', true));
if($dictrict !="")
{
    $dictrict=" - ".$dictrict;
}
$td_job_expired = date('d/m/Y ', strtotime($td_job_expired));
    ?>
    <div class="main-content">
        <div class="coverImageHolder">
                    <div class="cover">
                <?php
                            if($wpjobus_job_cover_image=="")
                            {
                                $wpjobus_job_cover_image="/wp-content/themes/CRB/images/job-banner-1.jpg";
                            }
                ?>
                <img src="<?php echo $wpjobus_job_cover_image; ?>" alt="" class="bgImg">
                        </div>
            <div class="container">
                <div class=row>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="banner-top">
                                                    <section id="banner-top">
                                <?php if($wpjobus_job_remuneration >0 ) {
                                ?>
                                                                <span class="banner-hello">
                                    <span class="job_work_type"><?php echo $wpjobus_job_type; ?></span>
                                    <span class="job_remuneration"><?php echo format_gia($wpjobus_job_remuneration);?></span>
                                    <span class="job_remuneration_per">/<?php echo $wpjobus_job_remuneration_per ?:"Tháng"; ?></span>
                                </span>
                                <?php } else{
                                ?>
                                                                <span class="banner-hello">
                                    <span class="job_work_type"><?php echo $wpjobus_job_type; ?></span>
                                    <span class="job_remuneration"><?php echo format_gia($wpjobus_job_remuneration);?></span>
                                                            </span>
                                <?php }
                                ?>
                                <h1><?php echo !empty($wpjobus_job_fullname)? $wpjobus_job_fullname :'';?></h1>
                                <h2>
                                    <?php
                                    if($wpjobus_company_fullname !=""){
                                        ?>
                                       <h2><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo !empty($wpjobus_company_fullname)?$wpjobus_company_fullname:''; ?></h2>
                                        <?php
                                    }
                                    ?>
                                    <h2><i class="fa fa-map-marker"></i><?php echo $td_job_location.$dictrict; ?></h2>
                                <span class="cover-resume-breadcrumbs"><a rel="nofollow" href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/tuyen-dung">Tuyển dụng</a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo createSlug($td_job_industry); ?>"><?php echo !empty($td_job_industry)?$td_job_industry:''; ?></a>  </span>
                                                    </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-info-details">
            <div class="job-description">
                <h3>Mô tả công việc</h3>
                <?php
                                    $content =strip_tags($job_about_me,'<img><p><span><strong><b><em><table><tr><td><tbody><ul><li><ol><i><u>');
                                        echo wpautop($content);
                    ?>
                </div>
                <div class="info-details">
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-square-o"></i>ID</span>
                        <span class="job-info-data">#<?php echo !empty($td_Id)? $td_Id :''; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-map-marker"></i>Khu vực</span>
                        <span class="job-info-data"><?php echo $td_job_location.$dictrict; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-folder-o"></i>Ngành</span>
                        <span class="job-info-data"><?php echo !empty($td_job_industry)? $td_job_industry:''; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-bolt"></i>Loại</span>
                        <span class="job-info-data"><?php echo $td_job_type; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-rocket"></i>Vai trò</span>
                        <span class="job-info-data"><?php echo !empty($wpjobus_post_title)? $wpjobus_post_title :''; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-flask"></i>Cấp bậc</span>
                        <span class="job-info-data"><?php echo !empty($td_job_career_level)? $td_job_career_level :''; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-transgender"></i>Giới tính</span>
                        <span class="job-info-data"><?php echo !empty($td_job_gender)? $td_job_gender :'Không yêu cầu'; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-clock-o"></i>Thời gian thử việc</span>
                        <span class="job-info-data"><?php echo $td_job_time_trial; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-graduation-cap"></i>Trình độ học vấn</span>
                        <span class="job-info-data"><?php echo $td_job_education; ?></span>
                    </span>
                    <span class="job-info-details">
                        <span class="job-info-id"><i class="fa fa-calendar-times-o"></i>Hạn nộp hồ sơ</span>
                        <span class="job-info-data"><?php $td_job_expired; ?></span>
                    </span>
                </div>
            </div>
            <div class="resume-skills">
                <h3 class="resume-section-title"><i class="fa message"></i>Kỹ năng cần thiết</h3>
                <h4 class="resume-section-subtitle">Dưới đây là một trình độ tổng quan bạn cần cho công việc này.</h4>
                <?php if($wpjobus_job_comm_level > 0 || strlen(trim(($wpjobus_job_comm_note))) > 0 || $wpjobus_job_org_level > 0 || strlen(trim($wpjobus_job_org_note)) > 0 || $wpjobus_job_job_rel_level > 0 || strlen(trim($wpjobus_job_job_rel_note)) > 0 || !empty($wpjobus_job_skills) || !empty($wpjobus_job_languages)) { ?>
                                <div class="resume-required">
                    <span class="main-skills-item">
                        <span class="main-skills-item-title">
                            Kỹ năng giao tiếp
                        </span>
                        <span class="main-skills-item-bar">
                            <span class="main-skills-item-bar-color animate"
                                                                  style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                        </span>
                    </span>
                                        <div class="main-skills-item-note">
                        <?php echo $wpjobus_job_comm_note; ?>
                                        </div>
                                </div>
                <div class="resume-required">
                    <span class="main-skills-item">
                        <span class="main-skills-item-title">
                            Kỹ năng tổ chức
                        </span>
                        <span class="main-skills-item-bar">
                            <span class="main-skills-item-bar-color animate" style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                        </span>
                    </span>
                    <div class="main-skills-item-note">
                        <?php echo $wpjobus_job_org_note; ?>
                                            </div>
                </div>
                <div class="resume-required">
                    <span class="main-skills-item">
                        <span class="main-skills-item-title">
                            Yêu cầu liên quan đến công việc
                        </span>
                        <span class="main-skills-item-bar">
                            <span class="main-skills-item-bar-color animate" style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                        </span>
                    </span>
                    <div class="main-skills-item-note">
                    <?php echo strip_tags($wpjobus_job_job_rel_note,'<img><p><span><strong><b><em><table><tr><td><tbody>'); ?></div>
                </div>
            </div>
            <?php
                        }
            ?>
            <div class="resume-required-request">
                <?php
                                        if(!empty($wpjobus_job_skills)) {
                                        for ($i = 0; $i < (count($wpjobus_job_skills)); $i++) {
                                            $arr = explode('-', $wpjobus_job_skills[$i][0]);
                                            if($arr=="")
                                            {
                                                $arr = explode('_', $wpjobus_job_skills[$i][0]);
                                            }
                                            if($arr !="")
                                            {
                                                foreach($arr as $value)
                                                {
                                                    if($value !="") {
                ?>
                                                        <span class="main-skills-item">
                                                    <span class="main-skills-item-title">
                        <?php echo esc_attr($value); ?>
                                                    </span>
                                                    <span class="main-skills-item-bar">
                        <span class="main-skills-item-bar-color animate" style="width: <?php echo esc_attr(mt_rand(60, 100)).'%'; ?>; background-color: rgb(46, 204, 113);"></span>
                                                    </span>
                                            </span>
                <?php
                                                    }
                                                }
                                            }
                                            else{
                                            if($wpjobus_job_skills[$i][0] !=""){
                ?>
                                            <span class="main-skills-item">
                    <span class="main-skills-item-title">
                        <?php echo $wpjobus_job_skills[$i][0]; ?>
                    </span>
                    <span class="main-skills-item-bar">
                        <span class="main-skills-item-bar-color animate"
                                                              style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                    </span>
                </span>
                <?php
                                        }}}
                                        }
                ?>
            </div>
            <div class="divider"></div>
            <div class="languages">
                <?php
                                        $languages_total = count($wpjobus_job_languages);
                                        if(strlen(trim($wpjobus_job_native_language))>0 && !empty($wpjobus_job_languages))
                                        {$languages_total++;}
                ?>
                <span class="main-skills-item-title-language"><?php echo $languages_total; ?> Ngôn ngữ</span>
            </div>
            <div class="languages-sub">
                <span class="main-skills-item-title-language native-language"><?php echo $wpjobus_job_native_language; ?></span>
                <span class="main-skills-item-title-language native-small-language">(Native)</span>
            </div>
            <?php
                if(!empty($wpjobus_job_languages)) {
                for ($i = 0; $i < (count($wpjobus_job_languages)); $i++) {
            ?>
                    <div class="full main-skills-item-language animate">
                <div class="full animate"><span class="main-skills-item-title-language native-language-all"><?php echo esc_attr($wpjobus_job_languages[$i][0])?:"Tiếng Anh"; ?></span>
                        </div>
                        <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span
                                            class="main-skills-item-title-language native-small-language-all">Understanding</span></div>
                                <div class="comment" style="margin-bottom: 10px;">
                    <span class="main-skills-item-title-language">
                        <i class="fa fa-comment animate"></i><i class="fa fa-comment animate"></i><i
                                                                    class="fa fa-comment animate"></i><i class="fa fa-comment animate"></i><i
                                                                    class="fa fa-comment-o animate"></i>
                    </span>
                                </div>
                        </div>
                        <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span
                                            class="main-skills-item-title-language native-small-language-all">Speaking</span></div>
                                <div class="comment" style="margin-bottom: 10px;">
                    <span class="main-skills-item-title-language">
                        <i class="fa fa-comment animate"></i><i class="fa fa-comment animate"></i><i
                                                                    class="fa fa-comment animate"></i><i class="fa fa-comment-o animate"></i><i
                                                                    class="fa fa-comment-o animate"></i>
                    </span>
                                </div>
                        </div>
                        <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span
                                            class="main-skills-item-title-language native-small-language-all">Writing</span></div>
                                <div class="comment" style="margin-bottom: 10px;">
                    <span class="main-skills-item-title-language">
                        <i class="fa fa-comment animate"></i><i class="fa fa-comment animate"></i><i
                                                                    class="fa fa-comment animate"></i><i class="fa fa-comment animate"></i><i
                                                                    class="fa fa-comment-o animate"></i>
                    </span>
                                </div>
                        </div>
                </div>
        <?php
            }}
        ?>
    </div>
    <div class="salary-benefits">
        <h3 class="resume-section-title"><i class="fa fa-money"></i>  Lương &amp; Phúc Lợi</h3>
        <div class="full benefits-block">
            <span class="job-salary-benefits">
                <span class="job_work_type"></span>
                <?php if($wpjobus_job_remuneration >0 ) {
                ?>
                <span class="job_remuneration"><?php echo format_gia($wpjobus_job_remuneration)  ?></span>
                                        <span class="job_remuneration_per">/<?php echo $wpjobus_job_remuneration_per ?:"Tháng";?></span>
                <?php
                                    }
                                    else{
                ?>
                                        <span class="job_remuneration">Thỏa thuận</span>
                <?php
                                    }
                ?>
            </span>
            <span class="job-salary-benefits-divider"></span>
        </div>
        <?php
                    if(!empty($wpjobus_job_benefits)) {
        ?>
                        <div class="job-experience-holder">
            <span class="one_fourth first">
                <span class="work-experience-first-block-content">
                    <span class="work-experience-org-name">Phúc Lợi</span>
                </span>
            </span>
            <?php
                                if (!empty($wpjobus_job_benefits)) {
                                for ($i = 0;
                                $i < (count($wpjobus_job_benefits));
                                $i++) {
            ?>
                                <span class="three_fourth animate" style="float: right; margin-bottom: 0;">
                <span class="one_third first" style="margin-bottom: 0;">
                    <span class="work-experience-second-block-content">
                        <span class="work-experience-period"><?php echo esc_attr($wpjobus_job_benefits[$i][0]); ?></span>
                    </span>
                </span>
                <span class="two_third" style="margin-bottom: 0;">
                    <span class="work-experience-third-block-content">
                        <span class="work-experience-notes">
                            <?php echo esc_attr($wpjobus_job_benefits[$i][1]); ?>
                        </span>
                    </span>
                </span>
                <?php
                                        }
                                        }
                ?>
                            </div>
            <?php
                        }
            ?>
        </div>
        <?php
        $link_company = get_permalink($job_company);
        $wpjobus_company_tagline = esc_attr(get_post_meta($job_company, 'wpjobus_company_tagline',true));
        $wpjobus_company_profile_picture = esc_attr(get_post_meta($job_company, 'wpjobus_company_profile_picture',true));
                                          if($wpjobus_company_profile_picture=="")
                                          {
                                              $wpjobus_company_profile_picture=home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";
                                          }
        $wpjobus_company_foundyear = esc_attr(get_post_meta($job_company, 'wpjobus_company_foundyear', true));
        $td_company_team_size = esc_attr(get_post_meta($job_company, 'company_team_size', true));
        $wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
        if($link_company !="" && $wpjobus_company_fullname!="" ){
        ?>
            <div class="company-information">
                    <h3 class="resume-section-title"><i class="fa fa-briefcase"></i> Thông Tin Công Ty</h3>
                    <div class="full job-company-desc" style="text-align: center;">
                <span><img src="<?php echo $wpjobus_company_profile_picture; ?>"
                                       alt=""></span>
                <h2><a href="<?php echo $link_company; ?>"><?php echo $wpjobus_company_fullname?></a></h2>
                <h3><?php echo $wpjobus_company_tagline; ?></h3>
                    </div>
                    <div class="divider"></div>
                    <div class="full" style="text-align: center;">
                <span class="company-est-year-block">
                    <i class="fa fa-calendar"></i>
                    <span class="experience-period">Thành lập</span>
                    <span class="experience-subtitle"><?php echo $wpjobus_company_foundyear;?></span>
                </span>
                <?php
                            global $wp2es;
                            $cond = array('post_status' => 'publish', 'post_type' => 'job', 'job_company' => $job_company);
                            $order = array('ID' => 'desc');
                            $limit = array('size' => 1, 'page' => 1);
                            $result_job = $wp2es->and_simple_search($cond, $order, $limit);
                            $jobs_offer = $result_job[0]["es_total_result"];
                ?>
                            <span class="company-jobs-block">
                    <i class="fa fa-bullhorn"></i>
                    <span class="experience-period"><?php echo $jobs_offer; ?></span>
                    <span class="experience-subtitle"></span>
                </span>
                    </div>
            <!--        <div class="information-company">-->
            <!--            <div class="introduce">-->
            <!--                <span class="company-services-icon"><i class="fa fa-arrows-h"></i></span>-->
            <!--                <span class="company-services-devider"></span>-->
            <!--                <span class="company-services-title">Automobiles</span>-->
            <!--                <span class="company-services-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>-->
            <!--            </div>-->
            <!--            <div class="introduce">-->
            <!--                <span class="company-services-icon"><i class="fa fa-question"></i></span>-->
            <!--                <span class="company-services-devider"></span>-->
            <!--                <span class="company-services-title">Vehicles</span>-->
            <!--                <span class="company-services-desc" style="margin-bottom: 0;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>-->
            <!--            </div>-->
            <!--            <div class="introduce">-->
            <!--                <span class="company-services-icon"><i class="fa fa-magnet"></i></span>-->
            <!--                <span class="company-services-devider"></span>-->
            <!--                <span class="company-services-title">Cars</span>-->
            <!--                <span class="company-services-desc" style="margin-bottom: 0;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span>-->
            <!--            </div>-->
            <!--        </div>-->
            </div>
        <?php
        }
        ?>
        <div class="information">
            <h2 class="resume-section-title" ><i class="fa fa-list-ul"></i>  Ứng tuyển vào vị trí này</h2>
            <div id="resume-contact">
                <form id="contact" type="post" action="" novalidate="novalidate">
                    <span class="contact-name">
                        <input type="text" name="contactName" id="contactName" value="" class="input-textarea" placeholder="Name*" vk_13c2a="subscribed">
                    </span>
                    <span class="contact-email">
                        <input type="text" name="email" id="email" value="" class="input-textarea" placeholder="Email*" vk_13c2a="subscribed">
                    </span>
                    <span class="contact-message">
                        <textarea name="message" id="message" cols="8" rows="5"></textarea>
                    </span>
                    
                    <input type="text" name="receiverEmail" id="receiverEmail" value="insuranceplanner@wpjobus.com" class="input-textarea" style="display: none;">
                    <input type="hidden" name="action" value="wpjobContactForm">
                    <input type="hidden" id="scf_nonce" name="scf_nonce" value="2aae396337"><input type="hidden" name="_wp_http_referer" value="/themes/wpjobus/job/445/">
                    <button type="button" class="btn btn-primary btn-lg">Gửi tin nhắn</button>
                </form>
            </div>
            <div class="contact-detail">
                <h2 class="resume-section-title" ><i class="fa fa-envelope"></i>Chi tiết liên lạc</h2>
                                    <span class="resume-contact-info">
                    <i class="fa fa-briefcase"></i><span><?php echo esc_attr($wpjobus_job_fullname); ?></span>
                                        </span>
                <?php if (!empty($wpjobus_job_address)) { ?>
                                        <span class="resume-contact-info">
                    <i class="fa fa-map-marker"></i><span><?php echo esc_attr($wpjobus_job_address); ?></span>
                                                 </span>
                <?php } ?>
                <?php if (!empty($wpjobus_job_phone)) { ?>
                                        <span class="resume-contact-info">
                    <i class="fa fa-mobile"></i><span><?php echo esc_attr($wpjobus_job_phone); ?>
                                                      </span>
                                                </span>
                <?php } ?>
                <?php if (!empty($wpjobus_job_email)) { ?>
                                        <span class="resume-contact-info">
                    <i class="fa fa-envelope-o"></i><span><?php echo esc_attr($wpjobus_job_email); ?></span>
                                                     </span>
                <?php
                } ?>
                <?php if (!empty($wpjobus_job_facebook)) { ?>
                                        <span class="resume-contact-info">
                    <?php
                                            $return = $wpjobus_job_facebook;
                                            $url = $wpjobus_job_facebook;
                                            if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                                                $return = 'http://' . $url;
                                            }
                    ?>
                                                <i class="fa fa-facebook-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Facebook', 'themesdojo'); ?></a></span>
                                    </span>
                <?php } ?>
                <?php if (!empty($wpjobus_resume_linkedin)) { ?>
                                        <span class="job-contact-info">
                    <?php
                                            $return = $wpjobus_resume_linkedin;
                                            $url = $wpjobus_resume_linkedin;
                                            if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                                                $return = 'http://' . $url;
                                            }
                    ?>
                                                <i class="fa fa-linkedin-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('LinkedIn', 'themesdojo'); ?></a></span>
                                    </span>
                <?php } ?>
                <?php if (!empty($wpjobus_job_twitter)) { ?>
                                        <span class="job-contact-info">
                    <?php
                                            $return = $wpjobus_job_twitter;
                                            $url = $wpjobus_job_twitter;
                                            if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                                                $return = 'http://' . $url;
                                            }
                    ?>
                                                <i class="fa fa-twitter-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Twitter', 'themesdojo'); ?></a></span>
                                    </span>
                <?php } ?>
                <?php if (!empty($wpjobus_job_googleplus)) { ?>
                                        <span class="job-contact-info">
                    <?php
                                            $return = $wpjobus_job_googleplus;
                                            $url = $wpjobus_job_googleplus;
                                            if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                                                $return = 'http://' . $url;
                                            }
                    ?>
                                                <i class="fa fa-google-plus-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Google+', 'themesdojo'); ?></a></span>
                                    </span>
                <?php }?>
            </div>
            <style>
                            ul.links li {
                                display: inline-table;
                            }
            </style>
                        <ul class="links">
                                <li class="service-links-twitter-widget first">
                                        <div id="fb-root"></div>
                    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8"></script><fb:send href="<?php echo get_permalink(); ?>" font=""></fb:send>
                                </li>
                                <li class="service-links-twitter-widget first">
                    <div class='fb-like' data-action='like' data-href='<?php echo get_permalink(); ?>' data-layout='button_count' data-share='false' data-show-faces='false' data-width=''/>
                                    </li>
                                    <li class="service-links-twitter-widget first">
                                            <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s); js.id = id;
                                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                                    fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
                                    </li>
                                    <li class="service-links-google-plus-one last">
                        <!-- Place this tag where you want the share button to render. -->
                                            <div class="g-plus" data-action="share" data-annotation="bubble"></div>
                        <!-- Place this tag after the last share tag. -->
                        <script type="text/javascript">
                                                (function() {
                                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                    po.src = 'https://apis.google.com/js/platform.js';
                                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                                })();
                        </script>
                                    </li>
                    <?php
                                    $td_user_id = get_current_user_id();
                                    global $wpdb;
                                    $myFav = $wpdb->get_results( 'SELECT id FROM wpjobus_favorites WHERE user_id = "'.$td_user_id.'" AND listing_id = "'.$td_this_post_id.'" ' );
                                    if(empty($myFav)) {
                                        $status = "Lưu tin";
                                        $class="like_post";
                                    } else {
                                        $status = "Đã lưu";
                                        $class="unlike_post";
                                    }
                    ?>
                                    <li class="service-links-twitter-widget first">
                        <button id="button_like" class="<?php echo $class ?>"><i class="fa fa-floppy-o"></i> <?php echo $status; ?></button>
                                    </li>
                                    <li class="service-links-twitter-widget first">
                                            <button onclick="copyToClipboard()" class="button_copy">Copy link</button>
                                    </li>
                            </ul>
                          
                    </div>
            <div class="listting-more">
                <?php
                                include('search-filters.php');
                ?>
                <h2 class="resume-section-title"><i class="fa fa-file-text-o"></i>VIỆC LÀM LIÊN QUAN</h2>
                <div class="row">
                    <div class="col-md-8">
                        <div class="index_listting1">
                            <section id="template_listting">
                                <?php
                                                            global $wpdb,$wp2es;
                                                            $current_element_id=0;
                                                            $cond_job=array('post_status'=>'publish','post_type'=>'job','job_location'=>$td_job_location,'job_industry'=>$td_job_industry);
                                                            $order=array('up_at'=>'desc', 'post_date'=>'desc');
                                                            $limit_job=array('size'=>12,'page'=>1);
                                                            $result_jobs = $wp2es->and_simple_search($cond_job,$order,$limit_job);
                                ?>
                                <?php
                                foreach ($result_jobs as $list) {
                                include 'loop/item_listing_job.php';
                                }
                                ?>
                            </section>
                                                    <div class="more">
                                <a href="<?php echo home_url('/')?>tuyen-dung/?industry=<?php echo createSlug($td_job_industry);?>&resume_location=<?php echo $td_job_location ?>"><p style="color: #16a085 !important;padding-top: 2%;font-weight: bold;text-align:-webkit-auto; font-size: 17px !important"> +Xem Thêm <?php echo number_format($list["es_total_result"] ,0,0,'.'); ?> Việc Làm Liên Quan</p> </a>
                                                    </div>
                                            </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        include('sidebar.php');
                                            include('listnews.php');
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>