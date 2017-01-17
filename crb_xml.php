<?php
/**
 * Template name: CRB XML FEED
 */
    global $wp2es;
    $number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; //10 is the default
    $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
    $cond=array('post_status'=>'publish','post_type'=>'job');
    $order_count=array('up_at'=>'desc','post_modified'=>'desc');
    $limit_count=array('size'=>18,'page'=>1);
    $result_job = $wp2es->and_simple_search($cond,$order_count,$limit_count);
function remove_symbols ( $string )
{
    $basic = 'a-zA-Z0-9';
    $utf8 = 'áàảãạăắặằẳẵâấầẩẫậđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵÁÀẢÃẠĂẮẶẰẲẴÂẤẦẨẪẬĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ';
    $special = '()?!_"\-\'';
    $string = preg_replace( '/^[^'.$basic . $utf8 .'"space"]+/iu', ' ', $string );
    $string = preg_replace( '/[^'.$basic . $utf8 . $special . '"space"]+/iu', ' ', $string );
    return $string;
}
function content($limit,$content) {
    $content = explode(' ', $content, $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
    return $content;
}
echo remove_symbols ( $string );

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>

<mitula>
    <?php
    foreach ($result_job as $list){
        $job_id=$list['ID'];
        $companylink = get_permalink($job_id);
        $wpjobus_job_fullname =$list["wpjobus_job_fullname"];
        $job_about_me =$list["job-about-me"];
        $content= remove_symbols($job_about_me);
        $content=content(300,$content);
        $content =strip_tags($content,'<img><span><strong><b><em><table><tr><td><tbody><ul><li><ol><i><u>');



        $td_job_location = $list['job_location'];
        $dictrict = $list['job_dictrict'];
        $wpjobus_job_remuneration =$list["wpjobus_job_remuneration"];
        $td_job_type =$list["job_type"]?:"Full time";
        $job_company=$list['job_company'];
        $wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
        $td_job_industry  =$list["job_industry"];
        $td_job_expired = $list['wpjobus_job_expired'];
        $td_job_education =$list["job_education"];
        $wpjobus_post_title = $list['wpjobus_post_title'];
        $date = date('d/m/Y ', strtotime($list['post_date']));
        $time = date('H:i', strtotime($list['post_date']));
        $td_job_expired = date('d/m/Y ', strtotime($td_job_expired));
        $wpjobus_job_languages = get_post_meta($job_id, 'wpjobus_job_languages',true);
        $wpjobus_job_languages=$wpjobus_job_languages[0][0]?:"Tiếng Anh";

        ?>
    <ad>
        <id><![CDATA[<?php echo $list['ID']; ?>]]></id>
        <url><![CDATA[<?php echo $companylink; ?>]]></url>
        <title><![CDATA[<?php echo $wpjobus_job_fullname; ?>]]></title>
        <content><![CDATA[<?php echo $content; ?>]]></content>
        <city><![CDATA[<?php echo $td_job_location; ?>]]></city>
        <city_area><![CDATA[<?php echo $dictrict; ?>]]></city_area>
            <region><![CDATA[[<?php echo $td_job_location; ?>]]></region>
            <salary><![CDATA[<?php echo number_format($wpjobus_job_remuneration ,0,0,',')?:0;?>]]></salary>
            <salary_numeric><![CDATA[<?php echo number_format($wpjobus_job_remuneration ,0,0,',')?:0; ?>]]></salary_numeric>
            <working_hours><![CDATA[<?php echo $td_job_type; ?>]]></working_hours>
            <company><![CDATA[<?php echo $wpjobus_company_fullname; ?>]]></company>
            <experience><![CDATA[at least one years]]></experience>
            <requirements><![CDATA[<?php echo $wpjobus_job_languages;?>]]></requirements>
            <contract><![CDATA[<?php echo !empty($wpjobus_post_title)? $wpjobus_post_title :''; ?>]]></contract>
            <category><![CDATA[<?php echo $td_job_industry; ?>]]></category>
            <date><![CDATA[<?php echo $date; ?>]]></date>
            <time><![CDATA[<?php echo $time; ?>]]></time>
            <expiration_date><![CDATA[<?php echo !empty($td_job_expired)? $td_job_expired :''; ?>]]></expiration_date>
                <studies><![CDATA[<?php echo $td_job_education; ?>]]></studies>
    </ad>
    <?php
    }
    ?>
</mitula>



