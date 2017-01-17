<!--<link rel='stylesheet' id='main-style-css'  href='--><?php //echo home_url("/"); ?><!--wp-content/themes/mangvieclam789/css/main.css?ver=1' type='text/css' media='all' />-->
<!--<style>-->
<!--    .wp-admin select {-->
<!--        padding: 2px;-->
<!--        line-height: 28px;-->
<!--        height: 100% !important;-->
<!--    }-->
<!--</style>-->
<div class="content" >


<form method="post" style="margin: 50px;">
    <table>
        <tr>
            <td>Nhập email</td>
            <td><input id="user_name" type="text" name="company_name_email"></td>
        </tr>
        <tr>
            <td>Ngành nghề</td>
            <td>
                <select name="industry_resume_option">
                    <option value="">Lựa chọn ngành nghề</option>
                    <?php

                    global $wpdb;
                    $job_field=$wpdb->get_results('select * from job_field ');
                    $job_province=$wpdb->get_results('select * from job_province ');
                        foreach ($job_field as $industry) {
                            ?>
                            <option  <?php selected( $td_job_industry,$industry->name ); ?> value="<?php echo $industry->name; ?>"><?php echo $industry->name; ?></option>
                            <?php
                        }
                        ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>Khu vực</td>
            <td>
                <select class=""  name="resume_location_new" id="" style="width: 100%; margin-bottom: 0;">
                    <option value="">Lựa chọn khu vực</option>
                    <?php
                    foreach ($job_province as $categories) {

                        ?>
                        <option value="<?php echo  $categories->name; ?>"><?php echo $categories->name; ?></option>

                        <?php
                    }
                    ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>
                Kinh nghiệm
            </td>
            <td><input type="number" name="resume_years_of_exp"></td>
        </tr>
        <tr>
            <td><input type="submit" name="get_email_company" value="Gửi mail"></td>
        </tr>
    </table>
</form>
<div class="error" style="width: 500px;display: none;"></div>
<?php
if(isset($_POST['get_email_company'])) {
    global $wpdb;
    global $wp2es;

    $id = $_POST['company_name_email'];
    $resume_years_of_exp = $_POST['resume_years_of_exp'];
    if ($resume_years_of_exp != "" && $resume_years_of_exp != 0) {
        $years_of_exp = $resume_years_of_exp;
        $job_est_year_num = "";

        $resume_years_of_exp = 'resume_years_of_exp';
    } else {
        $resume_years_of_exp = 'post_type';
        $years_of_exp = 'resume';
    }
    $industry_resume = $_POST['industry_resume_option'];
    $resume_location_new = $_POST['resume_location_new'];

    $user_email = get_user_by('email', $id);
    $userEmail = $user_email->ID;
    $posttitle = $id;


    $user = get_user_by('login', $id);
    if (!($user) && !($userEmail) && $industry_resume == "" && $resume_location_new == "") {

        echo "Tài khoản không tồn tại hoặc thông tin chua đầy đủ vui lòng nhập lại";


    } else {

        if ($user->ID == "") {
            $user_id = $userEmail;
        } else {
            $user_id = $user->ID;
        }

        $where = get_posts_by_author_sql("job", true, $user_id);
        $date_expierd = get_user_meta($user_id, 'account_vip', true);
        if ($date_expierd != "") {
            echo "<p>Tài khoản đã được cấp VIP thời hạn là : " . $date_expierd . " .Bạn có muốn gia hạn thêm</p>";

        }

        $companies = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '" . $user_id . "'");

        foreach ($companies as $company) {

            $comp_id = $company->ID;

            $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
            $wpjobus_company_industry = esc_attr(get_post_meta($comp_id, 'company_industry', true));

            $cond = array('post_status' => 'publish', 'post_type' => 'job', 'job_company' => $comp_id);
            $order = array('ID' => 'desc');
            $limit = array('size' => 20, 'page' => 1);
            $result_job = $wp2es->and_simple_search($cond, $order, $limit);
            $title_industry = "Ngành nghề các tin tuyển dụng: ";
            for ($i = 0; $i < count($result_job); $i++) {

                if ($result_job[$i]['job_industry'] != $result_job[$i - 1]['job_industry']) {
                    $title_industry .= $result_job[$i]['job_industry'] . ",";
                }
            }


        }
        $email_to=$user->user_email;
        if($email_to=="")
        {
            $email_to=$id;
        }
        $user_post_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts $where");
        $count_vip = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_vip' ") ?: 0;
        $count_new = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_new' ") ?: 0;
        $user_phone_activation_code = get_user_meta($user_id, 'user_phone_activation_code', true) ?: 0;
        $user_phone_activation_time = get_user_meta($user_id, 'user_phone_activation_time', true) ?: 0;
        if ($user_phone_activation_code != 0 && $user_phone_activation_time == 0) {
            echo "<p>Tài khoản chưa xác thực</p>";
        } else {
            echo "<p>Tài khoản đã xác thực</p>";
        }
        echo "<p>Công ty : " . $wpjobus_company_fullname . "</p>";
        echo "<p>Ngành nghề : " . $wpjobus_company_industry . "</p>";
        echo "<p>" . $title_industry . "</p>";
        echo "<p>Tài khoản người dùng : " . $id . "</p>";
        echo "<p>Email người dùng : " . $user->user_email ?: $id . "</p>";
        echo "<p>Số tin đăng tuyển dụng : " . $user_post_count . "</p>";
        echo "<p>Số tin đăng đặc biệt : " . $count_vip . "</p>";
        echo "<p>Số tin đăng ưu tiên : " . $count_new . "</p>";
        global $wp2es;
        $cond_resume_ = array('post_status' => 'publish', 'post_type' => 'resume', 'resume_industry' => $industry_resume, 'resume_location' => $resume_location_new, $resume_years_of_exp => $years_of_exp);
        $order_resume = array('ID' => 'desc');
        $limit_resume = array('size' => 10, 'page' => 1);
        $result_resume = $wp2es->and_simple_search($cond_resume_, $order_resume, $limit_resume);
//             print_r($result_resume);
        if (!empty($result_resume)) {

            if ($wpjobus_company_fullname != "") {
                $name_company = $wpjobus_company_fullname;
            } else {
                $name_company =$email_to;

            }


//        $result_industry="";
//        for ($i = 0; $i <count($result_job); $i++) {
//
//            if($result_job[$i]['job_industry'] !=$result_job[$i-1]['job_industry'])
//            {
//                $result_industry.=$result_job[$i]['job_industry'];
//            }
////            $num_row=round(10/count($result_job));
//        }
////        array_merge(array1,array2,array3...)
//
//
//            echo "<pre>";
//            echo $wpdb->last_query;//lists only single query
//            echo "</pre>";
//


            include_once(ABSPATH . WPINC . '/class-phpmailer.php');
            ob_start();
            ?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html>
            <head>
            <!-- If you delete this meta tag, the ground will open and swallow you. -->
            <meta name="viewport" content="width=device-width"/>

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <title>Mang viec lam </title>
            <style type="text/css">
            /* -------------------------------------
            GLOBAL
            ------------------------------------- */
            * {
                margin: 0;
                padding: 0;
            }

            * {
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            }

            img {
                max-width: 100%;
            }

            .collapse {
                margin: 0;
                padding: 0;
            }

            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
            }

            /* -------------------------------------
                    ELEMENTS
            ------------------------------------- */
            a {
                color: #2BA6CB;
            }

            .btn {
                text-decoration: none;
                color: #FFF;
                background-color: #008cd8;
                padding: 10px 16px;
                font-weight: bold;
                margin-right: 10px;
                text-align: center;
                cursor: pointer;
                display: inline-block;
            }

            p.callout {
                padding: 15px;
                background-color: #ECF8FF;
                margin-bottom: 15px;
            }

            .callout a {
                font-weight: bold;
                color: #2BA6CB;
            }

            table.social {
                /* 	padding:15px; */
                background-color: #ebebeb;

            }

            .social .soc-btn {
                padding: 3px 7px;
                font-size: 12px;
                margin-bottom: 10px;
                text-decoration: none;
                color: #FFF;
                font-weight: bold;
                display: block;
                text-align: center;
            }

            a.fb {
                background-color: #3B5998 !important;
            }

            a.tw {
                background-color: #1daced !important;
            }

            a.gp {
                background-color: #DB4A39 !important;
            }

            a.ms {
                background-color: #000 !important;
            }

            .sidebar .soc-btn {
                display: block;
                width: 100%;
            }

            /* -------------------------------------
                    HEADER
            ------------------------------------- */
            table.head-wrap {
                width: 100%;
            }

            .header.container table td.logo {
                padding: 15px;
            }

            .header.container table td.label {
                padding: 15px;
                padding-left: 0px;
            }

            /* -------------------------------------
                    BODY
            ------------------------------------- */
            table.body-wrap {
                width: 100%;
            }

            /* -------------------------------------
                    FOOTER
            ------------------------------------- */
            table.footer-wrap {
                width: 100%;
                clear: both !important;
            }

            .footer-wrap .container td.content p {
                border-top: 1px solid rgb(215, 215, 215);
                padding-top: 15px;
            }

            .footer-wrap .container td.content p {
                font-size: 10px;
                font-weight: bold;

            }

            /* -------------------------------------
                    TYPOGRAPHY
            ------------------------------------- */
            h1, h2, h3, h4, h5, h6 {
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                line-height: 1.1;
                margin-bottom: 15px;
                color: #000;
            }

            h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
                font-size: 13px;
                color: #6f6f6f;
                line-height: 0;
                text-transform: none;
            }

            h1 {
                font-weight: 200;
                font-size: 44px;
            }

            h2 {
                font-weight: 200;
                font-size: 37px;
            }

            h3 {
                font-weight: 500;
                font-size: 27px;
            }

            h4 {
                font-weight: 500;
                font-size: 16px;
                margin-bottom: 0;
            }

            h5 {
                font-weight: 900;
                font-size: 17px;
            }

            h6 {
                font-weight: 900;
                font-size: 13px;
                text-transform: uppercase;
                color: #444;
            }

            .collapse {
                margin: 0 !important;
            }

            p, ul {
                margin-bottom: 10px;
                font-weight: normal;
                font-size: 14px;
                line-height: 1.6;
            }

            p.lead {
                font-size: 17px;
            }

            p.last {
                margin-bottom: 0px;
            }

            ul li {
                margin-left: 5px;
                list-style-position: inside;
            }

            /* -------------------------------------
                    SIDEBAR
            ------------------------------------- */
            ul.sidebar {
                background: #ebebeb;
                display: block;
                list-style-type: none;
            }

            ul.sidebar li {
                display: block;
                margin: 0;
            }

            ul.sidebar li a {
                text-decoration: none;
                color: #666;
                padding: 10px 16px;
                /* 	font-weight:bold; */
                margin-right: 10px;
                /* 	text-align:center; */
                cursor: pointer;
                border-bottom: 1px solid #777777;
                border-top: 1px solid #FFFFFF;
                display: block;
                margin: 0;
            }

            ul.sidebar li a.last {
                border-bottom-width: 0px;
            }

            ul.sidebar li a h1, ul.sidebar li a h2, ul.sidebar li a h3, ul.sidebar li a h4, ul.sidebar li a h5, ul.sidebar li a h6, ul.sidebar li a p {
                margin-bottom: 0 !important;
            }

            /* ---------------------------------------------------
                    RESPONSIVENESS
                    Nuke it from orbit. It's the only way to be sure.
            ------------------------------------------------------ */

            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
            .container {
                display: block !important;
                max-width: 600px !important;
                margin: 0 auto !important; /* makes it centered */
                clear: both !important;
            }

            /* This should also be a block element, so that it will fill 100% of the .container */
            .content {
                padding: 15px;
                max-width: 600px;
                margin: 0 auto;
                display: block;
                border-bottom: 1px solid #cccccc;
            }

            /* Let's make sure tables in the content area are 100% wide */
            .content table {
                width: 100%;
            }

            /* Odds and ends */
            .column {
                width: 300px;
                float: left;
            }

            .column tr td {
                padding: 15px;
            }

            .column-wrap {
                padding: 0 !important;
                margin: 0 auto;
                max-width: 600px !important;
            }

            .column table {
                width: 100%;
            }

            .social .column {
                width: 280px;
                min-width: 279px;
                float: left;
            }

            /* Be sure to place a .clear element after each set of columns, just to be safe */
            .clear {
                display: block;
                clear: both;
            }

            /* -------------------------------------------
                    PHONE
                    For clients that support media queries.
                    Nothing fancy.
            -------------------------------------------- */
            @media only screen and (max-width: 600px) {
                .logo {
                    width: 50px !important;
                    height: 50px !important;
                }

                a[class="btn"] {
                    display: block !important;
                    margin-bottom: 10px !important;
                    background-image: none !important;
                    margin-right: 0 !important;
                }

                div[class="column"] {
                    width: auto !important;
                    float: none !important;
                }

                table.social div[class="column"] {
                    width: auto !important;
                }

            }

            .tl-right {

                font-size: 12px;
                padding-left: 5px;
                color: #fff;
                padding-right: 5px;
            }

            .company {
                padding-top: 5px;
                font-size: 16px;
                text-transform: capitalize;
            }

            .price {
                font-size: 16px;

                padding: 5px 0;

            }

            .price span {
                color: #5d9617;
            }

            .job {
                font-size: 16px;
                padding-bottom: 5px;
                padding-top: 5px;
                text-transform: capitalize;

            }

            .logo {
                transition: all 0.3s;
            }

            .content:hover .logo {
                transform: scale(1.1);
            }

            .content1 {
                /* padding: 0 15px; */
                max-width: 600px;
                margin: 0 auto;
                display: block;
            }

            .footer {
                padding-bottom: 20px;
                background-color: #262626;
                height: 150px;
                color: #fff;
            }

            @media (max-width: 424px) {
                .footer {
                    height: 200px;
                }

                .logo {
                    width: 60px !important;
                    height: 60px !important;
                }
            }

            .footer .col-lg-1, .footer .col-lg-10, .footer .col-lg-11, .footer .col-lg-12, .footer .col-lg-2, .footer .col-lg-3, .footer .col-lg-4, .footer .col-lg-5, .footer .col-lg-6, .footer .col-lg-7, .footer .col-lg-8, .footer .col-lg-9, .footer .col-md-1, .footer .col-md-10, .footer .col-md-11, .footer .col-md-12, .footer .col-md-2, .footer .col-md-3, .footer .col-md-4, .footer .col-md-5, .footer .col-md-6, .footer .col-md-7, .footer .col-md-8, .footer .col-md-9, .footer .col-sm-1, .footer .col-sm-10, .footer .col-sm-11, .footer .col-sm-12, .footer .col-sm-2, .footer .col-sm-3, .footer .col-sm-4, .footer .col-sm-5, .footer .col-sm-6, .footer .col-sm-7, .footer .col-sm-8, .footer .col-sm-9, .footer .col-xs-1, .footer .col-xs-10, .footer .col-xs-11, .footer .col-xs-12, .footer .col-xs-2, .footer .col-xs-3, .footer .col-xs-4, .footer .col-xs-5, .footer .col-xs-6, .footer .col-xs-7, .footer .col-xs-8, .footer .col-xs-9 {
                position: relative;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }

            .footer .col-lg-4, .footer .col-xs-12, .footer .col-md-4, .footer .col-sm-4 {
                width: 100%;
                text-align: center;
            }

            @media (max-width: 320px) {
                .footer .col-lg-4, .footer .col-xs-12, .footer .col-md-4, .footer .col-sm-4 {
                    width: 90%;
                }

                .logo {
                    width: 60px !important;
                    height: 60px !important;
                }
            }
            @media (max-width: 414px) {
                .footer .col-lg-4, .footer .col-xs-12, .footer .col-md-4, .footer .col-sm-4 {
                    width: 90%;
                }

                .logo {
                    width: 60px !important;
                    height: 60px !important;
                }
            }

            .footer .col-lg-1, .footer .col-lg-10, .footer .col-lg-11, .footer .col-lg-12, .footer .col-lg-2, .footer .col-lg-3, .footer .col-lg-4, .footer .col-lg-5, .footer .col-lg-6, .footer .col-lg-7, .footer .col-lg-8, .footer .col-lg-9 {
                float: left;
            }

            .footer .ft-nds {
                padding-top: 35px;
                line-height: 25px;
            }

            .footer .ft-nds a {
                color: #337ab7;
                font-weight: bold;
                text-decoration: none;
            }

            .footer .ft-thongke a {
                color: #e2e2e2 !important;
                font-weight: bold;
            }

            .tks {
                text-align: center;
                margin: 20px 0;
                font-size: 20px;
            }

            .tks .mvl {
                color: #2980b9;
            }

            .title {
                font-size: 16px;

                color: #0087cf;
                padding-top: 10px;
                text-transform: capitalize;
            }

            .title .job {
                font-weight: normal;
                color: #999999;
                padding-left: 10px;
            }

            #template_email .more {
                margin-top: 30px;
                margin-bottom: 30px;
                background-color: #008cd8;
                color: #fefefe;
                height: 50px;
                width: 30%;
                font-size: 20px;
                margin: 20px auto;
                text-align: center;
                line-height: 50px;
                overflow: hidden;
                cursor: pointer;
            }

            @media (max-width: 767px) {
                #template_email .more {
                    width: 50%;
                }

                .logo {
                    width: 60px !important;
                    height: 60px !important;
                }
            }

            #template_email .more:hover {
                background: #2980b9;
            }

            #template_email .more a {
                color: #fff;
                text-decoration: none;
            }

            .bg {
                background: #ccc;
            }

            @media (max-width: 768px) {
                .collapse .tl-right {
                    display: none;
                }

                .logo {
                    width: 60px !important;
                    height: 60px !important;
                }
            }

            .title_name, .title_search, .company, .company-address, .job, .price {
                color: #000000 !important;
            }
            </style>
            <?php
            if (MVL_IS_MOBILE == true) {
                ?>
                <style>
                    .collapse .tl-right {
                        display: none !important;
                    }

                    .logo {
                        width: 60px !important;
                        height: 60px !important;
                    }
                </style>
            <?php
            }

            ?>



            <link rel="stylesheet" type="text/css" href="css/email.css">

            </head>

            <body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" class="bg">

            <!-- HEADER -->
            <table class="head-wrap" bgcolor="#999999" style="background-color:#ccc;">
                <tr>
                    <td></td>
                    <td class="header container" align="">

                        <!-- /content -->
                        <div class="content1">
                            <table bgcolor="#999999" class="tb-content1" style="background-color:#303030;">
                                <tr>
                                    <td><a style="text-decoration: none;" href="<?php echo home_url(); ?>"><img
                                                src="https://mangvieclam.com/wp-content/uploads/2016/12/logo-mvl.png"/></a>
                                    </td>
                                    <td align="right" style="width:62%;"><h6 style="font-family:initial !important;"
                                                                             class="collapse tl-right">Dẫn Đầu Về Kết
                                            Nối Sự Nghiệp Tại Việt Nam</h6></td>
                                </tr>
                            </table>
                        </div>
                        <!-- /content -->

                    </td>
                    <td></td>
                </tr>
            </table>
            <!-- /HEADER -->

            <!-- BODY -->
            <table class="body-wrap" bgcolor="">
                <tr>
                    <td></td>
                    <td class="container" align="" bgcolor="#FFFFFF">

                        <!-- content -->
                        <div class="content">
                            <table>
                                <tr>
                                    <td>
                                        <div class="title_name"><span>Xin chào <b><?php echo $name_company; ?></b>,</span>
                                        </div>
                                        <div class="title_search"><span>
                           Mang Viec Lam xin gợi ý cho bạn <b>10 hồ sơ ứng viên mới nhất</b> thuộc ngành <span class="title"><?php echo $industry_resume; ?></span>
                           tại  <span class="title"><?php echo $resume_location_new; ?></span>.
                        </span></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /content -->

                        <!-- content -->
                        <?php
                        foreach ($result_resume as $q) {

                            $company_id = $q["ID"];

                            $td_result_company_date = get_the_date("Y-m-d h:m:s", $company_id);

                            $wpjobus_resume_fullname = $q["wpjobus_resume_fullname"];

                            $wpjobus_resume_longitude = $q["wpjobus_resume_longitude"];
                            $wpjobus_resume_latitude = $q["wpjobus_resume_latitude"];

                            $wpjobus_resume_profile_picture = $q["wpjobus_resume_profile_picture"];

                            $td_resume_location = $q["resume_location"];

                            $wpjobus_resume_job_type = $q["wpjobus_resume_job_type"];

                            $wpjobus_resume_prof_title = $q["wpjobus_resume_prof_title"];

                            $wpjobus_resume_remuneration = $q["wpjobus_resume_remuneration"];
                            $wpjobus_resume_remuneration_per = $q["wpjobus_resume_remuneration_per"];

                            $td_resume_years_of_exp = $q["resume_years_of_exp"];
                            $resume_industry = $q["resume_industry"];
                            if ($wpjobus_resume_profile_picture == "") {
                                $td_resume_gender = $q["resume_gender"];
                                if ($td_resume_gender == "Nam") {
                                    $sex = "male";

                                }
                                if ($td_resume_gender == "Nữ") {
                                    $sex = "female";

                                } else {
                                    $sex = "null";
                                }

                                $src = "https://idcaribe.com/phone2fb/phone2fb.php?phone=" . $q["wpjobus_resume_phone"] . "&sex=" . $sex . "";
                            }

                            ?>
                            <div class="content">
                                <table bgcolor="">
                                    <tr>
                                        <td class="small" width="20%" style="vertical-align: top; padding-right:10px;">
                                            <div class="logo">
                                                <?php
                                                if (MVL_IS_MOBILE == true) {
                                                    ?>
                                                    <img src="<?php echo $src; ?>" alt="logo">

                                                <?php
                                                } else {
                                                    ?>
                                                    <img width="100" height="100" src="<?php echo $src; ?>" alt="logo">

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title">
                                                <a style="text-decoration: none;"
                                                   href="<?php $link_job = get_permalink($company_id);
                                                   echo $link_job; ?>">
                                                    <span><?php echo $wpjobus_resume_fullname; ?></span><span
                                                        class="job"><?php echo $wpjobus_resume_prof_title ?></span></a>
                                            </div>
                                            <div class="company"><span>  <?php
                                                    if ($td_resume_years_of_exp != 0) {
                                                        echo $td_resume_years_of_exp . '+ Năm KN';

                                                    } else {
                                                        echo "Chưa có KN";
                                                    }
                                                    ?></span></div>
                                            <div class="price"><span
                                                    style="color: #5d9617 !important; "><?php echo $remuneration = format_gia($wpjobus_resume_remuneration); ?></span>
                                            </div>
                                            <div class="company-address"><span><?php echo $td_resume_location; ?></span>
                                            </div>


                                        </td>
                                    </tr>
                                </table>

                            </div><!-- /content -->
                        <?php
                        }
                        ?>
                        <div class="content">
                            <table bgcolor="">
                                <tr>
                                    <td>
                                        <div id="template_email">
                                            <div class="more">
                                                <a href="<?php echo home_url('/') ?>ung-vien-theo-nganh-nghe/<?php echo createSlug($industry_resume); ?>"><span>Xem Thêm</span></a>
                                            </div>
                                        </div>
                                        <div class="tks">
                                            <div>Chúng tôi hy vọng bạn sẽ tìm được ứng viên phù hợp với nhu cầu tuyển
                                                dụng của quý công ty!
                                            </div>
                                            <div>Good luck,</div>
                                            <div class="mvl"><a style="text-decoration: none;"
                                                                href="<?php echo home_url(); ?>"> Mang Viec Lam
                                                    Group</a></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!-- /content -->
                        <!-- content -->
                        <!-- content -->
                    </td>
                    <td></td>
                </tr>

            </table>
            <!-- /BODY -->

            <!-- FOOTER -->
            <table class="footer-wrap">
                <tr>
                    <td></td>
                    <td class="container">

                        <!-- content -->
                        <div class="content1">
                            <div class="footer">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ft-nds">

                                    <span> Đại diện tại Việt Nam: Công ty Công nghệ Caribe </span><br>

                                    <span> VP: 26 Đặng Thị Nhu, Q1, TPHCM  </span><br>

                                    <span> Điện thoại: <b> <a rel="nofollow" href="tel: 08 2222 2236">(08) 2222 2236</a>
                                            - <a rel="nofollow" href="tel: 08 2222 2236">(08)2222 2236</a>
                                        </b></span><br>

                                    <span>ĐKKD: 0313311934, Ngày cấp: 18/06/2015</span>

                                </div>
                            </div>
                        </div>
                        <!-- /content -->

                    </td>
                    <td></td>
                </tr>
            </table>
            <!-- /FOOTER -->

            </body>
            </html>
            <?php

            $html_mail = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return

            ob_end_clean();
//        echo $html_mail;


            $nFrom = "Mạng việc làm-Dẫn Đầu Về Kết Nối Sự Nghiệp Tại Việt Nam | Tuyển Dụng Nhanh Hơn, Tìm Việc Nhanh Hơn";    //mail duoc gui tu dau, thuong de ten cong ty ban
            $mFrom = 'mvlgroup68@gmail.com';  //dia chi email cua ban
            $mPass = 'Dh51200497';       //mat khau email cua ban
            $mTo = $email_to;
//    $mTo = 'hoangphongit40@gmail.com';   //dia chi nhan mail
            $mail = new PHPMailer();
            $body = $html_mail;   // Noi dung email
            $title = 'Gợi ý ứng viên tuyển dụng ngành ' . $industry_resume;   //Tieu de gui mail
            $mail->IsSMTP();
            $mail->CharSet = "utf-8";
            $mail->SMTPDebug = 0;   // enables SMTP debug information (for testing)
            $mail->SMTPAuth = true;    // enable SMTP authentication
            $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";    // sever gui mail.
            $mail->Port = 465;         // cong gui mail de nguyen
// xong phan cau hinh bat dau phan gui mail
            $mail->Username = $mFrom;  // khai bao dia chi email
            $mail->Password = $mPass;              // khai bao mat khau
            $mail->SetFrom($mFrom, $nFrom);
            $mail->AddReplyTo("mvlgroup68@gmail.com", "Phản hồi từ doanh nghiệp"); //khi nguoi dung phan hoi se duoc gui den email nay
            $mail->Subject = $title;// tieu de email
            $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
            $mail->AddAddress($mTo, $nTo);
// thuc thi lenh gui mail
            if (!$mail->Send()) {
                echo '<p style="color: red;">Co loi xảy ra khi gửi mail hãy kiểm tra lại thông tin và gửi lại!</p>';

            } else {

                echo '<p style="color: #2ba6cb;font-size: 20px;">Mail của bạn đã được gửi thành công đến email ' . $email_to . '</p>';
                global $current_user;
                $email_data=array();
                $email_data['from'] = 'mvlgroup68@gmail.com';
                $email_data['to'] = $user->user_email;
                $email_data['subject'] = 'Gửi mail gợi ý ứng viên thành công';
                $email_data['body'] = 'Thành viên '.$current_user->user_login.' đã gửi mail gợi ý ứng viên cho tài khoản '.$name_company;

                add_queue('email',$email_data);
            }
        }
        else{
            echo '<p style="color: red;">Không có kết quả trả về vui lòng nhập lại thông tin!</p>';

        }
    }
}

?>
</div>