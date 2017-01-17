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

    ?>

    <div class="listting_content">
        <a rel="nofollow" href="<?php $companylink = get_permalink($company_id);
        echo $companylink; ?>">
        
        <div class="title">
            <span><?php echo $list['wpjobus_job_fullname']; ?></span>
        </div>
        
        <div class="logo">
            <img src="<?php echo $wpjobus_company_profile_picture; ?>" alt="logo">
        </div>

            <div class="infor_job">

                <div class="salary1"><span><i class="fa fa-tag "></i><?php echo $job_remuneration; ?></span> </div>
                <?php
                if($wpjobus_company_fullname !="") {
                    ?>
                    <span class="company-name"><i
                                class="fa fa-briefcase"></i><?php echo $wpjobus_company_fullname; ?></span>
                    <?php
                }
 ?>
                <?php
                if($list['job_location'] !="") {
                    ?>
                    <div class="address"><span><i class="fa fa-map-marker"
                                                  style=""></i> <?php echo $list['job_location'] ?></span></div>
                    <?php
                }
 ?>
                <div class="date-time">
                    <span><i class="fa fa-calendar-o"style=""></i> <?php echo sw_human_time_diff($company_id); ?></span>
                    <span class="view"><i class="fa fa-eye" aria-hidden="true"></i>
                         <?php
                        if (wpb_get_post_views($company_id) == 0) {
                            echo '1';
                        } else {
                            echo wpb_get_post_views($company_id);
                        }

                        ?>
                    </div>
                    
                       

            </div>

            </div>
        </a>

    <?php

?>