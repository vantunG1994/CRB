
<?php
$td_job_company=$list["ID"];
$company_id=$td_job_company;
$wpjobus_company_profile_picture = esc_url(get_post_meta($td_job_company, 'wpjobus_company_profile_picture', true));

if ($wpjobus_company_profile_picture == "") {
    $wpjobus_company_profile_picture = home_url() . "/wp-content/themes/mangvieclam789/images/mang-viec-lam.png";
}
$wpjobus_job_remuneration = $list["wpjobus_job_remuneration"];
$job_remuneration = format_gia($wpjobus_job_remuneration);
$id_company = $list["job_company"];
$wpjobus_company_fullname = get_post_meta($id_company, 'wpjobus_company_fullname',true);
$job_industry = $list["job_industry"];
if($job_industry !="") {
    ?>

    <div class="listting_job">
        <a href="<?php $companylink = get_permalink($company_id);echo $companylink; ?>">

            <div class="col-md-1 removepd15">
                <div class="logo">
                    <img src="<?php echo $wpjobus_company_profile_picture; ?>" alt="logo">
                </div>
            </div>
            <div class="col-md-7">
                <div class="infor_job">
                    <?php
                    if($list['wpjobus_job_fullname'] !=""){
                    ?>
                    <div class="title">
                        <span><?php echo (isset($list['wpjobus_job_fullname']) && $list['wpjobus_job_fullname'] != null) ? $list['wpjobus_job_fullname'] : '1'; ?></span>
                    </div>
                        <?php
                        }
                        if($wpjobus_company_fullname!="") {
                            ?>
                            <div class="company"><i
                                        class="fa fa-briefcase"></i> <?php echo $wpjobus_company_fullname; ?></div>
                            <?php
                        }
                        if($list['job_location']!="") {
                            ?>
                            <div class="address"><span><i class="fa fa-map-marker"
                                                          style=""></i> <?php echo $list['job_location'] ?></span></div>
                            <?php
                        }
                            ?>
                            <div class="date-time">
                        <span><i class="fa fa-calendar-o"
                                 style=""></i> <?php echo sw_human_time_diff($company_id); ?></span>
                        <span class="view"><i class="fa fa-eye" aria-hidden="true"></i>
                            <?php
                            if (wpb_get_post_views($company_id) == 0) {
                                echo '1';
                            } else {
                                echo wpb_get_post_views($company_id);
                            }

                            ?>
            </span>
                    </div>
                    <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $job_industry; ?></span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="view-right">

                    <div class="box1">
                        <div class="exp">
                            <span>Hạn Nộp</span>
                            <span><?php echo get_post_meta($company_id, 'wpjobus_job_expired', true); ?></span>
                        </div>
                        <div class="view-1">
                            <span>Xem</span>
                            <span>tin tuyển dụng</span>
                        </div>
                    </div>
                    <div class="box2">
                        <span class="job-offers"><?php echo $job_remuneration; ?></span>
                        <span class="icon"><i class="fa fa-eye"></i></span>
                    </div>

                </div>
            </div>
        </a>
        <div class="clearfix"></div>
    </div>
    <?php
}
?>