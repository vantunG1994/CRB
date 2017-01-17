<div class="container" style="margin: 100px;">
	<form method="post">
		<button type="submit" name="import">Import Template Theme</button>
	</form>
</div>

<?php
$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
$parent_cat = get_terms('category',$parent_cat_arg);//category name
foreach ($parent_cat as $catVal) {

    echo '<h2><a href="'. esc_url( get_term_link( $catVal ) ) .'">'.$catVal->name.'</a></h2>'; //Parent Category

    $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id ,'count'=>'>0');
    $child_cat = get_terms( 'category', $child_arg );

    echo '<ul>';
    foreach( $child_cat as $child_term ) {


        echo '<li><a href="'. esc_url( get_term_link( $child_term ) ) .'">'.$child_term->name . '</a></li>'; //Child Category
        $child_arg_1 = array( 'hide_empty' => false, 'parent' => $child_term->term_id );
        $child_cat_1 = get_terms( 'category', $child_arg_1 );
        if($child_cat_1 !="")
        {
            echo '<ul>';
            foreach( $child_cat_1 as $child_term_1 ) {
                echo '<li><a href="'. esc_url( get_term_link( $child_term_1 ) ) .'">' . $child_term_1->name . '</a></li>'; //Child Category
            }
            echo '</ul>';


        }
    }
    echo '</ul>';

}