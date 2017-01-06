<section id="sidebar">
	<div class="row">
		<div class="sb-title"><h3><i class="fa fa-star"></i>Tuyển Dụng hot</h3></div>
	</div>
	<div class="carousel">
		<div class=" carousel-items">
            <?php
            $args = array(
                'posts_per_page'   =>10,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'meta_key'         => 'vip_star',
                'meta_value'         => 5,
                'post_type'        => 'job',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $posts_array = get_posts( $args );
            $wpjobus_jobs = $posts_array;
            foreach($wpjobus_jobs as $job) {

                $curren_job++;

                $job_id = $job->ID;

                if($curren_job <= 10) {


                    $wpjobus_job_cover_image =get_post_meta($job_id, 'wpjobus_job_cover_image',true);
                    $wpjobus_job_fullname =get_post_meta($job_id, 'wpjobus_job_fullname',true);
                    $wpjobus_job_type =get_post_meta($job_id, 'wpjobus_job_type',true);
                    $wpjobus_job_remuneration_per =get_post_meta($job_id, 'wpjobus_job_remuneration_per',true);
                    $wpjobus_job_remuneration = get_post_meta($job_id, 'wpjobus_job_remuneration',true);
                    $td_job_company =get_post_meta($job_id, 'job_company',true);
                    $wpjobus_company_fullname = get_post_meta($td_job_company, 'wpjobus_company_fullname',true);
                    $td_job_location =get_post_meta($job_id, 'job_location',true);
                    if($wpjobus_job_cover_image=="") {
                        $wpjobus_job_cover_image="/wp-content/themes/mangvieclam789/img/default_job.jpg";


                    }



                    ?>

                    <?php $link_job = get_permalink($job_id); ?>
                    <div class=""><a href="<?php  echo $link_job; ?>">
                            <img class="img-responsive"
                                 src="<?php echo $wpjobus_job_cover_image; ?>"
                                 alt="cannotload" data-type="image">
                        </a>
                        <div class="box-item-job">
                            <div class="box-left">
                                <span>Hạn nộp <?php echo get_post_meta($job_id, 'wpjobus_job_expired',true); ?></span>
                            </div>
                            <div class="box-right">
                                <span><?php echo format_gia($wpjobus_job_remuneration);?></span>
                            </div>
                        </div>
                        <div class="box-title">
                            <div class="title"><span>
                                    <a href="<?php  echo $link_job; ?>">
                                        <?php echo $wpjobus_job_fullname; ?></a>
					    </span></div>
                            <div class="title-job">
                                <div class="title-company"><span class="name"><i class="fa fa-briefcase"></i><?php echo $wpjobus_company_fullname;?></span>
                                </div>
                                <div>
                                    <?php  $dictrict =get_post_meta($job_id, 'job_dictrict',true);
                                    if($dictrict !="")
                                    {
                                        $dictrict=$dictrict.' - ';
                                    }else{$dictrict='';}
                                    ?>
                                    <span class="map"><i class="fa fa-map-marker"></i><?php echo $dictrict.$td_job_location; ?><span class="view"><i
                                                    class="fa fa-eye" aria-hidden="true"></i>58</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }}
            ?>


        </div>
		<div class="carouse-prev" data-type="icon">
			<img src="<?php echo get_template_directory_uri();?>/desktop/asset/images/prev.png" alt="prev">
		</div>
		<div class="carouse-next" data-type="icon">
			<img src="<?php echo get_template_directory_uri();?>/desktop/asset/images/next.png" alt="next">
		</div>
	</div>
	
</section>