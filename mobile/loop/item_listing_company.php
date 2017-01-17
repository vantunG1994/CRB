<?php
$company_id = $list["ID"];
$wpjobus_company_profile_picture =$q["wpjobus_company_profile_picture"];

if($wpjobus_company_profile_picture=="")
{
    $wpjobus_company_profile_picture=home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";
}
$companylink = get_permalink($company_id);
if($companylink){
?>
<div class="listting_content">
    <a href="<?php echo $companylink; ?>">
    <div class="title">
        <span><?php echo $list['wpjobus_job_fullname']; ?></span>
    </div>

    <div class="logo">
        <img src="<?php echo $wpjobus_company_profile_picture; ?>" alt="logo">
    </div>

        <div class="infor_job">
            <div class="title">
                <span><?php echo (isset($list['wpjobus_company_fullname']) && $list['wpjobus_company_fullname'] != null)?$list['wpjobus_company_fullname']:'1'; ?></span>
            </div>

            <div class="address"><span><i class="fa fa-map-marker" style=""></i>  <?php echo $list['company_location'] ?></span></div>
            <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $list["company_industry"]; ?></span></div>
        </div>

</div>
</a>

<?php
}
?>
