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
if($list['resume_years_of_exp']==0 ||$list['resume_years_of_exp']=="")
{
    $resume_years_of_exp="Chưa có KN";
}
else{
    $resume_years_of_exp=$list['resume_years_of_exp']." Năm KN";
}

?>
<div class="listting_content">
    <a href="<?php $companylink = get_permalink($list["ID"]);echo $companylink; ?>">
    <div class="title">
        <span><?php echo $list['wpjobus_resume_fullname']; ?></span><span class="job"><?php echo $list['wpjobus_resume_prof_title']; ?></span>
    </div>
    <div class="logo">
        <img src="<?php echo $src; ?>" alt="logo">
    </div>

    <div class="infor_job">   
        <div class="company"><span><i class="fa fa-check"></i> <?php echo $resume_years_of_exp; ?></span></div>
        <div class="salary1"><span><i class="fa fa-tag "></i><?php echo format_gia($list['wpjobus_resume_remuneration']); ?></span></div>
        <div class="address"><span><i class="fa fa-map-marker" style=""></i>  <?php echo $list['resume_location'] ?></span></div>
        <div class="job"><span><i class="fa fa-suitcase"></i><?php echo $list['resume_industry']; ?></span></div>
    </div>

    </a>
</div>