<?php
$id_post = $list["ID"];
$post_type= $list["post_type"];
if($post_type=='job')
{
    $logo= esc_url(get_post_meta($id_post, 'wpjobus_company_profile_picture', true));
    $industry=$list['job_industry'];
    $location=$list['job_location'];
    $type="việc làm";
}
if($post_type=='company')
{
    $logo=$list["wpjobus_company_profile_picture"];
    $location=$list['company_location'];
    $type="doanh nghiệp";
}
if($post_type=='resume')
{
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

    $logo = "https://idcaribe.com/phone2fb/phone2fb.php?phone=".$list["wpjobus_resume_phone"]."&sex=".$sex."";
    $industry=$list['resume_industry'];
    $location=$list['resume_location'];
    $type="ứng viên";
}

if($logo=="")
{
    $logo= home_url() . "/wp-content/themes/CRB/images/logo mvl 60x60.png";

}
$link = get_permalink($id_post);
if($link){
    ?>
    <div class="listting_content">
        <a href="<?php echo $link; ?>">
            <div class="title">
                <span><?php echo $list['post_title']; ?></span>
            </div>

            <div class="logo">
                <img src="<?php echo $logo; ?>" alt="logo">
            </div>

            <div class="infor_job">
                <div class="title">
                    <span><?php echo (isset($list['post_title']) && $list['post_title'] != null)?$list['post_title']:'1'; ?>(<?php echo $type; ?>)</span>
                </div>

                <div class="address"><span><i class="fa fa-map-marker" style=""></i>  <?php echo $location; ?></span></div>
                <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $industry; ?></span></div>
            </div>

    </div>
    </a>

    <?php
}
?>
