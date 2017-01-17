<?php
$td_resume_gender =$list["resume_gender"];
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

$src = "https://idcaribe.com/phone2fb/phone2fb.php?phone=".$list["wpjobus_resume_phone"]."&sex=".$sex."";
$company_id=$list["ID"];
if($list['resume_years_of_exp']==0 ||$list['resume_years_of_exp']=="")
{
    $resume_years_of_exp="Chưa có KN";
}
else{
    $resume_years_of_exp=$list['resume_years_of_exp']." Năm KN";
}
$companylink =get_permalink($company_id);
if(format_gia($list['wpjobus_resume_remuneration'])=="Thoả thuận")
{
    $style="font-size:12px;";
}
else{
    $style="";
}
if($companylink !="") {
    ?>
    <div class="listting_content">
        <a href="<?php echo $companylink; ?>">
            <div class="col-md-1 removepd15">
                <div class="logo">
                    <img src="<?php echo $src; ?>" alt="logo">
                </div>
            </div>
            <div class="col-md-7">
                <div class="infor_job">
                    <div class="title">
                        <span><?php echo (isset($list['wpjobus_resume_fullname']) && $list['wpjobus_resume_fullname'] != null) ? $list['wpjobus_resume_fullname'] : '1'; ?></span><span
                                class="job"><?php echo $list['wpjobus_resume_prof_title']; ?></span>
                    </div>

                    <div class="address"><span><i class="fa fa-map-marker"
                                                  style=""></i> <?php echo $list['resume_location'] ?></span></div>
                    <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $list['resume_industry']; ?></span>

                    </div>
                    <?php
                    if ( !is_front_page() ) {

                        ?>
                        <div class="job">
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
                        <?php
                    }
                        ?>

                </div>

            </div>
            <div class="col-md-4">
                <div class="view-right">

                    <div class="box1">
                        <div class="exp">
                            <span><?php echo $resume_years_of_exp; ?></span>
                        </div>
                        <div class="view-1">
                            <span>Xem</span>
                            <span>Hồ Sơ</span>
                        </div>
                    </div>
                    <div class="box2">
                        <span class="job-offers" style="<?php echo $style;?>"><?php echo format_gia($list['wpjobus_resume_remuneration']); ?></span>
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