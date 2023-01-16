<?php
/*
* https://t.me/pudin_ira/
* https://www.pdn.my.id/
* https://instagram.com/pudin.ira/
* https://youtube.com/c/pudintv/
*
* Simpan ini di halaman single.php
* get_template_part( 'related-post' );
*/

$post_id = get_the_ID();
$category_object = get_the_category($post_id);
$category_name = $category_object[0]->name;

$args_related_post = array(
    'post_type' 		=> 'post',
    'posts_per_page' 	=> 4,
    'order' 			=> 'DESC',
    'orderby' 			=> 'ID',
    'post__not_in' 		=> array( $post->ID ),
    'category_name' 	=> $category_name,
);

$related_post = new WP_Query( $args_related_post );

?>
<!-- START RELATED POST :: pdn.my.id -->
<div class="related-post">
    <h2 class="related-post-title">Postingan Terkait</h2>
    <ul>
        <?php
        if ( $related_post->have_posts() ) :
            while ( $related_post->have_posts() ) : $related_post->the_post();
        ?>
        <li>
            <div class="box-related">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php
                    if ( has_post_thumbnail() ) :
                        $post_thumbnail = get_the_post_thumbnail_url(get_the_ID());
                        echo '<img src="'.esc_url($post_thumbnail).'">';
                    else :

                    endif;
                    ?>
                </a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
<!-- END RELATED POST :: pdn.my.id -->