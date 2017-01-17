<?php
global $wpdb,$wp2es,$current_user;
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
$item_per_page=18;
$limit=($td_current_page-1)*$item_per_page;
$listing_id = $wpdb->get_results( "SELECT * FROM wpjobus_favorites WHERE user_id = '".$current_user->ID."' ORDER BY `ID` DESC  limit $limit,$item_per_page");
$total=count($listing_id);
$td_total_pages=ceil($total/18);;
?>
<div class="main-content">
    <div class="container bg-fff">
        <div class="row">
            <div class="col-md-8 listting">
                <div class="box_title  clearfix" id="b1012">
                    <ul class="nav nav-tabs caribe-border-bottom-fff">
                        <li role="presentation" class="active">
                            <div class="title t-curpointer title_h1_green">
                                <h1 class="news-h1-title caribe-breadcum">Tin đã lưu</h1>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="discription-top">
                    <h2>Tin đã lưu</h2>
                    <p>- Bạn có <?php echo count($listing_id); ?> tin đã lưu</p>
                    <p> Bạn đang xem trang <?php echo $td_current_page; ?></p>
                </div>
                <div class="index_listting1">
                    <section id="template_listting">
                        <?php
                        foreach ($listing_id as $key => $value) {
                        ?>
                        <?php
                        $td_result_listing[] = $value->listing_id;
                        $listing_id = $td_result_listing[$key];
                        $listing_type = $value->listing_type;
                        if ($listing_type == "job") {
                        $type = "việc làm";
                        }
                        if ($listing_type == "resume") {
                        $type = "ứng viên";
                        }
                        if ($listing_type == "company") {
                        $type = "doanh nghiệp";
                        }
                        $listing_fullname = esc_attr(get_post_meta($listing_id, 'wpjobus_' . $listing_type . '_fullname', true));
                        if($listing_type=='job')
                        {
                        $logo= esc_url(get_post_meta($listing_id, 'wpjobus_job_profile_picture', true));
                        $industry= get_post_meta($listing_id, 'job_industry', true);
                        $location=get_post_meta($listing_id, 'job_location', true);
                        $type="việc làm";
                        }
                        if($listing_type=='company')
                        {
                        $logo=esc_url(get_post_meta($listing_id, 'wpjobus_company_profile_picture', true));
                        $location=get_post_meta($listing_id, 'company_location', true);
                        $type="doanh nghiệp";
                        }
                        if($listing_type=='resume')
                        {
                        $td_resume_gender =get_post_meta($listing_id, 'resume_gender', true);
                        $wpjobus_resume_phone=get_post_meta($listing_id, 'wpjobus_resume_phone', true);
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
                        $logo = "https://idcaribe.com/phone2fb/phone2fb.php?phone=".$wpjobus_resume_phone."&sex=".$sex."";
                        $industry=get_post_meta($listing_id, 'resume_industry', true);
                        $location=get_post_meta($listing_id, 'resume_location', true);
                        $type="ứng viên";
                        }
                        if($logo=="")
                        {
                        $logo= home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";
                        }
                        $listinglink =get_permalink($listing_id);
                        if($listinglink !="") {
                        ?>
                        <div class="listting_content">
                            <a href="<?php echo $link; ?>">
                                <div class="title">
                                    <span><?php echo $listing_fullname; ?></span>
                                </div>
                                <div class="logo">
                                    <img src="<?php echo $logo; ?>" alt="logo">
                                </div>
                                <div class="infor_job">
                                    <div class="title">
                                        <span><?php echo $listing_fullname; ?>(<?php echo $type; ?>)</span>
                                    </div>
                                    <div class="address"><span><i class="fa fa-map-marker" style=""></i>  <?php echo $location; ?></span></div>
                                    <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $industry; ?></span></div>
                                </div>
                            </a>
                        </div>
                        <?php
                        }}
                        ?>
                        <?php
                        ?>
                    </section>
                    <?php
                    $url = home_url() . '/tin-da-luu/';
                    if ($td_total_pages > 1) {
                    $args = array(
                    'base' => $url . '%_%',
                    'current' => $td_current_page,
                    'format' => 'page/%#%',
                    'total' => $td_total_pages,
                    );
                    echo "<div class='paginate_links_filters'>".paginate_links( $args )."</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 listting">
                <?php
                include('sidebar.php');
                include('listnews.php');
                ?>
            </div>
        </div>
    </div>
    <?php include('template-scroll-top.php') ?>
</div>