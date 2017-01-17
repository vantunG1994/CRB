
<?php
$td_job_company=$list["ID"];
$company_id=$td_job_company;
$wpjobus_company_profile_picture = esc_url(get_post_meta($td_job_company, 'wpjobus_company_profile_picture', true));

if ($wpjobus_company_profile_picture == "") {
    $wpjobus_company_profile_picture = home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";
}
$wpjobus_job_remuneration = $list["wpjobus_job_remuneration"];
$job_remuneration = format_gia($wpjobus_job_remuneration);
$id_company = $list["job_company"];
$wpjobus_company_fullname = get_post_meta($id_company, 'wpjobus_company_fullname',true);
$job_industry = $list["job_industry"];
$companylink = get_permalink($company_id);
if(format_gia($list['wpjobus_job_remuneration'])=="Thoả thuận")
{
    $style="font-size:12px;";
}
else{
    $style="";
}
$dictrict = esc_attr(get_post_meta($company_id, 'job_dictrict', true));
if($dictrict !="")
{
    $dictrict=" - ".$dictrict;
}
$td_job_expired=get_post_meta($company_id, 'wpjobus_job_expired', true);
$td_job_expired = date('d/m/Y ', strtotime($td_job_expired));
if($job_industry !="" && $companylink !="") {
    ?>

    <div class="listting_job">
        <a href="<?php echo $companylink; ?>">

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
                                                          style=""></i> <?php echo $list['job_location'].$dictrict; ?></span></div>
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
                            <span><?php echo $td_job_expired; ?></span>
                        </div>
                        <div class="view-1">
                            <span>Xem</span>
                            <span>tin tuyển dụng</span>
                        </div>
                    </div>
                    <div class="box2">
                        <span class="job-offers" style="<?php echo $style;?>"><?php echo $job_remuneration; ?></span>
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