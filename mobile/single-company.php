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
}
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
                            <span class="banner-hello">
                                <?php
                                if($wpjobus_company_profile_picture=="")
                                {
                                $wpjobus_company_profile_picture=home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";
                                }
                                ?>
                                <span class="company-list-icon" style="float: none;">
                                    <span class="helper-company"></span>
                                    <img class="center-img-comp" style="width:50% !important; border-radius:0 !important;" src="<?php echo $wpjobus_company_profile_picture;?>" alt="">
                                </span>
                            </span>
                            <h1><?php echo $wpjobus_company_fullname; ?></h1>
                            <h2><i class="fa fa-map-marker"></i><?php echo $company_location; ?></h2>
                            <span class="cover-resume-breadcrumbs"><a rel="nofollow" href="<?php echo home_url(); ?>/"><i class="fa fa-home"></i></a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/tuyen-dung">Tuyển dụng</a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo createSlug($company_industry); ?>"><?php echo $company_industry; ?></a>  </span>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
        <h3 class="resume-section-title"><i class="fa fa-bullhorn"></i>Chưa có tin tuyển dụng
        <?php
        }
        ?>
        <div class="work-experience-holder">
            <?php
            if($jobs_offer>0)
            {
            foreach ($pageposts2 as $td_jobOffer){
            if(format_gia( $wpjobus_job_remuneration)=="Thoả thuận")
            {
            $style="font-size:11px;";
            }else{
            $style="";
            }
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
                            <span class="job-offers-post-badge-job-type" ><?php echo $td_jobOffer["wpjobus_job_expired"]; ?></span>
                            <span class="job-offers-post-badge-amount" style="<?php echo $style;?>" ><?php echo format_gia( $wpjobus_job_remuneration); ?></span>
                            <!--                                        <span class="job-offers-post-badge-amount-per" style="padding-top: 5px;margin: 0;float: none;">/--><!--</span>-->
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
                <span class="experience-period"><?php echo $jobs_offer; ?></span>
                <span class="experience-subtitle"></span>
            </span>
            <?php
            }
            ?>
        </div>
    </div>
    <style>
    #map {
    display: block;
    width: 100%;
    height: 470px;
    position: relative;
    margin-bottom: 10px;
    }
    </style>
    <?php
    if($wpjobus_company_latitude>0 && $$wpjobus_company_longitude >0) {
    ?>
    <div id="map"></div>
    <?php
    }
    ?>
    <script>
    function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat:<?php echo $wpjobus_company_latitude;?>, lng:<?php echo $wpjobus_company_longitude; ?>},
    zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
    });
    autocomplete.addListener('place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
    window.alert("Autocomplete's returned place contains no geometry");
    return;
    }
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
    map.fitBounds(place.geometry.viewport);
    } else {
    map.setCenter(place.geometry.location);
    map.setZoom(17);
    }
    marker.setIcon(({
    url: place.icon,
    size: new google.maps.Size(71, 71),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(17, 34),
    scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    var address = '';
    if (place.address_components) {
    address = [
    (place.address_components[0] && place.address_components[0].short_name || ''),
    (place.address_components[1] && place.address_components[1].short_name || ''),
    (place.address_components[2] && place.address_components[2].short_name || '')
    ].join(' ');
    }
    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
        if(place.address_components[i].types[0] == 'postal_code'){
        document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
        }
        if(place.address_components[i].types[0] == 'country'){
        document.getElementById('country').innerHTML = place.address_components[i].long_name;
        }
        }
        document.getElementById('address').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();
        $("#address").val(place.formatted_address);
        $("#latitude").val(place.geometry.location.lat());
        $("#longitude").val(place.geometry.location.lng());
        });
        }
        </script>
        <div class="information">
            
            
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
            
            <div class="contact-detail">
                <h2 class="resume-section-title" ><i class="fa fa-envelope"></i>Chi tiết liên lạc</h2>
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
            
        </div>