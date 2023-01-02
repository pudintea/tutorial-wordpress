<div class="about-author">
    <div class="about-author-image">
        <?php echo get_avatar(get_the_author_meta('ID'), 250); ?>
    </div>
    <div class="about-author-text">
        <h3><?php echo get_the_author_meta( 'display_name'); ?></h3>
        <?php echo wpautop(get_the_author_meta('description')); ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">View all posts by <?php the_author(); ?></a>
    </div>
</div>