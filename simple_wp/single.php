<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Simple_WP
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="single-container">
			<div class="single-content">

				<div class="main-single-breadcrumbs">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> 
				</div><!-- .main-single-breadcrumbs -->

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/single-content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'simple-wp' ) . '</span> <span class="nav-title"> %title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'simple-wp' )  . '</span> <span class="nav-title">%title</span>',
				)
			);


			get_template_part( 'template-parts/related-post' );


			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

			</div><!--.single-content -->
		</div><!-- .single-container -->
	</main><!-- #main -->

<?php

get_footer();

