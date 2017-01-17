<?php
global $wpdb,$post;
$upload_dir = wp_upload_dir();
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
if(isset($_GET['job_id']) !="") {
$job_id=$_GET['job_id'];
$wpjobus_job_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_job_fullname', true));
$td_resume_gender = esc_attr(get_post_meta($job_id, 'resume_gender', true));
$td_resume_month_birth = esc_attr(get_post_meta($job_id, 'resume_month_birth', true));
$td_resume_day_birth = esc_attr(get_post_meta($job_id, 'resume_day_birth', true));
$td_resume_year_birth = esc_attr(get_post_meta($job_id, 'resume_year_birth', true));
$td_job_years_of_exp = esc_attr(get_post_meta($job_id, 'job_years_of_exp', true));
$td_job_industry = esc_attr(get_post_meta($job_id, 'job_industry', true));
$td_job_location = esc_attr(get_post_meta($job_id, 'job_location', true));
$td_job_company = esc_attr(get_post_meta($job_id, 'job_company', true));
$td_job_company_id = esc_attr(get_post_meta($job_id, 'job_company_id', true));
$td_job_career_level = esc_attr(get_post_meta($job_id, 'job_career_level', true));
$resume_about_me = esc_attr(get_post_meta($job_id, 'job-about-me', true));
$wpjobus_job_profile_picture = esc_attr(get_post_meta($job_id, 'wpjobus_job_profile_picture', true));
$wpjobus_job_cover_image = esc_attr(get_post_meta($job_id, 'wpjobus_job_cover_image', true))?:"wxwx";
$wpjobus_job_file = esc_attr(get_post_meta($job_id, 'wpjobus_job_file', true));
$wpjobus_job_file_name = esc_attr(get_post_meta($job_id, 'wpjobus_job_file_name', true));
$td_job_presence_type = esc_attr(get_post_meta($job_id, 'job_presence_type', true));
$td_job_date_expired = esc_attr(get_post_meta($job_id, 'wpjobus_job_expired', true)) ?: "";
$wpjobus_job_type=esc_attr(get_post_meta($job_id, 'wpjobus_job_type', true)) ?: "";
$job_time_trial=esc_attr(get_post_meta($job_id, 'job_time_trial', true)) ?: "";
$job_education=esc_attr(get_post_meta($job_id, 'job_education', true)) ?: "";
$dictrict = esc_attr(get_post_meta($job_id, 'job_dictrict', true));
$wpjobus_company_fullname = esc_attr(get_post_meta($td_job_company_id, 'wpjobus_company_fullname',true));
$wpjobus_job_remuneration=esc_attr(get_post_meta($job_id, 'wpjobus_job_remuneration',true));
$wpjobus_job_remuneration_per=esc_attr(get_post_meta($job_id, 'wpjobus_job_remuneration_per',true));
$wpjobus_job_address=esc_attr(get_post_meta($job_id, 'wpjobus_job_address',true));
$wpjobus_job_phone=esc_attr(get_post_meta($job_id, 'wpjobus_job_phone',true));
$wpjobus_job_website=esc_attr(get_post_meta($job_id, 'wpjobus_job_website',true));
$wpjobus_job_email=esc_attr(get_post_meta($job_id, 'wpjobus_job_email',true));
$wpjobus_job_facebook=esc_attr(get_post_meta($job_id, 'wpjobus_job_facebook',true));
$wpjobus_job_linkedin=esc_attr(get_post_meta($job_id, 'wpjobus_job_linkedin',true));
$wpjobus_job_twitter=esc_attr(get_post_meta($job_id, 'wpjobus_job_twitter',true));
$wpjobus_job_googleplus=esc_attr(get_post_meta($job_id, 'wpjobus_job_googleplus',true));
$wpjobus_job_org_level=esc_attr(get_post_meta($job_id, 'wpjobus_job_org_level',true));
$wpjobus_job_comm_level=esc_attr(get_post_meta($job_id, 'wpjobus_job_comm_level',true));
$wpjobus_job_job_rel_level=esc_attr(get_post_meta($job_id, 'wpjobus_job_job_rel_level',true));
$wpjobus_job_comm_note=esc_attr(get_post_meta($job_id, 'wpjobus_job_comm_note',true));
$wpjobus_job_rel_note=esc_attr(get_post_meta($job_id, 'wpjobus_job_job_rel_note',true));
$wpjobus_job_org_note=esc_attr(get_post_meta($job_id, 'wpjobus_job_org_note',true));
$wpjobus_job_native_language=esc_attr(get_post_meta($job_id, 'wpjobus_job_native_language',true));
$wpjobus_job_longitude = get_post_meta($job_id, 'wpjobus_job_longitude',true);
$wpjobus_job_latitude = get_post_meta($job_id, 'wpjobus_job_latitude',true);
}
?>
<style>
input#save_pending {
width: 35%;
border: none;
background: #16a085;
color: white;
font-size: 15px;
font-weight: bold;
padding-left: 0 !important;
}
input#save_draf {
width: 20%;
border: none;
background: #428bca;
color: white;
font-size: 15px;
font-weight: bold;
padding-left: 0 !important;
}
input#file {
border: none;
}
#userNameError, #err_email, #error_address, #err_postContent, #err_number {
color:red;
}
</style>
<div class="main-content">
  <div class="container">
    <form method="post">
      <div class="add-edit">
        <div class="title-top">
          <?php
          if(isset($_GET['job_id']) =="") {
          ?>
          <h1 class="resume-section-title"><i class="fa fa-file-text-o"></i>Đăng tin tuyển dụng</h1>
          <?php
          }
          else{
          ?>
          <h1 class="resume-section-title"><i class="fa fa-file-text-o"></i>Cập nhật tin tuyển dụng</h1>
          <?php
          }
          ?>
          <h3 class="resume-section-subtitle" >Hãy cung cấp đầy đủ thông tin theo yêu cầu. Bạn sẽ có một tin đăng tuyển dụng hoàn hảo.</h3>
        </div>
        <div class="form-input">
          <div class="row">
            <div class="col-md-6">
              <div class="information-add-edit">
                <span class="information-input">
                  <span class="label-title" >
                    <h3>Tiêu đề công việc</h3>
                  </span>
                  <span class="three_fifth " >
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <input class="input-lg" type="text" name="wpjobus_job_fullname" id="information-inputName" value="<?php echo $wpjobus_job_fullname;?>" placeholder="Nhập tiêu đề"  vk_1ffd1="subscribed">
                    <p id="userNameError"></p>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Giới tính:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-transgender" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_sex"  style="width: 100%;">
                      <?php
                      if($td_resume_gender !="")
                      {
                      ?>
                      <option value="<?php echo $td_resume_gender;?>"><?php echo $td_resume_gender;?> </option>
                      <?php
                      }
                      ?>
                      <option value="Nam">Nam </option>
                      <option value="Nữ">Nữ</option>
                      <option value="Không yêu cầu">Không yêu cầu</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Cấp bậc:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_career_level" id="job_career_level" style="width: 100%;">
                      <?php
                      if($td_job_career_level !="")
                      {
                      ?>
                      <option value="<?php echo $td_job_career_level;?>"><?php echo $td_job_career_level;?> </option>
                      <?php
                      }
                      ?>
                      <option value="Nhân viên">Nhân viên</option>
                      <option value="Trưởng phòng">Trưởng phòng</option>
                      <option value="Trưởng nhóm">Trưởng nhóm</option>
                      <option value="Phó giám đốc">Phó giám đốc</option>
                      <option value="Giám đốc">Giám đốc</option>
                      <option value="Tổng giám đốc điều hành">Tổng giám đốc điều hành</option>
                      <option value="Mới tốt nghiệp/ Thực tập sinh">Mới tốt nghiệp/ Thực tập sinh</option>
                      <option value="Khác">Khác</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Loại công việc:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <select class="input-lg select2 " name="job_type"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <?php
                      if($wpjobus_job_type !="")
                      {
                      ?>
                      <option value="<?php echo $wpjobus_job_type;?>"><?php echo $wpjobus_job_type;?> </option>
                      <?php
                      }
                      ?>
                      <option value="Chính thức">Chính thức</option>
                      <option value="Bán thời gian">Bán thời gian</option>
                      <option value="Lao động tự do ">Lao động tự do </option>
                      <option value="Thực tập sinh">Thực tập sinh</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Thời gian thử việc</h3>
                  </span>
                  <span class="three_fifth select-wrapper" >
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_time_trial" id="job_time_trial" style="width: 100%;">
                      <?php
                      if($job_time_trial !="")
                      {
                      ?>
                      <option value="<?php echo $job_time_trial;?>"><?php echo $job_time_trial;?> </option>
                      <?php
                      }
                      ?>
                      <option value="">Không yêu cầu</option>
                      <option value="1 tháng">1 tháng</option>
                      <option value="2 tháng">2 tháng</option>
                      <option value="3 tháng">3 tháng</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Trình độ học vấn</h3>
                  </span>
                  <span class="three_fifth select-wrapper  " >
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_education" id="job_education" style="width: 100%;">
                      <?php
                      if($job_education !="")
                      {
                      ?>
                      <option value="<?php echo $job_education;?>"><?php echo $job_education;?> </option>
                      <?php
                      }
                      ?>
                      <option value="Không yêu cầu">Không yêu cầu</option>
                      <option value="Lao động phổ thông">Lao động phổ thông</option>
                      <option value="Chứng chỉ">Chứng chỉ</option>
                      <option value="Trung học">Trung học</option>
                      <option value="Trung cấp">Trung cấp</option>
                      <option value="Cao đẳng">Cao đẳng</option>
                      <option value="Đại học">Đại học</option>
                      <option value="Cao học">Cao học</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title " >
                    <h3>Số năm kinh nghiệm:</h3>
                  </span>
                  <span class="three_fifth select-wrapper" >
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_years_of_exp" id="job_years_of_exp" style="width: 100%;">
                      <?php
                      if($td_job_years_of_exp !="")
                      {
                      ?>
                      <option value="<?php echo $td_job_years_of_exp;?>"><?php echo $td_job_years_of_exp;?> </option>
                      <?php
                      }
                      ?>
                      <option value="">Không yêu cầu</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Ngành nghề:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <select class="input-lg select2" name="job_industry" id="job_industry" style="width: 100%; margin-right: 10px;">
                      <?php
                      foreach ($job_field as $industry) {
                      ?>
                      <option value="<?php echo $industry->name; ?>"><?php echo $industry->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Tỉnh thành:</h3>
                  </span>
                  <span class="three_fifth select-wrapper  " >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <select class="input-lg select2 job_location "  name="job_location" id="job_location"  tabindex="-1" aria-hidden="true">
                      <?php
                      if($td_job_location !="")
                      {
                      ?>
                      <option value="<?php echo $td_job_location;?>"><?php echo $td_job_location;?> </option>
                      <?php
                      }else{
                      ?>
                      <option value="">Lựa chọn tỉnh thành</option>
                      <?php
                      }
                      foreach ($job_province as $location) {
                      ?>
                      <option id="name"  value="<?php echo $location->id;?>"><?php echo $location->name;?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </span>
                  <script type="text/javascript">
                  jQuery(document).ready(function($) {
                  $(".input-submit").click(function() {
                  var city= $(".city").val();
                  if(city==""){
                  $( ".city" ).after( "<p id='err' style='color: red;font-size: 16px;'>Vui lòng chọn khu vực</p>" );
                  $(".city").focus();
                  return false;
                  }
                  else
                  {
                  $( "#err" ).hide();
                  return true;
                  }
                  });
                  });
                  jQuery(document).ready(function($) {
                  $(".input-submit").click(function() {
                  var name_jobs= $("#information-inputName").val();
                  if(name_jobs==""){
                  $( "#information-inputName" ).after( "<p id='errors' style='color: red;font-size: 16px;'>Vui lòng nhập tiêu đề tuyển dụng</p>" );
                  $("#information-inputName").focus();
                  return false;
                  }
                  else
                  {
                  $( "#errors" ).hide();
                  return true;
                  }
                  });
                  });
                  </script>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Quận/Huyện:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <select class="input-lg" name="dictrict" id="dictrict" style="width: 100%; margin-right: 10px;" >
                      <?php
                      if($dictrict !="")
                      {
                      ?>
                      <option value="<?php echo $dictrict;?>"><?php echo $dictrict;?> </option>
                      <?php
                      }else{
                      ?>
                      <option value="">Lựa chọn quận huyện</option>
                      <?php
                      }
                      ?>
                    </select>
                  </span>
                  <input name="post_id" id="post_id" type="hidden" size="25" value="3190">
                  <script type="text/javascript">
                  jQuery(document).ready(function($) {
                  $(".dictrict").change(function() {
                  var id= $(".dictrict :selected").text();
                  $("#value").val(id);
                  });
                  });
                  </script>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Hạn nộp:</h3>
                  </span>
                  <span class="three_fifth " >
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input id="expired_at" class="input-lg" value="<?php echo $td_job_date_expired; ?>" type="date" name="expired_at" vk_1ffd1="subscribed">
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Công ty:</h3>
                  </span>
                  <span class="three_fifth select-wrapper" ><i class="fa fa-building"></i>
                    <select class="input-lg" name="job_company" id="job_company" style="width: 100%;">
                      <?php
                      foreach ($companies as $company) {
                      $comp_id = $company->ID;
                      $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
                      ?>
                      <option value='<?php echo $comp_id; ?>' <?php global $td_job_company;
                      selected($td_job_company, $comp_id); ?>><?php echo $wpjobus_company_fullname; ?></option>
                      <?php }
                      ?>
                    </select>
                  </span>
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="information-add-edit">
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Mô tả công việc:</h3>
                  </span>
                </span>
                <textarea id="postContent" rows="10" name="postContent"><?php echo $resume_about_me; ?></textarea>
                <p id="err_postContent"></p>
              </div>
              <span class="full" style="margin-bottom: 0;">
                <span class="full" style="margin-bottom: 0;">
                  <h3><i class="fa fa-picture-o"></i><?php _e( 'Cover Image:', 'themesdojo' ); ?></h3>
                </span>
                <input type="file" name="wpjobus_job_cover_image" id="file" onchange="upload();return false;">
                <div  id="imgstore">
                  <?php
                  if($wpjobus_job_cover_image !="")
                  {
                  ?>
                  <img src="<?php echo $wpjobus_job_cover_image; ?>" width="400" height="250"/>
                  <?php
                  }
                  ?>
                </div>
                <script type="text/javascript">
                function upload(){
                var formData = new FormData();
                formData.append("action", "upload-attachment");
                var fileInputElement = document.getElementById("file");
                formData.append("async-upload", fileInputElement.files[0]);
                formData.append("name", fileInputElement.files[0].name);
                //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
                <?php $my_nonce = wp_create_nonce('media-form'); ?>
                formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange=function(){
                if (xhr.readyState==4 && xhr.status==200){
                console.log(xhr.responseText);
                }
                }
                xhr.open("POST","/wp-admin/async-upload.php",true);
                xhr.send(formData);
                }
                </script>
                <script>
                function imageHandler(e2)
                {
                var store = document.getElementById('imgstore');
                store.innerHTML='<img width="400" height="250" src="' + e2.target.result +'">';
                }
                function loadimage(e1)
                {
                var filename = e1.target.files[0];
                var fr = new FileReader();
                fr.onload = imageHandler;
                fr.readAsDataURL(filename);
                }
                window.onload=function()
                {
                var x = document.getElementById("filebrowsed");
                var y = document.getElementById("file");
                y.addEventListener('change', loadimage, false);
                }
                </script>
              </span>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="price-welfare">
          <div class="title-top">
            <h1 class="resume-section-title"><i class="fa fa-money"></i>Lương &amp; Phúc Lợi</h1>
            <h3 class="resume-section-subtitle" >Hãy để mọi người biết những lợi ích bạn cung cấp.</h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="price-welfare-1">
                <span class="label-title" >
                  <h3>Mức lương:</h3>
                </span>
                <span class="price-welfare-day" >
                  <i class="fa fa-usd" aria-hidden="true"></i>
                  <select class="input-lg select2" id="remuneration" name="wpjobus_job_remuneration" style="width: 100%;float: left;">
                    <?php
                    if($wpjobus_job_remuneration!="") {
                    $salary = $wpjobus_job_remuneration;
                    if ($salary == 2500000) {
                    $salary = "1-3 triệu";
                    }
                    if ($salary == 4000000) {
                    $salary = "3-5 triệu";
                    }
                    if ($salary == 6000000) {
                    $salary = "5-7 triệu";
                    }
                    if ($salary == 8500000) {
                    $salary = "7-10 triệu";
                    }
                    if ($salary == 11000000) {
                    $salary = "10-12 triệu";
                    }
                    if ($salary == 13500000) {
                    $salary = "12-15 triệu";
                    }
                    if ($salary == 17500000) {
                    $salary = "15-20 triệu";
                    }
                    if ($salary == 22500000) {
                    $salary = "20-25 triệu";
                    }
                    if ($salary == 27500000) {
                    $salary = "25-30 triệu";
                    }
                    if ($salary == 30000000) {
                    $salary = "30 triệu trở lên";
                    }
                    ?>
                    <option value="<?php echo $wpjobus_job_remuneration; ?>"><?php echo $salary; ?></option>
                    <?php
                    }
                    ?>
                    <option value="0">Thoả thuận</option>
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
                </span>
                <p id="error" style="color: red;display:none;font-size: 16px;"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="price-welfare-1">
                <span class="label-title" >
                  <h3>mỗi:</h3>
                </span>
                <span class="price-welfare-day" >
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <select class="input-lg select2" name="wpjobus_job_remuneration_per" id="wpjobus_job_remuneration_per" style="width: 100%;">
                    <?php
                    if($wpjobus_job_remuneration_per !="")
                    {
                    ?>
                    <option value="<?php echo $wpjobus_job_remuneration_per;?>"><?php echo $wpjobus_job_remuneration_per;?> </option>
                    <?php
                    }?>
                    <option value="Tháng">Tháng</option>
                    <option value="Giờ">Giờ</option>
                    <option value="Năm">Năm</option>
                    <option value="Dự án">Dự án</option>
                  </select>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="welfare" id="result_benefit">
          <h4 class="resume-section-subtitle" >Phúc lợi</h4>
          <div class="job_benefits">
            <?php
            $wpjobus_job_benefits = get_post_meta($job_id, 'wpjobus_job_benefits',true);
            $wpjobus_job_benefits_count=(count($wpjobus_job_benefits));
            for ($i = 0; $i < $wpjobus_job_benefits_count ; $i++) {
            ?>
            <div class="row_benefit" id="row_benefit-<?php echo $i+1; ?>">
              <div class="col-md-6">
                <div class="price-welfare-1">
                  <span class="label-title">
                    <h3>Tên phúc lợi <?php echo $i+1;?>:</h3>
                  </span>
                  <span class="price-welfare-day">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <input class="input-lg" type="text"  name='wpjobus_job_benefits[<?php echo $i; ?>][0]' value="<?php if (!empty($wpjobus_job_benefits[$i][0])) echo $wpjobus_job_benefits[$i][0]; ?>" placeholder="Nhập phúc lợi" vk_1ffd1="subscribed">
                  </span>
                  <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="price-welfare-1">
                  <span class="label-title">
                    <h3>Mô tả phúc lợi:</h3>
                  </span>
                  <span class="price-welfare-day">
                    <textarea row="20"  name='wpjobus_job_benefits[<?php echo $i; ?>][1]'  placeholder="Nhập nội dung mô tả">
                    <?php
                    if (!empty($wpjobus_job_benefits[$i][1])) echo $wpjobus_job_benefits[$i][1]; ?>
                    </textarea>
                  </span>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
          <div class="delete-add">
            <button type="button" class="delete_benefit"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
            <button type="button" class="add_benefit"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm khách phúc lợi</button>
          </div>
        </div>
        <div class="divider"></div>
        <div class="contact">
          <div class="title-top">
            <h1 class="resume-section-title"><i class="fa fa-envelope"></i>Chi tiết liên lạc</h1>
            <h3 class="resume-section-subtitle" >Chúng ta đã gần hoàn tất! Điền vào các thông tin liên lạc chính xác.</h3>
          </div>
          <div class="contact-details">
            <div class="row">
              <div class="col-xs-6">
                <div class="contact-input">
                  <span class="information-input">
                    <span class="label-title" >
                      <?php
                      foreach ($companies as $company) {
                      $comp_id = $company->ID;
                      $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
                      $wpjobus_company_address = esc_attr(get_post_meta($comp_id, 'wpjobus_company_address',true));
                      $wpjobus_company_phone = esc_attr(get_post_meta($comp_id, 'wpjobus_company_phone',true));
                      $wpjobus_company_website = esc_url(get_post_meta($comp_id, 'wpjobus_company_website',true));
                      $wpjobus_company_email = esc_attr(get_post_meta($comp_id, 'wpjobus_company_email',true));
                      $wpjobus_company_publish_email = esc_attr(get_post_meta($comp_id, 'wpjobus_company_publish_email',true));
                      $wpjobus_company_facebook = esc_url(get_post_meta($comp_id, 'wpjobus_company_facebook',true));
                      $wpjobus_company_linkedin = esc_url(get_post_meta($comp_id, 'wpjobus_company_linkedin',true));
                      $wpjobus_company_twitter = esc_url(get_post_meta($comp_id, 'wpjobus_company_twitter',true));
                      $wpjobus_company_googleplus = esc_url(get_post_meta($comp_id, 'wpjobus_company_googleplus',true));
                      $wpjobus_company_googleaddress = esc_attr(get_post_meta($postID, 'wpjobus_company_googleaddress',true));
                      $wpjobus_company_longitude = esc_attr(get_post_meta($postID, 'wpjobus_company_longitude',true));
                      $wpjobus_company_latitude = esc_attr(get_post_meta($postID, 'wpjobus_company_latitude',true));
                      ?>
                      <?php }
                      ?>
                      <h3>Địa chỉ:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-street-view" aria-hidden="true"></i>
                      <input type="text" name="wpjobus_job_address" id="wpjobus_job_address"  value="<?php echo $wpjobus_job_address ?:$wpjobus_company_address; ?>" class="input-textarea" placeholder="" vk_162b1="subscribed" >
                      <p id= "error_address"></p>
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Số điện thoại:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_phone" class="input-textarea" name="wpjobus_job_phone"  value="<?php echo $wpjobus_job_phone ?:$wpjobus_company_phone; ?> " placeholder="" vk_162b1="subscribed" >
                      <p id="err_number"></p>
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Website:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_website" class="input-textarea" name="wpjobus_job_website"  value="<?php echo $wpjobus_job_website ?:$wpjobus_company_website; ?> " placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Email:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <input type="email" id="wpjobus_job_email" class="input-textarea" name="wpjobus_job_email"  value="<?php echo $wpjobus_job_email ?:$wpjobus_company_email; ?>" placeholder="" vk_162b1="subscribed" >
                      <p id= "err_email"></p>
                      <span class="information-input" >
                        <input type="checkbox" class="" name="wpjobus_job_publish_email"  value="publish_email" placeholder="">Công khai địa chỉ email của tôi                 </span>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="contact-input">
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>Facebook:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_facebook" class="input-textarea" name="wpjobus_job_facebook"  value="<?php echo $wpjobus_job_facebook ?:$wpjobus_company_facebook; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>LinkedIn:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_linkedin" class="input-textarea" name="wpjobus_job_linkedin"  value="<?php echo $wpjobus_job_linkedin ?:$wpjobus_company_linkedin; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>Twitter:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_twitter" class="input-textarea" name="wpjobus_job_twitter"  value="<?php echo $wpjobus_job_twitter ?:$wpjobus_company_twitter; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>Google+:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_googleplus" class="input-textarea" name="wpjobus_job_googleplus"  value="<?php echo $wpjobus_job_googleplus ?:$wpjobus_company_googleplus; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <!--                <div class="button">-->
          <!--                  <p>-->
          <!--                    <button type="button" class="btn btn-default color-button">+ Thêm yêu cầu về kỹ năng cho tin tuyển dụng</button>-->
          <!--                    <button type="button" class="btn btn-default color-button">+ Thêm yêu cầu về kỹ năng cho tin tuyển dụng</button>-->
          <!--                  </p>-->
          <!--                </div>-->
          <div class="Skills-needed">
            <div class="title-top">
              <h1 class="resume-section-title"><i class="fa fa-bar-chart-o"></i>  Kỹ năng cần thiết</h1>
              <h3 class="resume-section-subtitle" >Mô tả các kỹ năng và chuyên môn cần thiết cho công việc này.</h3>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <span class="label-title" >
                    <h3>Kĩ năng giao tiếp:</h3>
                  </span>
                  <span class="Skills-needed-2" >
                    <i class="fa fa-bar-chart-o"></i>
                    <input type="text" id="review-name" class="" name="wpjobus_job_comm_level" vk_1ffd1="subscribed"  value="<?php echo $wpjobus_job_comm_level;?>" placeholder="70%">
                  </span>
                  <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <textarea placeholder="Ghi chú kỹ năng" rows="3" name="skillsNotes"><?php echo $wpjobus_job_comm_note; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <span class="label-title" >
                    <h3>Kĩ năng tổ chức:</h3>
                  </span>
                  <span class="Skills-needed-2" >
                    <i class="fa fa-bar-chart-o"></i>
                    <input  vk_1ffd1="subscribed" type="text" id="review-name" class="" name="wpjobus_job_org_level"  value="<?php echo $wpjobus_job_org_level;?>" placeholder="70%">
                  </span>
                  <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <textarea placeholder="Ghi chú kỹ năng" rows="3" name="orgNotes"><?php echo $wpjobus_job_org_note; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <span class="label-title" >
                    <h3>Kĩ năng liên quan đến công việc:</h3>
                  </span>
                  <span class="Skills-needed-2" >
                    <i class="fa fa-bar-chart-o"></i>
                    <input vk_1ffd1="subscribed" type="text" id="review-name" class="" name="wpjobus_job_job_rel_level"  value="<?php echo $wpjobus_job_job_rel_level;?>" placeholder="70%">
                  </span>
                  <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="Skills-needed-1">
                  <textarea rows="3" name="jobNotes" placeholder="Ghi chú kỹ năng"><?php echo $wpjobus_job_rel_note; ?></textarea>
                </div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="job_skills">
              <?php
              $wpjobus_job_skills = get_post_meta($job_id, 'wpjobus_job_skills',true);
              for ($i = 0; $i < (count($wpjobus_job_skills)); $i++) {
              ?>
              <div class="row_skill"  id="row_skill-<?php echo $i+1; ?>">
                <div class="col-md-6">
                  <div class="Skills-needed-1">
                    <span class="label-title">
                      <h3>Kĩ năng <?php echo $i+1;?> :</h3>
                    </span>
                    <span class="Skills-needed-2">
                      <i class="fa fa-bar-chart-o"></i>
                      <input class="input-lg" type="text"  name='wpjobus_job_skills[<?php echo $i; ?>][0]' value="<?php if (!empty($wpjobus_job_skills[$i][0])) echo $wpjobus_job_skills[$i][0]; ?>" placeholder="" vk_1ffd1="subscribed">
                    </span>
                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="Skills-needed-1">
                    <span class="label-title">
                      <h3>Giá trị :</h3>
                    </span>
                    <span class="Skills-needed-2">
                      <i class="fa fa-bar-chart-o"></i>
                      <input class="input-lg" type="text"  name='wpjobus_job_skills[<?php echo $i; ?>][1]' value="<?php if (!empty($wpjobus_job_skills[$i][1])) echo $wpjobus_job_skills[$i][1]; ?>" placeholder="70%" vk_1ffd1="subscribed">
                    </span>
                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
            </div>
            <div class="delete-add">
              <button type="button" class="delete_skill"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
              <button type="button" class="add_skill"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm kỹ năng</button>
            </div>
            <div class="divider"></div>
            <div class="col-md-6">
              <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Ngôn ngữ bản xứ :</h3>
                </span>
                <span class="Skills-needed-2" >
                  <i class="fa fa-language" aria-hidden="true"></i>
                  <input vk_1ffd1="subscribed" type='text' id="review-name" class='' name='wpjobus_job_native_language' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_job_native_language?:"Tiếng Việt";?>' placeholder="" />
                </span>
                <p id="error" style="color: red;display:none;font-size: 16px;"></p>
              </div>
            </div>
            <div class="divider"></div>
            <div class="job_languages">
              <?php
              $wpjobus_job_languages = get_post_meta($job_id, 'wpjobus_job_languages',true);
              for ($i = 0; $i < (count($wpjobus_job_languages)); $i++) {
              ?>
              <div class="row_language" id="row_language-<?php echo $i+1; ?>">
                <div class="col-xs-6">
                  <div class="contact-input">
                    <span class="information-input">
                      <span class="label-title">
                        <h3>Ngoại ngữ <?php echo $i+1;?>:</h3>
                      </span>
                      <span class="three_fifth">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <input type='text' id="wpjobus_job_languages[<?php echo $i; ?>][0]" class="resume_lang_title" name='wpjobus_job_languages[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_job_languages[$i][0])) echo $wpjobus_job_languages[$i][0]; ?>' placeholder="" />
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title">
                        <h3>Kĩ năng nói:</h3>
                      </span>
                      <span class="three_fifth">
                        <i class="fa fa-bullhorn"></i>
                        <select  vk_162b1="subscribed" vk_17ced="subscribed" class="resume_lang_speaking" name="wpjobus_job_languages[<?php echo $i; ?>][2]" id="wpjobus_job_languages[<?php echo $i; ?>][2]" style="width: 100%; margin-right: 10px;">
                          <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
                          <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
                          <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
                          <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
                          <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
                        </select>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="contact-input">
                    <span class="information-input">
                      <span class="label-title">
                        <h3>Thông thạo:</h3>
                      </span>
                      <span class="three_fifth">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <select  vk_162b1="subscribed" vk_17ced="subscribed" class="resume_lang_understanding" name="wpjobus_job_languages[<?php echo $i; ?>][1]" id="wpjobus_job_languages[<?php echo $i; ?>][1]" style="width: 100%; margin-right: 10px;">
                          <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
                          <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
                          <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
                          <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
                          <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
                        </select>
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title">
                        <h3>Kĩ năng viết:</h3>
                      </span>
                      <span class="three_fifth">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <select  vk_162b1="subscribed" vk_17ced="subscribed" class="resume_lang_writing" name="wpjobus_job_languages[<?php echo $i; ?>][3]" id="wpjobus_job_languages[<?php echo $i; ?>][3]" style="width: 100%; margin-right: 10px;">
                          <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
                          <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
                          <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
                          <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
                          <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
                        </select>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
            </div>
            <div class="delete-add">
              <button type="button" class="delete_language"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
              <button type="button" class="add_language"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm ngôn ngữ</button>
            </div>
            <div class="divider"></div>
            <div class="additional">
              <div class="information-input">
                <span class="label-title" >
                  <h3 class="skill-item-title">Yêu cầu bổ sung:</h3>
                </span>
                <span class="three_fifth">
                  <input type="text" id="review-name" class="" name="wpjobus_job_hobbies"  value="" placeholder="">
                  <span class="info-text" >Chèn nhiều yêu cầu và ngăn cách chúng bằng dấu phẩy</span>
                </span>
                <div class="divider" ></div>
                <div class="button">
                  <p>
                    <input type="submit" id="save_draf" name="save_draf" value="Lưu nháp"/>
                    <input type="submit" class="save_add_job" id="save_pending" name="save_pending" value="Gửi tin tuyển dụng để xem xét" />
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
if(isset($_POST['save_draf']))
{
global  $td_allowed;
global $wpdb;
if(isset($_GET['job_id']) !="")
{
$my_post = array(
'ID' => $_GET['job_id'],
'post_title' => $_POST['wpjobus_job_fullname'],
'post_status' => 'draft',
'post_type' => 'job',
'comment_status' => 'open',
'ping_status' => 'open',
);
wp_update_post( $my_post );
$td_post_id=$_GET['job_id'];
}
else{
$my_post = array(
'post_title' =>$_POST['wpjobus_job_fullname'],
'post_content' => strip_tags($_POST['postContent']),
'post_type' => 'job',
'comment_status' => 'open',
'ping_status' => 'open',
'post_status' => 'draft'
);
$td_post_id = wp_insert_post( $my_post );
}
$id_location=$_POST['job_location'];
$kq = $wpdb->get_results("SELECT * FROM job_province WHERE id='$id_location'");
foreach ($kq as $categories) {
$job_location=$categories->name;
}
$dictrict = esc_attr(get_post_meta($td_post_id, 'job_dictrict', true));
$name_company=$_POST['job_company'];
$kq_company = $wpdb->get_row("SELECT *FROM wp_posts WHERE post_type='company' AND post_title='$name_company'");
$id_company=$kq_company->ID;
if($id_company!="")
{
update_post_meta($td_post_id, 'job_company', wp_kses($id_company, $td_allowed));
}
if($job_location=="")
{
$job_location=$id_location;
}
if($_POST['wpjobus_job_cover_image'] !="")
{
$wpjobus_job_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_job_cover_image'];
}
else if($wpjobus_job_cover_image !="")
{
$wpjobus_job_cover_images=$wpjobus_job_cover_image;
}
//regular update
update_post_meta($td_post_id, 'job_dictrict' , wp_kses($_POST['dictrict'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_expired' , wp_kses($_POST["expired_at"], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'job_sex', wp_kses($_POST['job_sex'], $td_allowed));
update_post_meta($td_post_id, 'job_career_level', wp_kses($_POST['job_career_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_type', wp_kses($_POST['job_type'], $td_allowed));
update_post_meta($td_post_id, 'job_time_trial', wp_kses($_POST['job_time_trial'], $td_allowed));
update_post_meta($td_post_id, 'job_education', wp_kses($_POST['job_education'], $td_allowed));
update_post_meta($td_post_id, 'job_industry', wp_kses($_POST['job_industry'], $td_allowed));
update_post_meta($td_post_id, 'job_location', wp_kses($job_location, $td_allowed));
update_post_meta($td_post_id, 'job_company', wp_kses($_POST['job_company'], $td_allowed));
update_post_meta($td_post_id, 'job-about-me', htmlentities(stripslashes($_POST['postContent'])));
update_post_meta($td_post_id, 'job_years_of_exp', wp_kses($_POST['job_years_of_exp'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_cover_image', wp_kses($wpjobus_job_cover_images, $td_allowed));
//update_post_meta($td_post_id, 'wpjobus_job_prof_title', wp_kses($_POST['wpjobus_job_prof_title'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_skills', $_POST['wpjobus_job_skills']);
update_post_meta($td_post_id, 'wpjobus_job_comm_level', wp_kses($_POST['wpjobus_job_comm_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_comm_note', strip_tags($_POST['skillsNotes']));
update_post_meta($td_post_id, 'wpjobus_job_org_level', wp_kses($_POST['wpjobus_job_org_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_org_note', strip_tags($_POST['orgNotes']));
update_post_meta($td_post_id, 'wpjobus_job_job_rel_level', wp_kses($_POST['wpjobus_job_job_rel_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_job_rel_note', strip_tags($_POST['jobNotes']));
update_post_meta($td_post_id, 'wpjobus_job_native_language', wp_kses($_POST['wpjobus_job_native_language'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_languages', $_POST['wpjobus_job_languages']);
update_post_meta($td_post_id, 'wpjobus_job_hobbies', wp_kses($_POST['wpjobus_job_hobbies'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_benefits', $_POST['wpjobus_job_benefits']);
update_post_meta($td_post_id, 'wpjobus_job_remuneration', $_POST['wpjobus_job_remuneration']);
update_post_meta($td_post_id, 'wpjobus_job_remuneration_per', $_POST['wpjobus_job_remuneration_per']);
$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
$str = preg_replace('/\D/', '', $remuneration_ammount);
update_post_meta($td_post_id, 'wpjobus_job_remuneration_raw', $str);
update_post_meta($td_post_id, 'wpjobus_job_address', $_POST['wpjobus_job_address']);
update_post_meta($td_post_id, 'wpjobus_job_phone', $_POST['wpjobus_job_phone']);
update_post_meta($td_post_id, 'wpjobus_job_website', $_POST['wpjobus_job_website']);
update_post_meta($td_post_id, 'wpjobus_job_email', $_POST['wpjobus_job_email']);
update_post_meta($td_post_id, 'wpjobus_job_publish_email', $_POST['wpjobus_job_publish_email']);
update_post_meta($td_post_id, 'wpjobus_job_facebook', $_POST['wpjobus_job_facebook']);
update_post_meta($td_post_id, 'wpjobus_job_linkedin', $_POST['wpjobus_job_linkedin']);
update_post_meta($td_post_id, 'wpjobus_job_twitter', $_POST['wpjobus_job_twitter']);
update_post_meta($td_post_id, 'wpjobus_job_googleplus', $_POST['wpjobus_job_googleplus']);
update_post_meta($td_post_id, 'wpjobus_job_googleaddress', $_POST['wpjobus_job_googleaddress']);
?>
<script>
jQuery(document).ready(function ($) {
var url = "<?php echo home_url('/')."edit-job/?job_id=".$td_post_id.""?>";
location.href = url;
});
</script>
<?php
}
if(isset($_POST['save_pending']))
{
global  $td_allowed;
global $wpdb;
if(isset($_GET['job_id']) !="")
{
$my_post = array(
'ID' => $_GET['job_id'],
'post_title' => $_POST['wpjobus_job_fullname'],
'post_status' => 'pending',
'post_type' => 'job',
'comment_status' => 'open',
'ping_status' => 'open',
);
wp_update_post( $my_post );
$td_post_id=$_GET['job_id'];
}
else{
$my_post = array(
'post_title' =>$_POST['wpjobus_job_fullname'],
'post_content' => strip_tags($_POST['postContent']),
'post_type' => 'job',
'comment_status' => 'open',
'ping_status' => 'open',
'post_status' => 'pending'
);
$td_post_id = wp_insert_post( $my_post );
}
$id_location=$_POST['job_location'];
$kq = $wpdb->get_results("SELECT * FROM job_province WHERE id='$id_location'");
foreach ($kq as $categories) {
$job_location=$categories->name;
}
$dictrict = esc_attr(get_post_meta($td_post_id, 'job_dictrict', true));
$name_company=$_POST['job_company'];
$kq_company = $wpdb->get_row("SELECT *FROM wp_posts WHERE post_type='company' AND post_title='$name_company'");
$id_company=$kq_company->ID;
if($id_company!="")
{
update_post_meta($td_post_id, 'job_company', wp_kses($id_company, $td_allowed));
}
if($job_location=="")
{
$job_location=$id_location;
}
if($_POST['wpjobus_job_cover_image'] !="")
{
$wpjobus_job_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_job_cover_image'];
}
else if($wpjobus_job_cover_image !="")
{
$wpjobus_job_cover_images=$wpjobus_job_cover_image;
}
//regular update
update_post_meta($td_post_id, 'job_dictrict' , wp_kses($_POST['dictrict'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_expired' , wp_kses($_POST["expired_at"], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'job_sex', wp_kses($_POST['job_sex'], $td_allowed));
update_post_meta($td_post_id, 'job_career_level', wp_kses($_POST['job_career_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_type', wp_kses($_POST['job_type'], $td_allowed));
update_post_meta($td_post_id, 'job_time_trial', wp_kses($_POST['job_time_trial'], $td_allowed));
update_post_meta($td_post_id, 'job_education', wp_kses($_POST['job_education'], $td_allowed));
update_post_meta($td_post_id, 'job_industry', wp_kses($_POST['job_industry'], $td_allowed));
update_post_meta($td_post_id, 'job_location', wp_kses($job_location, $td_allowed));
update_post_meta($td_post_id, 'job_company', wp_kses($_POST['job_company'], $td_allowed));
update_post_meta($td_post_id, 'job-about-me', htmlentities(stripslashes($_POST['postContent'])));
update_post_meta($td_post_id, 'job_years_of_exp', wp_kses($_POST['job_years_of_exp'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_cover_image', wp_kses($wpjobus_job_cover_images, $td_allowed));
//update_post_meta($td_post_id, 'wpjobus_job_prof_title', wp_kses($_POST['wpjobus_job_prof_title'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_skills', $_POST['wpjobus_job_skills']);
update_post_meta($td_post_id, 'wpjobus_job_comm_level', wp_kses($_POST['wpjobus_job_comm_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_comm_note', strip_tags($_POST['skillsNotes']));
update_post_meta($td_post_id, 'wpjobus_job_org_level', wp_kses($_POST['wpjobus_job_org_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_org_note', strip_tags($_POST['orgNotes']));
update_post_meta($td_post_id, 'wpjobus_job_job_rel_level', wp_kses($_POST['wpjobus_job_job_rel_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_job_rel_note', strip_tags($_POST['jobNotes']));
update_post_meta($td_post_id, 'wpjobus_job_native_language', wp_kses($_POST['wpjobus_job_native_language'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_languages', $_POST['wpjobus_job_languages']);
update_post_meta($td_post_id, 'wpjobus_job_hobbies', wp_kses($_POST['wpjobus_job_hobbies'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_job_benefits', $_POST['wpjobus_job_benefits']);
update_post_meta($td_post_id, 'wpjobus_job_remuneration', $_POST['wpjobus_job_remuneration']);
update_post_meta($td_post_id, 'wpjobus_job_remuneration_per', $_POST['wpjobus_job_remuneration_per']);
$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
$str = preg_replace('/\D/', '', $remuneration_ammount);
update_post_meta($td_post_id, 'wpjobus_job_remuneration_raw', $str);
update_post_meta($td_post_id, 'wpjobus_job_address', $_POST['wpjobus_job_address']);
update_post_meta($td_post_id, 'wpjobus_job_phone', $_POST['wpjobus_job_phone']);
update_post_meta($td_post_id, 'wpjobus_job_website', $_POST['wpjobus_job_website']);
update_post_meta($td_post_id, 'wpjobus_job_email', $_POST['wpjobus_job_email']);
update_post_meta($td_post_id, 'wpjobus_job_publish_email', $_POST['wpjobus_job_publish_email']);
update_post_meta($td_post_id, 'wpjobus_job_facebook', $_POST['wpjobus_job_facebook']);
update_post_meta($td_post_id, 'wpjobus_job_linkedin', $_POST['wpjobus_job_linkedin']);
update_post_meta($td_post_id, 'wpjobus_job_twitter', $_POST['wpjobus_job_twitter']);
update_post_meta($td_post_id, 'wpjobus_job_googleplus', $_POST['wpjobus_job_googleplus']);
update_post_meta($td_post_id, 'wpjobus_job_googleaddress', $_POST['wpjobus_job_googleaddress']);
?>
<script>
jQuery(document).ready(function ($) {
var url = "<?php echo home_url('/')."edit-job/?job_id=".$td_post_id.""?>";
location.href = url;
});
</script>
<?php
}
?>