<?php
/**
 * Template name: Salary
 */
//if ( !is_user_logged_in() ) {
//    ?>
    <!--    <style>-->
    <!--        #popup-login{-->
    <!--            display: block !important;-->
    <!--        }-->
    <!--    </style>-->
    <!---->
    <!--    --><?php
//
////    $login = home_url('/')."login";
////    wp_redirect( $login ); exit;
//
//}
?>
<?php
global $post;
//if($post->ID==1100198) {
    ?>
    <!--    <script src=" --><?php //echo get_template_directory_uri();?><!--/js/jquery.min.js"></script>-->
    <!--    <script src=" --><?php //echo get_template_directory_uri();?><!--/js/jquery-ui.min.js"></script>-->   
    <?php

?>
<?php
get_header(); ?>

    <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
    <div class="main-content content_salary">

            <div class="container bg-fff">


                <div class="salary">

                    <div class="">
                        <?php
                        if(!isset($_GET["group"])) {
                            ?>
                            <div class="chose_group">
                           <div class="row">
                               <div class="sl-title text-center">
                                    <h3>CHỌN THẾ MẠNH</h3>
                                     <p>Hãy lựa chọn chuyên ngành của bạn để thực hiện để đánh giá mức lương phù hợp.</p>
                               </div>  
                            </div>
                            <div class="row">
                                <div class="sl-content">
                                 <?php
                                    global $wpdb, $current_user;

                                    $group_managers = $wpdb->get_results("SELECT * FROM group_manager");
                                    $arrayicon = array(
                                        '0' => 'fa fa-mobile',
                                        '1' => 'fa fa fa-apple',
                                        '2' => 'fa fa-connectdevelop',
                                        '3' => 'fa fa-cogs',
                                        '4' => 'fa fa fa-tasks'
                                    );
                                    $arrayclass = array(
                                        '0' => 'fa',
                                        '1' => 'fa1',
                                        '2' => 'fa2',
                                        '3' => 'fa3',
                                        '4' => 'fa4',
                                    );
                                    foreach ($group_managers as $key => $name_group) {
                                       
                                    ?>
                                    <div class="col-md-4 <?php if($key == 3) echo "col-md-offset-2" ?> col-sm-6 col-xs-12 ">
                                        <div class="sl-skill ">
                                            <a title="<?php echo $name_group->description; ?>" class=" <?php foreach ($arrayclass as $key_class => $list_lass) {
                                           if (($key_class) == $key) {
                                               echo $list_lass;
                                           }
                                       } ?>" id="<?php echo $key; ?>" href="<?php echo home_url() . "/du-tinh-luong/?group=" . $name_group->ID_group ?>"><i class="fa <?php foreach ($arrayicon as $key1 => $list) {
                                            if (($key1) == $key) {
                                                echo $list;
                                            }
                                        } ?>"></i><?php echo $name_group->title_group; ?></a>
                                        </div>
                                     </div>
                                       <?php } ?>
                                </div>
                            </div>       
                            </div>
                            <?php } ?>
                        <div class="result_group">
                            <?php
                            if(isset($_GET["group"]) && !isset($_POST["get_salary"]))
                            {
                                $id_group = $_GET["group"];
                                $group_manager = $wpdb->get_results("SELECT * FROM group_manager WHERE ID_group='$id_group' ");

                                ?><p style="display: none;"><?php  print_r($group_manager); ?></p>

                                <?php

                                foreach ($group_manager as $name) {
                                    $name_title = $name->title_group;
                                    $description=$name->description;

                                }
                                ?>
                                <!-- <ul class="note_salary">
                                    <li> 1 <i class="fa fa-star-o"></i> Chưa có SP hoàn chỉnh</li>
                                    <li> 2 <i class="fa fa-star-o"></i> Có SP hoàn chỉnh đơn giản</li>
                                    <li> 3 <i class="fa fa-star-o"></i> Có SP hoàn chỉnh cùng một team</li>
                                    <li> 4 <i class="fa fa-star-o"></i> Sử dụng thành thạo các lib, framework trong ít nhất 2 SP</li>
                                    <li> 5 <i class="fa fa-star-o"></i> Tối ưu, sửa, tạo ra lib, hoàn thành 3 SP trở lên</li>


                                </ul> -->

                                <h1 style="" class="resume-section-title text-center">KHAI BÁO KỸ NĂNG</h1>
                                <p><?php echo $description; ?></p>

                                <form method="post">

                                    <table>

                                        <script>
                                            $(".chose_group").hide();

                                        </script>
                                        <?php

                                        $id_group = $_GET["group"];
                                        $group_manager = $wpdb->get_results("SELECT * FROM group_manager WHERE ID_group='$id_group' ");
                                        foreach ($group_manager as $name) {
                                            $name_title = $name->title_group;
                                        }
                                        $skills = $wpdb->get_results("SELECT * FROM group_skill_manager WHERE ID_group='$id_group' ");
                                        foreach ($skills as $name_skill) {
                                            $id_skill = $name_skill->ID_skill;
                                            $weight = $name_skill->weight;
                                            $skill_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM skill WHERE ID_skill = '$id_skill'"));
                                            $name = $skill_name->name_skill;
                                            ?>

                                            <tr class="check_star">
                                                <td><p style="font-size: 14px !important;font-weight: bold;"><?php echo $name; ?></p></td>
                                                <td>

                                                    <div class="stars">
                                                        <?php
                                                        $arrayName = array(
                                                            '1' => 'Chưa có SP hoàn chỉnh',
                                                            '2' => 'Có SP hoàn chỉnh đơn giản',
                                                            '3' => 'Có SP hoàn chỉnh cùng một team',
                                                            '4' => 'Sử dụng thành thạo các lib, framework trong ít nhất 2 SP',
                                                            '5' => 'Tối ưu, sửa, tạo ra lib, hoàn thành 3 SP trở lên'
                                                        );

                                                        $a = 6;
                                                        for ($i = 1; $i <=5; $i++) {
                                                            $a = $a - 1;
                                                            if ($a == 0) {
                                                                $checked = "checked";
                                                            } else {
                                                                $checked = "";
                                                            }

                                                            ?>

                                                            <input value="<?php echo $a; ?>" <?php echo $checked; ?>
                                                                   class=" star star-<?php echo $a . "-" . $id_skill; ?>"
                                                                   id="star-<?php echo $a . "-" . $id_skill; ?>" type="radio"
                                                                   name="star-<?php echo $id_skill; ?>[]"/>

                                                            <label class=" star star-<?php echo $a . "-" . $id_skill;
                                                            ?>"
                                                                   for="star-<?php echo $a . "-" . $id_skill; ?>"
                                                                   data-toggle="tooltip"
                                                                   title="<?php  foreach ($arrayName as $key => $list) {
                                                                       if(($key) == $a) {
                                                                           echo $list;
                                                                       }
                                                                   }?>">  </label>

                                                        <?php }?>

                                                    </div>
                                                </td>

                                            </tr>

                                            <?php

                                        }

                                        ?>
                                    </table>
                                    <div class="text-center pd-bt20px">
                                    <input type="submit" class="btn btn-primary" name="get_salary" value="HOÀN TẤT KHAI BÁO">
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        if(isset($_POST["get_salary"]) && isset($_GET["group"]))
                        {
                            ?>
                            <script>$( ".result_group").hide();</script>
                        <?php
                        $id_group=$_GET["group"];
                        $skills=$wpdb->get_results("SELECT * FROM group_skill_manager WHERE ID_group='$id_group' ");
                        $group_manager = $wpdb->get_row("SELECT * FROM group_manager WHERE ID_group='$id_group' ");
                        $name_title = $group_manager->title_group;
                        foreach($skills as $name_skill) {
                            $id_skill = $name_skill->ID_skill;
                            $weight = $name_skill->weight;
                            $skill_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM skill WHERE ID_skill = '$id_skill'"));
                            $name = $skill_name->name_skill;
                            $result_star= $_POST["star-".$id_skill];
                            $level_skill=($result_star["0"] *2)/10;
                            $total_level_skill +=($level_skill*$weight);

                        }
                        $resume_skill=($total_level_skill /10);
                        if($resume_skill > 100)
                        {
                            $resume_skill=100;
                        }
                        $max_salary=50000000;
                        $salary=($max_salary * $resume_skill)/100;
                        if($resume_skill <=10)
                        {
                        ?>
                            <script>
                                jQuery(document).ready(function($) {
                                    swal({
                                        title: 'Khai báo kỹ năng',
                                        text: "Bạn chưa đánh giá đủ các kỹ năng cần thiết. Hãy thử lại để chúng tôi đánh giá chính xác hơn.",
                                        type: 'info',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Đồng ý',
                                        cancelButtonText: 'Bỏ qua',
                                        confirmButtonClass: 'btn btn-success',
                                        cancelButtonClass: 'btn btn-danger',
                                        buttonsStyling: false
                                    }).then(function () {
                                        location.href="<?php echo home_url();?>/du-tinh-luong/?group=<?php echo $id_group; ?>"

                                    }, function (dismiss) {
                                        if (dismiss === 'cancel') {
                                            location.href="<?php echo home_url();?>/du-tinh-luong/"

                                        }
                                    })
                                });
                            </script>
                        <?php
                        }
                        else{
                        ?>

                            <h1 class="resume-section-title">Chúc mừng bạn!</h1>
                            <h1  class="resume-section-title"> Kỹ năng thuộc chuyên môn <?php echo $name_title; ?> thuộc top <?php echo $resume_skill;?>% </h1>
                            <h1 class="resume-section-title">Mức lương bạn xứng đáng nhận được là : <?php  echo number_format($salary ,0,0,'.'); ?> VNĐ/tháng</h1>
                            <div class="text-center">
                                <a  class="button-ag-full btn btn-primary" href="<?php echo home_url('/')."du-tinh-luong"; ?>">Thử lại</a>
                            </div>
                            <?php


                        }

                        }
                        ?>

                    </div>

                </div>
            </div>
    </div>
<?php 
        include('desktop/template-scroll-top.php');
?>
<?php get_footer(); ?>
<?php

?>
<?php
if(DEVICE != 'mobile')
{

    ?>
    <script>
        $( ".check_star:odd" ).css( "float", "right" );
        $( ".check_star:even" ).css( "float", "left" );
    </script>
    <?php
}
else{
    ?>
    <style>
       
    </style>
    <?php
}



