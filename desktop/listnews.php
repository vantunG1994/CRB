<div class="listnews">
    <div class="listnews-sub">
        <span class="title">
            <h3>Cẩm Nang Tuyển Dụng</h3>
        </span>
        <ul>
            <?php
            global $post;
            //                $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 20 );
            $args = array( 'posts_per_page' => 5,'order' => 'DESC', 'offset'=> 0,'orderby' => 'rand', 'category' => 20);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) : setup_postdata($post); ?>
            <li class="item">
                <div class="img-listnews">
                    <img class="right-widget-image" src="<?php echo catch_that_image();?>">
                </div>
                <div class="content-listnews">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="listnews-sub">
        <span class="title">
            <h3>Cẩm Nang Việc Làm</h3>
        </span>
        <ul>
            <?php
            global $post;
            //                $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 20 );
            $args = array( 'posts_per_page' => 5,'order' => 'DESC', 'offset'=> 0,'orderby' => 'rand','category' => 19);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) : setup_postdata($post); ?>
            <li class="item">
                <div class="img-listnews">
                    <img class="right-widget-image" src="<?php echo catch_that_image();?>">
                </div>
                <div class="content-listnews">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>