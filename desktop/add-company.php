<?php
global $wpdb,$post;
$upload_dir = wp_upload_dir();
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
$postID = $_GET['company_id'];
$td_current_post = $postID;
$post_author_id = get_post_field( 'post_author', $postID );
if($post_author_id == $td_user_id)  {
}
else {
$user_error = 1;
}
$wpjobus_company_cover_image = esc_url(get_post_meta($postID, 'wpjobus_company_cover_image',true));
$wpjobus_company_fullname = esc_attr(get_post_meta($postID, 'wpjobus_company_fullname',true));
//echo $wpjobus_company_fullname;die;
$wpjobus_company_tagline = esc_attr(get_post_meta($postID, 'wpjobus_company_tagline',true));
$company_industry = esc_attr(get_post_meta($postID, 'company_industry',true));
$td_company_team_size = esc_attr(get_post_meta($postID, 'company_team_size',true));
$resume_about_me = html_entity_decode(get_post_meta($postID, htmlentities('company-about-me'),true));
$wpjobus_company_foundyear = esc_attr(get_post_meta($postID, 'wpjobus_company_foundyear',true));
$wpjobus_company_profile_picture = esc_attr(get_post_meta($postID, 'wpjobus_company_profile_picture',true));
$company_location = esc_attr(get_post_meta($postID, 'company_location',true));
$wpjobus_resume_prof_title = esc_attr(get_post_meta($postID, 'wpjobus_resume_prof_title',true));
$td_resume_career_level = esc_attr(get_post_meta($postID, 'resume_career_level',true));
$wpjobus_resume_comm_level = esc_attr(get_post_meta($postID, 'wpjobus_resume_comm_level',true));
$wpjobus_resume_comm_note = esc_attr(get_post_meta($postID, 'wpjobus_resume_comm_note',true));
$wpjobus_resume_org_level = esc_attr(get_post_meta($postID, 'wpjobus_resume_org_level',true));
$wpjobus_resume_org_note = esc_attr(get_post_meta($postID, 'wpjobus_resume_org_note',true));
$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_rel_level',true));
$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_rel_note',true));
$wpjobus_company_services = get_post_meta($postID, 'wpjobus_company_services',true);
$wpjobus_company_expertise = get_post_meta($postID, 'wpjobus_company_expertise',true);
$wpjobus_resume_education = get_post_meta($postID, 'wpjobus_resume_education',true);
$wpjobus_resume_award = get_post_meta($postID, 'wpjobus_resume_award',true);
$wpjobus_company_clients = get_post_meta($postID, 'wpjobus_company_clients',true);
$wpjobus_company_testimonials = get_post_meta($postID, 'wpjobus_company_testimonials',true);
$wpjobus_resume_file = esc_url(get_post_meta($postID, 'wpjobus_resume_file',true));
$wpjobus_resume_remuneration = esc_attr(get_post_meta($postID, 'wpjobus_resume_remuneration',true));
$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($postID, 'wpjobus_resume_remuneration_per',true));
$wpjobus_resume_job_freelance = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_freelance',true));
$wpjobus_resume_job_part_time = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_part_time',true));
$wpjobus_resume_job_full_time = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_full_time',true));
$wpjobus_resume_job_internship = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_internship',true));
$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($postID, 'wpjobus_resume_job_volunteer',true));
$wpjobus_company_portfolio = get_post_meta($postID, 'wpjobus_company_portfolio',true);
$wpjobus_company_address = esc_attr(get_post_meta($postID, 'wpjobus_company_address',true));
$wpjobus_company_phone = esc_attr(get_post_meta($postID, 'wpjobus_company_phone',true));
$wpjobus_company_website = esc_url(get_post_meta($postID, 'wpjobus_company_website',true));
$wpjobus_company_email = esc_attr(get_post_meta($postID, 'wpjobus_company_email',true));
$wpjobus_company_publish_email = esc_attr(get_post_meta($postID, 'wpjobus_company_publish_email',true));
$wpjobus_company_facebook = esc_url(get_post_meta($postID, 'wpjobus_company_facebook',true));
$wpjobus_company_linkedin = esc_url(get_post_meta($postID, 'wpjobus_company_linkedin',true));
$wpjobus_company_twitter = esc_url(get_post_meta($postID, 'wpjobus_company_twitter',true));
$wpjobus_company_googleplus = esc_url(get_post_meta($postID, 'wpjobus_company_googleplus',true));
$wpjobus_company_googleaddress = esc_attr(get_post_meta($postID, 'wpjobus_company_googleaddress',true));
$wpjobus_company_longitude = esc_attr(get_post_meta($postID, 'wpjobus_company_longitude',true));
$wpjobus_company_latitude = esc_attr(get_post_meta($postID, 'wpjobus_company_latitude',true));
$wpjobus_company_longitude = esc_attr(get_post_meta($postID, 'wpjobus_company_longitude',true));
if(empty($wpjobus_company_longitude)) {
$wpjobus_company_longitude = 0;
}
$wpjobus_company_latitude = esc_attr(get_post_meta($postID, 'wpjobus_company_latitude',true));
if(empty($wpjobus_company_latitude)) {
$wpjobus_company_latitude = 0;
}
?>
<div class="main-content">
  <div class="container" style="background: white;">
    <form name="" method="post">
      <div class="add-edit">
        <div class="title-top">
          <h1 class="resume-section-title"><i class="fa fa-briefcase"></i>  </i>Cập nhật hồ sơ doanh nghiệp</h1>
          <h3 class="resume-section-subtitle" >Hãy điền đầy đủ thông tin vào các mục dưới đây. Bạn sẽ có một trang thông tin doanh nghiệp tốt!</h3>
        </div>
        <div class="form-input">
          <div class="row">
            <div class="col-md-6">
              <div class="information-add-edit">
                <span class="information-input">
                  <span class="label-title" >
                    <h3>Tên công ty</h3>
                  </span>
                  <span class="three_fifth " >
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <input class="input-lg" type="text" name="wpjobus_job_fullname" id="wpjobus_company_fullname" value="<?php echo $wpjobus_company_fullname; ?>" placeholder="Nhập tên công ty"  vk_1ffd1="subscribed">
                    <p id="userNameError"></p>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Năm thành lập:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" name="wpjobus_company_foundyear" id="wpjobus_company_foundyear" value="<?php echo $wpjobus_company_foundyear; ?>" class="input-textarea" placeholder="" style="margin-bottom: 0;">
                    
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Tổng số nhân viên</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-street-view" aria-hidden="true"></i>
                    <select class="select2" name="company_team_size " id="company_team_size" style="width: 100%; margin-right: 10px;">
                      <?php
                      for ($i=0;$i<50;$i++) {
                      ?>
                      <option <?php selected( $td_company_team_size, $i ); ?> value="<?php echo $i+1;?>"><?php echo $i+1;?></option>
                      <?php
                      }
                      ?>
                      <option value="50+" <?php selected( $td_company_team_size, '50+' ); ?>>50+</option>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Ngành Nghề:</h3>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <select class="select2" name="company_industry" id="company_industry" style="width: 100%; margin-right: 10px;">
                      <?php
                      foreach ($job_field as $industry) {
                      ?>
                      <option  <?php if( $company_industry == $industry->name ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $industry->name; ?>"><?php echo $industry->name; ?></option>
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
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <select class="select2" name="company_location " id="company_location" style="width: 100%; margin-right: 10px;">
                      <?php
                      foreach ($job_province as $location) {
                      ?>
                      <option id="name" <?php if( $company_location == $location->name ) {echo ' selected=\'selected\' ';} ?> value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </span>
                </span>
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Tag Search:</h3>
                    <span>(Từ khoá tìm kiếm của doanh nghiệp)</span>
                  </span>
                  <span class="three_fifth select-wrapper " >
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <input type="text" name="wpjobus_company_tagline" id="wpjobus_company_tagline" value="<?php echo $wpjobus_company_tagline; ?>" class="input-textarea" placeholder="" style="margin-bottom: 0;">
                    
                  </span>
                </span>
                
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="information-add-edit">
                <span class="information-input" >
                  <span class="label-title" >
                    <h3>Mô tả công ty:</h3>
                  </span>
                </span>
                <textarea id="postContent" rows="10" name="postContent" required><?php echo $resume_about_me?></textarea>
                <p id="err_postContent"></p>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <span class="img-upload" >
                <span class="label-title" >
                  <h3><i class="fa fa-camera"></i>  Logo:</h3>
                  <input onchange="upload_logo();return false;" type="file" id="file_logo" name="wpjobus_company_profile_picture" value="">
                  <?php
                  if($wpjobus_company_profile_picture !="")
                  {
                  ?>
                  <img id="img_logo" src="<?php echo $wpjobus_company_profile_picture; ?>" width="200"/>
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
                  <input onchange="upload_cover();return false;"  name="wpjobus_company_cover_image"  type="file" id="file_cover" value="">
                  <?php
                  if($wpjobus_company_profile_picture !="")
                  {
                  ?>
                  <img id="img_cover" src="<?php echo $wpjobus_company_profile_picture; ?>" width="200" />
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
            <div class="row">
              <div class="col-xs-6">
                <div class="contact-input">
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Địa chỉ:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-street-view" aria-hidden="true"></i>
                      <input type="text" name="wpjobus_company_address" id="wpjobus_job_address"  value="<?php echo $wpjobus_company_address; ?>" class="input-textarea" placeholder="" vk_162b1="subscribed" >
                      <p id="error_address"></p>
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Số điện thoại:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <input type="text" id="" class="input-textarea" name="wpjobus_company_phone"  value="<?php echo $wpjobus_company_phone; ?>" placeholder="" vk_162b1="subscribed">
                      <p id="err_number"></p>
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Website:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                      <input type="text" id="wpjobus_job_website" class="input-textarea" name="wpjobus_company_website"  value="<?php echo $wpjobus_company_website; ?>" placeholder="" vk_162b1="subscribed">
                    </span>
                  </span>
                  <span class="information-input">
                    <span class="label-title" >
                      <h3>Email:</h3>
                    </span>
                    <span class="three_fifth" >
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <input type="email" id="wpjobus_job_email" class="input-textarea" name="wpjobus_company_email"  value="<?php echo $wpjobus_company_email; ?>" placeholder="" vk_162b1="subscribed" >
                      <p id="err_email"></p>
                      <span class="information-input" >
                        <input type="checkbox" class="" name="wpjobus_company_publish_email"  value="publish_email" <?php if (!empty($wpjobus_company_publish_email)) { ?>checked<?php } ?> placeholder="">Công khai địa chỉ email của tôi                 </span>
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
                        <input type="text" id="wpjobus_job_facebook" class="input-textarea" name="wpjobus_company_facebook"  value="<?php echo $wpjobus_company_facebook; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>LinkedIn:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_linkedin" class="input-textarea" name="wpjobus_company_linkedin"  value="<?php echo $wpjobus_company_linkedin; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>Twitter:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_twitter" class="input-textarea" name="wpjobus_company_twitter"  value="<?php echo $wpjobus_company_twitter; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                    <span class="information-input">
                      <span class="label-title" >
                        <h3>Google+:</h3>
                      </span>
                      <span class="three_fifth" >
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                        <input type="text" id="wpjobus_job_googleplus" class="input-textarea" name="wpjobus_company_googleplus"  value="<?php echo $wpjobus_company_googleplus; ?>" placeholder="" vk_162b1="subscribed">
                      </span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="information-input">
                <style>
                #map {
                width: 100%;
                height: 400px;
                }
                .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                }
                #searchInput {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 50%;
                }
                #searchInput:focus {
                border-color: #4d90fe;
                }
                #geoData{
                display: none;
                }
                </style>
                <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
                <div id="map"></div>
                <ul id="geoData">
                  <li>Full Address: <span id="location"></span></li>
                  <li>Postal Code: <span id="postal_code"></span></li>
                  <li>Country: <span id="country"></span></li>
                  <li>Latitude: <span id="lat"></span></li>
                  <li>Longitude: <span id="lon"></span></li>
                </ul>
                <script>
                function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 21.0277644, lng: 105.83415979999995},
                zoom: 13
                });
                var input = document.getElementById('searchInput');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);
                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
                });
                autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
                }
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
                } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
                }
                marker.setIcon(({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var address = '';
                if (place.address_components) {
                address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
                }
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                  infowindow.open(map, marker);
                  //Location details
                  for (var i = 0; i < place.address_components.length; i++) {
                  if(place.address_components[i].types[0] == 'postal_code'){
                  document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                  }
                  if(place.address_components[i].types[0] == 'country'){
                  document.getElementById('country').innerHTML = place.address_components[i].long_name;
                  }
                  }
                  document.getElementById('address').innerHTML = place.formatted_address;
                  document.getElementById('lat').innerHTML = place.geometry.location.lat();
                  document.getElementById('lon').innerHTML = place.geometry.location.lng();
                  $("#address").val(place.formatted_address);
                  $("#latitude").val(place.geometry.location.lat());
                  $("#longitude").val(place.geometry.location.lng());
                  });
                  }
                  </script>
                  <span class="three_fifth" style="width: 79%; float: left;margin-left: 15%;margin-top: 30px;" >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <input type="text" placeholder="Nhập địa chỉ Google Map"  id="address" class="input-textarea ui-autocomplete-input" name="wpjobus_company_googleaddress" style="width: 100%; float: left; margin-bottom: 0;" value="<?php echo $wpjobus_company_googleaddress; ?>" placeholder="" autocomplete="off" vk_11212="subscribed">
                  </span>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="Skills-needed-1">
                        <span class="label-title">
                          <h3>Vĩ độ:</h3>
                        </span>
                        <span class="Skills-needed-2">
                          <i class="fa fa-bar-chart-o"></i>
                          <input type="text" id="latitude" name="wpjobus_company_latitude" value="<?php echo $wpjobus_company_latitude; ?>" class="input-textarea">
                        </span>
                        <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="Skills-needed-1">
                        <span class="label-title">
                          <h3>Kinh độ:</h3>
                        </span>
                        <span class="Skills-needed-2">
                          <i class="fa fa-bar-chart-o"></i>
                          <input type="text" id="longitude" name="wpjobus_company_longitude" value="<?php echo $wpjobus_company_longitude; ?>" class="input-textarea valid">
                        </span>
                        <p id="error" style="color: red;display:none;font-size: 16px;"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="education">
              <div class="title-top">
                <h1 class="resume-section-title"><i class="fa fa-bar-chart-o"></i>  Dịch vụ</h1>
                <h3 class="resume-section-subtitle" >Mô tả dịch vụ và chuyên môn của công ty bạn.</h3>
              </div>
              <div class="company_services">
                <?php
                $wpjobus_company_services = get_post_meta($postID, 'wpjobus_company_services',true);
                for ($i = 0; $i < (count($wpjobus_company_services)); $i++) {
                ?>
                <div class="row_services">
                  <span class="information-input">
                    <h3>Dịch vụ <?php echo  $i+1;?></h3>
                  </span>
                  <div class="row">
                    <div class="col-md-6">
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Tên dịch vụ</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_company_services[<?php echo $i; ?>][0]" class="criteria_name"
                          name="wpjobus_company_services[<?php echo $i; ?>][0]" style="width: 100%; float: left;" value="<?php if (!empty($wpjobus_company_services[$i][0])) echo $wpjobus_company_services[$i][0]; ?>"
                          placeholder="">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Mã code</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-qrcode" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_company_services[<?php echo $i; ?>][1]" class="criteria_name_two"
                          name="wpjobus_company_services[<?php echo $i; ?>][1]" style="width: 100%; float: left;" value="<?php if (!empty($wpjobus_company_services[$i][1])) echo $wpjobus_company_services[$i][1]; ?>"
                          placeholder="">
                        </span>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Nội dung</h3>
                        </span>
                        <span class="three_fifth">
                          <textarea class="criteria_notes" name="wpjobus_company_services[<?php echo $i; ?>][2]"
                          id="wpjobus_company_services[<?php echo $i; ?>][2]" rows="5"><?php if (!empty($wpjobus_company_services[$i][2])) echo $wpjobus_company_services[$i][2]; ?></textarea>
                        </span>
                      </span>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="delete-add">
                <button type="button" class="delete_service"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                <button type="button" class="add_service"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm dịch vụ mới</button>
              </div>
              <div class="divider"></div>
              <div class="additional">
                <div class="information-input">
                  <span class="label-title">
                    <h3 class="skill-item-title">Chuyên môn:</h3>
                  </span>
                  <span class="three_fifth">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    <input type="text" id="review-name" class="" name="wpjobus_company_expertise" value="" placeholder="">
                    <span class="info-text">Chèn nhiều yêu cầu và ngăn cách chúng bằng dấu phẩy</span>
                  </span>
                  <div class="divider"></div>
                </div>
              </div>
            </div>
            <div class="education">
              <div class="title-top">
                <h1 class="resume-section-title"><i class="fa fa-users" aria-hidden="true"></i>  Khách hàng</h1>
                <h3 class="resume-section-subtitle" >Liệt kê danh sách các khách hàng, đối tác của công ty bạn</h3>
              </div>
              <div class="company_clients">
                <?php
                $wpjobus_company_clients = get_post_meta($postID, 'wpjobus_company_clients',true);
                for ($i = 0; $i < (count($wpjobus_company_clients)); $i++) {
                ?>
                <div class="row_client">
                  <span class="information-input">
                    <h3>Khách hàng <?php echo $i+1; ?></h3>
                  </span>
                  <div class="row">
                    <div class="col-md-6">
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Tên khách hàng</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <input type="text" class="input-textarea" name='wpjobus_company_clients[<?php echo $i; ?>][0]' value="<?php if (!empty($wpjobus_company_clients[$i][0])) echo $wpjobus_company_clients[$i][0]; ?>" placeholder="" vk_162b1="subscribed"
                          vk_17ced="subscribed">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Giai đoạn</h3>
                        </span>
                        <span class="three_fifth">
                          <input type="text" class="input-textarea wpjobus_resume_education" name="name='wpjobus_company_clients[<?php echo $i; ?>][2]'"
                          value="<?php if (!empty($wpjobus_company_clients[$i][2])) echo $wpjobus_company_clients[$i][2]; ?>" placeholder="" vk_162b1="subscribed" vk_17ced="subscribed"> -
                          <input type="text" class="input-textarea wpjobus_resume_education" name="name='wpjobus_company_clients[<?php echo $i; ?>][3]'"
                          value="<?php if (!empty($wpjobus_company_clients[$i][3])) echo $wpjobus_company_clients[$i][3]; ?>" placeholder="" vk_162b1="subscribed" vk_17ced="subscribed">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Website khách hàng:</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-list-alt" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_company_clients[<?php echo $i; ?>][4]" name="wpjobus_company_clients[<?php echo $i; ?>][4]"
                          value="<?php if (!empty($wpjobus_company_clients[$i][4])) echo $wpjobus_company_clients[$i][4]; ?>" class="criteria_location" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                    </div>
                    <div class="col-md-6">
                      
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Ký hợp đồng thực hiện:</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-briefcase" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_resume_education[<?php echo $i; ?>][1]" name="wpjobus_company_clients[<?php echo $i; ?>][1]" value="<?php if (!empty($wpjobus_company_clients[$i][1])) echo $wpjobus_company_clients[$i][1]; ?>"
                          class="criteria_name_two" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Ghi chú</h3>
                        </span>
                        <span class="three_fifth">
                          <textarea class="criteria_notes" name="wpjobus_company_clients[<?php echo $i; ?>][5]"
                          id="wpjobus_resume_education[<?php echo $i; ?>][5]" cols="70" rows="4">
                          <?php if (!empty($wpjobus_company_clients[$i][5])) echo $wpjobus_company_clients[$i][5]; ?>
                          </textarea>
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
                <button type="button" class="delete_client"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                <button type="button" class="add_client"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm khách hàng mới</button>
              </div>
            </div>
            <div class="divider"></div>
            <div class="personal-project">
              <div class="title-top">
                <h1 class="resume-section-title"><i class="fa fa-bookmark"></i>Chứng Thực</h1>
                <h3 class="resume-section-subtitle" >Hãy nhập thông tin chứng thực về doanh nghiệp của bạn.</h3>
              </div>
              <div class="company_testimonials">
                <?php
                $wpjobus_company_testimonials = get_post_meta($postID, 'wpjobus_company_testimonials',true);
                for ($i = 0; $i < (count($wpjobus_company_testimonials)); $i++) {
                ?>
                <div class="row_testimonial">
                  <span class="information-input">
                    <h3>Dự án <?php echo $i+1;?></h3>
                  </span>
                  <div class="row">
                    <div class="col-md-6">
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Họ và tên:</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_company_testimonials[<?php echo $i;?>][0]" name="wpjobus_company_testimonials[<?php echo $i;?>][0]" value="<?php if (!empty($wpjobus_company_testimonials[$i][0])) echo $wpjobus_company_testimonials[$i][0]; ?>"
                          class="criteria_name" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Cơ quan</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-university" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_company_testimonials[<?php echo $i;?>][1]" name="wpjobus_company_testimonials[<?php echo $i;?>][1]" value="<?php if (!empty($wpjobus_company_testimonials[$i][1])) echo $wpjobus_company_testimonials[$i][1]; ?>"
                          class="criteria_name_two" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Ghi chú:</h3>
                        </span>
                        <span class="three_fifth">
                          <textarea class="criteria_notes" name="wpjobus_company_testimonials[<?php echo $i;?>][2]"
                          id="wpjobus_company_testimonials[<?php echo $i;?>][2]" cols="70" rows="4">
                          <?php if (!empty($wpjobus_company_testimonials[$i][2])) echo $wpjobus_company_testimonials[$i][2]; ?>
                          </textarea>
                        </span>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="img-upload">
                        <span class="label-title">
                          <h3 class="skill-item-title">
                          <i class="fa fa-picture-o"></i> Hình ảnh</h3>
                          <input onchange="upload_portfolio();return false;" type="file" id="file_portfolio" value="">
                          <?php
                          if (!empty($wpjobus_company_testimonials[$i][3])) {
                          ?>
                          <img id="img_portfolio" src="<?php  echo $wpjobus_company_testimonials[$i][3];?>" width="200" />
                          <?php
                          }
                          else{
                          ?>
                          <img id="img_portfolio" src="" width="200" style="display:none;"/>
                          <?php
                          }
                          ?>
                          <input name="wpjobus_company_testimonials[<?php echo $i;?>][3]" type="hidden" id="portfolio_file" value="<?php  echo $wpjobus_company_testimonials[$i][3];?>">
                          <script>
                          function upload_portfolio() {
                          var formData = new FormData();
                          formData.append("action", "upload-attachment");
                          var fileInputElement = document.getElementById("file_portfolio");
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
                          $('#file_portfolio').change(function (event) {
                          $("#img_portfolio").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
                          var src= $('#file_portfolio').val();
                          var file= src.match(/[-_\w]+[.][\w]+$/i)[0];
                          var upload_file="<?php echo $upload_dir['url'];?>/"+ file;
                          $('#portfolio_file').val(upload_file);
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
            </div>
            <div class="delete-add">
              <button type="button" class="delete_testimonial"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
              <button type="button" class="add_testimonial"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm lời chứng thực mới</button>
            </div>
            <div class="divider"></div>
            <div class="personal-project">
              <div class="title-top">
                <h1 class="resume-section-title"><i class="fa fa-bookmark"></i>  Sản phẩm doanh nghiệp</h1>
                <h3 class="resume-section-subtitle" >Tải lên những dự án tốt nhất của bạn</h3>
              </div>
              <div class="company_portfolio">
                <?php
                $wpjobus_company_portfolio = get_post_meta($postID, 'wpjobus_company_portfolio',true);
                for ($i = 0; $i < (count($wpjobus_company_portfolio)); $i++) {
                ?>
                <div class="row_portfolio">
                  <span class="information-input">
                    <h3>Dự án 1</h3>
                  </span>
                  <div class="row">
                    <div class="col-md-6">
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Tên dự án:</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_resume_portfolio[<?php echo $i; ?>][0]"
                          name="wpjobus_company_portfolio[<?php echo $i; ?>][0]"
                          value="<?php if (!empty($wpjobus_company_portfolio[$i][0])) echo $wpjobus_company_portfolio[$i][0]; ?>"
                          class="criteria_name" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3>Danh mục</h3>
                        </span>
                        <span class="three_fifth">
                          <i class="fa fa-th-large" aria-hidden="true"></i>
                          <input type="text" id="wpjobus_resume_portfolio[<?php echo $i; ?>][1]"
                          name="wpjobus_company_portfolio[<?php echo $i; ?>][1]"
                          value="<?php if (!empty($wpjobus_company_portfolio[$i][1])) echo $wpjobus_company_portfolio[$i][1]; ?>"
                          class="criteria_name_two" placeholder="" style="width: 100%;">
                        </span>
                      </span>
                      <span class="information-input">
                        <span class="label-title">
                          <h3 class="skill-item-title">Ghi chú:</h3>
                        </span>
                        <span class="three_fifth">
                          <textarea class="criteria_notes" name="wpjobus_company_portfolio[<?php echo $i; ?>][2]"
                          id="wpjobus_resume_portfolio[<?php echo $i; ?>][2]" cols="70"
                          rows="4"><?php if (!empty($wpjobus_company_portfolio[$i][2])) echo $wpjobus_company_portfolio[$i][2]; ?></textarea>
                        </span>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <span class="img-upload">
                        <span class="label-title">
                          <h3 class="skill-item-title">
                          <i class="fa fa-picture-o"></i> Hình ảnh</h3>
                          <input onchange="upload_product();return false;" type="file" id="file_product" value="">
                          <?php if (!empty($wpjobus_company_portfolio[$i][3])) {
                          ?>
                          <img id="img_product" src="<?php echo $wpjobus_company_portfolio[$i][3]; ?>" width="200"/>
                          <?php
                          } else {
                          ?>
                          <img id="img_product" src="" width="200" style="display:none;"/>
                          <?php
                          }
                          ?>
                          <input name="wpjobus_company_portfolio[<?php echo $i; ?>][3]" type="hidden" id="portfolio_name"
                          value="<?php echo $wpjobus_company_portfolio[$i][3]; ?>">
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
                <button type="button" class="delete_portfolio"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                <button type="button" class="add_portfolio"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm dự án</button>
              </div>
            </div>
            <div class="divider"></div>
            <div class="button">
              <p>
                <input type="submit" id="save_draf" name="save_draf" value="Lưu nháp"/>
                <input type="submit" class="save_add_company" id="save_pending" name="save_pending" value="Gửi hồ sơ công ty để xem xét"/>
              </p>
            </div>
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
$upload_dir = wp_upload_dir();
if(isset($_GET['company_id']) !="")
{
$my_post = array(
'ID' => $_GET['job_id'],
'post_title' => $_POST['wpjobus_job_fullname'],
'post_status' => 'draft',
'post_type' => 'company',
'comment_status' => 'open',
'ping_status' => 'open',
);
wp_update_post( $my_post );
$td_post_id=$_GET['company_id'];
}
else{
$my_post = array(
'post_title' =>$_POST['wpjobus_job_fullname'],
'post_content' => strip_tags($_POST['postContent']),
'post_type' => 'company',
'comment_status' => 'open',
'ping_status' => 'open',
'post_status' => 'draft'
);
$td_post_id = wp_insert_post( $my_post );
}
if($_POST['wpjobus_company_foundyear']=="") {
$year = date('Y');
}
else{
$year= $_POST['wpjobus_company_foundyear'];
}
if($_POST['wpjobus_company_profile_picture'] !="")
{
$wpjobus_company_profile_pictures= $upload_dir['url'].'/'.$_POST['wpjobus_company_profile_picture'];
}
else if($wpjobus_company_profile_picture !=""){
$wpjobus_company_profile_pictures= $wpjobus_company_profile_picture;
}
if($_POST['wpjobus_company_cover_image'] !="")
{
$wpjobus_company_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_company_cover_image'];
}
else if($wpjobus_company_cover_image !=""){
$wpjobus_company_cover_images= $wpjobus_company_cover_image;
}
update_post_meta($td_post_id, 'wpjobus_company_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_tagline', wp_kses($_POST['wpjobus_company_tagline'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_foundyear', wp_kses($year, $td_allowed));
update_post_meta($td_post_id, 'company_team_size', wp_kses($_POST['company_team_size'], $td_allowed));
update_post_meta($td_post_id, 'company_industry', wp_kses($_POST['company_industry'], $td_allowed));
update_post_meta($td_post_id, 'company_location', wp_kses($_POST['company_location'], $td_allowed));
update_post_meta($td_post_id, 'company-about-me', htmlentities(stripslashes($_POST['postContent'])));
update_post_meta($td_post_id, 'wpjobus_company_profile_picture', wp_kses($wpjobus_company_profile_pictures, $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_cover_image', wp_kses($wpjobus_company_cover_images, $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_prof_title', wp_kses($_POST['wpjobus_company_prof_title'], $td_allowed));
update_post_meta($td_post_id, 'resume_career_level', wp_kses($_POST['resume_career_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_services', $_POST['wpjobus_company_services']);
update_post_meta($td_post_id, 'wpjobus_company_native_language', wp_kses($_POST['wpjobus_company_native_language'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_languages', $_POST['wpjobus_company_languages']);
update_post_meta($td_post_id, 'wpjobus_company_expertise', wp_kses($_POST['wpjobus_company_expertise'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_award', $_POST['wpjobus_company_award']);
update_post_meta($td_post_id, 'wpjobus_company_clients', $_POST['wpjobus_company_clients']);
update_post_meta($td_post_id, 'wpjobus_company_testimonials', $_POST['wpjobus_company_testimonials']);
update_post_meta($td_post_id, 'wpjobus_company_file', $_POST['wpjobus_company_file']);
update_post_meta($td_post_id, 'wpjobus_company_file_name', $_POST['wpjobus_company_file_name']);
update_post_meta($td_post_id, 'wpjobus_company_remuneration', $_POST['wpjobus_company_remuneration']);
update_post_meta($td_post_id, 'wpjobus_company_remuneration_per', $_POST['wpjobus_company_remuneration_per']);
$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
$str = preg_replace('/\D/', '', $remuneration_ammount);
update_post_meta($td_post_id, 'wpjobus_company_remuneration_raw', $str);
update_post_meta($td_post_id, 'wpjobus_company_job_freelance', $_POST['wpjobus_company_job_freelance']);
update_post_meta($td_post_id, 'wpjobus_company_job_part_time', $_POST['wpjobus_company_job_part_time']);
update_post_meta($td_post_id, 'wpjobus_company_job_full_time', $_POST['wpjobus_company_job_full_time']);
update_post_meta($td_post_id, 'wpjobus_company_job_internship', $_POST['wpjobus_company_job_internship']);
update_post_meta($td_post_id, 'wpjobus_company_job_volunteer', $_POST['wpjobus_company_job_volunteer']);
update_post_meta($td_post_id, 'wpjobus_company_portfolio', $_POST['wpjobus_company_portfolio']);
update_post_meta($td_post_id, 'wpjobus_company_address', $_POST['wpjobus_company_address']);
update_post_meta($td_post_id, 'wpjobus_company_phone', $_POST['wpjobus_company_phone']);
update_post_meta($td_post_id, 'wpjobus_company_website', $_POST['wpjobus_company_website']);
update_post_meta($td_post_id, 'wpjobus_company_email', $_POST['wpjobus_company_email']);
update_post_meta($td_post_id, 'wpjobus_company_publish_email', $_POST['wpjobus_company_publish_email']);
update_post_meta($td_post_id, 'wpjobus_company_facebook', $_POST['wpjobus_company_facebook']);
update_post_meta($td_post_id, 'wpjobus_company_linkedin', $_POST['wpjobus_company_linkedin']);
update_post_meta($td_post_id, 'wpjobus_company_twitter', $_POST['wpjobus_company_twitter']);
update_post_meta($td_post_id, 'wpjobus_company_googleplus', $_POST['wpjobus_company_googleplus']);
update_post_meta($td_post_id, 'wpjobus_company_googleaddress', $_POST['wpjobus_company_googleaddress']);
update_post_meta($td_post_id, 'wpjobus_company_longitude', $_POST['wpjobus_company_longitude']);
update_post_meta($td_post_id, 'wpjobus_company_latitude', $_POST['wpjobus_company_latitude']);
?>
<script>
jQuery(document).ready(function ($) {
var url = "<?php echo home_url('/')."edit-company/?company_id=".$td_post_id.""?>";
location.href = url;
});
</script>
<?php
}
if(isset($_POST['save_pending']))
{
global  $td_allowed;
global $wpdb;
$upload_dir = wp_upload_dir();
if(isset($_GET['company_id']) !="")
{
$my_post = array(
'ID' => $_GET['job_id'],
'post_title' => $_POST['wpjobus_job_fullname'],
'post_status' => 'pending',
'post_type' => 'company',
'comment_status' => 'open',
'ping_status' => 'open',
);
wp_update_post( $my_post );
$td_post_id=$_GET['company_id'];
}
else{
$my_post = array(
'post_title' =>$_POST['wpjobus_job_fullname'],
'post_content' => strip_tags($_POST['postContent']),
'post_type' => 'company',
'comment_status' => 'open',
'ping_status' => 'open',
'post_status' => 'pending'
);
$td_post_id = wp_insert_post( $my_post );
}
if($_POST['wpjobus_company_foundyear']=="") {
$year = date('Y');
}
else{
$year= $_POST['wpjobus_company_foundyear'];
}
if($_POST['wpjobus_company_profile_picture'] !="")
{
$wpjobus_company_profile_pictures= $upload_dir['url'].'/'.$_POST['wpjobus_company_profile_picture'];
}
else if($wpjobus_company_profile_picture !=""){
$wpjobus_company_profile_pictures= $wpjobus_company_profile_picture;
}
if($_POST['wpjobus_company_cover_image'] !="")
{
$wpjobus_company_cover_images= $upload_dir['url'].'/'.$_POST['wpjobus_company_cover_image'];
}
else if($wpjobus_company_cover_image !=""){
$wpjobus_company_cover_images= $wpjobus_company_cover_image;
}
update_post_meta($td_post_id, 'wpjobus_company_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_tagline', wp_kses($_POST['wpjobus_company_tagline'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_foundyear', wp_kses($year, $td_allowed));
update_post_meta($td_post_id, 'company_team_size', wp_kses($_POST['company_team_size'], $td_allowed));
update_post_meta($td_post_id, 'company_industry', wp_kses($_POST['company_industry'], $td_allowed));
update_post_meta($td_post_id, 'company_location', wp_kses($_POST['company_location'], $td_allowed));
update_post_meta($td_post_id, 'company-about-me', htmlentities(stripslashes($_POST['postContent'])));
update_post_meta($td_post_id, 'wpjobus_company_profile_picture', wp_kses($wpjobus_company_profile_pictures, $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_cover_image', wp_kses($wpjobus_company_cover_images, $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_prof_title', wp_kses($_POST['wpjobus_company_prof_title'], $td_allowed));
update_post_meta($td_post_id, 'resume_career_level', wp_kses($_POST['resume_career_level'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_services', $_POST['wpjobus_company_services']);
update_post_meta($td_post_id, 'wpjobus_company_native_language', wp_kses($_POST['wpjobus_company_native_language'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_languages', $_POST['wpjobus_company_languages']);
update_post_meta($td_post_id, 'wpjobus_company_expertise', wp_kses($_POST['wpjobus_company_expertise'], $td_allowed));
update_post_meta($td_post_id, 'wpjobus_company_award', $_POST['wpjobus_company_award']);
update_post_meta($td_post_id, 'wpjobus_company_clients', $_POST['wpjobus_company_clients']);
update_post_meta($td_post_id, 'wpjobus_company_testimonials', $_POST['wpjobus_company_testimonials']);
update_post_meta($td_post_id, 'wpjobus_company_file', $_POST['wpjobus_company_file']);
update_post_meta($td_post_id, 'wpjobus_company_file_name', $_POST['wpjobus_company_file_name']);
update_post_meta($td_post_id, 'wpjobus_company_remuneration', $_POST['wpjobus_company_remuneration']);
update_post_meta($td_post_id, 'wpjobus_company_remuneration_per', $_POST['wpjobus_company_remuneration_per']);
$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
$str = preg_replace('/\D/', '', $remuneration_ammount);
update_post_meta($td_post_id, 'wpjobus_company_remuneration_raw', $str);
update_post_meta($td_post_id, 'wpjobus_company_job_freelance', $_POST['wpjobus_company_job_freelance']);
update_post_meta($td_post_id, 'wpjobus_company_job_part_time', $_POST['wpjobus_company_job_part_time']);
update_post_meta($td_post_id, 'wpjobus_company_job_full_time', $_POST['wpjobus_company_job_full_time']);
update_post_meta($td_post_id, 'wpjobus_company_job_internship', $_POST['wpjobus_company_job_internship']);
update_post_meta($td_post_id, 'wpjobus_company_job_volunteer', $_POST['wpjobus_company_job_volunteer']);
update_post_meta($td_post_id, 'wpjobus_company_portfolio', $_POST['wpjobus_company_portfolio']);
update_post_meta($td_post_id, 'wpjobus_company_address', $_POST['wpjobus_company_address']);
update_post_meta($td_post_id, 'wpjobus_company_phone', $_POST['wpjobus_company_phone']);
update_post_meta($td_post_id, 'wpjobus_company_website', $_POST['wpjobus_company_website']);
update_post_meta($td_post_id, 'wpjobus_company_email', $_POST['wpjobus_company_email']);
update_post_meta($td_post_id, 'wpjobus_company_publish_email', $_POST['wpjobus_company_publish_email']);
update_post_meta($td_post_id, 'wpjobus_company_facebook', $_POST['wpjobus_company_facebook']);
update_post_meta($td_post_id, 'wpjobus_company_linkedin', $_POST['wpjobus_company_linkedin']);
update_post_meta($td_post_id, 'wpjobus_company_twitter', $_POST['wpjobus_company_twitter']);
update_post_meta($td_post_id, 'wpjobus_company_googleplus', $_POST['wpjobus_company_googleplus']);
update_post_meta($td_post_id, 'wpjobus_company_googleaddress', $_POST['wpjobus_company_googleaddress']);
update_post_meta($td_post_id, 'wpjobus_company_longitude', $_POST['wpjobus_company_longitude']);
update_post_meta($td_post_id, 'wpjobus_company_latitude', $_POST['wpjobus_company_latitude']);
?>
<script>
jQuery(document).ready(function ($) {
var url = "<?php echo home_url('/')."edit-company/?company_id=".$td_post_id.""?>";
location.href = url;
});
</script>
<?php
}
?>