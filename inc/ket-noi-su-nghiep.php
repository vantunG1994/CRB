<div style="margin-top: 32%;" class="one_third sidebar-widgets">

    <div class="widget"><h3 class="block-title"><a href="<?php echo home_url(); ?>/c/ket-noi-su-nghiep/cam-nang-tuyen-dung/">Cẩm Nang Tuyển Dụng</a></h3>
        <ul class="widget_cat_1">
            <?php

            global $post;

            $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 20 );
            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); ?>

                <li>
                    <ul class="widget_cat">
                        <li><?php echo '<img class="right-widget-image" src="' . catch_that_image() . '" />';?></li>                                <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    </ul>




                </li>
            <?php endforeach; ?>

        </ul>

    </div>
    <div class="widget"><h3 class="block-title"><a href="<?php echo home_url(); ?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/">Cẩm Nang Việc Làm</a></h3>
        <ul class="widget_cat_1">
            <?php

            global $post;

            $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 19 );
            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); ?>

                <li>
                    <ul class="widget_cat">
                        <li><?php echo '<img style="width: 50px; height: 50px;" src="' . catch_that_image() . '" />';?></li>                                <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    </ul>




                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>