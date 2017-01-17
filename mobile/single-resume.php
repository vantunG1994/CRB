<?php
global $redux_demo, $td_this_post_id;
$td_this_post_id = $post->ID;
if(empty($td_this_post_id)) {
$page = get_page($post->ID);
$td_this_post_id = $page->ID;
}
global $wp2es,$wpdb,$current_user;
$cond_resume=array('post_status'=>'publish','post_type'=>'resume','ID'=>$td_this_post_id);
$order_resume=array('ID'=>'desc');
$limit_resume=array('size'=>1,'page'=>1);
$result_resume = $wp2es->and_simple_search($cond_resume,$order_resume,$result_resume);
$check_view = $wpdb->get_var("SELECT * FROM crb_mycv WHERE post_id = '$td_this_post_id' AND uid= '$current_user->ID'");
    // echo "<pre>";
    // print_r($result_resume);
    foreach($result_resume as $resume)
    {
        $wpjobus_resume_cover_image =$resume["wpjobus_resume_cover_image"];
        $wpjobus_resume_fullname =$resume["wpjobus_resume_fullname"];
        $wpjobus_resume_location =$resume["resume_location"];
        $td_resume_industry =$resume["resume_industry"];
        $resume_about_me = html_entity_decode($resume["resume-about-me"]);
        $td_resume_years_of_exp = $resume["resume_years_of_exp"];
        $wpjobus_resume_profile_picture =$resume["wpjobus_resume_profile_picture"];
        $wpjobus_resume_prof_title =$resume["wpjobus_resume_prof_title"];
        $td_resume_career_level =$resume["resume_career_level"];
        $wpjobus_resume_comm_level =$resume["wpjobus_resume_comm_level"];
        $wpjobus_resume_comm_note =$resume["wpjobus_resume_comm_note"];
        $wpjobus_resume_org_level =$resume["wpjobus_resume_org_level"];
        $wpjobus_resume_org_note =$resume["wpjobus_resume_org_note"];
        $post_content=$resume["post_content"];
        $wpjobus_resume_job_rel_level =$resume["wpjobus_resume_job_rel_level"];
        $wpjobus_resume_job_rel_note =$resume["wpjobus_resume_job_rel_note"];
        $wpjobus_resume_skills = get_post_meta($td_this_post_id, 'wpjobus_resume_skills',true);
        $wpjobus_resume_native_language = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_native_language',true));
        $wpjobus_resume_languages = get_post_meta($td_this_post_id, 'wpjobus_resume_languages',true);
        $wpjobus_resume_hobbies =$resume["wpjobus_resume_hobbies"];
        $resume_year_old =$resume["resume_year_birth"];
        $reume_content=$resume["post_content"];
        $wpjobus_resume_education = get_post_meta($td_this_post_id, 'wpjobus_resume_education',true);
        $wpjobus_resume_award = get_post_meta($td_this_post_id, 'wpjobus_resume_award',true);
        $wpjobus_resume_work = get_post_meta($td_this_post_id, 'wpjobus_resume_work',true);
        $wpjobus_resume_testimonials = get_post_meta($td_this_post_id, 'wpjobus_resume_testimonials',true);
        $wpjobus_resume_file =$resume["wpjobus_resume_file"];
        $wpjobus_resume_remuneration =$resume["wpjobus_resume_remuneration"];
        $wpjobus_resume_remuneration_per =$resume["wpjobus_resume_remuneration_per"];
        $wpjobus_resume_job_type =esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_type',true));
        $wpjobus_resume_job_freelance =$resume["wpjobus_resume_job_freelance"];
        $wpjobus_resume_job_part_time =$resume["wpjobus_resume_job_part_time"];
        $wpjobus_resume_job_full_time =$resume["wpjobus_resume_job_full_time"];
        $wpjobus_resume_job_internship =$resume["wpjobus_resume_job_internship"];
        $wpjobus_resume_job_volunteer =$resume["wpjobus_resume_job_volunteer"];
        $wpjobus_resume_portfolio =get_post_meta($td_this_post_id, 'wpjobus_resume_portfolio',true);
        $wpjobus_resume_address =$resume["wpjobus_resume_address"];
        $wpjobus_resume_phone =$resume["wpjobus_resume_phone"];
        $wpjobus_resume_website =$resume["wpjobus_resume_website"];
        $wpjobus_resume_email =$resume["wpjobus_resume_email"];
        $wpjobus_resume_publish_email =$resume["wpjobus_resume_publish_email"];
        $wpjobus_resume_facebook =$resume["wpjobus_resume_facebook"];
        $wpjobus_resume_linkedin =$resume["wpjobus_resume_linkedin"];
        $wpjobus_resume_twitter =$resume["wpjobus_resume_twitter"];
        $wpjobus_resume_googleplus =$resume["wpjobus_resume_googleplus"];
        $wpjobus_resume_googleaddress =$resume["wpjobus_resume_googleaddress"];
        $wpjobus_resume_longitude =$resume["wpjobus_resume_longitude"];
        $wpjobus_resume_latitude =$resume["wpjobus_resume_latitude"];
        $wpjobus_resume_id =$resume["id"];
        $wpjobus_resume_remuneration_raw = $resume['wpjobus_resume_remuneration_raw'];
        $wpjobus_resume_remuneration_per = $resume['wpjobus_resume_remuneration_per'];
        $td_resume_gender = $resume['resume_gender'];
    }
/*================================ URL IMAGES=========================== */
$td_resume_gender = $resume['resume_gender'];
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
$src = "https://idcaribe.com/phone2fb/phone2fb.php?phone=".$wpjobus_resume_phone."&sex=".$sex."";

/*================================ END URL IMAGES =========================== */
    for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {
        if (empty($wpjobus_resume_work[$i][1])) {
            $wpjobus_resume_work="";
        }
    }
    for ($i = 0; $i < (count($wpjobus_resume_testimonials)); $i++) {
        if (empty($wpjobus_resume_testimonials[$i][1])) {
            $wpjobus_resume_testimonials="";
        }
    }
    for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {
        if (empty($wpjobus_resume_portfolio[$i][1])) {
            $wpjobus_resume_portfolio="";
        }
    }
    for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {
        if (empty($wpjobus_resume_education[$i][1])) {
            $wpjobus_resume_education="";
        }
    }
    for ($i = 0; $i < (count($wpjobus_resume_skills)); $i++) {
        if (empty($wpjobus_resume_skills[$i][1])) {
            $wpjobus_resume_skills="";
        }
    }
    for ($i = 0; $i < (count($wpjobus_resume_skills)); $i++) {
        if (empty($wpjobus_resume_skills[$i][1])) {
            $wpjobus_resume_skills="";
        }
    }
    $_SERVER['extra_title'] = $wpjobus_resume_prof_title;
    add_filter( 'wp_title', 'crb_resume_new_title', 9, 3 );
    if(!function_exists('crb_resume_new_title')){
        function crb_resume_new_title( $title) {
            if($_SERVER['extra_title']){
                $title = $title . ' '.$_SERVER['extra_title'].' | ';
            }
            return $title;
        }
    }
    ?>
<style>
    a#show,a.button-ag-full {
        width: 100%;
        text-align: center;
    }
</style>
    <div class="main-content">
        <div class="coverImageHolder">
           
            <div class="container">
                <div class=row>
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                        <div class="banner-top">
                            <section id="banner-top">
                                <span class="banner-hello">
                                    CV
                                </span>
                                <h2><?php echo 
                                           isset($wpjobus_resume_fullname) && !empty($wpjobus_resume_fullname)?
                                $wpjobus_resume_fullname:''; ?></h2>
                                <h3 class="resume"><?php echo isset($wpjobus_resume_prof_title) && !empty($wpjobus_resume_prof_title)?$wpjobus_resume_prof_title:''; ?></h3>
                                <h2><i class="fa fa-map-marker"></i><?php echo isset($wpjobus_resume_location) && !empty($wpjobus_resume_location)?$wpjobus_resume_location:''; ?></h2>
                                <span class="cover-resume-breadcrumbs"><a rel="nofollow" href="https://mangvieclam.com/"><i class="fa fa-home"></i></a> <i class="fa fa-chevron-right"></i> <a href="https://mangvieclam.com/tuyen-dung">Tuyển dụng</a> <i class="fa fa-chevron-right"></i> <a><?php echo !empty($td_resume_industry)?$td_resume_industry:''; ?></a>  </span>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-resume">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-7 ">
                    <div class="info-candidate">
                        <h1 class="resume-author-name" ><?php echo $wpjobus_resume_fullname; ?></h1>
                        <h2 class="resume-author-subtitle" ><?php echo $wpjobus_resume_prof_title; ?></h2>
                        <div class="resume-author-avatar">
                            <span class="resume-author-avatar-holder">
                            <img  src="<?php echo $src; ?>" alt="<?php echo $wpjobus_resume_fullname; ?>"></span>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2 col-xs-12">
                                <div class="years-revenue">
                                    <span class="resume-experience-years-block">
                                        <i class="fa fa-clock-o"></i>
                                        <?php
                                                                    if( esc_attr( $td_resume_years_of_exp ) !=0)
                                                                    {
                                        ?>
                                        <span class="experience-period"><?php echo esc_attr( $td_resume_years_of_exp ); ?> <?php _e( 'Years', 'themesdojo' ); ?></span>
                                        <?php
                                                                    }
                                                                    else{
                                        ?>
                                                                        <span class="experience-period">Chưa có </br>kn
                                                                        </span>
                                        <?php
                                                                    }
                                        ?>
                                    </span>
                                    
                                    <?php if ($wpjobus_resume_remuneration!=""  ) { ?>
                                                                <span class="resume-expect-revenue-block">
                                        <i class="fa fa-money"></i>
                                        <?php if(!empty($wpjobus_resume_remuneration)) {
                                        ?>
                                        <span class="experience-period"><?php   echo  format_gia($wpjobus_resume_remuneration ); ?></span>
                                        <?php
                                                                        } else {
                                        ?>
                                        <span class="experience-period"><?php echo "Thoả thuận"; ?></span>
                                        <?php
                                        } ?>
                                        <span class="experience-subtitle"><?php if(!empty($wpjobus_resume_remuneration_per) && !empty($wpjobus_resume_remuneration) ) {echo esc_attr( $wpjobus_resume_remuneration_per ); }?></span>
                                    </span>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <div class="info-details">
                        <h3 class="info-details"><i class="fa fa-building" aria-hidden="true"></i>Thông tin ứng viên</h3>
                        <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-square-o"></i><?php _e( 'Mã hồ sơ', 'themesdojo' ); ?><?php $id = get_the_ID();?></span>
                            <span class="job-info-data"><?php echo $wpjobus_resume_id; ?></span>
                        </span>
                        
                        <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-map-marker"></i><?php _e( 'Khu vực', 'themesdojo' ); ?></span>
                            <span class="job-info-data"><?php echo $wpjobus_resume_location; ?></span>
                        </span>
                        <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-folder-o"></i><?php _e( 'Ngành', 'themesdojo' ); ?></span>
                            <span class="job-info-data"><?php echo $td_resume_industry; ?></span>
                        </span>
                         <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-rocket"></i><?php _e( 'Chuyên môn', 'themesdojo' ); ?></span>
                            <span class="job-info-data"><?php echo $wpjobus_resume_prof_title; ?></span>
                                  </span>
                        <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-flask"></i><?php _e( 'Cấp bậc', 'themesdojo' ); ?></span>
                            <span class="job-info-data"><?php echo $td_resume_career_level; ?></span>
                                  </span>
                                                    <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-transgender"></i><?php _e( 'Giới tính', 'themesdojo' ); ?></span>
                            <span class="job-info-data"><?php echo $td_resume_gender; ?></span>
                                  </span>
                        <span class="job-info-details">
                            <span class="job-info-id"><i class="fa fa-clock-o"></i><?php _e( 'Tuổi ứng viên', 'themesdojo' ); ?></span>
                            <?php
                                                            $old= date('Y')-$resume_year_old;
                                                            if($old <=10 ||$old=='')
                                                            {
                                                                $old='Không xác định';
                                                            }
                            ?>
                            <span class="job-info-data"><?php echo $old; ?> tuổi</span>
                            </span>
                              <span class="job-info-details">
                                <span class="job-info-id"><i class="fa fa-graduation-cap"></i><?php _e( 'Trình độ học vấn', 'themesdojo' ); ?></span>
                                <span class="job-info-data"><?php
                                    for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {
                                        if(count($wpjobus_resume_education >0))
                                        {
                                            $count_i_word= str_word_count( esc_attr($wpjobus_resume_education[$i][1]));
                                            if($count_i_word >2 && esc_attr($wpjobus_resume_education[$i][1])!="")
                                            {
                                                echo '-'. esc_attr($wpjobus_resume_education[$i][1]) . '<br>';

                                            }
                                            else if(esc_attr($wpjobus_resume_education[$i][5])!=""){
                                                echo '-'. esc_attr($wpjobus_resume_education[$i][5]) . '<br>';

                                            }
                                        }
                                    }
                                    ?></span>
                             </span>
                                 
                       
                     
                       <?php
                            if(!empty($post_content))
                            {
                                ?>

                                <span class="job-info-details">
                                      <span class="job-info-id"><i class="fa fa-tasks" aria-hidden="true"></i><?php _e( 'Thông tin khác', 'themesdojo' ); ?></span>
                                 <span class="job-info-data"><?php echo $post_content; ?></span>
                                </span>
                            <?php } ?>

                    </div>
                </div>
            </div>
            <?php if($wpjobus_resume_comm_level > 0 || strlen(trim($wpjobus_resume_comm_note))>0 || $wpjobus_resume_org_level > 0 || strlen(trim($wpjobus_resume_org_note)) >0 || $wpjobus_resume_job_rel_level > 0 || strlen(trim($wpjobus_resume_job_rel_note)) >0 || !empty($wpjobus_resume_skills) || strlen(trim($wpjobus_resume_native_language))>0 || !empty($wpjobus_resume_languages) || !empty($wpjobus_resume_hobbies)) { ?>
            <div class="resume-skills">
                <h3 class="resume-section-title"><i class="fa fa-rocket"></i><?php _e( 'Kỹ Năng', 'themesdojo' ); ?></h3>
                <h4 class="resume-section-subtitle">Dưới đây là một trình độ tổng quan bạn cần cho công việc này.</h4>
                <div class="row">
                    <div class="col-xs-12">
                      <?php if($wpjobus_resume_comm_level > 0 || strlen(trim($wpjobus_resume_comm_note))>0 || $wpjobus_resume_org_level > 0 || strlen(trim($wpjobus_resume_org_note)) >0 || $wpjobus_resume_job_rel_level > 0 || strlen(trim($wpjobus_resume_job_rel_note)) >0 ) { ?>
                        <div class="resume-required">
                             <?php if ($wpjobus_resume_comm_level > 0 ) { ?>
                            <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                 <?php _e( 'Kĩ năng giao tiếp', 'themesdojo' ); ?>
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: <?php echo esc_attr( $wpjobus_resume_comm_level ) ?>; background-color: rgb(46, 204, 113);"></span>
                                </span>
                            </span>
                             <?php } ?>
                            <?php if (strlen(trim($wpjobus_resume_comm_note))>0) { ?>
                            <div class="full main-skills-item-note">
                                <?php echo esc_attr( $wpjobus_resume_comm_note ); ?>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="resume-required">
                        <?php if ($wpjobus_resume_org_level > 0 ) { ?>
                            <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                    <?php _e( 'Kĩ năng tổ chức', 'themesdojo' ); ?>
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: <?php echo esc_attr( $wpjobus_resume_org_level ); ?>; background-color: rgb(231, 76, 60);"></span>
                                </span>
                            </span>
                             <?php } ?>

                               <?php if (strlen(trim($wpjobus_resume_org_note)) >0 ) { ?>
                            <div class="main-skills-item-note">
                                  <?php echo esc_attr( $wpjobus_resume_org_note ); ?>
                            </div>
                          <?php  }?>
                        </div>
                        <div class="resume-required">
                         <?php if ($wpjobus_resume_job_rel_level > 0 ) { ?>
                            <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                  <?php _e( 'Kĩ năng liên quan đến công việc', 'themesdojo' ); ?>
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: <?php echo esc_attr( $wpjobus_resume_job_rel_level ); ?>; background-color: rgb(52, 73, 94);"></span>
                                </span>
                            </span>
                            <?php  }?>

                              <?php if (strlen(trim($wpjobus_resume_job_rel_note)) >0 ) { ?>
                            <div class="main-skills-item-note">
                                 <?php echo esc_attr( $wpjobus_resume_job_rel_note ); ?>
                            </div>
                             <?php } ?> 
                        </div>
                        
                    </div>
                    <?php  }?>


                    <div class="col-xs-12">
                        <div class="resume-required-request">
                 <?php

                    if(!empty($wpjobus_resume_skills)) {

                        for ($i = 0; $i < (count($wpjobus_resume_skills)); $i++) {
                            $arr = explode('_', $wpjobus_resume_skills[$i][0]);
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
                                ?>
                            <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                   <?php echo esc_attr( $wpjobus_resume_skills[$i][0] ); ?>
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: <?php echo esc_attr( $wpjobus_resume_skills[$i][1] ); ?>; background-color: rgb(46, 204, 113);"></span>
                                </span>
                            </span>
                             <?php }}} ?>
                            <!-- <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                    QUẢN LÝ
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                                </span>
                            </span> -->
                           <!--  <span class="main-skills-item">
                                <span class="main-skills-item-title">
                                    TÀI CHÍNH
                                </span>
                                <span class="main-skills-item-bar">
                                    <span class="main-skills-item-bar-color animate" style="width: 196px; background-color: rgb(46, 204, 113);"></span>
                                </span>
                            </span> -->
                            
                        </div>
                        <div class="divider"></div>
                          <?php if(strlen(trim($wpjobus_resume_native_language))>0 || !empty($wpjobus_resume_languages)) { ?>
                        <div class="languages">
                            <span class="main-skills-item-title-language">
                                <?php

                            $languages_total = count($wpjobus_resume_languages);

                            if(strlen(trim($wpjobus_resume_native_language))>0 && !empty($wpjobus_resume_languages))
                            {$languages_total++;}

                            echo $languages_total;

                            ?>

                            <?php _e( 'Languages', 'themesdojo' ); ?>

                            </span>
                        </div>
                          <?php if(strlen(trim($wpjobus_resume_native_language))>0) { ?>
                        <div class="languages-sub">
                            <span class="main-skills-item-title-language native-language">
                                <?php echo esc_attr( $wpjobus_resume_native_language ); ?>
                            </span>
                            <span class="main-skills-item-title-language native-small-language">
                                <?php _e( '', 'themesdojo' ); ?>
                            </span>
                        </div>
                         <?php } } ?>
                         <?php
                            if(!empty($wpjobus_resume_languages) ) {
                                for ($i = 0; $i < (count($wpjobus_resume_languages)); $i++) {
                            ?>
                        <div class="full main-skills-item-language animate">
                            <div class="full animate"><span class="main-skills-item-title-language native-language-all"><?php echo esc_attr( $wpjobus_resume_languages[$i][0] ); ?></span></div>
                            <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span class="main-skills-item-title-language native-small-language-all">
                                    <?php _e( 'Understanding', 'themesdojo' ); ?>
                                </span></div>

                                <div class="comment" style="margin-bottom: 10px;">
                                    <span class="main-skills-item-title-language">
                                        <?php if($wpjobus_resume_languages[$i][1] == "Level 1") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][1] == "Level 2") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][1] == "Level 3") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][1] == "Level 4") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][1] == "Level 5") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i>

                                    <?php } ?>
                                    </span>
                                </div>
                            </div>

                            <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span class="main-skills-item-title-language native-small-language-all"><?php _e( 'Speaking', 'themesdojo' ); ?></span></div>
                                <div class="comment" style="margin-bottom: 10px;">
                                    <span class="main-skills-item-title-language">
                                       <?php if($wpjobus_resume_languages[$i][2] == "Level 1") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][2] == "Level 2") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][2] == "Level 3") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][2] == "Level 4") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][2] == "Level 5") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i>

                                    <?php } ?>
                                    </span>
                                </div>
                            </div>

                            <div class="full animate" style="margin-bottom: 0;">
                                <div class="one_half first" style="margin-bottom: 10px;"><span class="main-skills-item-title-language native-small-language-all"><?php _e( 'Writing', 'themesdojo' ); ?></span></div>
                                <div class="comment" style="margin-bottom: 10px;">
                                    <span class="main-skills-item-title-language">
                                        <?php if($wpjobus_resume_languages[$i][3] == "Level 1") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][3] == "Level 2") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][3] == "Level 3") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][3] == "Level 4") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment-o"></i>

                                    <?php } ?>

                                    <?php if($wpjobus_resume_languages[$i][3] == "Level 5") { ?>

                                        <i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i><i class="fa fa-comment"></i>

                                    <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                          <?php }} ?>
                    </div>
                </div>

            </div>
            <?php  }?> <!-- if resume-skills -->
            
            <?php if(!empty($wpjobfus_resume_award) || !empty($wpjobus_resume_education)) { ?>
              <?php if(!empty($wpjobfus_resume_award)) { ?>
            <div class="academic-level">

                <h1 class="resume-section-title"><i class="fa fa-university"></i><?php _e( 'Education', 'themesdojo' ); ?></h1>
              <!--   <h3 class="resume-section-subtitle">Here’s an overview of education institutions I attended.</h3> -->
                <?php

                    if(!empty($wpjobus_resume_education)) {

                        for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {

                            ?>


                <span class="education-institution-block animate">
                <?php if(strlen(trim($wpjobus_resume_education[$i][3]))>0 || strlen(trim($wpjobus_resume_education[$i][2]))>0 ) { ?>
                    <span class="education-period-circle">
                        <span class="education-period-time"><?php echo esc_attr( $wpjobus_resume_education[$i][2] ); ?></span>
                        <span class="education-period-time">-</span>
                        <span class="education-period-time"><?php echo esc_attr( $wpjobus_resume_education[$i][3] ); ?></span>
                    </span>
                     <?php } ?>
                       <?php if (strlen(trim($wpjobus_resume_education[$i][0]))>0) { ?>
                    <span class="education-institution-name"><?php echo esc_attr( $wpjobus_resume_education[$i][0] ); ?></span>
                     <?php } ?>
                       <?php if (strlen(trim($wpjobus_resume_education[$i][1]))>0 && str_word_count( esc_attr($wpjobus_resume_education[$i][1])) >1) { ?>
                    <span class="education-institution-faculty-name"><?php echo esc_attr( $wpjobus_resume_education[$i][1] ); ?></span>
                      <?php } ?>

                      <?php if (strlen(trim($wpjobus_resume_education[$i][4]))>0) { ?>
                    <span class="education-institution-location"><i class="fa fa-map-marker"></i><?php echo esc_attr( $wpjobus_resume_education[$i][4] ); ?></span>
                     <?php } ?>
                     <?php if (strlen(trim($wpjobus_resume_education[$i][5]))>0) { ?>
                    <span class="education-institution-notes"><?php echo esc_attr( $wpjobus_resume_education[$i][5] ); ?></span>
                     <?php } ?>
                </span>
                   <?php } } ?>
            </div>
             <?php } } ?>

             <?php if((!empty($wpjobus_resume_work) || !empty($wpjobus_resume_testimonials))) { ?>
            <div class="work-experience">
                <h2 class="resume-section-title"><i class="fa fa-building"></i><?php _e( 'Kinh nghiệm làm việc', 'themesdojo' ); ?></h2>
                <h3 class="resume-section-subtitle">Dưới đây là danh sách các công ty nơi tôi làm việc và đạt được kinh nghiệm chuyên môn của tôi.</h3>

                <div class="divider" ></div>

                <div class="work-experience-holder">
                <?php

                    if(!empty($wpjobus_resume_work)) {

                        for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {
                            ?>
                    <span class="work-experience-block animate">
                        <span class="work-experience-first-block">
                            <span class="work-experience-first-block-content">
                            <?php if (strlen(trim($wpjobus_resume_work[$i][0]))>0) { ?>
                                <span class="work-experience-org-name"><?php echo esc_attr( $wpjobus_resume_work[$i][0] ); ?></span>
                                   <?php } ?>
                            <?php if (strlen(trim($wpjobus_resume_work[$i][1]))>0) { ?>
                                <span class="work-experience-job-title"><?php echo esc_attr( $wpjobus_resume_work[$i][1] ); ?></span>
                                 <?php } ?>
                            </span>
                        </span>
                        <span class="work-experience-second-block">
                            <span class="work-experience-second-block-content">
                                <span class="work-experience-time-line"></span>
                                 <?php if (strlen(trim($wpjobus_resume_work[$i][2]))>0 && strlen(trim($wpjobus_resume_work[$i][3]))>0) { ?>
                                <span class="work-experience-period"><?php echo esc_attr( $wpjobus_resume_work[$i][2] ); ?> - <?php echo esc_attr( $wpjobus_resume_work[$i][3] ); ?></span>
                                <?php } ?>
                                  <?php if (strlen(trim($wpjobus_resume_work[$i][4]))>0) { ?>
                                <span class="work-experience-job-type"><?php echo esc_attr( $wpjobus_resume_work[$i][4] ); ?></span>
                                <?php } ?>
                            </span>
                        </span>
                        <span class="work-experience-third-block">
                            <span class="work-experience-third-block-content">
                              <?php if (strlen(trim($wpjobus_resume_work[$i][5]))>0) { ?>
                                    <span class="work-experience-notes"><?php echo esc_attr( $wpjobus_resume_work[$i][5] ); ?></span>
                                <?php } ?>
                            </span>
                        </span>
                    </span>
                     <?php } } ?>
                </div>
            </div>
            <?php } ?>
              
            
            <div class="information">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <h2 class="resume-section-title" ><i class="fa fa-list-ul"></i>Ứng tuyển vào vị trí này</h2>
                        
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
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h2 class="resume-section-title" ><i class="fa fa-envelope"></i>Chi tiết liên lạc</h2>

                        <?php
                        $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
                        $count_view_resume=get_user_meta($current_user->ID, 'user_cv_view_count', true);
                        if($check_view >0 ||current_user_can('administrator')) {
                            ?>
                            <div class="advanced">
                        <span class="resume-contact-info">
                            <i class="fa fa-briefcase"></i><span><?php echo esc_attr($wpjobus_resume_fullname); ?></span>
                        </span>
                                <?php if (!empty($wpjobus_resume_address)) { ?>

                                    <span class="resume-contact-info">

                                    <i class="fa fa-map-marker"></i><span><?php echo esc_attr($wpjobus_resume_address); ?></span>

                                 </span>

                                <?php } ?>

                                <?php if (!empty($wpjobus_resume_phone)) { ?>

                                    <span class="resume-contact-info">

                                  <i class="fa fa-mobile"></i><span><?php echo esc_attr($wpjobus_resume_phone); ?>
                                  </span>

                                </span>

                                <?php } ?>
                                <?php if (!empty($wpjobus_resume_email)) { ?>


                                    <span class="resume-contact-info">

                                      <i class="fa fa-envelope-o"></i><span><?php echo esc_attr($wpjobus_resume_email); ?></span>

                                     </span>

                                    <?php
                                } ?>

                                <?php if (!empty($wpjobus_resume_facebook)) { ?>

                                    <span class="resume-contact-info">

                        <?php

                        $return = $wpjobus_resume_facebook;
                        $url = $wpjobus_resume_facebook;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

                                        <i class="fa fa-facebook-square"></i><span><a
                                                    href="<?php echo esc_url($return); ?>"><?php _e('Facebook', 'themesdojo'); ?></a></span>

                    </span>

                                <?php } ?>
                                <?php if (!empty($wpjobus_resume_linkedin)) { ?>

                                    <span class="resume-contact-info">

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
                                <?php if (!empty($wpjobus_resume_twitter)) { ?>

                                    <span class="resume-contact-info">

                        <?php

                        $return = $wpjobus_resume_twitter;
                        $url = $wpjobus_resume_twitter;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

                                        <i class="fa fa-twitter-square"></i><span><a
                                                    href="<?php echo esc_url($return); ?>"><?php _e('Twitter', 'themesdojo'); ?></a></span>

                    </span>

                                <?php } ?>
                                <?php if (!empty($wpjobus_resume_googleplus)) { ?>

                                    <span class="resume-contact-info">

                        <?php

                        $return = $wpjobus_resume_googleplus;
                        $url = $wpjobus_resume_googleplus;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

                                        <i class="fa fa-google-plus-square"></i><span><a
                                                    href="<?php echo esc_url($return); ?>"><?php _e('Google+', 'themesdojo'); ?></a></span>

                    </span>

                                <?php } ?>
                            </div>
                            <?php
                        }
                        else if($count_view_resume >0){

                            ?>
                            <a href="#" rel="nofollow" class="button-ag-full" style="font-size: 16px;" id="show">+ Xem chi tiết hồ sơ ứng viên</a>
                            <input type="hidden" id="post_id" value="<?php echo $td_this_post_id; ?>">
                            <div class="advanced" style="margin-top: 30px;">
                            </div>

                            <?php

                        }

                        else
                        {
                            ?>
                            <h3>Hãy nâng cấp tài khoản VIP để xem thông tin liên lạc của ứng viên</h3>
                            <a href="#" rel="nofollow" onclick="add_vip_user()"  class="button-ag-full" style="">Nâng Cấp Tài Khoản VIP </a>
                            <?php
                        }
                        ?>

                    </div>
                </div>
  
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
                include('search-filters-resume.php');
                ?>
                <h2 class="resume-section-title"><i class="fa fa-file-text-o"></i>ỨNG VIÊN LIÊN QUAN</h2>
                
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        
                        <div class="index_listting1">
                            
                            <section id="template_listting">
                                <?php

                                global $wpdb;
                                global $wp2es;
                                $current_element_id = 0;
                                $cond_resume=array('post_status'=>'publish','post_type'=>'resume','resume_industry'=>$td_resume_industry,'resume_location'=>$wpjobus_resume_location);
                                $order=array('up_at'=>'desc', 'post_date'=>'desc');
                                $limit_resume=array('size'=>12,'page'=>1);
                                $result_resume = $wp2es->and_simple_search($cond_resume,$order_resume,$limit_resume);
                                ?>
                                <?php
                                foreach ($result_resume as  $list) {
                                include 'loop/item_listing.php';
                                }
                                ?>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        
                        <?php
                         include('sidebar.php');
                         include('listnews.php');
                        ?>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>