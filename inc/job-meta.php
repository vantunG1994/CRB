<?php

/**************************************
Custom Post Meta Boxes
 ***************************************/

add_action('add_meta_boxes', 'register_job_settings');
function register_job_settings () {
    add_meta_box('wpjobus_job_basic_settings', 'Thông tin cơ bản', 'display_wpjobus_job_basic_settings','job');
    add_meta_box('wpjobus_job_skills_settings', 'Các kỹ năng yêu cầu', 'display_wpjobus_job_skills_settings','job');
    add_meta_box('wpjobus_job_salary_settings', 'Mức lương và hình thức công việc', 'display_wpjobus_job_salary_settings','job');
    add_meta_box('wpjobus_job_contact_settings', 'Thông tin liên hệ', 'display_wpjobus_job_contact_settings','job');
}

function display_wpjobus_job_basic_settings ($post)
{
    //get the post meta data

    $wpjobus_job_fullname = esc_attr(get_post_meta($post->ID, 'wpjobus_job_fullname', true));
    $td_resume_gender = esc_attr(get_post_meta($post->ID, 'resume_gender', true));
    $td_resume_month_birth = esc_attr(get_post_meta($post->ID, 'resume_month_birth', true));
    $td_resume_day_birth = esc_attr(get_post_meta($post->ID, 'resume_day_birth', true));
    $td_resume_year_birth = esc_attr(get_post_meta($post->ID, 'resume_year_birth', true));
    $td_job_years_of_exp = esc_attr(get_post_meta($post->ID, 'job_years_of_exp', true));
    $td_job_industry = esc_attr(get_post_meta($post->ID, 'job_industry', true));
    $td_job_location = esc_attr(get_post_meta($post->ID, 'job_location', true));
    $td_job_company = esc_attr(get_post_meta($post->ID, 'job_company', true));
    $td_job_company_id = esc_attr(get_post_meta($post->ID, 'job_company_id', true));
    $td_job_career_level = esc_attr(get_post_meta($post->ID, 'job_career_level', true));
    $resume_about_me = esc_attr(get_post_meta($post->ID, 'job-about-me', true));
    $wpjobus_job_profile_picture = esc_attr(get_post_meta($post->ID, 'wpjobus_job_profile_picture', true));
    $wpjobus_job_cover_image = esc_attr(get_post_meta($post->ID, 'wpjobus_job_cover_image', true));
    $wpjobus_job_file = esc_attr(get_post_meta($post->ID, 'wpjobus_job_file', true));
    $wpjobus_job_file_name = esc_attr(get_post_meta($post->ID, 'wpjobus_job_file_name', true));

    $td_job_presence_type = esc_attr(get_post_meta($post->ID, 'job_presence_type', true));
    $td_job_date_expired = esc_attr(get_post_meta($post->ID, 'wpjobus_job_expired', true)) ?: "";


    ?>

    <input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>"/>

    <style>
        #review_options_popup {
            display: block;
        }

        #poststuff #titlewrap, #post-body #normal-sortables {
            display: none;
        }

        #review_options_popup .option_item {
            background: #FFF;
            margin: 0 -10px 0 -10px;
            border-bottom: 1px solid #EEE;
            padding: 14px 10px 14px 10px;
            width: 100%;
        }

        #review_options_popup .option_item span.text {
            float: left;
            display: block;
            width: 150px;
            margin-top: 5px;
        }

        #review_options_popup .option_item .criteria_name {
            float: left;
            margin-right: 36px;
            width: 400px;
        }

        #review_options_popup .option_item span.text {
            width: 150px;
            margin-right: 10px;
        }

        #review_options_popup .option_item input {
            float: left;
            margin-right: 20px;
        }

        .full {
            width: 100%;
            display: inline-block;
        }

        .recipe-desc {
            float: left;
        }

        .info-text {
            font-style: italic;
            float: left;
            margin-top: 10px;
            width: 70%;
            margin-left: 113px;
        }

        .criteria-image {
            max-width: 590px;
            height: auto;
        }

        div#postbox-container-1 {
            margin-top: 300% !important;
        }

    </style>
    <?php
    global $wpdb;
    $job_field=$wpdb->get_results('select * from job_field ');
    $job_province=$wpdb->get_results('select * from job_province ');
    ?>

    <div id='review_options_popup'>

    <div class="option_item" style="height: 24px;">

        <span class='text overall'>Tiêu đề tuyển dụng:</span>

        <input type='text' id="review-name" class='' name='wpjobus_job_fullname' style="width: 300px; float: left;"
               value='<?php echo $wpjobus_job_fullname; ?>' placeholder=""/>

    </div>

    <div class="option_item">

    <div class="full">

    <span class='text overall'>Cấp bậc:</span>

    <div style="float: left;">
    <select name="job_career_level" id="job_career_level" style="width: 260px; margin-right: 10px;">
            <?php
            if ($td_job_career_level != "") {

                 ?>

              <option value='<?php echo $td_job_career_level; ?>'><?php echo $td_job_career_level; ?></option>
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
                            <?php

                        ?>
                    </select>
                </div>

            </div>

        </div>



        <div class="option_item">

            <div class="full">

                <span class='text overall'>Số năm kinh nghiệm:</span>

                <div style="float: left;">
                    <select name="job_years_of_exp" id="job_years_of_exp" style="width: 260px; margin-right: 10px;">
                        <?php
                        for ($i = 1; $i <= 20; $i++) {
                            ?>
                            <option value='<?php echo $i; ?>' <?php selected( $td_job_years_of_exp, $i ); ?>><?php echo $i; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

            </div>

        </div>

        <div class="option_item">

            <div class="full">

                <span class='text overall'>Ngành nghề:</span>

                <div style="float: left;">
                    <select name="job_industry" id="job_industry" style="width: 260px; margin-right: 10px;">
                        <?php
                        foreach ($job_field as $industry) {
                            ?>
                            <option  <?php selected( $td_job_industry,$industry->name ); ?> value="<?php echo $industry->name; ?>"><?php echo $industry->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

            </div>

        </div>

        <div class="option_item">

            <div class="full">
                <?php  $id_location = esc_attr(get_post_meta($_GET['post'], 'job_location', true)); ?>
                <?php   $dictrict = esc_attr(get_post_meta($_GET['post'], 'job_dictrict', true)); ?>

                <span class='text overall'>Tỉnh thành: </span>

                <div style="float: left;">
                    <select name="job_location" class="city" id="job_location" style="width: 260px; margin-right: 10px;">
                        <?php

                        global $wpdb;
                        $kq = $wpdb->get_results("SELECT * FROM caribcity ");
                        if( $id_location!="")
                        {
                            ?>
                            <option id="name" value="<?php echo  $id_location; ?>"><?php echo  $id_location; ?></option>

                            <?php
                        }
                        else{
                            ?>
                            <option value="">Lựa chọn tỉnh thành</option>
                            <?php
                        }
                        ?>

                        <?php

                        foreach ($kq as $categories) {

                            ?>
                            <option id="name"
                                    value="<?php echo  $categories->id; ?>"><?php echo $categories->name; ?></option>

                            <?php
                        }

                        ?>
                    </select>




                </div>

            </div>

        </div>
        <div class="option_item">

            <div class="full">

                <span class='text overall'>Quận/Huyện:</span>

                <div style="float: left;">
                    <select name="dictricts" id="dictrict"  style="width: 100%; margin-right: 10px;">
                        <?php
                        if($dictrict!="")
                        {
                            ?>
                            <option id="name" value="<?php echo $dictrict; ?>"><?php echo $dictrict; ?></option>

                            <?php
                        }else{
                            ?>

                            <option value="">Lựa chọn quận huyện</option>
                            <?php

                        }
                        ?>
                    </select>
                    <input name="dictrict" id="value" type="hidden" size="25" value="">

                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $(".dictrict").change(function() {
                                var id= $(".dictrict :selected").text();
                                $("#value").val(id);


                            });
                            var id= $(".dictrict :selected").text();
                            $("#value").val(id);
                        });

                    </script>

                </div>

            </div>

        </div>
        <div class="option_item">

            <div class="full">

                <span class='text overall'>Hạn nộp hồ sơ:</span>
                <input type="date" name="expired_at" value="<?php echo $td_job_date_expired; ?>">

            </div>

        </div>

        <div class="option_item">

            <div class="full">

                <span class='text overall'>Công ty:</span>
                <?php

                if(isset($_GET["post"]))
                {
                    $td_job_company = esc_attr(get_post_meta($_GET["post"], 'job_company',true));
                    $wpjobus_company_fullname = esc_attr(get_post_meta($td_job_company, 'wpjobus_company_fullname',true));
                    if($wpjobus_company_fullname=="")
                    {
                        $postID = get_post_id_by_meta_key_and_value('old_company_id', $td_job_company);
                        $wpjobus_company_fullname = esc_attr(get_post_meta( $postID, 'wpjobus_company_fullname',true));

                    }


                    ?>
                    <input type="text" name="job_company" placeholder="Nhập chính xác Tên Công Ty" class="job_company_search" style="width: 260px; margin-right: 10px;"value="<?php echo $wpjobus_company_fullname; ?>"/>

                    <?php
                }
                else {
                    ?>

                    <input type="text" name="job_company" placeholder="Nhập chính xác Tên Công Ty" class="job_company_search" style="width: 260px; margin-right: 10px;"/>


                    <?php
                }
                ?>
            </div>
            <div class="result_company" style="background: whitesmoke;
    margin-left: 20%;
    width: 350px;"></div>

        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text">Mô tả công việc:</span>
					<textarea class="recipe-desc" name="job-about-me" id='job-about-me' cols="70" rows="7" ><?php echo $resume_about_me; ?></textarea>
				</span>

        </div>

        <div class="option_item">

				<span class="full">
						<span class="text">Ảnh đại diện</span>

						<span>

						<?php if(!empty($wpjobus_job_cover_image)) { ?>

                            <div style="width: 90%; width: -webkit-calc(100% - 120px); width: calc(100% - 120px);  float: left;"><img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_job_cover_image)) echo $wpjobus_job_cover_image; ?>" style="float: left; margin-bottom: 20px;" /> </div>
                            <input class="criteria-image-url" id="your_image_url" type="text" size="36" name="wpjobus_job_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_job_cover_image)) echo $wpjobus_job_cover_image; ?>" />
                            <input class="criteria-image-button-remove button" id="wpjobus_job_cover_image" type="button" style="max-width: 140px; float: left; margin-top: 10px; margin-left: 112px;" value="Xoá" /> </br>
                            <input class="criteria-image-button button" id="your_image_url_button" type="button" style="max-width: 140px; float: left; margin-top: 10px; display: none;" value="Tải hình ảnh" /> </br>

                        <?php } else { ?>

                            <div style="width: 90%; width: -webkit-calc(100% - 120px); width: calc(100% - 120px);  float: left;"><img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_job_cover_image)) echo $wpjobus_job_cover_image; ?>" style="float: left; margin-bottom: 20px;" /> </div>
                            <input class="criteria-image-url" id="your_image_url<?php echo $i; ?>2" type="text" size="36" name="wpjobus_job_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_job_cover_image)) echo $wpjobus_job_cover_image; ?>" />
                            <input class="criteria-image-button-remove button" id="your_image_url_button_remove" type="button" style="max-width: 140px; float: left; margin-top: 10px; margin-left: 112px; display: none;" value="Xoá" /> </br>
                            <input class="criteria-image-button button" id="your_image_url_button" type="button" style="max-width: 140px; float: left; margin-top: 10px;" value="Tải hình ảnh" /> </br>

                        <?php } ?>

                            <script>
                                var image_custom_uploader;
                                var $thisItem = '';

                                jQuery(document).on('click','.criteria-image-button', function(e) {
                                    e.preventDefault();

                                    $thisItem = jQuery(this);

                                    //If the uploader object has already been created, reopen the dialog
                                    if (image_custom_uploader) {
                                        image_custom_uploader.open();
                                        return;
                                    }

                                    //Extend the wp.media object
                                    image_custom_uploader = wp.media.frames.file_frame = wp.media({
                                        title: 'Choose Image',
                                        button: {
                                            text: 'Choose Image'
                                        },
                                        multiple: false
                                    });

                                    //When a file is selected, grab the URL and set it as the text field's value
                                    image_custom_uploader.on('select', function() {
                                        attachment = image_custom_uploader.state().get('selection').first().toJSON();
                                        var url = '';
                                        url = attachment['url'];
                                        $thisItem.parent().find('.criteria-image-url').val(url);
                                        $thisItem.parent().find( "img.criteria-image" ).attr({
                                            src: url
                                        });
                                        $thisItem.parent().find(".criteria-image-button").css("display", "none");
                                        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
                                    });

                                    //Open the uploader dialog
                                    image_custom_uploader.open();
                                });

                                jQuery(document).on('click','.criteria-image-button-remove', function(e) {
                                    jQuery(this).parent().find('.criteria-image-url').val('');
                                    jQuery(this).parent().find( "img.criteria-image" ).attr({
                                        src: ''
                                    });
                                    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
                                    jQuery(this).css("display", "none");
                                });
                            </script>

			        	</span>

			        </span>

        </div>

        <br>

    </div>	<!-- end review_options_pop -->


    <?php

}

// Ingredients Post Meta //


function display_wpjobus_job_skills_settings ($post) {
    //get the post meta data

    $wpjobus_job_prof_title = esc_attr(get_post_meta($post->ID, 'wpjobjobus_job_prof_title',true));
    $td_job_career_level = esc_attr(get_post_meta($post->ID, 'job_career_level',true));

    $wpjobus_job_comm_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_comm_level',true));
    $wpjobus_job_comm_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_comm_note',true));

    $wpjobus_job_org_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_org_level',true));
    $wpjobus_job_org_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_org_note',true));

    $wpjobus_job_job_rel_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_job_rel_level',true));
    $wpjobus_job_job_rel_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_job_rel_note',true));

    $wpjobus_job_skills = get_post_meta($post->ID, 'wpjobus_job_skills',true);

    $wpjobus_job_native_language = esc_attr(get_post_meta($post->ID, 'wpjobus_job_native_language',true));

    $wpjobus_job_languages = get_post_meta($post->ID, 'wpjobus_job_languages',true);

    $wpjobus_job_hobbies = esc_attr(get_post_meta($post->ID, 'wpjobus_job_hobbies',true));

    ?>

    <input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />

    <div id='review_options_popup'>

        <div class="option_item">

				<span class='full'>
					<span class="text">Trình độ giao tiếp:</span>
					<input type='text' id="review-name" class='' name='wpjobus_job_comm_level' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_comm_level; ?>' placeholder="70%" />
					<span class="info-text" style="margin-left: 0;">%(1 to 100 value)</span>
				</span>

        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text">Thông tin liên lạc:</span>
					<textarea class="recipe-desc" name="wpjobus_job_comm_note" id='wpjobus_job_comm_note' cols="70" rows="7" ><?php echo $wpjobus_job_comm_note; ?></textarea>
				</span>

        </div>


        <div class="option_item">

				<span class='full'>
					<span class="text">Kỹ năng tổ chức:</span>
					<input type='text' id="review-name" class='' name='wpjobus_job_org_level' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_org_level; ?>' placeholder="70%" />
					<span class="info-text" style="margin-left: 0;">%(1 to 100 value)</span>
				</span>

        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text">Ghi chú kỹ năng:</span>
					<textarea class="recipe-desc" name="wpjobus_job_org_note" id='wpjobus_job_org_note' cols="70" rows="7" ><?php echo $wpjobus_job_org_note; ?></textarea>
				</span>

        </div>


        <div class="option_item">

				<span class='full'>
					<span class="text">Kỹ năng liên quan đến công việc:</span>
					<input type='text' id="review-name" class='' name='wpjobus_job_job_rel_level' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_job_rel_level; ?>' placeholder="70%" />
					<span class="info-text" style="margin-left: 0;">%(1 to 100 value)</span>
				</span>

        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text">Ghi chú kỹ năng:</span>
					<textarea class="recipe-desc" name="wpjobus_job_job_rel_note" id='wpjobus_job_job_rel_note' cols="70" rows="7" ><?php echo $wpjobus_job_job_rel_note; ?></textarea>
				</span>

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text'>Các kỹ năng</span>

        </div>

        <div id="review_job_criteria">
            <?php
            for ($i = 0; $i < (count($wpjobus_job_skills)); $i++) {
                ?>

                <div class="option_item" id="<?php echo $i; ?>">

                    <span class='text'>Kỹ năng <?php echo ($i+1); ?></span>
                    <input type='text' id='wpjobus_job_skills[<?php echo $i; ?>][0]' name='wpjobus_job_skills[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_job_skills[$i][0])) echo $wpjobus_job_skills[$i][0]; ?>' class='criteria_name' placeholder="Title">
                    <input type='text' id='wpjobus_job_skills[<?php echo $i; ?>][1]' name='wpjobus_job_skills[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_job_skills[$i][1])) {echo $wpjobus_job_skills[$i][1];} else {echo 0;} ?>' class='slider_value' placeholder="70%">
                    <button name="button_del_job_criteria" type="button" class="button-secondary button_del_job_criteria">xoá</button>

                </div>

                <?php
            }
            ?>


        </div>

        <div id="template_job_criterion">

            <div class="option_item" id="999">
                <span class='text'>Kỹ năng chuyên môn 999</span>
                <input type='text' id='' name='' value='' class='criteria_name' placeholder="Title">
                <input type='text' id='' name='' value='' class='slider_value' placeholder="70%">
                <button name="button_del_job_criteria" type="button" class="button-secondary button_del_job_criteria">xoá</button>
            </div>

        </div>

        <div class="option_item">
            <button type="button" name="submit_add_job_criteria" id='submit_add_job_criteria' value="add" class="button-secondary">Thêm mới kỹ năng</button>
        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text">Ngôn ngữ mẹ đẻ:</span>
					<input type='text' id="review-name" class='' name='wpjobus_job_native_language' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_native_language; ?>' placeholder="" />
				</span>

        </div>

        <div id="job_languages">
            <?php
            for ($i = 0; $i < (count($wpjobus_job_languages)); $i++) {
                ?>

                <div class="option_item" id="<?php echo $i; ?>">

                    <span class='text'>Ngoại ngữ <?php echo ($i+1); ?></span>

                    <div class="full" style="margin-top: 20px;">

                        <span class="text">Tên</span>
                        <input type='text' id="wpjobus_job_languages[<?php echo $i; ?>][0]" class="resume_lang_title" name='wpjobus_job_languages[<?php echo $i; ?>][0]' style="width: 300px; float: left;" value='<?php if (!empty($wpjobus_job_languages[$i][0])) echo $wpjobus_job_languages[$i][0]; ?>' placeholder="" />

                    </div>

                    <div class="full" style="margin-top: 20px;">

                        <span class='text'>Dịch thuật</span>
                        <select class="resume_lang_understanding" name="wpjobus_job_languages[<?php echo $i; ?>][1]" id="wpjobus_job_languages[<?php echo $i; ?>][1]" style="width: 260px; margin-right: 10px;">
                            <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 1" ); } ?>>Level 1</option>
                            <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 2" ); } ?>>Level 2</option>
                            <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 3" ); } ?>>Level 3</option>
                            <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 4" ); } ?>>Level 4</option>
                            <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][1])) { selected( $wpjobus_job_languages[$i][1], "Level 5" ); } ?>>Level 5</option>
                        </select>

                    </div>

                    <div class="full" style="margin-top: 20px;">

                        <span class='text'>Giao tiếp</span>
                        <select class="resume_lang_speaking" name="wpjobus_job_languages[<?php echo $i; ?>][2]" id="wpjobus_job_languages[<?php echo $i; ?>][2]" style="width: 260px; margin-right: 10px;">
                            <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 1" ); } ?>>Level 1</option>
                            <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 2" ); } ?>>Level 2</option>
                            <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 3" ); } ?>>Level 3</option>
                            <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 4" ); } ?>>Level 4</option>
                            <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][2])) { selected( $wpjobus_job_languages[$i][2], "Level 5" ); } ?>>Level 5</option>
                        </select>

                    </div>

                    <div class="full" style="margin-top: 20px; margin-bottom: 20px;">

                        <span class='text'>Viết</span>
                        <select class="resume_lang_writing" name="wpjobus_job_languages[<?php echo $i; ?>][3]" id="wpjobus_job_languages[<?php echo $i; ?>][3]" style="width: 260px; margin-right: 10px;">
                            <option value='Level 1' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 1" ); } ?>>Level 1</option>
                            <option value='Level 2' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 2" ); } ?>>Level 2</option>
                            <option value='Level 3' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 3" ); } ?>>Level 3</option>
                            <option value='Level 4' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 4" ); } ?>>Level 4</option>
                            <option value='Level 5' <?php if(!empty($wpjobus_job_languages[$i][3])) { selected( $wpjobus_job_languages[$i][3], "Level 5" ); } ?>>Level 5</option>
                        </select>

                    </div>

                    <button name="button_del_job_language" type="button" class="button-secondary button_del_job_language">xoá</button>

                </div>

                <?php
            }
            ?>


        </div>

        <div id="template_job_language">

            <div class="option_item" id="999">
                <span class='text'>Ngôn ngữ 999</span>

                <div class="full" style="margin-top: 20px;">

                    <span class="text">Tên:</span>
                    <input type='text' id="" class="resume_lang_title" name='' style="width: 300px; float: left;" value='' placeholder="" />

                </div>

                <div class="full" style="margin-top: 20px;">

                    <span class='text'>Dịch thuật</span>
                    <select name="" id="" style="width: 260px; margin-right: 10px;" class="resume_lang_understanding">
                        <option value='Level 1' >Level 1</option>
                        <option value='Level 2' >Level 2</option>
                        <option value='Level 3' >Level 3</option>
                        <option value='Level 4' >Level 4</option>
                        <option value='Level 5' >Level 5</option>
                    </select>

                </div>

                <div class="full" style="margin-top: 20px;">

                    <span class='text'>Giao tiếp</span>
                    <select name="" id="" style="width: 260px; margin-right: 10px;" class="resume_lang_speaking">
                        <option value='Level 1' >Level 1</option>
                        <option value='Level 2' >Level 2</option>
                        <option value='Level 3' >Level 3</option>
                        <option value='Level 4' >Level 4</option>
                        <option value='Level 5' >Level 5</option>
                    </select>

                </div>

                <div class="full" style="margin-top: 20px; margin-bottom: 20px;">

                    <span class='text'>Viết</span>
                    <select name="" id="" style="width: 260px; margin-right: 10px;">
                        <option value='Level 1' >Level 1</option>
                        <option value='Level 2' >Level 2</option>
                        <option value='Level 3' >Level 3</option>
                        <option value='Level 4' >Level 4</option>
                        <option value='Level 5' >Level 5</option>
                    </select>

                </div>

                <button name="button_del_job_language" type="button" class="button-secondary button_del_job_language">xoá</button>
            </div>

        </div>

        <div class="option_item">
            <button type="button" name="submit_add_job_language" id='submit_add_job_language' value="add" class="button-secondary">Thêm mới ngôn ngữ</button>
        </div>

        <div class="option_item">

				<span class='full'>
					<span class="text" style="width: 220px;">Yêu cầu bổ sung:</span>
					<input type='text' id="review-name" class='' name='wpjobus_job_hobbies' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_hobbies; ?>' placeholder="" />
					<span class="info-text" style="margin-left: 0;">Chèn nhiều yêu cầu và phân tách chúng bằng dấu phẩy</span>
				</span>

        </div>

        <br>


    </div>	<!-- end review_options_pop -->





    <?php

}

function display_wpjobus_job_salary_settings ($post) {

    //get the post meta data
    $wpjobus_job_remuneration = get_post_meta($post->ID, 'wpjobus_job_remuneration',true);
    $wpjobus_job_remuneration_per = get_post_meta($post->ID, 'wpjobus_job_remuneration_per',true);

    $wpjobus_job_type = get_post_meta($post->ID, 'wpjobus_job_type',true);

    $wpjobus_job_benefits = get_post_meta($post->ID, 'wpjobus_job_benefits',true);

    ?>

    <input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />

    <div id='review_options_popup'>

        <div id="wpjobus_job_remuneration" class="option_item" style="height: 24px;">

            <span  class='text overall' style="width: 200px;">Mức lương:</span>

            <input type='number' id="review-name" class='' name='wpjobus_job_remuneration' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_remuneration; ?>' placeholder="" />

        </div>

        <div class="option_item">

            <div class="full">

                <span class='text overall' style="width: 200px;">Mỗi:</span>

                <div style="float: left;">
                    <select name="wpjobus_job_remuneration_per" id="wpjobus_job_remuneration_per" style="width: 260px;">
                        <?php
                        global $redux_demo;
                        for ($i = 0; $i < count($redux_demo['job-remuneration-per']); $i++) {
                            ?>
                            <option value='<?php echo $redux_demo['job-remuneration-per'][$i]; ?>' <?php selected( $wpjobus_job_remuneration_per, $redux_demo["job-remuneration-per"][$i] ); ?>><?php echo $redux_demo['job-remuneration-per'][$i]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

            </div>

        </div>

        <div class="option_item" style="height: 24px;">

            <div class="full">

                <span class='text overall' style="width: 200px;">Hình thức công việc:</span>

                <div style="float: left;">
                    <select name="wpjobus_job_type" id="wpjobus_job_type" style="width: 260px;">
                        <?php
                        global $redux_demo;
                        for ($i = 0; $i < count($redux_demo['job-type']); $i++) {
                            ?>
                            <option value='<?php echo $redux_demo['job-type'][$i]; ?>' <?php selected( $wpjobus_job_type, $redux_demo["job-type"][$i] ); ?>><?php echo $redux_demo['job-type'][$i]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

            </div>

        </div>

        <div id="review_job_benefit">
            <?php
            for ($i = 0; $i < (count($wpjobus_job_benefits)); $i++) {
                ?>

                <div class="option_item" id="<?php echo $i; ?>">

                    <span class='text'>Phúc lợi <?php echo ($i+1); ?></span>

                    <div class="full" style="margin-top: 20px;">

                        <span class='text'>Tên phúc lợi</span>
                        <input type='text' id='wpjobus_job_benefits[<?php echo $i; ?>][0]' name='wpjobus_job_benefits[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_job_benefits[$i][0])) echo $wpjobus_job_benefits[$i][0]; ?>' class='criteria_name' placeholder="Title">

                    </div>

                    <div class="full" style="margin-top: 20px;">

                        <span class='text'>Mô tả phúc lợi</span>
                        <textarea class="job-benefit-desc" name="wpjobus_job_benefits[<?php echo $i; ?>][1]" id='wpjobus_job_benefits[<?php echo $i; ?>][1]' cols="70" rows="7" ><?php if (!empty($wpjobus_job_benefits[$i][1])) { echo $wpjobus_job_benefits[$i][1]; } ?></textarea>

                    </div>


                    <button name="button_del_job_benefit" type="button" class="button-secondary button_del_job_benefit">xoá</button>

                </div>

                <?php
            }
            ?>


        </div>

        <div id="template_job_benefit">

            <div class="option_item" id="999">
                <span class='text'>Phúc lợi 999</span>
                <div class="full" style="margin-top: 20px;">

                    <span class='text'>Tên phúc lợi</span>
                    <input type='text' id='' name='' value='' class='criteria_name' placeholder="Title">

                </div>

                <div class="full" style="margin-top: 20px;">

                    <span class='text'>Mô tả phúc lợi</span>
                    <textarea class="job-benefit-desc" name="" id='' cols="70" rows="7" ></textarea>

                </div>
                <button name="button_del_job_benefit" type="button" class="button-secondary button_del_job_benefit">xoá</button>
            </div>

        </div>

        <div class="option_item">
            <button type="button" name="submit_add_job_benefit" id='submit_add_job_benefit' value="add" class="button-secondary">Thêm mới phúc lợi</button>
        </div>

        <br>


    </div>	<!-- end review_options_pop -->





    <?php

}

function display_wpjobus_job_contact_settings ($post) {

    //get the post meta data
    $wpjobus_job_address = get_post_meta($post->ID, 'wpjobus_job_address',true);
    $wpjobus_job_phone = get_post_meta($post->ID, 'wpjobus_job_phone',true);
    $wpjobus_job_website = get_post_meta($post->ID, 'wpjobus_job_website',true);
    $wpjobus_job_email = get_post_meta($post->ID, 'wpjobus_job_email',true);
    $wpjobus_job_publish_email = get_post_meta($post->ID, 'wpjobus_job_publish_email',true);
    $wpjobus_job_facebook = get_post_meta($post->ID, 'wpjobus_job_facebook',true);
    $wpjobus_job_linkedin = get_post_meta($post->ID, 'wpjobus_job_linkedin',true);
    $wpjobus_job_twitter = get_post_meta($post->ID, 'wpjobus_job_twitter',true);
    $wpjobus_job_googleplus = get_post_meta($post->ID, 'wpjobus_job_googleplus',true);

    $wpjobus_job_googleaddress = get_post_meta($post->ID, 'wpjobus_job_googleaddress',true);
    $wpjobus_job_longitude = get_post_meta($post->ID, 'wpjobus_job_longitude',true);
    $wpjobus_job_latitude = get_post_meta($post->ID, 'wpjobus_job_latitude',true);

    ?>

    <input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />

    <div id='review_options_popup'>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Địa chỉ:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_address' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_address; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>SĐT:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_phone' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_phone; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Website:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_website' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_website; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>E-mail:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_email' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_email; ?>' placeholder="" />

            <span style="margin-right: 20px; float: left;">
					<input type="checkbox" class='' name='wpjobus_job_publish_email' style="width: 10px; margin-right: 5px; float: left; margin-top: 1px;" value='publish_email' placeholder="" <?php if (!empty($wpjobus_job_publish_email)) { ?>checked<?php } ?>/>Publish my email address
				</span>

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Facebook:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_facebook' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_facebook; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>LinkedIn:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_linkedin' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_linkedin; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Twitter:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_twitter' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_twitter; ?>' placeholder="" />

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Google+:</span>

            <input type='text' id="review-name" class='' name='wpjobus_job_googleplus' style="width: 300px; float: left;" value='<?php echo $wpjobus_job_googleplus; ?>' placeholder="" />

        </div>



        <div id="map-container">

            <div class="option_item" style="height: 24px; margin-bottom: 20px;">

                <span class='text overall' style="width: 170px;">Địa Chỉ Google Map</span>

                <input id="address" name="wpjobus_job_googleaddress" type="text" value="<?php echo $wpjobus_job_googleaddress; ?>" style="width: 300px; float: left;">

                <p class="help-block"><?php _e('Start typing an address and select from the dropdown.', 'themesdojo') ?></p>

            </div>


            <div id="map-canvas"></div>

            <style>

                #map-canvas {
                    display: block;
                    width: 575px;
                    height: 370px;
                    position: relative;
                    margin-bottom: 10px;
                }

            </style>

            <script type="text/javascript">

                jQuery(document).ready(function($) {

                    var geocoder;
                    var map;
                    var marker;

                    var geocoder = new google.maps.Geocoder();

                    function geocodePosition(pos) {
                        geocoder.geocode({
                            latLng: pos
                        }, function(responses) {
                            if (responses && responses.length > 0) {
                                updateMarkerAddress(responses[0].formatted_address);
                            } else {
                                updateMarkerAddress('Cannot determine address at this location.');
                            }
                        });
                    }

                    function updateMarkerPosition(latLng) {
                        jQuery('#latitude').val(latLng.lat());
                        jQuery('#longitude').val(latLng.lng());
                    }

                    function updateMarkerAddress(str) {
                        jQuery('#address').val(str);
                    }

                    function initialize() {

                        var latlng = new google.maps.LatLng(<?php echo $wpjobus_job_latitude; ?>, <?php echo $wpjobus_job_longitude; ?>);
                        var mapOptions = {
                            zoom: 16,
                            center: latlng
                        }

                        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                        geocoder = new google.maps.Geocoder();

                        marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            draggable: true
                        });

                        // Add dragging event listeners.
                        google.maps.event.addListener(marker, 'dragstart', function() {
                            updateMarkerAddress('Dragging...');
                        });

                        google.maps.event.addListener(marker, 'drag', function() {
                            updateMarkerPosition(marker.getPosition());
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            geocodePosition(marker.getPosition());
                        });

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                    jQuery(document).ready(function() {

                        initialize();

                        jQuery(function() {
                            jQuery("#address").autocomplete({
                                //This bit uses the geocoder to fetch address values
                                source: function(request, response) {
                                    geocoder.geocode( {'address': request.term }, function(results, status) {
                                        response(jQuery.map(results, function(item) {
                                            return {
                                                label:  item.formatted_address,
                                                value: item.formatted_address,
                                                latitude: item.geometry.location.lat(),
                                                longitude: item.geometry.location.lng()
                                            }
                                        }));
                                    })
                                },
                                //This bit is executed upon selection of an address
                                select: function(event, ui) {
                                    jQuery("#latitude").val(ui.item.latitude);
                                    jQuery("#longitude").val(ui.item.longitude);

                                    var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);

                                    marker.setPosition(location);
                                    map.setZoom(16);
                                    map.setCenter(location);

                                }
                            });
                        });

                        //Add listener to marker for reverse geocoding
                        google.maps.event.addListener(marker, 'drag', function() {
                            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        jQuery('#address').val(results[0].formatted_address);
                                        jQuery('#latitude').val(marker.getPosition().lat());
                                        jQuery('#longitude').val(marker.getPosition().lng());
                                    }
                                }
                            });
                        });

                    });

                });

            </script>

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Vĩ độ</span>

            <input type="text" id="latitude" name="wpjobus_job_latitude" value="<?php echo $wpjobus_job_latitude; ?>" size="12" maxlength="10" class="form-text required">

        </div>

        <div class="option_item" style="height: 24px;">

            <span class='text overall'>Kinh độ</span>

            <input type="text" id="longitude" name="wpjobus_job_longitude" value="<?php echo $wpjobus_job_longitude; ?>" size="12" maxlength="10" class="form-text required">

        </div>

        <br>


    </div>	<!-- end review_options_pop -->



    <?php


}



add_action ('save_post', 'update_wpjobus_job_settings');
function update_wpjobus_job_settings ( $td_post_id ) {
    // verify nonce.

    if (!isset($_POST['cmb_nonce'])) {
        return false;
    }

    if (!wp_verify_nonce($_POST['cmb_nonce'], basename(__FILE__))) {
        return false;
    }

    global  $td_allowed;
    global $wpdb;
    $id_location=$_POST['job_location'];
    $kq = $wpdb->get_results("SELECT *FROM caribcity WHERE id='$id_location'");
    foreach ($kq as $categories) {

        $job_location=$categories->name;

    }
    if($job_location=="")
    {
        $job_location=$id_location;
    }
    $dictrict = esc_attr(get_post_meta($_GET['post'], 'job_dictrict', true));
    $name_company=$_POST['job_company'];
    $kq_company = $wpdb->get_row("SELECT *FROM wp_posts WHERE post_type='company' AND post_title='$name_company'");
    $id_company=$kq_company->ID;
    if($id_company!="")
    {
//        update_post_meta($td_post_id, 'job_company', wp_kses($id_company, $td_allowed));
    }



    //regular update
    update_post_meta($td_post_id, 'job_dictrict' , wp_kses($_POST['dictricts'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_expired' , wp_kses($_POST["expired_at"], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
    update_post_meta($td_post_id, 'job_years_of_exp', wp_kses($_POST['job_years_of_exp'], $td_allowed));
    update_post_meta($td_post_id, 'job_industry', wp_kses($_POST['job_industry'], $td_allowed));
    update_post_meta($td_post_id, 'job_location', wp_kses($job_location, $td_allowed));
    update_post_meta($td_post_id, 'job-about-me', wp_kses($_POST['job-about-me'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_job_cover_image', wp_kses($_POST['wpjobus_job_cover_image'], $td_allowed));
//    update_post_meta($td_post_id, 'job_presence_type', $_POST['job_presence_type']);

    update_post_meta($td_post_id, 'job_career_level', wp_kses($_POST['job_career_level'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_comm_level', wp_kses($_POST['wpjobus_job_comm_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_job_comm_note', wp_kses($_POST['wpjobus_job_comm_note'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_org_level', wp_kses($_POST['wpjobus_job_org_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_job_org_note', wp_kses($_POST['wpjobus_job_org_note'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_job_rel_level', wp_kses($_POST['wpjobus_job_job_rel_level'], $td_allowed));
    update_post_meta($td_post_id, 'wpjobus_job_job_rel_note', wp_kses($_POST['wpjobus_job_job_rel_note'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_skills', $_POST['wpjobus_job_skills']);

    update_post_meta($td_post_id, 'wpjobus_job_native_language', wp_kses($_POST['wpjobus_job_native_language'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_languages', $_POST['wpjobus_job_languages']);

    update_post_meta($td_post_id, 'wpjobus_job_hobbies', wp_kses($_POST['wpjobus_job_hobbies'], $td_allowed));

    update_post_meta($td_post_id, 'wpjobus_job_benefits', $_POST['wpjobus_job_benefits']);

    update_post_meta($td_post_id, 'wpjobus_job_remuneration', $_POST['wpjobus_job_remuneration']);
    update_post_meta($td_post_id, 'wpjobus_job_remuneration_per', $_POST['wpjobus_job_remuneration_per']);

    $remuneration_ammount = $_POST['wpjobus_job_remuneration'];
    $str = preg_replace('/\D/', '', $remuneration_ammount);
    update_post_meta($td_post_id, 'wpjobus_job_remuneration_raw', $str);

    update_post_meta($td_post_id, 'wpjobus_job_type', $_POST['wpjobus_job_type']);

    update_post_meta($td_post_id, 'wpjobus_job_address', $_POST['wpjobus_job_address']);
    update_post_meta($td_post_id, 'wpjobus_job_phone', $_POST['wpjobus_job_phone']);
    update_post_meta($td_post_id, 'wpjobus_job_website', $_POST['wpjobus_job_website']);
    update_post_meta($td_post_id, 'wpjobus_job_email', $_POST['wpjobus_job_email']);
    update_post_meta($td_post_id, 'wpjobus_job_facebook', $_POST['wpjobus_job_facebook']);
    update_post_meta($td_post_id, 'wpjobus_job_linkedin', $_POST['wpjobus_job_linkedin']);
    update_post_meta($td_post_id, 'wpjobus_job_twitter', $_POST['wpjobus_job_twitter']);
    update_post_meta($td_post_id, 'wpjobus_job_googleplus', $_POST['wpjobus_job_googleplus']);
    update_post_meta($td_post_id, 'wpjobus_job_googleaddress', $_POST['wpjobus_job_googleaddress']);
    update_post_meta($td_post_id, 'wpjobus_job_longitude', $_POST['wpjobus_job_longitude']);
    update_post_meta($td_post_id, 'wpjobus_job_latitude', $_POST['wpjobus_job_latitude']);

    update_post_meta($td_post_id, 'wpjobus_job_publish_email', $_POST['wpjobus_job_publish_email']);

}
