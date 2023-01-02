<?php

$post_id = get_the_ID();
$category_object = get_the_category($post_id);
$category_name = $category_object[0]->name;

$args_related_post = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'order' => 'DESC',
    'orderby' => 'ID',
    'post__not_in' => array( $post->ID ),
    'category_name' => $category_name,
);

$related_post = new WP_Query( $args_related_post );

?>
<div class="related-post">
    <h2 class="related-post-title">Postingan Terkait</h2>
    <ul>
        <?php
        $no = 0;
        if ( $related_post->have_posts() ) :
            while ( $related_post->have_posts() ) : $related_post->the_post();
            $no++;
        ?>
        <li>
            <div class="box-related">
                <h3><?=$no;?>. <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
        </li>
        <?php
            endwhile;
            wp_reset_query();
        else :

        endif;
        ?>
    </ul>
</div>