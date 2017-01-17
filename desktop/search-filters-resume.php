<?php
global $wpdb,$post;
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
if(get_post_type( $post->ID ) == 'resume' ) {
$action=home_url()."/ung-vien";
}else{$action="";}
?>
<div class="search-filters">
    <span class="search-filters-title">
        <h3 class="search-select2"><i class="fa fa-search"></i>TÌM KIẾM ỨNG VIÊN</h3>
    </span>
    <form class="search-filters" method="get" action="<?php echo $action;?>">
        <div class=" sidebar-widget-bottom-line ">
            <div class=" input-write" style="margin-bottom: 0;">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input class="input-lg selecl " type="text" placeholder="Nhập từ khoá tìm kiếm" name="key_job" value="<?php echo $_GET['key_job'] ?: ''; ?>" vk_14790="subscribed">
            </div>
        </div>
        <div class="sidebar-widget-bottom-line  select-exp">
            <i class="fa fa-pencil" aria-hidden="true"></i>
            <input class="input-lg selecl" placeholder="Lựa chọn năm KN" type="number" name="job_est_year_num" id="job_est_year_num" value="<?php echo $_GET['job_est_year_num'];?>">
        </div>
        <div class=" sidebar-widget-bottom-line  select-job">
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <select class="input-lg select2 job_type"   name="industry" id="job_type"  tabindex="-1" aria-hidden="true">
                <?php
                if($job_type !="" && $job_type!="resume" && $job_type !="job")
                {
                ?>
                <option selected value="<?php echo createSlug($job_type); ?>"><?php echo $job_type; ?></option>
                <?php
                }
                else{
                ?>
                <option value="">Lựa chọn ngành nghề</option>
                <?php
                }
                foreach ($job_field as $industry) {
                ?>
                <option  value="<?php echo createSlug($industry->name); ?>"><?php echo $industry->name; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="sidebar-widget-bottom-line  select-address  ">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <select class="input-lg select2 job_location "   name="resume_location" id="job_location"  tabindex="-1" aria-hidden="true">
                <?php
                if($_GET['resume_location']!="")
                {
                ?>
                <option selected value="<?php echo $locations; ?>"><?php echo $locations; ?></option>
                <?php
                }else{
                ?>
                <option value="">Chọn khu vực</option>
                <?php
                }
                foreach ($job_province as $location) {
                ?>
                <option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class=" sidebar-widget-bottom-line  select-salary">
            <i class="fa fa-usd" aria-hidden="true"></i>
            <select class="input-lg select2 "   id="price"  name="salary" style="width: 100%;" data-ref="hoso_salary" tabindex="-1" aria-hidden="true">
                <?php
                if($_GET["salary"]!="")
                {
                $salarys=$_GET["salary"];
                if($salary==2500000)
                {
                $salary_name="1-3 triệu";
                }
                if($salary==4000000)
                {
                $salary_name="3-5 triệu";
                }
                if($salary==6000000)
                {
                $salary_name="5-7 triệu";
                }
                if($salary==8500000)
                {
                $salary_name="7-10 triệu";
                }
                if($salary==11000000)
                {
                $salary_name="10-12 triệu";
                }
                if($salary==13500000)
                {
                $salary_name="12-15 triệu";
                }
                if($salary==17500000)
                {
                $salary_name="15-20 triệu";
                }
                if($salary==22500000)
                {
                $salary_name="20-25 triệu";
                }
                if($salary==27500000)
                {
                $salary_name="25-30 triệu";
                }
                if($salary==30000000)
                {
                $salary_name="30 triệu trở lên";
                }
                ?>
                <option selected value="<?php echo $salary; ?>"><?php echo $salary_name; ?></option>
                <?php
                ?>
                <?php
                }
                else{
                ?>
                <option value="">Mức lương mong muốn</option>
                <?php
                }
                ?>
                <option value="2500000">1-3 triệu</option>
                <option value="4000000">3-5 triệu</option>
                <option value="6000000">5-7 triệu</option>
                <option value="8500000">7-10 triệu</option>
                <option value="11000000">10-12 triệu</option>
                <option value="13500000">12-15 triệu</option>
                <option value="17500000">15-20 triệu</option>
                <option value="22500000">20-25 triệu</option>
                <option value="27500000">25-30 triệu</option>
                <option value="30000000">30 triệu trở lên</option>
            </select>
        </div>
        <div class=" sidebar-widget-bottom-line select-sex">
            <i class="fa fa-transgender" aria-hidden="true"></i>
            <select class="input-lg select2 " name="resume_gender"  >
                <?php
                if($_GET["resume_gender"]!='')
                {
                $gender_value=$_GET["resume_gender"] ?:'';
                ?>
                <option value='<?php echo $gender_value; ?>'><?php echo $gender_value; ?></option>
                <option value=''>Không yêu cầu</option>
                <?php
                }
                else
                {
                ?>
                <option value=''>Lựa chọn giới tính</option>
                <?php
                }
                ?>
                <option value='Nam'>Nam</option>
                <option value='Nữ'>Nữ</option>
            </select>
        </div>
        <div class=" sidebar-widget-bottom-lineselect-typejob ">
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <select name="wpjobus_resume_job_type" class="input-lg select2" tabindex="-1" aria-hidden="true">
                <?php
                if($_GET["wpjobus_resume_job_type"]!='')
                {
                $resume_job_types=$_GET["wpjobus_resume_job_type"] ?:'';
                foreach($resume_job_types as$resume_job_type){
                ?>
                <option selected value='<?php echo $resume_job_type; ?>'><?php echo $resume_job_type; ?></option>
                <?php
                }}else{
                ?>
                <option value=''>Lựa chọn loại công việc</option>
                <?php
                }
                ?>
                <option value="Chính thức">Chính thức</option>
                <option value="Bán thời gian">Bán thời gian</option>
                <option value="Lao động tự do ">Lao động tự do </option>
                <option value="Thực tập sinh">Thực tập sinh</option>
            </select>
        </div>
        <div class="" style="margin-bottom: 0; text-align: center;">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Tìm Kiếm</button>
        </div>
    </form>
</div>
<script src="<?php echo get_template_directory_uri();?>/desktop/asset/js/select2.js"></script>