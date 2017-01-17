<?php
global $wpdb,$post;
$upload_dir = wp_upload_dir();


$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
$postID = $_GET['resume_id'];
$td_current_post = $postID;

$post_author_id = get_post_field( 'post_author', $postID );

if($post_author_id == $td_user_id)  {

}
else {

    $user_error = 1;

}
$wpjobus_resume_cover_image = get_post_meta($td_current_post, 'wpjobus_resume_cover_image',true);
$wpjobus_resume_fullname = get_post_meta($td_current_post, 'wpjobus_resume_fullname',true);
$td_resume_gender = get_post_meta($td_current_post, 'resume_gender',true);
$td_resume_month_birth = get_post_meta($td_current_post, 'resume_month_birth',true);
$td_resume_day_birth = get_post_meta($td_current_post, 'resume_day_birth',true);
$td_resume_year_birth = get_post_meta($td_current_post, 'resume_year_birth',true);
$td_resume_location = get_post_meta($td_current_post, 'resume_location',true);
$td_resume_industry = get_post_meta($td_current_post, 'resume_industry',true);
$resume_about_me = html_entity_decode( get_post_meta($td_current_post, 'resume-about-me',true));
$td_resume_years_of_exp =get_post_meta($td_current_post, 'resume_years_of_exp',true);
$wpjobus_resume_profile_picture =get_post_meta($td_current_post, 'wpjobus_resume_profile_picture',true);

$wpjobus_resume_prof_title =get_post_meta($td_current_post, 'wpjobus_resume_prof_title',true);
$td_resume_career_level =get_post_meta($td_current_post, 'resume_career_level',true);

$wpjobus_resume_comm_level =get_post_meta($td_current_post, 'wpjobus_resume_comm_level',true);
$wpjobus_resume_comm_note =get_post_meta($td_current_post, 'wpjobus_resume_comm_note',true);

$wpjobus_resume_org_level =get_post_meta($td_current_post, 'wpjobus_resume_org_level',true);
$wpjobus_resume_org_note =get_post_meta($td_current_post, 'wpjobus_resume_org_note',true);

$wpjobus_resume_job_rel_level = get_post_meta($td_current_post, 'wpjobus_resume_job_rel_level',true);
$wpjobus_resume_job_rel_note = get_post_meta($td_current_post, 'wpjobus_resume_job_rel_note',true);

$wpjobus_resume_skills = get_post_meta($td_current_post, 'wpjobus_resume_skills',true);
$wpjobus_resume_native_language = esc_attr(get_post_meta($td_current_post, 'wpjobus_resume_native_language',true));
$wpjobus_resume_languages = get_post_meta($td_current_post, 'wpjobus_resume_languages',true);

$wpjobus_resume_hobbies =get_post_meta($td_current_post, 'wpjobus_resume_hobbies',true);

$wpjobus_resume_education = get_post_meta($td_current_post, 'wpjobus_resume_education',true);
$wpjobus_resume_award = get_post_meta($td_current_post, 'wpjobus_resume_award',true);
$wpjobus_resume_work = get_post_meta($td_current_post, 'wpjobus_resume_work',true);
$wpjobus_resume_testimonials = get_post_meta($td_current_post, 'wpjobus_resume_testimonials',true);


$wpjobus_resume_file =get_post_meta($td_current_post, 'wpjobus_resume_file',true);
$wpjobus_resume_file_name =get_post_meta($td_current_post, 'wpjobus_resume_file_name',true);

$wpjobus_resume_remuneration =get_post_meta($td_current_post, 'wpjobus_resume_remuneration',true);
$wpjobus_resume_remuneration_per =get_post_meta($td_current_post, 'wpjobus_resume_remuneration_per',true);

$wpjobus_resume_job_type =get_post_meta($td_current_post, 'wpjobus_resume_job_type',true);

$wpjobus_resume_job_freelance =get_post_meta($td_current_post, 'wpjobus_resume_job_freelance',true);
$wpjobus_resume_job_part_time =get_post_meta($td_current_post, 'wpjobus_resume_job_part_time',true);
$wpjobus_resume_job_full_time =get_post_meta($td_current_post, 'wpjobus_resume_job_full_time',true);
$wpjobus_resume_job_internship =get_post_meta($td_current_post, 'wpjobus_resume_job_internship',true);
$wpjobus_resume_job_volunteer =get_post_meta($td_current_post, 'wpjobus_resume_job_volunteer',true);

$wpjobus_resume_portfolio =$resume["wpjobus_resume_portfolio"];


$wpjobus_resume_address =get_post_meta($td_current_post, 'wpjobus_resume_address',true);
$wpjobus_resume_phone =get_post_meta($td_current_post, 'wpjobus_resume_phone',true);
$wpjobus_resume_website =get_post_meta($td_current_post, 'wpjobus_resume_website',true);
$wpjobus_resume_email =get_post_meta($td_current_post, 'wpjobus_resume_email',true);
$wpjobus_resume_publish_email =get_post_meta($td_current_post, 'wpjobus_resume_publish_email',true);
$wpjobus_resume_facebook =get_post_meta($td_current_post, 'wpjobus_resume_facebook',true);
$wpjobus_resume_linkedin =get_post_meta($td_current_post, 'wpjobus_resume_linkedin',true);
$wpjobus_resume_twitter =get_post_meta($td_current_post, 'wpjobus_resume_twitter',true);
$wpjobus_resume_googleplus =get_post_meta($td_current_post, 'wpjobus_resume_googleplus',true);

$wpjobus_resume_googleaddress =get_post_meta($td_current_post, 'wpjobus_resume_googleaddress',true);

$wpjobus_resume_longitude =get_post_meta($td_current_post, 'wpjobus_resume_longitude',true);
if (empty($wpjobus_resume_longitude)) {
    $wpjobus_resume_longitude = 0;
}

$wpjobus_resume_latitude =get_post_meta($td_current_post, 'wpjobus_resume_latitude',true);
if (empty($wpjobus_resume_latitude)) {
    $wpjobus_resume_latitude = 0;
}

?>
    <style>
        #file_cv,#file_product{
            border: none;
        }
        #file_logo,#file_cover {
            border: none;
        }
        input#save_pending {
            width: 100%;
            margin-bottom: 10px;
            border: none;
            background: #16a085;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding-left: 0 !important;
        }
        input#save_draf {
            width: 100%;
            margin-bottom: 10px;
            border: none;
            background: #428bca;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding-left: 0 !important;
        }
        #userNameError, #err_email, #error_address, #err_postContent, #err_number {
            color:red;
        }
    </style>
    <div class="main-content">
        <div class="">
            <form method="post">
                <div class="add-edit">
                    <div class="title-top">
                        <h1 class="resume-section-title"><i class="fa fa-file-text-o"></i>  Cập nhật hồ sơ cá nhân</h1>
                        <h3 class="resume-section-subtitle" >Hãy điền các thông tin dưới đây. Bạn sẽ có một trang lý lịch hoàn hảo!</h3>
                    </div>
                    <div class="form-input">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="information-add-edit">
              <span class="information-input">
                <span class="label-title" >
                  <h3>Họ và tên</h3>
                </span>
                <span class="three_fifth " >
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                  <input class="input-lg" type="text" name="wpjobus_resume_fullname" id="wpjobus_resume_fullname" value="<?php echo $wpjobus_resume_fullname; ?>" placeholder="Nhập họ và tên"  vk_1ffd1="subscribed">
                  <p id="userNameError"></p>
                </span>
              </span>
                                    <span class="information-input" >
                <span class="label-title" >
                  <h3>Giới tính:</h3>
                </span>
                <span class="three_fifth  " >
                  <i class="fa fa-transgender" aria-hidden="true"></i>
                  <select class="input-lg select2" name="resume_gender" id="job_sex" style="width: 100%;">
                      <?php
                      if($td_resume_gender !="")
                      {
                          ?>
                          <option value="<?php echo $td_resume_gender; ?> "><?php echo $td_resume_gender; ?> </option>
                          <?php
                      }
                      ?>
                      <option value="Nam ">Nam </option>
                    <option value="Nữ">Nữ</option>
                    <option value="Không yêu cầu">Không yêu cầu</option>
                  </select>
                </span>
              </span>
                                    <span class="information-input" >
                <span class="label-title" >
                  <h3>Ngày sinh:</h3>
                </span>
                <span class="three_fifth" >
                  <select class="birthday select2"name="resume_month_birth" id="resume_month_birth"  class="valid">
                      <?php
                      for ($i=0;$i<12;$i++) {
                          ?>
                          <option <?php if( $td_resume_month_birth == $i+1 ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                          <?php
                      }
                      ?>
                  </select>
                  <select class="birthday select2" name="resume_day_birth" id="resume_day_birth" >
                  <?php
                  for ($i=0;$i<31;$i++) {
                      ?>
                      <option  <?php if( $td_resume_day_birth == $i+1 ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                      <?php
                  }
                  ?>
                  </select>
                  <select class="birthday select2" name="resume_year_birth" id="resume_year_birth" >
                      <?php
                      if($td_resume_year_birth !="")
                      {
                          ?>
                          <option value="<?php echo $td_resume_year_birth; ?>"><?php echo $td_resume_year_birth; ?></option>
                          <?php
                      }
                      ?>
                      <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1948">1948</option>
                    <option value="1947">1947</option>
                    <option value="1946">1946</option>
                    <option value="1945">1945</option>
                    <option value="1944">1944</option>
                    <option value="1943">1943</option>
                    <option value="1942">1942</option>
                    <option value="1941">1941</option>
                    <option value="1940">1940</option>
                    <option value="1939">1939</option>
                    <option value="1938">1938</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1935">1935</option>
                    <option value="1934">1934</option>
                  </select>
                </span>
              </span>
                                    <span class="information-input" >
                <span class="label-title " >
                  <h3>Số năm kinh nghiệm:</h3>
                </span>
                <span class="three_fifth " >
                  <i class="fa fa-suitcase" aria-hidden="true"></i>
                  <select class="input-lg select2" name="resume_years_of_exp" id="job_years_of_exp" style="width: 100%;">
                      <?php
                      if($td_resume_years_of_exp !="")
                      {
                          ?>
                          <option value="<?php echo $td_resume_years_of_exp ?>"><?php echo $td_resume_years_of_exp ?></option>
                          <?php
                      }
                      else{
                          ?>
                          <option value="">Không yêu cầu</option>
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
                <span class="three_fifth  " >
                  <i class="fa fa-tasks" aria-hidden="true"></i>
                  <select class="input-lg select2" name="resume_industry" id="job_industry" style="width: 100%; margin-right: 10px;">
                   <?php
                   foreach ($job_field as $industry) {
                       ?>
                       <option  <?php if( $td_resume_industry == $industry->name ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $industry->name; ?>"><?php echo $industry->name; ?></option>
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
                <span class="three_fifth   " >
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <select name="resume_location" class="city input-lg select2" id="job_location" style="width: 100%; margin-right: 10px;">
                      <?php
                      foreach ($job_province as $location) {

                          ?>
                          <option id="name" <?php if( $td_resume_location == $location->name ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                          <?php
                      }

                      ?>
                  </select>
                </span>
              </span>
                                    <span class="information-input" >
                <span class="label-title" >
                  <h3>File CV (PDF, doc)</h3>
                </span>
                <span class="three_fifth" >
                  <i class="fa fa-file" aria-hidden="true"></i>
                  <input type="text" value="<?php echo $wpjobus_resume_file;?>" name="wpjobus_resume_file" id="cv_name" class="input-textarea file-name" placeholder="" >
                    <input onchange="upload_file_cv();return false;" type="file" id="file_cv" name="wpjobus_company_profile_picture" value="">

                    <script>
                          function upload_file_cv() {
                              var formData = new FormData();
                              formData.append("action", "upload-attachment");

                              var fileInputElement = document.getElementById("file_cv");
                              formData.append("async-upload", fileInputElement.files[0]);
                              formData.append("name", fileInputElement.files[0].name);

                              //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
                              <?php $my_nonce = wp_create_nonce('media-form'); ?>
                              formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
                              var xhr = new XMLHttpRequest();
                              xhr.onreadystatechange = function () {
                                  if (xhr.readyState == 4 && xhr.status == 200) {
                                      console.log(xhr.responseText);
                                  }
                              }
                              xhr.open("POST", "/wp-admin/async-upload.php", true);
                              xhr.send(formData);
                          }

                          $('#file_cv').change( function(event) {
                              var src= $('#file_cv').val();
                              var file= src.match(/[-_\w]+[.][\w]+$/i)[0];
                              var upload_file="<?php echo $upload_dir['url'];?>/"+ file;
                              $('#cv_name').val(upload_file);
                          });
                      </script>
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
                                    <textarea id="postContent" rows="5" name="postContent" ><?php echo  $resume_about_me ?></textarea>
                                    <p id="err_postContent"></p>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
              <span class="img-upload" >
                  <span class="label-title" >
                    <h3><i class="fa fa-camera"></i> Ảnh đại diện:</h3>
                      <input onchange="upload_logo();return false;" type="file" id="file_logo" name="wpjobus_resume_profile_picture" value="">
                      <?php
                      if($wpjobus_resume_profile_picture !="")
                      {
                          ?>
                          <img id="img_logo" src="<?php echo $wpjobus_resume_profile_picture; ?>" width="200"/>

                          <?php
                      }
                      else{
                          ?>
                          <img id="img_logo" src="" width="200" style="display:none;" />

                          <?php

                      }
                      ?>
                      <script>
                          function upload_logo() {
                              var formData = new FormData();
                              formData.append("action", "upload-attachment");

                              var fileInputElement = document.getElementById("file_logo");
                              formData.append("async-upload", fileInputElement.files[0]);
                              formData.append("name", fileInputElement.files[0].name);

                              //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
                              <?php $my_nonce = wp_create_nonce('media-form'); ?>
                              formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
                              var xhr = new XMLHttpRequest();
                              xhr.onreadystatechange = function () {
                                  if (xhr.readyState == 4 && xhr.status == 200) {
                                      console.log(xhr.responseText);
                                  }
                              }
                              xhr.open("POST", "/wp-admin/async-upload.php", true);
                              xhr.send(formData);
                          }

                          $('#file_logo').change( function(event) {
                              $("#img_logo").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
                          });
                      </script>

                  </span>
                </span>
                            </div>
                            <div class="col-md-6">
               <span class="img-upload" >
                  <span class="label-title" >
                    <h3><i class="fa fa-picture-o"></i>  Ảnh bìa:</h3>
                    <input onchange="upload_cover();return false;"  name="wpjobus_resume_cover_image"  type="file" id="file_cover" value="">
                      <?php
                      if($wpjobus_resume_cover_image !="")
                      {
                          ?>
                          <img id="img_cover" src="<?php echo $wpjobus_resume_cover_image; ?>" width="200" />

                          <?php
                      }
                      else{
                          ?>
                          <img id="img_cover" src="" width="200" style="display:none;" />

                          <?php

                      }
                      ?>
                      <script>
                             function upload_cover() {
                                 var formData = new FormData();
                                 formData.append("action", "upload-attachment");

                                 var fileInputElement = document.getElementById("file_cover");
                                 formData.append("async-upload", fileInputElement.files[0]);
                                 formData.append("name", fileInputElement.files[0].name);

                                 //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
                                 <?php $my_nonce = wp_create_nonce('media-form'); ?>
                                 formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
                                 var xhr = new XMLHttpRequest();
                                 xhr.onreadystatechange = function () {
                                     if (xhr.readyState == 4 && xhr.status == 200) {
                                         console.log(xhr.responseText);
                                     }
                                 }
                                 xhr.open("POST", "/wp-admin/async-upload.php", true);
                                 xhr.send(formData);
                             }
                             $('#file_cover').change( function(event) {
                                 $("#img_cover").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
                             });
                      </script>

                  </span>
                </span>
                            </div>

                        </div>
                    </div>

                    <div class="divider"></div>
                    <div class="contact">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-envelope"></i>Chi tiết liên lạc</h1>
                            <h3 class="resume-section-subtitle" >Chúng ta đã gần hoàn tất! Điền vào các thông tin liên lạc chính xác.</h3>
                        </div>
                        <div class="contact-details">
                            <div class="">
                                <div class="">
                                    <div class="contact-input">
                <span class="information-input">
                  <span class="label-title" >
                    <h3>Địa chỉ:</h3>
                  </span>
                  <span class="three_fifth" >
                    <i class="fa fa-street-view" aria-hidden="true"></i>
                    <input type="text" name="wpjobus_resume_address" id="wpjobus_resume_address"  value="<?php echo $wpjobus_resume_address;?>" class="input-textarea" placeholder="" vk_162b1="subscribed">
                    <p id="error_address"></p>
                  </span>
                </span>
                                        <span class="information-input">
                  <span class="label-title" >
                    <h3>Số điện thoại:</h3>
                  </span>
                  <span class="three_fifth" >
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="text" id="wpjobus_job_phone" class="input-textarea" name="wpjobus_resume_phone"  value="<?php echo $wpjobus_resume_phone; ?>" placeholder="" vk_162b1="subscribed" >
                    <p id="err_number"></p>
                  </span>
                </span>
                                        <span class="information-input">
                  <span class="label-title" >
                    <h3>Website:</h3>
                  </span>
                  <span class="three_fifth" >
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <input type="text" id="wpjobus_job_website" class="input-textarea" name="wpjobus_resume_website"  value="<?php echo $wpjobus_resume_website; ?>" placeholder="" vk_162b1="subscribed">
                  </span>
                </span>
                                        <span class="information-input">
                  <span class="label-title" >
                    <h3>Email:</h3>
                  </span>
                  <span class="three_fifth" >
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="email" id="wpjobus_resume_email" class="input-textarea" name="wpjobus_resume_email"  value="<?php echo $wpjobus_resume_email; ?>" placeholder="" vk_162b1="subscribed">
                    <p id="err_email"></p>
                    <span class="information-input" >
                      <input type="checkbox" class="" name="wpjobus_resume_publish_email"  value="publish_email" <?php if (!empty($wpjobus_resume_publish_email)) { ?>checked<?php } ?> placeholder="">Công khai địa chỉ email của tôi </span>
                    </span>
                  </span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="contact-input">
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Facebook:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-facebook-square" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_facebook" class="input-textarea" name="wpjobus_resume_facebook"  value="<?php echo $wpjobus_resume_facebook; ?>" placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                                        <span class="information-input">
                    <span class="label-title" >
                      <h3>LinkedIn:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-link" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_linkedin" class="input-textarea" name="wpjobus_resume_linkedin"  value="<?php echo $wpjobus_resume_linkedin;?>" placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                                        <span class="information-input">
                    <span class="label-title" >
                      <h3>Twitter:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_twitter" class="input-textarea" name="wpjobus_resume_twitter"  value="<?php echo $wpjobus_resume_twitter; ?>" placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                                        <span class="information-input">
                    <span class="label-title" >
                      <h3>Google+:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-google-plus" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_googleplus" class="input-textarea" name="wpjobus_resume_googleplus"  value="<?php echo $wpjobus_resume_googleplus ;?>" placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                                    </div>
                                </div>
                            </div>
                            <!--            <div class="information-input">-->
                            <!--              <span class="label-title" >-->
                            <!--                <h3>Địa chỉ Google Maps:</h3>-->
                            <!--              </span>-->
                            <!--              <span class="three_fifth" >-->
                            <!--                <i class="fa fa-map-marker" aria-hidden="true"></i>-->
                            <!--                <input type="text" id="address" class="input-textarea ui-autocomplete-input" name="wpjobus_job_googleaddress" style="width: 100%; float: left; margin-bottom: 0;" value="" placeholder="" autocomplete="off" vk_11212="subscribed">-->
                            <!--                <p class="help-block">Bắt đầu nhập một địa chỉ và chọn từ danh sách thả xuống.</p>-->
                            <!--              </span>-->
                            <!--            </div>-->
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="divider"></div>
                    <div class="Skills-needed">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-bar-chart-o"></i>  Kĩ năng</h1>
                            <h3 class="resume-section-subtitle" >Mô tả một cách sáng tạo về những kĩ năng của bạn</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Năng lực chuyên môn:</h3>
                </span>
                                    <span class="Skills-needed-2" >
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  <input class="input-lg" type="text" name="wpjobus_resume_prof_title"  value="<?php echo $wpjobus_resume_prof_title;?>" placeholder=""  vk_1ffd1="subscribed">
                </span>
                                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                </div>
                                <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Kĩ năng giao tiếp:</h3>
                </span>
                                    <span class="Skills-needed-2" >
                  <i class="fa fa-bar-chart-o"></i>
                  <input class="input-lg" type="text" name="wpjobus_resume_comm_level"  value="<?php echo $wpjobus_resume_comm_level;?>" placeholder="70%"  vk_1ffd1="subscribed">
                </span>
                                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                </div>
                                 <div class="Skills-needed-1">
                                    <textarea  rows="3" name="skillsNotes" placeholder="Ghi chú"><?php echo $wpjobus_resume_comm_note; ?></textarea>

                                </div>

                                <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Kĩ năng tổ chức:</h3>
                </span>
                                    <span class="Skills-needed-2" >
                  <i class="fa fa-bar-chart-o"></i>
                  <input class="input-lg" type="text" name="wpjobus_resume_org_level" value="<?php echo $wpjobus_resume_org_level; ?>" placeholder="70%"  vk_1ffd1="subscribed">
                </span>
                                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                </div>
                                 <div class="Skills-needed-1">
                                    <textarea  rows="3" name="orgNotes" placeholder="Ghi chú"><?php echo $wpjobus_resume_org_note; ?></textarea>

                                </div>
                                <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Kĩ năng liên quan đến công việc:</h3>
                </span>
                                    <span class="Skills-needed-2" >
                  <i class="fa fa-bar-chart-o"></i>
                  <input class="input-lg" type="text" name="wpjobus_resume_job_rel_level"  value="<?php echo $wpjobus_resume_job_rel_level;?>" placeholder="70%"  vk_1ffd1="subscribed">
                </span>
                                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                </div>
                                 <div class="Skills-needed-1">
                                    <textarea  rows="3" name="jobNotes" placeholder="Ghi chú"><?php echo $wpjobus_resume_job_rel_note; ?></textarea>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="Skills-needed-1">
                <span class="label-title" >
                  <h3>Cấp bậc:</h3>
                </span>
                                    <span class="Skills-needed-2" >
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  <select name="resume_career_level select2" id="resume_career_level" class="valid">
                      <?php
                      if($td_resume_career_level !="")
                      {
                          ?>
                          <option value="<?php echo $td_resume_career_level; ?>"><?php echo $td_resume_career_level; ?></option>
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
                                    <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                </div>
                               
                               
                               

                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="resume_skills">
                            <?php

                            $wpjobus_resume_skills = get_post_meta($postID, 'wpjobus_resume_skills',true);

                            for ($i = 0; $i < (count($wpjobus_resume_skills)); $i++) {

                                ?>
                                <div class="row_resume_skill">
                                    <div class="col-md-6">
                                        <div class="Skills-needed-1">
              <span class="label-title">
                <h3>Kĩ năng <?php echo $i + 1; ?> :</h3>
              </span>
                                            <span class="Skills-needed-2">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
				<input type='text' id='wpjobus_resume_skills[<?php echo $i; ?>][0]' name='wpjobus_resume_skills[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_skills[$i][0])) echo $wpjobus_resume_skills[$i][0]; ?>' class='criteria_name' placeholder="Title">
              </span>
                                            <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="Skills-needed-1">
              <span class="label-title">
                <h3>Giá trị:</h3>
              </span>
                                            <span class="Skills-needed-2">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
				<input type='text' id='wpjobus_resume_skills[<?php echo $i; ?>][1]' name='wpjobus_resume_skills[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_skills[$i][1])) {echo $wpjobus_resume_skills[$i][1];} ?>' class='slider_value' placeholder="70%">
              </span>
                                            <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="divider"></div>

                        <div class="delete-add">
                            <button type="button" class="delete_resume_skill"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_resume_skill"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm kỹ năng mới</button>
                        </div>
                        <div class="divider"></div>
                        <div class="col-md-6">
                            <div class="Skills-needed-1">
              <span class="label-title" >
                <h3>Ngôn ngữ bản xứ :</h3>
              </span>
                                <span class="Skills-needed-2" >
                <i class="fa fa-language" aria-hidden="true"></i>
                <input class="input-lg" type="text" name="wpjobus_resume_native_language"  value="<?php echo $wpjobus_resume_native_language; ?>" placeholder=""  vk_1ffd1="subscribed">
              </span>
                                <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="resume_languages">
                            <?php

                            $wpjobus_resume_languages = get_post_meta($postID, 'wpjobus_resume_languages',true);

                            for ($i = 0; $i < (count($wpjobus_resume_languages)); $i++) {

                                ?>
                                <div class="row_resume_language">
                                    <div class="col-xs-6">
                                        <div class="contact-input">
                <span class="information-input">
                  <span class="label-title">
                      <h3>Ngôn ngữ <?php echo $i+1;?>:</h3>
                  </span>
                  <span class="three_fifth">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <input type='text' id="wpjobus_resume_languages[<?php echo $i; ?>][0]" class="resume_lang_title" name='wpjobus_resume_languages[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_languages[$i][0])) echo $wpjobus_resume_languages[$i][0]; ?>' placeholder="" />

                  </span>
                </span>
                                            <span class="information-input">
                  <span class="label-title">
                    <h3>Kĩ năng nói:</h3>
                  </span>
                  <span class="three_fifth">
                    <i class="fa fa-bullhorn"></i>
               <select class="resume_lang_speaking select2" name="wpjobus_resume_languages[<?php echo $i; ?>][2]" id="wpjobus_resume_languages[<?php echo $i; ?>][2]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
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
                <select class="resume_lang_understanding select2" name="wpjobus_resume_languages[<?php echo $i; ?>][1]" id="wpjobus_resume_languages[<?php echo $i; ?>][1]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
                  </span>
                </span>
                                            <span class="information-input">
                  <span class="label-title">
                    <h3>Kĩ năng viết:</h3>
                  </span>
                  <span class="three_fifth">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  <select class="resume_lang_writing select2" name="wpjobus_resume_languages[<?php echo $i; ?>][3]" id="wpjobus_resume_languages[<?php echo $i; ?>][3]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
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
                            <button type="button" class="delete_resume_language"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_resume_language"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm ngôn ngữ mới</button>
                        </div>
                        <div class="divider"></div>
                        <div class="additional">
                            <div class="information-input">
              <span class="label-title" >
                <h3 class="skill-item-title">Sở thích:</h3>
              </span>
                                <span class="three_fifth">
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
				<input type='text' id="review-name" class='' name='wpjobus_resume_hobbies' style="width: 100%; float: left; margin-bottom: 0;" value='<?php global $wpjobus_resume_hobbies; echo $wpjobus_resume_hobbies; ?>' placeholder="" />
                <span class="info-text" >Chèn nhiều yêu cầu và ngăn cách chúng bằng dấu phẩy</span>
              </span>
                                <div class="divider" ></div>
                            </div>
                        </div>
                    </div>
                    <div class="education">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-university"></i>  Giáo dục</h1>
                            <h3 class="resume-section-subtitle" >Điền những thông tin về học vấn của bạn ở các mục bên dưới.</h3>
                        </div>
                        <div class="resume_education">
                            <?php

                            $wpjobus_resume_education = get_post_meta($postID, 'wpjobus_resume_education',true);

                            for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {

                                ?>
                                <div class="row_resume_education">
                                    <div class="row_resume_education">
                <span class="information-input">
            <h3>Tổ chức giáo dục <?php echo $i+1;?></h3>
          </span>
                                        <div class="row">
                                            <div class="col-md-6">
              <span class="information-input">
                <span class="label-title">
                  <h3>Tên tổ chức giáo dục</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-users" aria-hidden="true"></i>

  <input type='text' id="wpjobus_resume_education[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_education[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_education[$i][0])) echo $wpjobus_resume_education[$i][0]; ?>' placeholder="" />

                </span>
              </span>
                                                <span class="information-input">
                <span class="label-title">
                  <h3>Giai đoạn</h3>
                </span>
                <span class="three_fifth">
          <input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][2]' name='wpjobus_resume_education[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_education[$i][2])) echo $wpjobus_resume_education[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%"> <span style="float: left; margin: 10px;">
            
          </span> - <input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][3]' name='wpjobus_resume_education[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_education[$i][3])) echo $wpjobus_resume_education[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%">

                </span>
              </span>
                                                <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Tỉnh thành:</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
               	<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][4]' name='wpjobus_resume_education[<?php echo $i; ?>][4]' value='<?php if (!empty($wpjobus_resume_education[$i][4])) echo $wpjobus_resume_education[$i][4]; ?>' class='criteria_location' placeholder="" style="width: 100%;">

                </span>
              </span>
                                            </div>
                                            <div class="col-md-6">

              <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Chuyên môn</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-briefcase" aria-hidden="true"></i>
                 <input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][1]' name='wpjobus_resume_education[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_education[$i][1])) echo $wpjobus_resume_education[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">

                </span>
              </span>
                                                <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Ghi chú</h3>
                </span>
                <span class="three_fifth">
               <textarea class="criteria_notes" name="wpjobus_resume_education[<?php echo $i; ?>][5]" id='wpjobus_resume_education[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_education[$i][5])) echo $wpjobus_resume_education[$i][5]; ?></textarea>

                </span>
              </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="delete-add">
                            <button type="button" class="delete_education"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_education"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm học vấn mới</button>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="education">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-trophy"></i>  Giải thưởng</h1>
                            <h3 class="resume-section-subtitle" >Hãy để mọi người biết bạn giỏi như thế nào!</h3>
                        </div>
                        <div class="resume_award">
                            <?php

                            $wpjobus_resume_award = get_post_meta($postID, 'wpjobus_resume_award',true);

                            for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) {

                                ?>
                                <div class="row_resume_award">
                <span class="information-input">
            <span class="label-title">
              <h3>Giải thưởng <?php echo $i+1; ?></h3>
            </span>

          </span>
                                    <div class="row">

                                        <div class="col-md-6">
              <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Phần thưởng:</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-cubes" aria-hidden="true"></i>
             <input type='text' id="wpjobus_resume_award[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_award[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_award[$i][0])) echo $wpjobus_resume_award[$i][0]; ?>' placeholder="" />

                </span>
              </span>

                                            <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Năm:</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
              	<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][2]' name='wpjobus_resume_award[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_award[$i][2])) echo $wpjobus_resume_award[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 100%;">

                </span>
              </span>

                                        </div>
                                        <div class="col-md-6">

              <span class="information-input">
                <h3 class="skill-item-title">Tên cuộc thi:</h3>
                <span class="three_fifth">
                  <i class="fa fa-flag" aria-hidden="true"></i>
                <input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][1]' name='wpjobus_resume_award[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_award[$i][1])) echo $wpjobus_resume_award[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">

                </span>
              </span>

                                            <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Tỉnh thành:</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
            <input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][3]' name='wpjobus_resume_award[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_award[$i][3])) echo $wpjobus_resume_award[$i][3]; ?>' class='criteria_location' placeholder="" style="width: 100%;">

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
                            <button type="button" class="delete_award"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_award"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm giải thưởng mới</button>
                        </div>
                    </div>


                    <div class="divider"></div>
                    <div class="education">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-building"></i>  Kinh nghiệm làm việc</h1>
                            <h3 class="resume-section-subtitle" >Tên của các tổ chức giúp bạn có được những kinh nghiệm quý báu</h3>
                        </div>
                        <div class="resume_work">
                            <?php

                            $wpjobus_resume_work = get_post_meta($postID, 'wpjobus_resume_work',true);

                            for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {

                                ?>
                                <div class="row_resume_work">
                <span class="information-input">
            <span class="label-title">
              <h3>Kinh nghiệm làm việc <?php echo $i+1; ?></h3>
            </span>

          </span>
                                    <div class="row">
                                        <div class="col-md-6">
              <span class="information-input">
                <span class="label-title">
                  <h3>Tên tổ chức </h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-users" aria-hidden="true"></i>
                 	<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][0]' name='wpjobus_resume_work[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_work[$i][0])) echo $wpjobus_resume_work[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%; float: left;">

                </span>
              </span>
                                            <span class="information-input">
                <span class="label-title">
                  <h3>Giai đoạn</h3>
                </span>
                <span class="three_fifth">
          	<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][2]' name='wpjobus_resume_work[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_work[$i][2])) echo $wpjobus_resume_work[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%;"> <span style="float: left; margin: 10px;"></span> <input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][3]' name='wpjobus_resume_work[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_work[$i][3])) echo $wpjobus_resume_work[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%;">

                </span>
              </span>
                                            <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Tỉnh thành:</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                <input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][1]' name='wpjobus_resume_work[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_work[$i][1])) echo $wpjobus_resume_work[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">

                </span>
              </span>
                                        </div>
                                        <div class="col-md-6">

              <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Chuyên môn</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-briefcase" aria-hidden="true"></i>
                 <select class="resume_work_job_type select2" name="wpjobus_resume_work[<?php echo $i; ?>][4]" id="wpjobus_resume_work[<?php echo $i; ?>][4]" style="width: 100%; margin-right: 10px;">
												<option value="Chính thức">Chính thức</option>
												<option value="Bán thời gian">Bán thời gian</option>
												<option value="Lao động tự do ">Lao động tự do </option>
												<option value="Thực tập sinh">Thực tập sinh</option>
											</select>
                </span>
              </span>
                                            <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Ghi chú</h3>
                </span>
                <span class="three_fifth">
                <textarea class="criteria_notes" name="wpjobus_resume_work[<?php echo $i; ?>][5]" id='wpjobus_resume_work[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_work[$i][5])) echo $wpjobus_resume_work[$i][5]; ?></textarea>

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
                            <button type="button" class="delete_work"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_work"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm kinh nghiệm mới</button>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="price-welfare">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-money"></i>Lương &amp; Phúc Lợi</h1>
                            <h3 class="resume-section-subtitle">Hãy để mọi người biết những lợi ích bạn cung cấp.</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="price-welfare-1">
                <span class="label-title">
                  <h3>Mức lương:</h3>
                </span>
                                    <span class="price-welfare-day">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                  <select class="select2" id="remuneration " name="wpjobus_resume_remuneration" style="width: 100%;float: left;">
                        <?php
                        if($wpjobus_resume_remuneration!="") {
                            $salary = $wpjobus_resume_remuneration;
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
                <span class="label-title">
                  <h3>mỗi:</h3>
                </span>
                                    <span class="price-welfare-day">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <select class="select2" name="wpjobus_job_remuneration_per" id="wpjobus_resume_remuneration_per" style="width: 100%;">
                    <option value="Tháng">Tháng</option>
                    <option value="Giờ">Giờ</option>
                    <option value="Năm">Năm</option>
                    <option value="Dự án">Dự án</option>
                  </select>
                </span>
                                </div>
                            </div>
                        </div>
                        <div class="price-welfare-1">
              <span class="label-title" style="margin-bottom: 0;">
                <h3>Hình thức công việc:</h3>
              </span>
                            <span class="three_fifth" >
                <span class="check-box">
                  <input type="hidden" class="" name="wpjobus_resume_job_type[0][0]" value="0">
                  <input type="checkbox" class="price-welfare" name="wpjobus_resume_job_type[0][1]"  value="Chính thức" placeholder="" checked="">
                Chính thức                  </span>

                <span class="check-box">
                  <input type="hidden" class="" name="wpjobus_resume_job_type[1][0]" value="1">
                  <input type="checkbox" class="price-welfare" name="wpjobus_resume_job_type[1][1]"  value="Bán thời gian" placeholder="" checked="">
                Bán thời gian                 </span>

                <span class="check-box">
                  <input type="hidden" class="" name="wpjobus_resume_job_type[2][0]" value="2">
                  <input type="checkbox" class="price-welfare" name="wpjobus_resume_job_type[2][1]"  value="Lao động tự do " placeholder="" checked="">
                Lao động tự do                  </span>

                <span class="check-box" >
                  <input type="hidden" class="" name="wpjobus_resume_job_type[3][0]" value="3">
                  <input type="checkbox" class="price-welfare" name="wpjobus_resume_job_type[3][1]"  value="Thực tập sinh" placeholder="" checked="">
                Thực tập sinh                 </span>

              </span>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="personal-project">
                        <div class="title-top">
                            <h1 class="resume-section-title"><i class="fa fa-bookmark"></i>  Dự án cá nhân</h1>
                            <h3 class="resume-section-subtitle" >Tải lên những dự án tốt nhất của bạn</h3>
                        </div>
                        <div class="resume_portfolio">
                            <?php

                            $wpjobus_resume_portfolio = get_post_meta($postID, 'wpjobus_resume_portfolio',true);

                            for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {

                                ?>
                                <div class="row_resume_portfolio">
                <span class="information-input">
              <h3>Dự án <?php echo $i+1; ?></h3>
          </span>
                                    <div class="row">
                                        <div class="col-md-6">
              <span class="information-input">
                <span class="label-title">
                  <h3>Tên dự án </h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-users" aria-hidden="true"></i>
                    <input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][0])) echo $wpjobus_resume_portfolio[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%;">

                   </span>
              </span>
                                            <span class="information-input">
                <span class="label-title">
                  <h3>Danh mục</h3>
                </span>
                <span class="three_fifth">
                  <i class="fa fa-th-large" aria-hidden="true"></i>
                <input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][1])) echo $wpjobus_resume_portfolio[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">

                    </span>
              </span>
                                            <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Ghi chú:</h3>
                </span>
                <span class="three_fifth">
               <textarea class="criteria_notes" name="wpjobus_resume_portfolio[<?php echo $i; ?>][2]" id='pjobus_resume_portfolio[<?php echo $i; ?>][2]' cols="70" rows="4" ><?php if (!empty($pjobus_resume_portfolio[$i][2])) echo $pjobus_resume_portfolio[$i][2]; ?></textarea>

                  </span>
              </span>
                                        </div>
                                        <div class="col-md-6">
              <span class="information-input">
                <span class="label-title">
                  <h3 class="skill-item-title">Hình ảnh</h3>
                        <input onchange="upload_product();return false;" type="file" id="file_product" value="">
                    <?php if (!empty($wpjobus_resume_portfolio[$i][3])) {

                        ?>
                        <img id="img_product" src="<?php echo $wpjobus_resume_portfolio[$i][3]; ?>" width="200"/>
                        <?php
                    } else {
                        ?>
                        <img id="img_product" src="" width="200" style="display:none;"/>
                        <?php
                    }
                    ?>

                    <input name="wpjobus_resume_portfolio[<?php echo $i; ?>][3]" type="hidden" id="portfolio_name"
                           value="<?php echo $wpjobus_resume_portfolio[$i][3]; ?>">

                      <script>
                             function upload_product() {
                                 var formData = new FormData();
                                 formData.append("action", "upload-attachment");

                                 var fileInputElement = document.getElementById("file_product");
                                 formData.append("async-upload", fileInputElement.files[0]);
                                 formData.append("name", fileInputElement.files[0].name);

                                 //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
                                 <?php $my_nonce = wp_create_nonce('media-form'); ?>
                                 formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
                                 var xhr = new XMLHttpRequest();
                                 xhr.onreadystatechange = function () {
                                     if (xhr.readyState == 4 && xhr.status == 200) {
                                         console.log(xhr.responseText);
                                     }
                                 }
                                 xhr.open("POST", "/wp-admin/async-upload.php", true);
                                 xhr.send(formData);
                             }
                             $('#file_product').change(function (event) {
                                 $("#img_product").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
                                 var src = $('#file_product').val();
                                 var file = src.match(/[-_\w]+[.][\w]+$/i)[0];
                                 var upload_file = "<?php echo $upload_dir['url'];?>/" + file;
                                 $('#portfolio_name').val(upload_file);

                             });
                      </script>
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
                            <button type="button" class="delete_resume_portfolio"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            <button type="button" class="add_resume_portfolio"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm dự án mới</button>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="button">
                        <p>
                            <input type="submit" id="save_draf" name="save_draf" value="Lưu nháp"/>
                            <input type="submit" class="save_add_resume" id ="save_pending" name="save_pending" value="Gửi hồ sơ cá nhân để xem xét"/>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php
if (isset($_POST['save_draf']))
{
    global  $td_allowed;
    global $wpdb;

    if(isset($_GET['resume_id']) !="")
    {
        $my_post = array(
            'ID' => $_GET['job_id'],
            'post_title' => $_POST['wpjobus_resume_fullname'],
            'post_status' => 'draft',
            'post_type' => 'resume',
            'comment_status' => 'open',
            'ping_status' => 'open',

        );
        wp_update_post( $my_post );
        $td_post_id=$_GET['resume_id'];
    }
    else{
        $my_post = array(
            'post_title' =>$_POST['wpjobus_resume_fullname'],
            'post_content' => strip_tags($_POST['postContent']),
            'post_type' => 'resume',
            'comment_status' => 'open',
            'ping_status' => 'open',
            'post_status' => 'draft'
        );
        $td_post_id = wp_insert_post( $my_post );

    }
    if($_POST['wpjobus_resume_profile_picture'] !="")
    {
        $wpjobus_resume_profile_pictures= $upload_dir['url'].'/'.$_POST['wpjobus_resume_profile_picture'];
    }
    else if($wpjobus_resume_profile_picture !=""){

        $wpjobus_resume_profile_pictures= $wpjobus_resume_profile_picture;
    }
    if($_POST['wpjobus_resume_cover_image'] !="")
    {
        $wpjobus_resume_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_resume_cover_image'];
    }
    else if($wpjobus_resume_cover_image !=""){

        $wpjobus_resume_cover_images= $wpjobus_resume_cover_image;
    }

    update_post_meta($td_post_id, 'wpjobus_resume_fullname', wp_kses($_POST['wpjobus_resume_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_resume_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'resume_gender', wp_kses($_POST['resume_gender'], $td_allowed));
    update_post_meta($td_post_id, 'resume_month_birth', wp_kses($_POST['resume_month_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_day_birth', wp_kses($_POST['resume_day_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_year_birth', wp_kses($_POST['resume_year_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_years_of_exp', wp_kses($_POST['resume_years_of_exp'], $td_allowed));
    update_post_meta($td_post_id, 'resume_industry', wp_kses($_POST['resume_industry'], $td_allowed));
    update_post_meta($td_post_id, 'resume_location', wp_kses($_POST['resume_location'], $td_allowed));
    update_post_meta($td_post_id, 'resume-about-me', htmlentities(stripslashes($_POST['postContent'])));
    update_post_meta($td_post_id, 'wpjobus_resume_profile_picture', wp_kses($wpjobus_resume_profile_pictures, $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_cover_image', wp_kses($wpjobus_resume_cover_images, $td_allowed));

    //update_post_meta($td_post_id, 'wpjobus_resume_prof_title', wp_kses($_POST['wpjobus_resume_prof_title'], $td_allowed));
    //update_post_meta($td_post_id, 'resume_career_level', wp_kses($_POST['resume_career_level'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_comm_level', wp_kses($_POST['wpjobus_resume_comm_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_comm_note', $_POST['skillsNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_org_level', wp_kses($_POST['wpjobus_resume_org_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_org_note', $_POST['orgNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_job_rel_level', wp_kses($_POST['wpjobus_resume_job_rel_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_job_rel_note', $_POST['jobNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_skills', $_POST['wpjobus_resume_skills']);

    update_post_meta($td_post_id, 'wpjobus_resume_native_language', wp_kses($_POST['wpjobus_resume_native_language'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_languages', $_POST['wpjobus_resume_languages']);

    update_post_meta($td_post_id, 'wpjobus_resume_hobbies', wp_kses($_POST['wpjobus_resume_hobbies'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_education', $_POST['wpjobus_resume_education']);

    update_post_meta($td_post_id, 'wpjobus_resume_award', $_POST['wpjobus_resume_award']);

    update_post_meta($td_post_id, 'wpjobus_resume_work', $_POST['wpjobus_resume_work']);

    //update_post_meta($td_post_id, 'wpjobus_resume_testimonials', $_POST['wpjobus_resume_testimonials']);

    update_post_meta($td_post_id, 'wpjobus_resume_remuneration', $_POST['wpjobus_resume_remuneration']);
    update_post_meta($td_post_id, 'wpjobus_resume_remuneration_per', $_POST['wpjobus_resume_remuneration_per']);

    $remuneration_ammount = $_POST['wpjobus_resume_remuneration'];
    $str = preg_replace('/\D/', '', $remuneration_ammount);
    update_post_meta($td_post_id, 'wpjobus_resume_remuneration_raw', $str);

    update_post_meta($td_post_id, 'wpjobus_resume_job_type', $_POST['wpjobus_resume_job_type']);

    update_post_meta($td_post_id, 'wpjobus_resume_portfolio', $_POST['wpjobus_resume_portfolio']);

    update_post_meta($td_post_id, 'wpjobus_resume_address', $_POST['wpjobus_resume_address']);
    update_post_meta($td_post_id, 'wpjobus_resume_phone', $_POST['wpjobus_resume_phone']);
    update_post_meta($td_post_id, 'wpjobus_resume_website', $_POST['wpjobus_resume_website']);
    update_post_meta($td_post_id, 'wpjobus_resume_email', $_POST['wpjobus_resume_email']);
    update_post_meta($td_post_id, 'wpjobus_resume_publish_email', $_POST['wpjobus_resume_publish_email']);
    update_post_meta($td_post_id, 'wpjobus_resume_facebook', $_POST['wpjobus_resume_facebook']);
    update_post_meta($td_post_id, 'wpjobus_resume_linkedin', $_POST['wpjobus_resume_linkedin']);
    update_post_meta($td_post_id, 'wpjobus_resume_twitter', $_POST['wpjobus_resume_twitter']);
    update_post_meta($td_post_id, 'wpjobus_resume_googleplus', $_POST['wpjobus_resume_googleplus']);
//    update_post_meta($td_post_id, 'wpjobus_resume_googleaddress', $_POST['wpjobus_resume_googleaddress']);
//    update_post_meta($td_post_id, 'wpjobus_resume_longitude', $_POST['wpjobus_resume_longitude']);
//    update_post_meta($td_post_id, 'wpjobus_resume_latitude', $_POST['wpjobus_resume_latitude']);

    update_post_meta($td_post_id, 'wpjobus_resume_file', $_POST['wpjobus_resume_file']);
    update_post_meta($td_post_id, 'wpjobus_resume_file_name', $_POST['wpjobus_resume_file_name']);




    ?>
    <script>
        jQuery(document).ready(function ($) {
            var url = "<?php echo home_url('/')."edit-resume/?resume_id=".$td_post_id.""?>";
            location.href = url;
        });
    </script>
    <?php


}
if(isset($_POST['save_pending']))
{

    global  $td_allowed;
    global $wpdb;

    if(isset($_GET['resume_id']) !="")
    {
        $my_post = array(
            'ID' => $_GET['job_id'],
            'post_title' => $_POST['wpjobus_resume_fullname'],
            'post_status' => 'pending',
            'post_type' => 'resume',
            'comment_status' => 'open',
            'ping_status' => 'open',

        );
        wp_update_post( $my_post );
        $td_post_id=$_GET['resume_id'];
    }
    else{
        $my_post = array(
            'post_title' =>$_POST['wpjobus_resume_fullname'],
            'post_content' => strip_tags($_POST['postContent']),
            'post_type' => 'resume',
            'comment_status' => 'open',
            'ping_status' => 'open',
            'post_status' => 'pending'
        );
        $td_post_id = wp_insert_post( $my_post );

    }
    if($_POST['wpjobus_resume_profile_picture'] !="")
    {
        $wpjobus_resume_profile_pictures= $upload_dir['url'].'/'.$_POST['wpjobus_resume_profile_picture'];
    }
    else if($wpjobus_resume_profile_picture !=""){

        $wpjobus_resume_profile_pictures= $wpjobus_resume_profile_picture;
    }
    if($_POST['wpjobus_resume_cover_image'] !="")
    {
        $wpjobus_resume_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_resume_cover_image'];
    }
    else if($wpjobus_resume_cover_image !=""){

        $wpjobus_resume_cover_images= $wpjobus_resume_cover_image;
    }
    update_post_meta($td_post_id, 'wpjobus_resume_fullname', wp_kses($_POST['wpjobus_resume_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_resume_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'resume_gender', wp_kses($_POST['resume_gender'], $td_allowed));
    update_post_meta($td_post_id, 'resume_month_birth', wp_kses($_POST['resume_month_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_day_birth', wp_kses($_POST['resume_day_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_year_birth', wp_kses($_POST['resume_year_birth'], $td_allowed));
    update_post_meta($td_post_id, 'resume_years_of_exp', wp_kses($_POST['resume_years_of_exp'], $td_allowed));
    update_post_meta($td_post_id, 'resume_industry', wp_kses($_POST['resume_industry'], $td_allowed));
    update_post_meta($td_post_id, 'resume_location', wp_kses($_POST['resume_location'], $td_allowed));
    update_post_meta($td_post_id, 'resume-about-me', htmlentities(stripslashes($_POST['postContent'])));
    update_post_meta($td_post_id, 'wpjobus_resume_profile_picture', wp_kses($wpjobus_resume_profile_pictures, $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_cover_image', wp_kses($wpjobus_resume_cover_images, $td_allowed));

    //update_post_meta($td_post_id, 'wpjobus_resume_prof_title', wp_kses($_POST['wpjobus_resume_prof_title'], $td_allowed));
    //update_post_meta($td_post_id, 'resume_career_level', wp_kses($_POST['resume_career_level'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_comm_level', wp_kses($_POST['wpjobus_resume_comm_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_comm_note', $_POST['skillsNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_org_level', wp_kses($_POST['wpjobus_resume_org_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_org_note', $_POST['orgNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_job_rel_level', wp_kses($_POST['wpjobus_resume_job_rel_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_resume_job_rel_note', $_POST['jobNotes'], $td_allowed);

    update_post_meta($td_post_id, 'wpjobus_resume_skills', $_POST['wpjobus_resume_skills']);

    update_post_meta($td_post_id, 'wpjobus_resume_native_language', wp_kses($_POST['wpjobus_resume_native_language'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_languages', $_POST['wpjobus_resume_languages']);

    update_post_meta($td_post_id, 'wpjobus_resume_hobbies', wp_kses($_POST['wpjobus_resume_hobbies'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_resume_education', $_POST['wpjobus_resume_education']);

    update_post_meta($td_post_id, 'wpjobus_resume_award', $_POST['wpjobus_resume_award']);

    update_post_meta($td_post_id, 'wpjobus_resume_work', $_POST['wpjobus_resume_work']);

    //update_post_meta($td_post_id, 'wpjobus_resume_testimonials', $_POST['wpjobus_resume_testimonials']);

    update_post_meta($td_post_id, 'wpjobus_resume_remuneration', $_POST['wpjobus_resume_remuneration']);
    update_post_meta($td_post_id, 'wpjobus_resume_remuneration_per', $_POST['wpjobus_resume_remuneration_per']);

    $remuneration_ammount = $_POST['wpjobus_resume_remuneration'];
    $str = preg_replace('/\D/', '', $remuneration_ammount);
    update_post_meta($td_post_id, 'wpjobus_resume_remuneration_raw', $str);

    update_post_meta($td_post_id, 'wpjobus_resume_job_type', $_POST['wpjobus_resume_job_type']);

    update_post_meta($td_post_id, 'wpjobus_resume_portfolio', $_POST['wpjobus_resume_portfolio']);

    update_post_meta($td_post_id, 'wpjobus_resume_address', $_POST['wpjobus_resume_address']);
    update_post_meta($td_post_id, 'wpjobus_resume_phone', $_POST['wpjobus_resume_phone']);
    update_post_meta($td_post_id, 'wpjobus_resume_website', $_POST['wpjobus_resume_website']);
    update_post_meta($td_post_id, 'wpjobus_resume_email', $_POST['wpjobus_resume_email']);
    update_post_meta($td_post_id, 'wpjobus_resume_publish_email', $_POST['wpjobus_resume_publish_email']);
    update_post_meta($td_post_id, 'wpjobus_resume_facebook', $_POST['wpjobus_resume_facebook']);
    update_post_meta($td_post_id, 'wpjobus_resume_linkedin', $_POST['wpjobus_resume_linkedin']);
    update_post_meta($td_post_id, 'wpjobus_resume_twitter', $_POST['wpjobus_resume_twitter']);
    update_post_meta($td_post_id, 'wpjobus_resume_googleplus', $_POST['wpjobus_resume_googleplus']);
//    update_post_meta($td_post_id, 'wpjobus_resume_googleaddress', $_POST['wpjobus_resume_googleaddress']);
//    update_post_meta($td_post_id, 'wpjobus_resume_longitude', $_POST['wpjobus_resume_longitude']);
//    update_post_meta($td_post_id, 'wpjobus_resume_latitude', $_POST['wpjobus_resume_latitude']);

    update_post_meta($td_post_id, 'wpjobus_resume_file', $_POST['wpjobus_resume_file']);
    update_post_meta($td_post_id, 'wpjobus_resume_file_name', $_POST['wpjobus_resume_file_name']);


    ?>
    <script>
        jQuery(document).ready(function ($) {
            var url = "<?php echo home_url('/')."edit-resume/?resume_id=".$td_post_id.""?>";
            location.href = url;
        });
    </script>
    <?php




}
?>