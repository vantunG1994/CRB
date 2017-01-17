<?php
/**
 * Template name: Home Page
 */
?>
<?php
global $wpdb;
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
?>
<?php
get_header();
?>
<script type="text/javascript">

    $(document).ready(function() {
        $('#phone-popup').blur(function(e) {
            if (validatePhone('phone-popup')) {
                $('#spnPhoneStatus').css('display', 'none');
                return true;
            }
            else {
                $('#spnPhoneStatus').html('Số điên thoại không đúng.Vui lòng nhập lại.');
                $('#spnPhoneStatus').css('color', 'red');
                return false;

            }
        });
    });

    function validatePhone(txtPhone) {
        var a = document.getElementById(txtPhone).value;
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
            return true;
        }
        else {
            return false;
        }
    }
</script>

<?php
if($_COOKIE["un_accept"]!=2 && $_COOKIE["accept"]=="" && !is_user_logged_in()) {
    if($_COOKIE["un_accept"]==1)
    {
        ?>
        <script>
            jQuery(document).ready(function($) {
                var delay =15000;
                setTimeout(function(){
                    jQuery('#popup-login').css('display', 'block');
                }, delay);
            });
        </script>
        <?php
    }
    else{
        ?>
        <script>
            jQuery(document).ready(function($) {
                var delay =7500;
                setTimeout(function(){
                    jQuery('#popup-login').css('display', 'block');
                }, delay);
            });
        </script>
        <?php
    }}
if(isset($_COOKIE["accept"])=="true" && $_COOKIE["time_cookie"]!= date('Y-m-d') )
{
    $today = date('Y-m-d');
    //setcookie("time_cookie", "", time()-(60*60*24));
    if (isset($_COOKIE['time_cookie'])) {
        unset($_COOKIE['time_cookie']);
        setcookie('time_cookie', '', time() - 86400, '/'); // empty value and old timestamp
    }

}
if($_COOKIE["accept"]=="true"  && !isset($_COOKIE["time_cookie"]) && !is_user_logged_in())
{
    $account_type=$_COOKIE["account_type"];
    $industy=$_COOKIE["industy"];
    $phone=$_COOKIE['phone'];
    if($account_type=="job-offer")
    {
        $title_mess="Bạn đang gặp khó khăn trong việc tìm kiếm ứng viên?";
        $mess="Bạn có muốn Mạng Việc Làm gợi ý các hồ sơ ứng viên mới nhất ngành ".$industy."?";
        $slug="ung-vien-theo-nganh-nghe";
    }
    else if($account_type=="job-seeker")
    {
        $title_mess="Bạn đang gặp khó khăn trong việc tìm kiếm tuyển dụng phù hợp?";
        $mess="Bạn có muốn Mạng Việc Làm gợi ý các tin tuyển dụng mới nhất ngành ".$industy."?";
        $slug="nganh-nghe-tuyen-dung";
    }
    $slug_industry=createSlug($industy);
    $url=home_url('/').$slug."/".$slug_industry;
//    $mess= $_COOKIE["time_cookie"];

    ?>
    <script>
        jQuery(document).ready(function($) {
            var delay = 7500;
            setTimeout(function(){
                swal({
                    title: '<?php echo $title_mess; ?>',
                    text: "<?php echo $mess;?>",
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
                    var url="<?php echo $url; ?>";
                    location.href=url;
                    var time_cookie="<?php echo $_COOKIE["time_cookie"]; ?>";
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'update_time_cookie', 'data_cookie': time_cookie},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".result_cookie").html(resp);

                        }
                    });
                }, function (dismiss) {
                    // dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                    if (dismiss === 'cancel') {
                        $.ajax({
                            type: 'POST',
                            data: {'action': 'update_time_cookie', 'data_cookie': time_cookie},
                            url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                            success: function (resp) {
                                $(".result_cookie").html(resp);

                            }
                        });

                    }
                })
            }, delay);
        });
    </script>
    <?php


}

if(isset($post)) {

    $page = get_page($post->ID);
    $td_current_page_id = $page->ID;

} else {
    $td_current_page_id = "";
}

$page_slider = get_post_meta($td_current_page_id, 'page_slider', true);
?>

<?php
if(MVL_IS_MOBILE==true)
{
    ?>
    
<?php
}
?>
<section id="popup-login">
    <div class="container">
         <div class="row">
          <div class="col-xs-12 col-md-6 col-md-offset-3 ">
  
        <div class="resume-skills">
            <a id="close-popup-login" href="#" rel="top" title="<?php _e( "close", "themesdojo" ); ?>" ><i class="fa fa-times"></i></a>
            <h1 class="resume-section-title"><i class="fa fa-check"></i><?php _e( 'Bạn đang bế tắc?', 'themesdojo' ); ?></h1>
            <h3 class="resume-section-subtitle"><?php _e( 'Mệt mỏi, áp lực vì không tuyển được người cho doanh nghiệp của bạn? Chán nản vì chưa tìm được công việc phù hợp? Hãy để Mạng Việc Làm giải quyết giúp bạn.', 'themesdojo' ); ?></h3>
            <div class="divider"></div>


            <div class="full" style="margin-bottom: 0;">
                <div class="phone-popup">
                    <input id="phone-popup"  type="text" placeholder="Nhập số điện thoại của bạn"  name="phone-popup"><br>
                    <span id="spnPhoneStatus"></span>
                </div>
                <div class="one_half first" style="margin-bottom: 0;">

                    <div class="full">
                        <div class="title-popup">
                            <p id="title_account">Bạn là:</p>
                        </div>

                        <select class="account_type_user_list select2">
                            <option value="">Bạn là ai</option>
                            <option value="job-offer">Nhà tuyển dụng</option>
                            <option value="job-seeker">Người tìm việc</option>
                        </select>
                    </div>



                    <div class="select-popup ">
                        <div class="title-popup">
                            <p id="title_industry">Lĩnh vực của bạn :</p>
                        </div>

                        <select class="user_industy_list select2"  style="width: 100%; margin-bottom: 0;">
                            <option value="">Lĩnh vực của bạn</option>
                            <?php
                            foreach ($job_field as $industry) {
                                ?>
                                <option  value="<?php echo createSlug($industry->name); ?>"><?php echo $industry->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="button-popup">
                    <a rel="nofollow" class="btn btn-primary" id="set-cookie_accept" style="font-size: 16px;" >Xác nhận thông tin</a>
                </div>
            </div>

        </div>
        </div>
        </div>
    </div>
    </div>
    <div id="close-login" class="close-login"></div>
    <div class="result_cookie"></div>
    <script>
        jQuery(document).ready(function($) {
            jQuery('#title_account').css('display', 'none');
            jQuery('#title_industry').css('display', 'none');
            jQuery('#popup-login').css('display', 'none');

//           $(".industy").change(function(){
//               jQuery('#title_industry').css('display', 'block');
//
//           });
//           $(".account_type_user").change(function(){
//               jQuery('#title_account').css('display', 'block');
//
//           });
        });
        jQuery(document).ready(function($) {
            $("#close-popup-login").click(function(){
                jQuery('#popup-login').css('display', 'none');
                jQuery('#close-login').css('display', 'none');

                var un_accept_cookie="<?php echo $_COOKIE["un_accept"]; ?>";
                $.ajax({
                    type : 'POST',
                    data : {'action' : 'un_accept_cookie', 'data' :un_accept_cookie},
                    url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success : function (resp){
                        $(".result_cookie").html(resp);

                    }
                });
            });
        });
        jQuery(document).ready(function($) {
            $("#set-cookie_accept").click(function(){
                var account_type = $(".account_type_user_list").val();
                var industy =$(".user_industy_list option:selected").text();
                var phone=$("#phone-popup").val();
                if(account_type !="" && industy !="" && phone !="")
                {
                    var dataString = {account_type: account_type, industy: industy, phone: phone}
                    $.ajax({
                        type: 'POST',
                        data: {'action': 'accept_cookie', 'data_cookie': dataString},
                        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                        success: function (resp) {
                            $(".result_cookie").html(resp);

                        }
                    });

                }else{
                    jQuery('#popup-login').css('display', 'none');
                    jQuery('#close-login').css('display', 'none');
                    swal({
                        title: 'Có lỗi xảy ra!',
                        text: 'Vui lòng cung cấp lại đầy đủ thông tin!.',
                        type: 'error'
                    }).then(
                        function () {
                            jQuery('#popup-login').css('display', 'block');
                            jQuery('#close-login').css('display', 'block');


                        },
                        function (dismiss) {

                        }
                    )

                }




            });
        });

    </script>
</section>
<?php
if(DEVICE == 'mobile') {
    include 'mobile/index.php';
} else {
    include 'desktop/index.php';
}

get_footer();
?>