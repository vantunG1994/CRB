<?php
function sw_get_current_weekday() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday.', '.date('d/m/Y H:i:s');
}
//include('class.smtp.php');
include_once(ABSPATH . WPINC . '/class-phpmailer.php');
add_action('admin_footer', 'dvd_action_javascript');
add_action( 'wp_footer', 'dvd_action_javascript' );
function dvd_action_javascript() {
    ?>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#publish").click(function() {
                if(post.wpjobus_resume_remuneration.value=="")
                {
                    $( "#wpjobus_resume_remuneration" ).after( "<p id='errors' style='color: red;font-size: 16px;'>Vui lòng nhập mức lương</p>" );
                    post.wpjobus_resume_remuneration.focus();
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#publish").click(function() {
                if(post.wpjobus_job_remuneration.value=="")
                {
                    $( "#wpjobus_job_remuneration" ).after( "<p id='errors' style='color: red;font-size: 16px;'>Vui lòng nhập mức lương</p>" );
                    post.wpjobus_job_remuneration.focus();
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".resume").click(function() {
                $("#search-resumes-form").show();
                $("#h3-resume").show();



            });
        });

    </script>
    <script>

        jQuery(document).ready(function($) {
            $(".title_group").click(function() {
                var id=$("input[name=id_group]").val();

                alert(id);



//                $.ajax({
//                    type : 'POST',
//                    data : {'action' : 'dvd_action', 'data' :id},
//                    url : '<?php //echo admin_url( "admin-ajax.php" ); ?>//',
//                    success : function (resp){
//                        $("#dictrict").html(resp);
//
//                    }
//                });
            });
        });

    </script>

    <script>

        jQuery(document).ready(function($) {
            $("#job_location").change(function() {
                var id=  $("#job_location").val();



                $.ajax({
                    type : 'POST',
                    data : {'action' : 'dvd_action', 'data' :id},
                    url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success : function (resp){
                        $("#dictrict").html(resp);

                    }
                });
            });
        });

    </script>
    <script>

        jQuery(document).ready(function($) {
            $(".package").change(function() {
                var id=  $(".package").val();



                $.ajax({
                    type : 'POST',
                    data : {'action' : 'action_vip_package', 'data' :id},
                    url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success : function (resp){
                        $(".noidung_banggia").html(resp);

                    }
                });
            });
        });

    </script>
    <script>

        jQuery(document).ready(function($) {
            $(".package_up").change(function() {
                var id=  $(".package_up").val();



                $.ajax({
                    type : 'POST',
                    data : {'action' : 'action_up_package', 'data' :id},
                    url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success : function (resp){
                        $(".noidung_banggia").html(resp);

                    }
                });
            });
        });

    </script>

    <script>
        jQuery(document).ready(function($) {
            $("#num_week_user").change(function() {

                var num= $("#num_week_user").val();
                var id= $("#user_name").val();
                var dataString={id: id,week:num}
                if(id.length > 0) {
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'check_num_week', 'data': dataString},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".error_user").html(resp);

                        }
                    });
                }
            });
        });
    </script>
    <script>

        jQuery(document).ready(function($) {
            $("#show").click(function(){
                swal({
                    title: 'Xem thông tin ứng viên',
                    text: "Lượt xem hồ sơ của bạn sẽ trừ đi 1 lượt",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Chấp nhận',
                    cancelButtonText: 'Bỏ qua',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    var id= $("#post_id").val();
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'show_cv', 'data': id},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".advanced").html(resp);
                            $(".advanced").slideDown( 500);
                            $("#show").hide();
                        }
                    });
                })
            });
        });
        jQuery(document).ready(function($) {
            $("#show_job").click(function(){
                jQuery('.advanced_job').css('display', 'block');
                jQuery('#show_job').css('display', 'none');
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $("#submit").click(function() {
                var str = $( ".error_user" ).html() +" .Bạn có chắc chắn đã xác nhận chính xác thông tin";
                if(str.length==0)
                {
                    $('form').append('<p id="null" style="color: red;">Vui lòng nhập đầy đủ thông tin</p>');
                    return false;
                }
                else
                {
                    confirm(str);

                }
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $(".up_pass_user").click(function () {
                var id = $("#user_name").val();
                var url = window.location.href + "&user_pass=" + id;
                location.href = url;
            });
            $(".activation_user").click(function () {
                var id = $("#user_name").val();
                var url = window.location.href + "&activation_user=" + id;
                location.href = url;
            });
        });



    </script>
    <script>
        jQuery(document).ready(function ($) {
            $(".search_user_date").click(function () {
                var from_date = $(".from_date").val();
                var to_date = $(".to_date").val();
                if(from_date !="" && to_date !="")
                {
                    var url = window.location.href + "&from_date=" + from_date + "&to_date="+to_date;
                    location.href = url;
                }
                else{
                    alert("Vui lòng chọn đầy đủ thông tin");
                }


            });
        });

    </script>
    <script>
        jQuery(document).ready(function ($) {
            $("#up_post_submit").click(function () {

                var package_up = $(".user_up_post").val();
                var package_star = $(".user_vip_post").val();

                var package_name =$(".user_up_post option:selected").text();
                var package_name_star =$(".user_vip_post option:selected").text();

                if(package_up !="" )
                {
                    var result = confirm("Bạn có chắc chắn muốn nâng cấp gói "+package_name+" cho tài khoản <?php echo $_GET['user']; ?> này?");
                    if (result) {
                        var url = window.location.href + "&package_post=" + package_up ;
                        location.href = url;                    }

                }
                else{
                    if(package_star !="" )
                    {
                        var result = confirm("Bạn có chắc chắn muốn nâng cấp gói "+package_name_star+" cho tài khoản <?php echo $_GET['user']; ?> này?");
                        if (result) {
                            var url = window.location.href + "&package_post_star=" + package_star ;
                            location.href = url;                    }

                    }
                    else{
                        alert("Vui lòng chọn lựa chọn gói tin");
                    }
                }



            });
        });

    </script>

    <script>
        jQuery(document).ready(function ($) {
            $(".search_user_date").click(function () {
                var from_date = $(".from_date").val();
                var to_date = $(".to_date").val();
                if(from_date !="" && to_date !="")
                {
                    var url = window.location.href + "&from_date=" + from_date + "&to_date="+to_date;
                    location.href = url;
                }
                else{
                    alert("Vui lòng chọn đầy đủ thông tin");
                }


            });
        });

    </script>
        <script>
            jQuery(document).ready(function ($) {
                var val='<?php echo $_GET['option']; ?>'
                $('.select_user_option').val(val);
                $(".select_user_option").change(function () {
                    var id = $(".select_user_option").val();
                    if(id !=""){

                        var url = '<?php echo home_url('/').'wp-admin/admin.php?page=sale-staff-all-customer&option=' ?>' + id;
                        location.href = url;



                    }

                });
            });

        </script>
    <script>
        jQuery(document).ready(function ($) {
            $("#load_post").click(function () {
                var id = $("#user_name_job_vip").val();
                var url = window.location.href + "&user=" + id;
                location.href = url;
            });
        });

    </script>

<?php
for($i=1;$i<=4;$i++) {
    ?>
    <script>

        jQuery(document).ready(function($) {
            $(".show_quote_cont_up_<?php echo $i; ?>").hide();
            $(".show_quote_cont_<?php echo $i; ?>").click(function(){
                $(".show_quote_cont_<?php echo $i; ?>").hide();
                $(".show_quote_cont_up_<?php echo $i; ?>").show();
                document.getElementById('testimonials-note-<?php echo $i; ?>').style.overflow="visible";
                document.getElementById('testimonials-note-<?php echo $i; ?>').style.maxHeight="none";

            });
        });
        jQuery(document).ready(function($) {
            $(".show_quote_cont_up_<?php echo $i; ?>").click(function(){
                $(".show_quote_cont_<?php echo $i; ?>").show();
                $(".show_quote_cont_up_<?php echo $i; ?>").hide();
                document.getElementById('testimonials-note-<?php echo $i; ?>').style.overflow="hidden";
                document.getElementById('testimonials-note-<?php echo $i; ?>').style.maxHeight="79px";

            });
        });
    </script>
<?php
}
    ?>

    <script>
        jQuery(document).ready(function($) {
            $(".search_user_staff").click(function() {
                var id= $(".key_search_user").val();
                var url = window.location.href+"&user_search_staff="+id;
                location.href = url;

            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $(".search_user").click(function() {
                var id= $("#user_name").val();
                var url = window.location.href+"&user_pass="+id;
                location.href = url;

            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $("#user_name_job_vip").keyup(function() {
                var  id= $("#user_name_job_vip").val();

                if(id.length >3) {
                    $(".error").show();
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'check_user_pick_job', 'data': id},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".error").html(resp);

                        }
                    });

                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $("#user_name").keyup(function() {
                var  id= $("#user_name").val();

                if(id.length >3) {
                    $(".error").show();
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'check_user_vip', 'data': id},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".error").html(resp);

                        }
                    });

                }
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {

            $(".num_week_job").change(function() {
                var id= $(".job_id").val();
                var num= $(".num_week_job").val();
                if(num !="") {

                    var user = $(".user_id").val();
                    if ($('.job_new_' + id).is(":checked")) {
                        var job_new = 1;
                    }
                    else {
                        var job_new = 0;
                    }
                    var dataString = {id: id, new: job_new, package: num, user: user}
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'check_job_new', 'data_check_new': dataString},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".pick_new_result_" + id).html(resp);

                        }
                    });


                }
            });
        });

    </script>
    <script>
        jQuery(document).ready(function($) {

            $(".pick").click(function() {
                var id='<?php echo $_GET['id'] ;?>';
                if ($('.job_vip_' + id).is(":checked")) {
                    var check_vip = "Nâng cấp tin đặc biệt.";
                }
                else {
                    var check_vip = "";
                }
                if ($('.job_new_' + id).is(":checked")) {
                    var check_new = "Nâng cấp tin UP";
                }
                else {
                    var check_new = "";
                }
                var str =check_new + " ." + check_vip + " .Bạn có chắc chắn đã xác nhận chính xác thông tin";

                   var mess= confirm(str);
                if(mess)
                {
                    var user = $(".user_id").val();
                    if ($('.job_new_' + id).is(":checked")) {
                        var job_new = 1;
                    }
                    else {
                        var job_new = 0;
                    }
                    if ($('.job_vip_' + id).is(":checked")) {
                        var job_vip = 1;
                    }
                    else {
                        var job_vip = 0;
                    }
                    if(job_vip !=0)
                    {
                        var dataString = {id: id, vip: job_vip, user: user}
                        $.ajax({
                            type: 'POST',
                            data: {'action': 'check_job_vip', 'data_star': dataString},
                            url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                            success: function (resp) {
                                $(".pick_vip_result_" + id).html(resp);

                            }
                        });
                    }
                    if(job_new !=0)
                    {
                        var dataString = {id: id, new: job_new, user: user}
                        $.ajax({
                            type: 'POST',
                            data: {'action': 'check_job_new', 'data_new': dataString},
                            url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                            success: function (resp) {
                                $(".pick_new_result_" + id).html(resp);

                            }
                        });
                    }

                }
                else{
                    return false;
                }




            });
        });

    </script>

<?php
}
add_action('wp_ajax_check_user_pick_job', 'check_user_pick_job');
add_action('wp_ajax_nopriv_check_user_pick_job', 'check_user_pick_job');

function check_user_pick_job() {
    $id=$_POST["data"];
    $user_email = get_user_by( 'email',$id);
    $userEmail= $user_email->ID;


    $user = get_user_by('login',$id);
    if(!$user && !$userEmail){

        echo "Tài khoản không tồn tại";
    }
    else{
        global $wpdb;

        if($user->ID=="")
        {
            $user_id=$userEmail;
        }else{$user_id=$user->ID;}

        $where = get_posts_by_author_sql("job", true,$user_id );
        $date_expierd=get_user_meta($user_id, 'account_vip', true);
//        if($date_expierd !="")
//        {
//            echo "<p>Tài khoản đã được cấp VIP thời hạn là : ".$date_expierd." .Bạn có muốn gia hạn thêm</p>";
//
//        }

        $companies = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '" . $user_id . "'");

        foreach ($companies as $company) {

            $comp_id = $company->ID;

            $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
            echo "<p>Công ty : ".$wpjobus_company_fullname ."</p>";


        }

        $user_post_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
        $count_vip=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_vip' " )?:0;
        $count_new=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_new' " )?:0;
        $user_phone_activation_code = get_user_meta($user_id, 'user_phone_activation_code', true) ?: 0;
        $user_phone_activation_time = get_user_meta($user_id, 'user_phone_activation_time', true) ?: 0;
        if ($user_phone_activation_code != 0 && $user_phone_activation_time == 0) {
            echo "<p>Tài khoản chưa xác thực</p>";
        }
        else{
            echo "<p>Tài khoản đã xác thực</p>";
        }
//        $contact_history=$wpdb->get_results('select * from crb_salestaff_history where user_id='.$user_id);
//        if()
        $email=$user->user_email ?: $id;
        echo "<p>Tài khoản người dùng : ".$id."</p>";
        echo "<p>Email người dùng : ".$email."</p>";
        echo "<p>Số tin đăng tuyển dụng : ".$user_post_count."</p>";
        echo "<p>Số tin đăng đặc biệt : ".$count_vip."</p>";
        echo "<p>Số tin đăng ưu tiên : ".$count_new."</p>";

    }

    die();

}
add_action('wp_ajax_check_user_vip', 'check_user_vip');
add_action('wp_ajax_nopriv_check_user_vip', 'check_user_vip');

function check_user_vip() {
    global $wpdb;
    $id=$_POST["data"];
    $user_email = get_user_by( 'email',$id);
    $userEmail= $user_email->ID;
    $posttitle = $id;


    $user = get_user_by('login',$id);
    if(!$user && !$userEmail){

            echo "Tài khoản không tồn tại";


    }
    else{
        global $wpdb;

        if($user->ID=="")
        {
            $user_id=$userEmail;
        }else{$user_id=$user->ID;}

        $where = get_posts_by_author_sql("job", true,$user_id );
        $date_expierd=get_user_meta($user_id, 'account_vip', true);
        if($date_expierd !="")
        {
            echo "<p>Tài khoản đã được cấp VIP thời hạn là : ".$date_expierd." .Bạn có muốn gia hạn thêm</p>";

        }

        $companies = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '" . $user_id . "'");

        foreach ($companies as $company) {

            $comp_id = $company->ID;

            $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
            $wpjobus_company_industry = esc_attr(get_post_meta($comp_id, 'company_industry', true));
            global $wp2es;

            $cond=array('post_status'=>'publish','post_type'=>'job','job_company'=>$comp_id);
            $order=array('ID'=>'desc');
            $limit=array('size'=>20,'page'=>1);
            $result_job = $wp2es->and_simple_search($cond,$order,$limit);
            $title_industry="Ngành nghề các tin tuyển dụng: ";
                for ($i = 0; $i <count($result_job); $i++) {

                    if($result_job[$i]['job_industry'] !=$result_job[$i-1]['job_industry'])
                    {
                        $title_industry.=$result_job[$i]['job_industry'].",";
                    }
            }
            echo "<p>Công ty : ".$wpjobus_company_fullname ."</p>";
            echo "<p>Ngành nghề : ".$wpjobus_company_industry ."</p>";
            echo "<p>".$title_industry."</p>";



        }
        $user_post_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
        $count_vip=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_vip' " )?:0;
        $count_new=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_new' " )?:0;
        $user_phone_activation_code = get_user_meta($user_id, 'user_phone_activation_code', true) ?: 0;
        $user_phone_activation_time = get_user_meta($user_id, 'user_phone_activation_time', true) ?: 0;
        if ($user_phone_activation_code != 0 && $user_phone_activation_time == 0) {
            echo "<p>Tài khoản chưa xác thực</p>";
        }
        else{
            echo "<p>Tài khoản đã xác thực</p>";
        }
        echo "<p>Tài khoản người dùng : ".$id."</p>";
        echo "<p>Email người dùng : ".$user->user_email ?: $id."</p>";
        echo "<p>Số tin đăng tuyển dụng : ".$user_post_count."</p>";
        echo "<p>Số tin đăng đặc biệt : ".$count_vip."</p>";
        echo "<p>Số tin đăng ưu tiên : ".$count_new."</p>";

    }

    die();

}
add_action('wp_ajax_check_job_vip', 'check_job_vip');
add_action('wp_ajax_nopriv_check_job_vip', 'check_job_vip');

function check_job_vip() {
    require_once get_template_directory() . '/inc/ajax_pick.php';
    die();
}

add_action('wp_ajax_check_job_new', 'check_job_new');
add_action('wp_ajax_nopriv_check_job_new', 'check_job_new');

function check_job_new() {
    require_once get_template_directory() . '/inc/ajax_pick.php';
    die();
}

add_action('wp_ajax_check_user', 'check_user');
add_action('wp_ajax_nopriv_check_user', 'check_user');


add_action('wp_ajax_check_num_week', 'check_num_week');
add_action('wp_ajax_nopriv_check_num_week', 'check_num_week');

function check_num_week() {
    $result=$_POST["data"];
    $id=$result["id"];
    $num_week=$result["week"];
    global $wpdb;
    if($num_week !="")
    {
        $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$num_week'");
        foreach ( $user_vip as $package )
        {

            $description=$package->service_benefit;
            $description=json_decode($description, true);
            $num_day=$description["duration"];
            $name_vip=$package->name;


        }

        $user = get_user_by('login',$id) ?: get_user_by( 'email',$id);
        $today = date('Y-m-d');
        $date_expierd = get_user_meta($user->ID, 'vip_expire', true);
        if ($date_expierd != "") {
            $week = strtotime(date("Y-m-d", strtotime($date_expierd)) . " +" . $num_day . " day");
            $week = strftime("%d-%m-%Y", $week);
            echo "Thời gian gia hạn cho gói ".$name_vip." cho tài khoản ".$id." sẽ hết hạn vào ngày : ".$week ;


        } else {
            $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_day . " day");
            $week = strftime("%d-%m-%Y", $week);
            echo "Thời gian gia hạn cho gói ".$name_vip." cho tài khoản ".$id." sẽ hết hạn vào ngày : ".$week ;

        }
    }


    die();
}


add_action('wp_ajax_dvd_action', 'dvd_action');
add_action('wp_ajax_nopriv_dvd_action', 'dvd_action');

function dvd_action() {
    $id=$_POST["data"];
    global $wpdb;
    $kq = $wpdb->get_results("SELECT *FROM caribdist WHERE city_id='$id'");


    ?>
    <option value="">Lựa chọn quận huyện</option>
    <?php
    foreach($kq as $tinh){
        ?>
        <option value="<?php echo $tinh->name;?>"><?php echo $tinh->name; ?></option>

    <?php

    }
    die();
}
add_action('admin_footer', 'city_action_javascript');
add_action( 'wp_footer', 'city_action_javascript' );
function city_action_javascript()
{


}
add_action('wp_ajax_company_search', 'company_search');
add_action('wp_ajax_nopriv_company_search', 'company_search');
function company_search() {

    die();
}
add_action('wp_ajax_city_action', 'city_action');
add_action('wp_ajax_nopriv_city_action', 'city_action');
function city_action() {
    require get_template_directory() . '/template_city_action.php';
    die();
}
add_action('wp_ajax_show_job', 'show_job');
add_action('wp_ajax_nopriv_show_job', 'show_job');

add_action('wp_ajax_show_cv', 'show_cv');
add_action('wp_ajax_nopriv_show_cv', 'show_cv');
function show_cv() {
    $td_this_post_id=$_POST["data"];
    global $current_user,$post,$wpdb;
    $current_user =  wp_get_current_user();
    $user_id= $current_user->ID ;
    $count_view_resume=get_user_meta($user_id, 'user_cv_view_count', true);
    update_user_meta($user_id, 'user_cv_view_count', $count_view_resume -1);
    $wpdb->insert("crb_mycv", array(
        'uid'=>$user_id,
        'post_id'=>$td_this_post_id,
        'create_at'=>date('Y-m-d H:i:s') ,
    ));
    global $wp2es;
    $cond_resume=array('post_status'=>'publish','post_type'=>'resume','ID'=>$td_this_post_id);
    $order_resume=array('ID'=>'desc');
    $limit_resume=array('size'=>1,'page'=>1);
    $result_resume = $wp2es->and_simple_search($cond_resume,$order_resume,$limit_resume);
    foreach($result_resume as $resume)
    {
        $wpjobus_resume_address =$resume["wpjobus_resume_address"];
        $wpjobus_resume_phone =$resume["wpjobus_resume_phone"];
        $wpjobus_resume_website =$resume["wpjobus_resume_website"];
        $wpjobus_resume_email =$resume["wpjobus_resume_email"];
        $wpjobus_resume_publish_email =$resume["wpjobus_resume_publish_email"];
        $wpjobus_resume_facebook =$resume["wpjobus_resume_facebook"];
        $wpjobus_resume_linkedin =$resume["wpjobus_resume_linkedin"];
        $wpjobus_resume_twitter =$resume["wpjobus_resume_twitter"];
        $wpjobus_resume_googleplus =$resume["wpjobus_resume_googleplus"];
        $wpjobus_resume_fullname = $resume["wpjobus_resume_fullname"];

    }
    ?>
    <span class="resume-contact-info"><i class="fa fa-user" style=""></i><span><?php echo esc_attr($wpjobus_resume_fullname); ?></span></span>
    <?php if (!empty($wpjobus_resume_address)) { ?>

        <span class="resume-contact-info">

						<i class="fa fa-map-marker"></i><span><?php echo esc_attr($wpjobus_resume_address); ?></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_phone)) { ?>

        <span class="resume-contact-info">

						<i class="fa fa-mobile"></i><span><?php echo esc_attr($wpjobus_resume_phone); ?></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_email)) { ?>

        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_resume_email;
                        ?>

            <i class="fa fa-envelope"></i><span><?php echo $return; ?></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_email)) { ?>

        <?php if (!empty($wpjobus_resume_publish_email)) { ?>

            <span class="resume-contact-info">

						<i class="fa fa-envelope-o"></i><span><a
                        href="mailto:<?php echo esc_url($wpjobus_resume_email); ?>"><?php echo esc_attr($wpjobus_resume_email); ?></a></span>

					</span>

        <?php }
    } ?>

    <?php if (!empty($wpjobus_resume_facebook)) { ?>

        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_resume_facebook;
                        $url = $wpjobus_resume_facebook;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

            <i class="fa fa-facebook-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Facebook', 'themesdojo'); ?></a></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_linkedin)) { ?>

        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_resume_linkedin;
                        $url = $wpjobus_resume_linkedin;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

            <i class="fa fa-linkedin-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('LinkedIn', 'themesdojo'); ?></a></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_twitter)) { ?>

        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_resume_twitter;
                        $url = $wpjobus_resume_twitter;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

            <i class="fa fa-twitter-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Twitter', 'themesdojo'); ?></a></span>

					</span>

    <?php } ?>

    <?php if (!empty($wpjobus_resume_googleplus)) { ?>

        <span class="resume-contact-info">

						<?php

                        $return = $wpjobus_resume_googleplus;
                        $url = $wpjobus_resume_googleplus;
                        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
                            $return = 'http://' . $url;
                        }

                        ?>

            <i class="fa fa-google-plus-square"></i><span><a
                    href="<?php echo esc_url($return); ?>"><?php _e('Google+', 'themesdojo'); ?></a></span>

					</span>

    <?php }?>
    <?php


    die();
}
add_shortcode( 'search_ajax', 'create_shortcode_search' );

add_action('admin_footer', 'search_action_javascript');
add_action( 'wp_footer', 'search_action_javascript' );
function search_action_javascript() {
    ?>

    <script>
        jQuery(document).ready(function($) {
            $("#search_fulltext").keyup(function() {
                $( ".search_top_mobile" ).after( "<div style=' background-color: whitesmoke; display:none;position: absolute;margin-top:10%;width: 100%;' class='searchwp-live-search-result'></div>");
                var keyword= $(this).val();
                if(keyword.length>3)
                {
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'search_action', 'keyword': keyword},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $('.searchwp-live-search-result').show();

                            $(".searchwp-live-search-result").html(resp);

                        }

                    });
                }
                else{
                    $('.searchwp-live-search-result').hide();

                }
            });
        });

    </script><?php
}

add_action('wp_ajax_admin_contact', 'admin_contact');
add_action('wp_ajax_nopriv_admin_contact', 'admin_contact');
function admin_contact() {
    global $current_user,$wpdb,$wp2es;

    $package_id=$_POST["data"];
    $user_name=$current_user->user_login;
    $today = date('Y-m-d');
    $user_id=$current_user->ID;
    $user_email=$current_user->user_email;
    $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
    $account_vip = get_user_meta($current_user->ID, 'vip_package_id', true);
    $count_view_resume=get_user_meta($current_user->ID, 'user_cv_view_count', true);
    $user_daily_max_post = get_user_meta($current_user->ID, 'user_daily_max_post', true);
    $user_monthly_max_post = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
    $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$package_id'");
    foreach ( $user_vip as $package )
    {
        $name=$package->name;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_date= $description["duration"];
        $cv_view_count=$description["cv_view_count"];
        $vip_level=$description["vip_level"];
        $vip_star=$description["vip_star"];
        $user_daily_max_post=$description["user_daily_max_post"];
        $user_monthly_max_post=$description["user_monthly_max_post"];
        $discount_percent=$description["discount_percent"];

    }
    $cond_company=array('post_status'=>'publish','post_type'=>'company','post_author'=>$user_id);
    $order=array('up_at'=>'desc', 'post_date'=>'desc');
    $limit_company=array('size'=>1,'page'=>1);
    $result_company = $wp2es->and_simple_search($cond_company,$order,$limit_company);
    $company=$result_company[0]["wpjobus_company_fullname"];

    $data_user_vip =array();
    $data_user_vip['phone']=$user_name;
    $data_user_vip['company']=$company;
    $data_user_vip['package_id']=$package_id;
    $data_user_vip['package_name']=$name;
    $data_user_vip['price']=$package->price;
    $data_user_vip['date_create']= sw_get_current_weekday();

    add_queue('admin_contact',$data_user_vip);

    echo "Cảm ơn bạn đã gửi yêu cầu mua gói ". $name. ".Nhân viên hỗ trợ của chúng tôi sẽ liên lạc ngay với bạn.";
    ob_start();
     ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Zen Flat Confirm Email</title>
        <style type="text/css" media="screen">

            /* Force Hotmail to display emails at full width */
            .ExternalClass {
                display: block !important;
                width: 100%;
            }

            /* Force Hotmail to display normal line spacing */
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            body,
            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            body,
            p,
            td {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                color: #333333;
                line-height: 1.5em;
            }

            h1 {
                font-size: 24px;
                font-weight: normal;
                line-height: 24px;
            }

            body,
            p {
                margin-bottom: 0;
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            img {
                line-height: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
            }

            a img {
                border: none;
            }

            .background {
                background-color: #333333;
            }

            table.background {
                margin: 0;
                padding: 0;
                width: 100% !important;
            }

            .block-img {
                display: block;
                line-height: 0;
            }

            a {
                color: white;
                text-decoration: none;
            }

            a,
            a:link {
                color: #2A5DB0;
                text-decoration: underline;
            }

            table td {
                border-collapse: collapse;
            }

            td {
                vertical-align: top;
                text-align: left;
            }

            .wrap {
                width: 600px;
            }

            .wrap-cell {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .header-cell,
            .body-cell,
            .footer-cell {
                padding-left: 20px;
                padding-right: 20px;
            }

            .header-cell {
                background-color: #eeeeee;
                font-size: 24px;
                color: #ffffff;
            }

            .body-cell {
                background-color: #ffffff;
                padding-top: 30px;
                padding-bottom: 34px;
            }

            .footer-cell {
                background-color: #eeeeee;
                text-align: center;
                font-size: 13px;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .card {
                width: 400px;
                margin: 0 auto;
            }

            .data-heading {
                text-align: right;
                padding: 10px;
                background-color: #ffffff;
                font-weight: bold;
            }

            .data-value {
                text-align: left;
                padding: 10px;
                background-color: #ffffff;
            }

            .force-full-width {
                width: 100% !important;
            }

        </style>
        <style type="text/css" media="only screen and (max-width: 600px)">
            @media only screen and (max-width: 600px) {
                body[class*="background"],
                table[class*="background"],
                td[class*="background"] {
                    background: #eeeeee !important;
                }

                table[class="card"] {
                    width: auto !important;
                }

                td[class="data-heading"],
                td[class="data-value"] {
                    display: block !important;
                }

                td[class="data-heading"] {
                    text-align: left !important;
                    padding: 10px 10px 0;
                }

                table[class="wrap"] {
                    width: 100% !important;
                }

                td[class="wrap-cell"] {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
            }
        </style>
    </head>

    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
        <tr>
            <td align="center" valign="top" width="100%" class="background">
                <center>
                    <table cellpadding="0" cellspacing="0" width="600" class="wrap">
                        <tr>
                            <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                                <table cellpadding="0" cellspacing="0" class="force-full-width">
                                    <tr>
                                        <td height="60" valign="top" class="header-cell">
                                            <img src="https://mangvieclam.com/wp-content/uploads/2016/09/logo05032016-e1474689543605.png" alt="Logo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="body-cell">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#008cd8">
                                                <tr>
                                                    <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                                                        <?php echo $company ; ?> ,<br><br>
                                                        Tài khoản <?php echo $user_name ?> gửi yêu cầu mua gói <?php echo $name ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                                                            <tr>
                                                                <td align="center" style="padding:20px 0;">
                                                                    <center>
                                                                        <table cellspacing="0" cellpadding="0" class="card">
                                                                            <tr>
                                                                                <td style="background-color:#008cd8; text-align:center; padding:10px; color:white; ">
                                                                                    Đơn hàng
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="border:1px solid #008cd8;">
                                                                                    <table cellspacing="0" cellpadding="20" width="100%">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Ngày đặt mua:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                         <?php echo  sw_get_current_weekday(); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Tên gói:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $name ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Đơn giá:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo format_gia($package->price); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <?php
                                                                                                    if($description["discount_percent"]!=0){
                                                                                                        $price_vip=($package->price *$description["discount_percent"])/100;
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td width="150" class="data-heading">
                                                                                                                Giảm giá:
                                                                                                            </td>
                                                                                                            <td class="data-value">
                                                                                                                <?php echo $description["discount_percent"].'%'; ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td width="150" class="data-heading">
                                                                                                                Giá sale:
                                                                                                            </td>
                                                                                                            <td class="data-value">
                                                                                                                <?php echo format_gia($price_vip); ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    <?php

                                                                                                    }
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            SĐT liên hệ:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $user_name; ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="footer-cell">
                                            Công ty Công nghệ Caribe<br>
                                           Website : <a href="<?php echo home_url(); ?>">mangvieclam.com</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>

    </body>
    </html>
    <?php

    $html_mail = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return

    ob_end_clean();


    $nFrom = $company;    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'hoapham@cabtechgroup.com';  //dia chi email cua ban
    $mPass = 'Dh51200497';       //mat khau email cua ban
    $nTo = 'MVL GROUP'; //Ten nguoi nhan
    $mTo = 'mvl-group-68@googlegroups.com';   //dia chi nhan mail
//    $mTo = 'hoaquynh497@gmail.com';   //dia chi nhan mail
    $mail             =new PHPMailer();
    $body             = $html_mail;   // Noi dung email
    $title = 'Tài khoản '.$user_name.' đăng ký gói '.$name.'';   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($user_email, $company); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail
    if(!$mail->Send()) {
//        echo 'Co loi!';

    } else {

//        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    }
}

add_action('wp_ajax_admin_contact_up', 'admin_contact_up');
add_action('wp_ajax_nopriv_admin_contact_up', 'admin_contact_up');
function admin_contact_up() {
    global $current_user,$wpdb,$wp2es;

    $package_id=$_POST["data"];
    $user_name=$current_user->user_login;
    $user_email=$current_user->user_email;
    $today = date('Y-m-d');
    $user_id=$current_user->ID;
    $date_expierd = get_user_meta($current_user->ID, 'user_up_expire', true);
    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id'");
    foreach ( $post_up as $package )
    {
        $name=$package->name;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_date= $description["duration"];
        $user_up_count=$description["up_count"];
    }
    $cond_company=array('post_status'=>'publish','post_type'=>'company','post_author'=>$user_id);
    $order=array('up_at'=>'desc', 'post_date'=>'desc');
    $limit_company=array('size'=>1,'page'=>1);
    $result_company = $wp2es->and_simple_search($cond_company,$order,$limit_company);
    $company=$result_company[0]["wpjobus_company_fullname"];


    $data_user_up =array();
    $data_user_up['phone']=$user_name;
    $data_user_up['package_id']=$package_id;
    $data_user_up['package_name']=$name;
    $data_user_up['price']=$package->price;
    $data_user_up['date_create']= sw_get_current_weekday();

    add_queue('admin_contact',$data_user_up);

    echo "Cảm ơn bạn đã gửi yêu cầu mua gói ". $name. ".Nhân viên hỗ trợ của chúng tôi sẽ liên lạc ngay với bạn.";
    ob_start();
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Zen Flat Confirm Email</title>
        <style type="text/css" media="screen">

            /* Force Hotmail to display emails at full width */
            .ExternalClass {
                display: block !important;
                width: 100%;
            }

            /* Force Hotmail to display normal line spacing */
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            body,
            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            body,
            p,
            td {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                color: #333333;
                line-height: 1.5em;
            }

            h1 {
                font-size: 24px;
                font-weight: normal;
                line-height: 24px;
            }

            body,
            p {
                margin-bottom: 0;
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            img {
                line-height: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
            }

            a img {
                border: none;
            }

            .background {
                background-color: #333333;
            }

            table.background {
                margin: 0;
                padding: 0;
                width: 100% !important;
            }

            .block-img {
                display: block;
                line-height: 0;
            }

            a {
                color: white;
                text-decoration: none;
            }

            a,
            a:link {
                color: #2A5DB0;
                text-decoration: underline;
            }

            table td {
                border-collapse: collapse;
            }

            td {
                vertical-align: top;
                text-align: left;
            }

            .wrap {
                width: 600px;
            }

            .wrap-cell {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .header-cell,
            .body-cell,
            .footer-cell {
                padding-left: 20px;
                padding-right: 20px;
            }

            .header-cell {
                background-color: #eeeeee;
                font-size: 24px;
                color: #ffffff;
            }

            .body-cell {
                background-color: #ffffff;
                padding-top: 30px;
                padding-bottom: 34px;
            }

            .footer-cell {
                background-color: #eeeeee;
                text-align: center;
                font-size: 13px;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .card {
                width: 400px;
                margin: 0 auto;
            }

            .data-heading {
                text-align: right;
                padding: 10px;
                background-color: #ffffff;
                font-weight: bold;
            }

            .data-value {
                text-align: left;
                padding: 10px;
                background-color: #ffffff;
            }

            .force-full-width {
                width: 100% !important;
            }

        </style>
        <style type="text/css" media="only screen and (max-width: 600px)">
            @media only screen and (max-width: 600px) {
                body[class*="background"],
                table[class*="background"],
                td[class*="background"] {
                    background: #eeeeee !important;
                }

                table[class="card"] {
                    width: auto !important;
                }

                td[class="data-heading"],
                td[class="data-value"] {
                    display: block !important;
                }

                td[class="data-heading"] {
                    text-align: left !important;
                    padding: 10px 10px 0;
                }

                table[class="wrap"] {
                    width: 100% !important;
                }

                td[class="wrap-cell"] {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
            }
        </style>
    </head>

    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
        <tr>
            <td align="center" valign="top" width="100%" class="background">
                <center>
                    <table cellpadding="0" cellspacing="0" width="600" class="wrap">
                        <tr>
                            <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                                <table cellpadding="0" cellspacing="0" class="force-full-width">
                                    <tr>
                                        <td height="60" valign="top" class="header-cell">
                                            <img src="https://mangvieclam.com/wp-content/uploads/2016/09/logo05032016-e1474689543605.png" alt="Logo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="body-cell">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#008cd8">
                                                <tr>
                                                    <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                                                        <?php echo $company ; ?> ,<br><br>
                                                        Tài khoản <?php echo $user_name ?> gửi yêu cầu mua gói <?php echo $name ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                                                            <tr>
                                                                <td align="center" style="padding:20px 0;">
                                                                    <center>
                                                                        <table cellspacing="0" cellpadding="0" class="card">
                                                                            <tr>
                                                                                <td style="background-color:#008cd8; text-align:center; padding:10px; color:white; ">
                                                                                    Đơn hàng
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="border:1px solid #008cd8;">
                                                                                    <table cellspacing="0" cellpadding="20" width="100%">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Ngày đặt mua:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo  sw_get_current_weekday(); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Tên gói:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $name ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Đơn giá:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo format_gia($package->price); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <?php
                                                                                                    if($description["discount_percent"]!=0){
                                                                                                        $price_vip=($package->price *$description["discount_percent"])/100;
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td width="150" class="data-heading">
                                                                                                                Giảm giá:
                                                                                                            </td>
                                                                                                            <td class="data-value">
                                                                                                                <?php echo $description["discount_percent"].'%'; ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td width="150" class="data-heading">
                                                                                                                Giá sale:
                                                                                                            </td>
                                                                                                            <td class="data-value">
                                                                                                                <?php echo format_gia($price_vip); ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    <?php

                                                                                                    }
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            SĐT liên hệ:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $user_name; ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="footer-cell">
                                            Công ty Công nghệ Caribe<br>
                                            Website : <a href="<?php echo home_url(); ?>">mangvieclam.com</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>

    </body>
    </html>
    <?php

    $html_mail = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return

    ob_end_clean();


    $nFrom = $company;    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'hoapham@cabtechgroup.com';  //dia chi email cua ban
    $mPass = 'Dh51200497';       //mat khau email cua ban
    $nTo = 'MVL GROUP'; //Ten nguoi nhan
        $mTo = 'mvl-group-68@googlegroups.com';   //dia chi nhan mail
//    $mTo = 'hoaquynh497@gmail.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $html_mail;   // Noi dung email
    $title = 'Tài khoản '.$user_name.' đăng ký gói '.$name.'';   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($user_email, $company); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail
    if(!$mail->Send()) {
//        echo 'Co loi!';

    } else {

//        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    }
}
add_action('wp_ajax_admin_contact_vip', 'admin_contact_vip');
add_action('wp_ajax_nopriv_admin_contact_vip', 'admin_contact_vip');
function admin_contact_vip() {
    global $current_user,$wpdb,$wp2es;

    $package_id=$_POST["data"];
    $user_name=$current_user->user_login;
    $user_email=$current_user->user_email;

    $today = date('Y-m-d');
    $user_id=$current_user->ID;
    $date_expierd = get_user_meta($current_user->ID, 'vip_star_expire', true);
    $post_vip = get_user_meta($current_user->ID, 'star_package_id', true);
    $post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id='$package_id' ");
    foreach ( $post_vips as $package )
    {
        $name=$package->name;
        $user_name=$current_user->user_login;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_week=$description["duration"];

    }
    $cond_company=array('post_status'=>'publish','post_type'=>'company','post_author'=>$user_id);
    $order=array('up_at'=>'desc', 'post_date'=>'desc');
    $limit_company=array('size'=>1,'page'=>1);
    $result_company = $wp2es->and_simple_search($cond_company,$order,$limit_company);
    $company=$result_company[0]["wpjobus_company_fullname"];
    $data_user_vip =array();
    $data_user_vip['phone']=$user_name;
    $data_user_vip['package_id']=$package_id;
    $data_user_vip['package_name']=$name;
    $data_user_vip['price']=$package->price;
    $data_user_vip['date_create']=sw_get_current_weekday();;

    add_queue('admin_contact',$data_user_vip);

    echo "Cảm ơn bạn đã gửi yêu cầu mua gói ". $name. ".Nhân viên hỗ trợ của chúng tôi sẽ liên lạc ngay với bạn.";
    ob_start();
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Zen Flat Confirm Email</title>
        <style type="text/css" media="screen">

            /* Force Hotmail to display emails at full width */
            .ExternalClass {
                display: block !important;
                width: 100%;
            }

            /* Force Hotmail to display normal line spacing */
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            body,
            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            body,
            p,
            td {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                color: #333333;
                line-height: 1.5em;
            }

            h1 {
                font-size: 24px;
                font-weight: normal;
                line-height: 24px;
            }

            body,
            p {
                margin-bottom: 0;
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            img {
                line-height: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
            }

            a img {
                border: none;
            }

            .background {
                background-color: #333333;
            }

            table.background {
                margin: 0;
                padding: 0;
                width: 100% !important;
            }

            .block-img {
                display: block;
                line-height: 0;
            }

            a {
                color: white;
                text-decoration: none;
            }

            a,
            a:link {
                color: #2A5DB0;
                text-decoration: underline;
            }

            table td {
                border-collapse: collapse;
            }

            td {
                vertical-align: top;
                text-align: left;
            }

            .wrap {
                width: 600px;
            }

            .wrap-cell {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .header-cell,
            .body-cell,
            .footer-cell {
                padding-left: 20px;
                padding-right: 20px;
            }

            .header-cell {
                background-color: #eeeeee;
                font-size: 24px;
                color: #ffffff;
            }

            .body-cell {
                background-color: #ffffff;
                padding-top: 30px;
                padding-bottom: 34px;
            }

            .footer-cell {
                background-color: #eeeeee;
                text-align: center;
                font-size: 13px;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .card {
                width: 400px;
                margin: 0 auto;
            }

            .data-heading {
                text-align: right;
                padding: 10px;
                background-color: #ffffff;
                font-weight: bold;
            }

            .data-value {
                text-align: left;
                padding: 10px;
                background-color: #ffffff;
            }

            .force-full-width {
                width: 100% !important;
            }

        </style>
        <style type="text/css" media="only screen and (max-width: 600px)">
            @media only screen and (max-width: 600px) {
                body[class*="background"],
                table[class*="background"],
                td[class*="background"] {
                    background: #eeeeee !important;
                }

                table[class="card"] {
                    width: auto !important;
                }

                td[class="data-heading"],
                td[class="data-value"] {
                    display: block !important;
                }

                td[class="data-heading"] {
                    text-align: left !important;
                    padding: 10px 10px 0;
                }

                table[class="wrap"] {
                    width: 100% !important;
                }

                td[class="wrap-cell"] {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
            }
        </style>
    </head>

    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
        <tr>
            <td align="center" valign="top" width="100%" class="background">
                <center>
                    <table cellpadding="0" cellspacing="0" width="600" class="wrap">
                        <tr>
                            <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                                <table cellpadding="0" cellspacing="0" class="force-full-width">
                                    <tr>
                                        <td height="60" valign="top" class="header-cell">
                                            <img src="https://mangvieclam.com/wp-content/uploads/2016/09/logo05032016-e1474689543605.png" alt="Logo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="body-cell">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#008cd8">
                                                <tr>
                                                    <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                                                        <?php echo $company ; ?> ,<br><br>
                                                        Tài khoản <?php echo $user_name ?> gửi yêu cầu mua gói <?php echo $name ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                                                            <tr>
                                                                <td align="center" style="padding:20px 0;">
                                                                    <center>
                                                                        <table cellspacing="0" cellpadding="0" class="card">
                                                                            <tr>
                                                                                <td style="background-color:#008cd8; text-align:center; padding:10px; color:white; ">
                                                                                    Đơn hàng
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="border:1px solid #008cd8;">
                                                                                    <table cellspacing="0" cellpadding="20" width="100%">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Ngày đặt mua:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo sw_get_current_weekday(); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Tên gói:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $name ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            Đơn giá:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo format_gia($package->price); ?>
                                                                                                        </td>
                                                                                                    </tr>


                                                                                                        <?php
                                                                                                        if($description["discount_percent"]!=0){
                                                                                                            $price_vip=($package->price *$description["discount_percent"])/100;
                                                                                                            ?>
                                                                                                            <tr>
                                                                                                                <td width="150" class="data-heading">
                                                                                                                    Giảm giá:
                                                                                                                </td>
                                                                                                                <td class="data-value">
                                                                                                                    <?php echo $description["discount_percent"].'%'; ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td width="150" class="data-heading">
                                                                                                                    Giá sale:
                                                                                                                </td>
                                                                                                                <td class="data-value">
                                                                                                                    <?php echo format_gia($price_vip); ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <?php

                                                                                                        }
                                                                                                        ?>
                                                                                                    <tr>
                                                                                                        <td width="150" class="data-heading">
                                                                                                            SĐT liên hệ:
                                                                                                        </td>
                                                                                                        <td class="data-value">
                                                                                                            <?php echo $user_name; ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="footer-cell">
                                            Công ty Công nghệ Caribe<br>
                                            Website : <a href="<?php echo home_url(); ?>">mangvieclam.com</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>

    </body>
    </html>
    <?php

    $html_mail = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return

    ob_end_clean();


    $nFrom = $company;    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'hoapham@cabtechgroup.com';  //dia chi email cua ban
    $mPass = 'Dh51200497';       //mat khau email cua ban
    $nTo = 'MVL GROUP'; //Ten nguoi nhan
    $mTo = 'mvl-group-68@googlegroups.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $html_mail;   // Noi dung email
    $title = 'Tài khoản '.$user_name.' đăng ký gói '.$name.'';   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($user_email, $company); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail
    if(!$mail->Send()) {
//        echo 'Co loi!';

    } else {

//        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    }
}

add_action('wp_ajax_action_vip_package', 'action_vip_package');
add_action('wp_ajax_nopriv_action_vip_package', 'action_vip_package');
function action_vip_package() {
    global $wpdb;
    $id_package=$_POST['data'];
    $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id = '$id_package' ");
//    print_r($user_vip);
                    $description=$user_vip[0]->service_benefit;
                    $description=json_decode($description, true);
                    $job_star=$description['vip_star'];
                    $package_vip_gift=$description['package_vip_gift'];
                    $name_gift_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE package_id = '$package_vip_gift' ");




    ?>
                    <p class="name_package"><?php echo $user_vip[0]->name?></p>
    <span class="star_package">
                    <?php
                    if($job_star >0)
                    {
                        for($i=1;$i<=$job_star;$i++)
                        {
                            ?>
                            <img style="width: 20px;" src="<?php echo home_url('/') ?>wp-content/themes/mangvieclam789/images/sao_1.png ">
                        <?php
                        }
                    }
                    ?>
                    </span>

                    <div class="price">
                        <span class="dollar"></span>
                        <span class="amount"></span>
                        <span class="slash"></span>
                        <span class="month"></span>
                    </div>

                    <ul>
                        <li>Thời hạn<span><?php echo $description["duration"];?> ngày</span></li>
                        <li>Lượt xem hồ sơ<span><?php echo $description["cv_view_count"];?></span></li>
                        <li>Lượt đăng tin trong ngày<span><?php echo $description["user_daily_max_post"];?></span></li>
                        <li>Lượt đăng tin trong tháng<span><?php  echo $description["user_monthly_max_post"];?></span></li>
                        <?php
                        if($description["discount_percent"]!=0){
                           $price_vip=($user_vip[0]->price *$description["discount_percent"])/100;
                            ?>
                            <li>Khuyến mãi(giảm giá)<span><?php  echo $description["discount_percent"];?>%</span></li>
                            <li>Gói khuyến mãi<span class="price_vip"><?php echo $name_gift_vip[0]->name; ?></span></li>
                            <li>Số tin khuyến mãi<span class="price_vip"><?php echo $description['count_gift_post']; ?></span></li>
                            <li>Giá<span class="price_none" style="text-decoration:line-through;color: lightgray;"><?php echo format_gia( $user_vip[0]->price); ?></span> <span class="price_sale"><?php echo format_gia($price_vip); ?></span></li>
                        <?php }else { ?>
                            <li>Giá<span class="price_vip"><?php echo format_gia($user_vip[0]->price); ?></span></li>
                        <?php
                        }
                            ?>
                    </ul>
                    <div class="buton">
                        <a onclick="pay_ment()" class="button sign-up" id="add_vip_<?php  echo $user_vip[0]->package_id;?>" href='<?php echo home_url("/") ?>my-account/?user_vip=<?php echo $user_vip[0]->package_id;?>'>Gửi yêu cầu</a></div>
                </div>
    <?php
    die();
}
add_action('wp_ajax_action_up_package', 'action_up_package');
add_action('wp_ajax_nopriv_action_up_package', 'action_up_package');
function action_up_package() {
    global $wpdb;
    $id_package=$_POST['data'];
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id = '$id_package' ");
//    print_r($user_vip);
    $description=$post_up[0]->service_benefit;
    $description=json_decode($description, true);

    ?>
    <p class="name_package"><?php echo $post_up[0]->name?></p>

    <div class="price">
        <span class="dollar"></span>
        <span class="slash"></span>
        <span class="month"></span>
    </div>

    <ul>
        <li>Thời hạn<span><?php echo $description["duration"];?> ngày</span></li>
        <li>Lượt up tin ưu tiên<span> <?php echo $description["up_count"];?></span></li>
        <li>Giá<span><?php echo format_gia( $post_up[0]->price); ?></span></li>
    </ul>
    <div class="buton">
        <a onclick="pay_ment()" class="button sign-up"  id="add_vip_<?php echo $post_up[0]->package_id;?>" href="<?php echo home_url("/") ?>my-account/?up_post=<?php echo $post_up[0]->package_id;?>">Gửi yêu cầu</a></div>
    </div>
    <?php
    die();
}
add_action('wp_ajax_search_action', 'search_action');
add_action('wp_ajax_nopriv_search_action', 'search_action');
function search_action() {


    $keyword = $_POST["keyword"];

    $args=array(
        's'      => $keyword,
        'posts_per_page' => '10',
        'post_type'        => 'job',
        'orderby'          => 'date',
        'order'            => 'DESC',

    );
    ?>
    <?php query_posts($args); ?>
    <?php if ( have_posts() ) : ?>

        <?php while (have_posts()) : the_post(); ?>
            <?php
            $type =get_post_type();
            if( $type  == 'job'|| $type=='company' || $type=='resume') {
                ?>
                <?php $post_type = get_post_type_object(get_post_type()); ?>

                <p><a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_title(); ?> (<?php echo esc_html($post_type->labels->singular_name); ?>) &raquo;
                    </a></p>
                <hr style="height:0;border-top: 1px solid rgba(0, 0, 0, 0.1);">

            <?php

            }
        endwhile;
        ?>
    <?php else : ?>
        <p class="searchwp-live-search-no-results">
            <em><?php _ex( 'No results found.', 'swplas' ); ?></em>
        </p>
    <?php endif; ?>
    <?php
    die();
}
function post_vip()
{
    global $current_user,$post,$wpdb;
    $current_user =  wp_get_current_user();
    $user_id= $current_user->ID ;
    $post_id= $post->ID ;
    $date_expierd_post=get_post_meta($post->ID, 'vip_star_expire', true);
    $ngayhomnay = date("Y-m-d"); // Năm/Tháng/Ngày
    $ngaysosanh = $date_expierd_post; // Năm/Tháng/Ngày
//    $ngaysosanh = "2016-12-27"; // Năm/Tháng/Ngày

    if (strtotime($ngayhomnay) < strtotime($ngaysosanh)) {
//                    if (current_user_can('administrator')) {
//
//                        echo "Ngày hôm nay < " . $ngaysosanh;
//                    }
    }else{
//        if (current_user_can('administrator')) {
//        echo "Ngày hôm nay > ".$date_expierd_post;
//        }
        delete_post_meta($post_id,'vip_star',5);
        delete_post_meta($post_id,'vip_star_expire',$date_expierd_post);


    }


}
add_action('wp_head','post_vip');
function post_up()
{
    global $current_user,$post,$wpdb;
    $user_id= $current_user->ID ;
    $post_id= $post->ID ;
    $date_expierd_up = get_user_meta($user_id, 'user_up_expire', true);
    $count_up = get_user_meta($user_id, 'user_up_count', true);
//    $today = date('Y-m-d');
    $ngayhomnay = date("Y-m-d"); // Năm/Tháng/Ngày
    $ngaysosanh = $date_expierd_up; // Năm/Tháng/Ngày
    if (strtotime($ngayhomnay) < strtotime($ngaysosanh)) {
    }else{
        delete_user_meta($user_id, 'user_up_expire');
        delete_user_meta($user_id, 'user_up_count');
    }


}
add_action('wp_head','post_up');

add_action( 'admin_menu', 'admin_salary' );

add_action('admin_menu', 'admin_salary');

function admin_salary()
{
    add_menu_page(
        ' Data Salary',
        ' Data Salary',
        'manage_options',
        'salary-manage',
        'salary_pages'
    );
//    $page = add_menu_page(__('Công cụ tính lương', 'menu-salary'), __('Công cụ tính lương', 'menu-salary'), 'manage_options', __FILE__, 'salary_pages');
}
function salary_pages()
{
    require_once('salary_page.php');

}
add_action('wp_ajax_un_accept_cookie', 'un_accept_cookie');
add_action('wp_ajax_nopriv_un_accept_cookie', 'un_accept_cookie');
function un_accept_cookie() {

    $cookie=$_POST['data'];
    if($cookie==""){
        setcookie("un_accept", "1",  time() + ( 365 * 24 * 60 * 60), "/","", 0);
    }
    else if($cookie==1)
    {
        setcookie("un_accept", "2",  time() + ( 365 * 24 * 60 * 60), "/","", 0);

    }
    ?>
<?php
    die();

}


function update_time_cookie() {


        setcookie("time_cookie",date('Y-m-d'),time() + (60*60*24), "/","", 0);

    die();

}
add_action('wp_ajax_update_time_cookie', 'update_time_cookie');
add_action('wp_ajax_nopriv_update_time_cookie', 'update_time_cookie');

add_action('wp_ajax_accept_cookie', 'accept_cookie');
add_action('wp_ajax_nopriv_accept_cookie', 'accept_cookie');
function accept_cookie() {
    global $wpdb;
    $today = date('Y-m-d');
    $accept_cookie=$_POST['data_cookie'];
    $account_type=$accept_cookie['account_type'];
    $industy=$accept_cookie['industy'];
    $phone=$accept_cookie['phone'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    $user = get_user_by( 'user_login',$phone );
    if($user !="")
    {
        $check_account="true";
    }
    else{

    }
    $data_status=array();
    $data_status['check_account'] = $user->user_nicename;
    $data_status['sale_id'] = "";
    $data_status['note_contact'] = "";
    $data_status['date_contact'] = "";

    $wpdb->insert("crb_cookie_user", array(
        "account_type" => $account_type,
        "industry_user" => $industy,
        "number_phone" => $phone,
        "ip_user"=>$ip,
        "date_create"=>date('Y-m-d H:i:s')
        ));
    setcookie("accept", "true",  time() + ( 365 * 24 * 60 * 60), "/","", 0);
    setcookie("account_type", $account_type, time() + ( 365 * 24 * 60 * 60), "/","", 0);
    setcookie("industy", $industy,  time() + ( 365 * 24 * 60 * 60), "/","", 0);
    setcookie("phone", $phone,  time() + ( 365 * 24 * 60 * 60), "/","", 0);
    setcookie("time_cookie", $today,  time() + (60*60*24), "/","", 0);

    if($account_type=="job-offer")
    {
        $slug_account="ung-vien-theo-nganh-nghe";
        $mess="Mệt mỏi vì không tuyển được người phù hợp với doanh nghiệp của bạn, hãy để Mạng Việc Làm giải quyết giúp bạn.";
    }else if($account_type=="job-seeker")
    {
        $slug_account="nganh-nghe-tuyen-dung";
        $mess="Bạn chưa tìm được việc làm phù hợp? Hãy để Mạng Việc Làm giải quyết giúp bạn.";

    }
    $slug_industy=createSlug($industy);

    $url=home_url('/').$slug_account."/".$slug_industy;
    ?>
    <script>
    jQuery('#popup-login').css('display', 'none');

    swal({
            title: '<?php echo $mess; ?>',
            text: '',
            type: 'success'
        }).then(
            function () {
                var url="<?php echo $url; ?>";
                location.href=url;

            },
            function (dismiss) {
            }
        )


    </script>
    <?php


    die();

}
add_action('wp_ajax_unlike_action', 'unlike_action');
add_action('wp_ajax_nopriv_unlike_action', 'unlike_action');

function unlike_action() {
    global $wpdb;
    $result_data=$_POST["data"];
    $post_id=$result_data["post_id"];
    $user_id=$result_data["user_id"];
    $wpdb->delete( 'wpjobus_favorites', array( 'user_id' => $user_id,'listing_id' => $post_id ) );
    echo "<i class='fa fa-floppy-o'></i> Lưu tin";

    die();

}
add_action('wp_ajax_like_action', 'like_action');
add_action('wp_ajax_nopriv_like_action', 'like_action');

function like_action() {
    global $wpdb;
    $result_data=$_POST["data"];
    $post_id=$result_data["post_id"];
    $user_id=$result_data["user_id"];
    $listing_type=$result_data["listing_type"];
    $wpdb->insert(
        'wpjobus_favorites',
        array(
            'listing_type' => $listing_type,
            'listing_id' =>$post_id,
            'user_id'=>$user_id
        )
    );
    echo "<i class='fa fa-floppy-o'></i> Đã lưu";
    die();

}