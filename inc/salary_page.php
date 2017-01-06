<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' id='main-style-css'  href='<?php echo home_url("/"); ?>wp-content/themes/mangvieclam789/css/main_mvl_v1.css' type='text/css' media='all' />
<?php
global $wpdb,$current_user;


if($_GET["group_industry"]=="")
        {

?>
            <div class="chose_group">
                <h1>LỰA CHỌN CHUYÊN NGÀNH</h1>
                <?php
//                echo $_SERVER['REQUEST_URI'];

                $group_managers = $wpdb->get_results("SELECT * FROM group_manager");
                foreach($group_managers as $name_group)
                {

                    ?>
                    <a class="button-ag-full" href="<?php echo home_url().$_SERVER['REQUEST_URI']."&group_industry=".$name_group->ID_group?>"><?php echo $name_group->title_group; ?></a>
                <?php
                }
                ?>
            </div>
<?php
        }
if( $_GET["group_industry"]!="")
{
    $group=$_GET["group_industry"];
    $group_manager = $wpdb->get_results("SELECT * FROM group_manager WHERE ID_group='$group' ");
    foreach($group_manager as $name_groups)
    {
        $name_group=$name_groups->title_group;
    }
    ?>
    <div class="result_group_industry">
    <h1>Chuyên ngành <?php echo $name_group; ?></h1>
    <p style="color: #ff0000;">Lưu ý : Tổng các trọng số của chuyên ngành phải có giá trị là 100%</p>

    <form method="post">


        <table class="form-table" style="width: 50% !important;">
                    <?php
    $skills = $wpdb->get_results("SELECT * FROM group_skill_manager WHERE ID_group='$group' ");
    foreach ($skills as $name_skill) {
        $id_skill = $name_skill->ID_skill;
        $weight = $name_skill->weight;
        $skill_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM skill WHERE ID_skill = '$id_skill'"));
        $name = $skill_name->name_skill;
        ?>
        <tr>
            <td> <b><?php echo $name; ?></b></td>
            <td>Trọng số(%) <input type="text" value="<?php echo $weight; ?>" name="weight-<?php echo $id_skill ;?>"></td>
            <td><a onclick='return confirm("Bạn có chắc muốn xoá kỹ năng <?php echo $name; ?> của chuyên ngành  <?php echo $name_group; ?> ?")' href="<?php echo home_url().$_SERVER['REQUEST_URI']."&dell_skill=".$id_skill;?>">Xoá</a></td>

        </tr>
    <?php
    }
        ?></table>
        <input type="submit" name="update_salary" value="Lưu thay đổi">
    </form>
    </div>



                   <?php

}
if(isset($_POST["update_salary"]) && isset($_GET["group_industry"])) {

    $id_group = $_GET["group_industry"];
    $skills = $wpdb->get_results("SELECT * FROM group_skill_manager WHERE ID_group='$id_group' ");
    $group_manager = $wpdb->get_row("SELECT * FROM group_manager WHERE ID_group='$id_group' ");
    $name_title = $group_manager->title_group;
    foreach ($skills as $name_skill) {
        $id_skill = $name_skill->ID_skill;
        $weight = $name_skill->weight;
        $skill_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM skill WHERE ID_skill = '$id_skill'"));
        $name = $skill_name->name_skill;
        $result_skill = $_POST["skill-".$id_skill];
        $result_weight = $_POST["weight-".$id_skill];
        $table_skill='group_skill_manager';
        $wpdb->update( $table_skill,
            array("weight" => $result_weight),
            array('ID_skill'=>$id_skill,
                  'ID_group'=>$id_group
            )
        );



    }
    ?>
    <script>location.href='<?php echo home_url().$_SERVER['REQUEST_URI'];?>';</script>
<?php

}

if(isset($_GET["dell_skill"]) && isset($_GET["group_industry"])) {
    $wpdb->delete( 'group_skill_manager', array('ID_skill'=>$_GET["dell_skill"], 'ID_group'=>$_GET["group_industry"]) );
    ?>
    <script>
        window.history.back();
    </script>
<?php


}



?>
<?php

//global $redux_demo;
//for ($i = 0; $i <count($redux_demo['resume-industries']); $i++) {
//    $name = createSlug($redux_demo['resume-industries'][$i]);
//    ?>
<!--    <p id="menu-item-sub" class=""-->
<!--        title="--><?php //echo $redux_demo['resume-industries'][$i]; ?><!--">-->
<!--           <span style="font-weight: bold;">--><?php //echo $redux_demo['resume-industries'][$i];  ?><!--  =>  </span>-->
<!--        --><?php //echo home_url('/'); ?><!--nganh-nghe-tuyen-dung/--><?php //echo $name; ?>
<!---->
<!--    </p>-->
<?php
//}
//
//for ($i = 0; $i <count($redux_demo['resume-industries']); $i++) {
//    $name = createSlug($redux_demo['resume-industries'][$i]);
//    ?>
<!--    <p id="menu-item-sub" class=""-->
<!--       title="--><?php //echo $redux_demo['resume-industries'][$i]; ?><!--">-->
<!--        <span style="font-weight: bold;">--><?php //echo $redux_demo['resume-industries'][$i];  ?><!--  =>  </span>-->
<!--        --><?php //echo home_url('/'); ?><!--ung-vien-theo-nganh-nghe/--><?php //echo $name; ?>
<!---->
<!--    </p>-->
<?php
//}
?>