<?php
global $td_this_post_id;

$td_this_post_id = $post->ID;

if(empty($td_this_post_id)) {

    $page = get_page($post->ID);
    $td_this_post_id = $page->ID;

}
global $wp2es;
$cond_company=array('post_status'=>'publish','post_type'=>'company','ID'=>$td_this_post_id);
$order_company=array('ID'=>'desc');
$limit_company=array('size'=>1,'page'=>1);
$result_company = $wp2es->and_simple_search($cond_company,$order_company,$limit_company);

foreach($result_company as $company)
{
    $wpjobus_company_cover_image =$company["wpjobus_company_cover_image"];
    $wpjobus_company_fullname =$company["wpjobus_company_fullname"];
    $wpjobus_company_tagline = $company["wpjobus_company_tagline"];
    $company_industry =$company["company_industry"];
    $td_company_team_size =$company["company_team_size"];
    $resume_about_me = html_entity_decode($company["company-about-me"]);
    $wpjobus_company_foundyear =$company["wpjobus_company_foundyear"];
    $wpjobus_company_profile_picture =$company["wpjobus_company_profile_picture"];
    $company_location = $company["company_location"];

    $wpjobus_resume_prof_title = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_prof_title',true));
    $td_resume_career_level = esc_attr(get_post_meta($td_this_post_id, 'resume_career_level',true));

    $wpjobus_resume_comm_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_comm_level',true));
    $wpjobus_resume_comm_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_comm_note',true));

    $wpjobus_resume_org_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_org_level',true));
    $wpjobus_resume_org_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_org_note',true));

    $wpjobus_resume_job_rel_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_rel_level',true));
    $wpjobus_resume_job_rel_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_rel_note',true));

    $wpjobus_company_services = get_post_meta($td_this_post_id, 'wpjobus_company_services',true);
    $wpjobus_company_expertise = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_expertise',true));

    $wpjobus_resume_education = get_post_meta($td_this_post_id, 'wpjobus_resume_education',true);
    $wpjobus_resume_award = get_post_meta($td_this_post_id, 'wpjobus_resume_award',true);
    $wpjobus_company_clients = get_post_meta($td_this_post_id, 'wpjobus_company_clients',true);
    $wpjobus_company_testimonials = get_post_meta($td_this_post_id, 'wpjobus_company_testimonials',true);
    $wpjobus_resume_remuneration =$company["wpjobus_resume_remuneration"];
    $wpjobus_resume_remuneration_per = $company["wpjobus_resume_remuneration_per"];

    $wpjobus_resume_job_freelance =$company["wpjobus_resume_job_freelance"];
    $wpjobus_resume_job_part_time = $company["wpjobus_resume_job_part_time"];
    $wpjobus_resume_job_full_time =$company["wpjobus_resume_job_full_time"];
    $wpjobus_resume_job_internship =$company["wpjobus_resume_job_internship"];
    $wpjobus_resume_job_volunteer =$company["wpjobus_resume_job_volunteer"];

    $wpjobus_company_portfolio =$company["wpjobus_company_portfolio"];


    $wpjobus_company_address =$company["wpjobus_company_address"];
    $wpjobus_company_phone =$company["wpjobus_company_phone"];
    $wpjobus_company_website =$company["wpjobus_company_website"];
    $wpjobus_company_email =$company["wpjobus_company_email"];
    $wpjobus_company_publish_email =$company["wpjobus_company_publish_email"];
    $wpjobus_company_facebook =$company["wpjobus_company_facebook"];
    $wpjobus_company_linkedin = $company["wpjobus_company_linkedin"];
    $wpjobus_company_twitter =$company["wpjobus_company_twitter"];
    $wpjobus_company_googleplus =$company["wpjobus_company_googleplus"];

    $wpjobus_company_googleaddress =$company["wpjobus_company_googleaddress"];
    $wpjobus_company_longitude =$company["wpjobus_company_longitude"];
    $wpjobus_company_latitude =$company["wpjobus_company_latitude"];
//    if($wpjobus_company_longitude==""){
//        $wpjobus_company_longitude=10.771971;
//    }
//    if($wpjobus_company_longitude==""){
//        $wpjobus_company_longitude=106.697845;
//    }

}
?>
<div class="main-content">
    <div class="coverImageHolder">
        <div class="cover">
            <img src="https://mangvieclam.com/wp-content/themes/mangvieclam789/images/job-banner-1.jpg" alt="" class="bgImg" style="top: 0px;">
        </div>
        <div class="container">
            <div class=row>
                <div class="col-md-8 col-md-offset-2">
                    <div class="banner-top">
                        <section id="banner-top">
							<span class="banner-hello">
                                 <?php
                                 if($wpjobus_company_profile_picture=="")
                                 {
                                     $wpjobus_company_profile_picture=home_url()."/wp-content/themes/mangvieclam789/images/mang-viec-lam.png";
                                 }
                                 ?>
                                <span class="company-list-icon" style="float: none;">
									<span class="helper-company"></span>

									<img class="center-img-comp" src="<?php echo $wpjobus_company_profile_picture; ?>" alt="">
								</span>
							</span>
                            <h1><?php echo $wpjobus_company_fullname; ?></h1>
                            <h2><i class="fa fa-map-marker"></i><?php echo $company_location ;?></h2>
                            <span class="cover-resume-breadcrumbs"><a rel="nofollow" href="<?php echo home_url(); ?>/"><i class="fa fa-home"></i></a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/tuyen-dung">Tuyển dụng</a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo createSlug($company_industry); ?>"><?php echo $company_industry; ?></a>  </span>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="company-introduction">
            <h2 class="resume-section-title"><i class="fa fa-building"></i>Giới Thiệu Công Ty</h2>
            <?php

            $content = $resume_about_me;

            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);

            echo $content;

            ?>
        </div>
        <?php
        global $wp2es;

        $id = get_the_ID();
        $cond=array('post_status'=>'publish','post_type'=>'job','job_company'=>$id);
        $order=array('ID'=>'desc');
        $limit=array('size'=>150,'page'=>1);
        $result_job = $wp2es->and_simple_search($cond,$order,$limit);
        $jobs_offer= $result_job[0]["es_total_result"];

        $pageposts2 =$result_job;

        ?>

        <div class="resume-skills">
            <?php
            if($jobs_offer>0) {


                ?>
                <h3 class="resume-section-title"><i class="fa fa-bullhorn"></i>Tuyển dụng (Có <?php echo $jobs_offer; ?>
                    việc làm)</h3>
                <?php
            }else{
                ?>
                <h3 class="resume-section-title"><i class="fa fa-bullhorn"></i>Chưa có tin tuyển dụng</h3>
                <?php
            }
            ?>
            <div class="work-experience-holder">
                <?php
                if($jobs_offer>0)
                {
                    foreach ($pageposts2 as $td_jobOffer){

                        ?>
                        <div class="job-offers-post" id="post-2265161">
                            <div class="one_third first" style="margin-bottom: 0;">
                                <a rel="nofollow" href="<?php $td_result_job_id = $td_jobOffer["ID"]; $joblink = get_permalink($td_result_job_id); echo $joblink; ?>"><?php echo $wpjobus_job_fullname = $td_jobOffer["wpjobus_job_fullname"]; ?></a>
                            </div>
                            <div class="two_third" style="margin-bottom: 0;">
                                <div class="one_third first" style="margin-bottom: 0;">
                                    <span class="job-location"><i class="fa fa-map-marker"></i><?php echo $td_job_location =$td_jobOffer["job_location"]; ?></span>
                                </div>
                                <div class="one_third" style="margin-bottom: 0;">
                                    <span class="job-time"><i class="fa fa-calendar"></i><?php the_time('F jS, Y') ?></span>
                                </div>
                                <div class="one_third" style="margin-bottom: 0;">

							<span class="job-offers-post-badge" >
								<span class="job-offers-post-badge-job-type" ><?php echo $wpjobus_job_type =$td_jobOffer["wpjobus_job_type"]; ?></span>
								<span class="job-offers-post-badge-amount" ><?php echo format_gia( $wpjobus_job_remuneration); ?></span>
                                <!--										<span class="job-offers-post-badge-amount-per" style="padding-top: 5px;margin: 0;float: none;">/--><!--</span>-->
							</span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }}

                ?>


            </div>
        </div>
        <div class="company-information">
            <h3 class="resume-section-title"><i class="fa fa-briefcase"></i>Thông Tin Công Ty</h3>
            <div class="full job-company-desc" style="text-align: center;">
                <span><img src="<?php echo $wpjobus_company_profile_picture;?>" alt=""></span>
                <h2><?php echo $wpjobus_company_fullname;?></h2>
                <h3><?php echo $wpjobus_resume_prof_title; ?></h3>
            </div>
            <div class="divider"></div>
            <div class="full" style="text-align: center;">
				<span class="company-est-year-block">
					<i class="fa fa-calendar"></i>
					<span class="experience-period">Thành lập</span>
					<span class="experience-subtitle"><?php echo $wpjobus_company_foundyear;?></span>
				</span>
                <span class="company-team-block">
					<i class="fa fa-users"></i>
					<span class="experience-period"><?php echo $td_company_team_size?></span>
					<span class="experience-subtitle"></span>
				</span>
                <?php
                if($jobs_offer>0) {
                    ?>
                    <span class="company-jobs-block">
					<i class="fa fa-bullhorn"></i>
					<span class="experience-period"><?php $jobs_offer; ?></span>
					<span class="experience-subtitle"></span>
				</span>
                    <?php
                }
                ?>
            </div>
        </div>
        <div id="map-canvas"></div>

        <style>

            #map-canvas {
                display: block;
                width: 100%;
                height: 470px;
            }

        </style>

        <script type="text/javascript">

            // Function khởi tạo google map
            function initialize()
            {
                // Config google map
                var mapOptions = {
                    // Tọa độ muốn hiển thị ban đầu (tung độ,vỹ độ)
                    center: new google.maps.LatLng(<?php echo $wpjobus_company_latitude?:14.058324; ?>,<?php echo $wpjobus_company_longitude?:108.277199; ?>),
                    // Mức độ zoom
                    zoom: 8
                };

                // Hiển thị map lên bản đồ (div#map-canvas)
                var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
            }

            // Gán hàm initialize vào trong sự kiện load dom google map
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div class="information">

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h2 class="resume-section-title" ><i class="fa fa-list-ul"></i>Thông Tin Liên Hệ</h2>

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
                <div class="col-xs-6 col-md-4">
                    <h2 class="resume-section-title" ><i class="fa fa-envelope"></i>  Chi tiết liên lạc</h2>
                    <span class="resume-contact-info">

                            <i class="fa fa-briefcase"></i><span><?php echo $wpjobus_company_fullname; ?></span>

                          </span>

                    <?php if(!empty($wpjobus_company_address)) { ?>

                        <span class="resume-contact-info">

						<i class="fa fa-map-marker"></i><span><?php echo $wpjobus_company_address; ?></span>

					</span>

                    <?php } ?>
                    <?php if(!empty($wpjobus_company_email)) { ?>

                        <span class="resume-contact-info">

            <i class="fa fa-envelope"></i><span><?php echo $wpjobus_company_email; ?></span>

          </span>

                    <?php } ?>


                    <?php if(!empty($wpjobus_company_phone)) { ?>

                        <span class="resume-contact-info">

						<i class="fa fa-mobile"></i><span><?php echo $wpjobus_company_phone; ?></span>

					</span>

                    <?php } ?>

                    <?php if(!empty($wpjobus_company_website) && $wpjobus_company_website !="#") { ?>

                        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_company_website;
                        $url = $wpjobus_company_website;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

                        ?>

                            <i class="fa fa-link"></i><span><?php echo $wpjobus_company_website; ?></span>

					</span>

                    <?php } ?>

                    <?php if(!empty($wpjobus_company_email)) { ?>

                        <?php if(!empty($wpjobus_company_publish_email)) { ?>

                            <span class="resume-contact-info">

						<i class="fa fa-envelope-o"></i><span><?php echo $wpjobus_company_email; ?></span>

					</span>

                        <?php } } ?>

                    <?php if(!empty($wpjobus_company_facebook)) { ?>

                        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_company_facebook;
                        $url = $wpjobus_company_facebook;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

                        ?>

                            <i class="fa fa-facebook-square"></i><span><?php $return; ?></span>

					</span>

                    <?php } ?>

                    <?php if(!empty($wpjobus_company_linkedin)) { ?>

                        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_company_linkedin;
                        $url = $wpjobus_company_linkedin;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

                        ?>

                            <i class="fa fa-linkedin-square"></i><span><?php echo $return; ?>"></span>

					</span>

                    <?php } ?>

                    <?php if(!empty($wpjobus_company_twitter)) { ?>

                        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_company_twitter;
                        $url = $wpjobus_company_twitter;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

                        ?>

                            <i class="fa fa-twitter-square"></i><span><?php echo $return; ?>"></span>

					</span>

                    <?php } ?>

                    <?php if(!empty($wpjobus_company_googleplus)) { ?>

                        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_company_googleplus;
                        $url = $wpjobus_company_googleplus;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

                            <i class="fa fa-google-plus-square"></i><span><?php echo $return; ?>"></span>

					</span>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
