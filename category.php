<?php global $theme; get_header(); ?>
<div class="main-content">
    <div class="list-job">
        <div class="container bg-fff">
            <div class="row">
                <div class=" col-md-8 col-sm-12 col-xs-12">
                    <h1 class="content"><b><?php printf( __( '<span> %s</span>', 'themater' ), single_cat_title( '', false ) ); ?></b></h1>
                    <?php
                    $is_post_wrap = 0;
                    if (have_posts()) : while (have_posts()) : the_post();
                    
                    /**
                    * The default post formatting from the post.php template file will be used.
                    * If you want to customize the post formatting for your category pages:
                    *
                    *   - Create a new file: post-category.php
                    *   - Copy/Paste the content of post.php to post-category.php
                    *   - Edit and customize the post-category.php file for your needs.
                    *
                    * Learn more about the get_template_part() function: http://codex.wordpress.org/Function_Reference/get_template_part
                    */
                    
                    $is_post_wrap++;
                    if($is_post_wrap == '1') {
                    ?>
                    <div class="post-wrap clearfix"><?php
                        }
                        get_template_part('post', 'category');
                        
                        if($is_post_wrap == '2') {
                        $is_post_wrap = 0;
                    ?></div><?php
                    }
                    endwhile;
                    
                    else :
                    get_template_part('post', 'noresults');
                    endif;
                    
                    if($is_post_wrap == '1') {
                    ?>
                    
                </div><?php
                }
                
                get_template_part('navigation');
                ?>
                
                <?php $theme->hook('content_after'); ?>
                
                </div> <!-- end col-md-8 -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="input-search">
                        <form action="" class="form-search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm Kiếm ">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="category-menu">
                        <ul class="menu-title">
                            <li class="title">Chuyên mục</li>
                            <?php
                            $category= get_queried_object();
                            $cat_single= $category->term_id;

                            $parent_cat_arg = array('hide_empty' => false, 'parent' =>$cat_single );
                            $parent_cat = get_terms('category',$parent_cat_arg);//category name
                            foreach ($parent_cat as $catVal) {

                                ?>
                                <li style="padding-left: 10px"><a href="<?php echo esc_url( get_term_link( $catVal ) );?>"><?php echo $catVal->name; ?></a></li>

                                <?php

                                $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id ,'count'=>'>0');
                                $child_cat = get_terms( 'category', $child_arg );

                                foreach( $child_cat as $child_term ) {


                                    echo '<li><a href="'. esc_url( get_term_link( $child_term ) ) .'">'.$child_term->name . '</a></li>'; //Child Category
                                    $child_arg_1 = array( 'hide_empty' => false, 'parent' => $child_term->term_id );
                                    $child_cat_1 = get_terms( 'category', $child_arg_1 );
                                    if($child_cat_1 !="")
                                    {
                                        foreach( $child_cat_1 as $child_term_1 ) {
                                            echo '<li><a href="'. esc_url( get_term_link( $child_term_1 ) ) .'">' . $child_term_1->name . '</a></li>'; //Child Category
                                        }


                                    }
                                }

                            }
                            ?>

                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include('desktop/template-scroll-top.php');?>

<?php get_footer(); ?>