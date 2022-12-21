<?php
/*


*/

class pdn_youtube_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// ID widget
			'pdn_youtube_widget',
			// nama widget
			__('PDN Youtube Widget', ' pdn_youtube_widgets'),
			// deskripsi widget
			array( 'description' => __( 'PDN Youtube Widgets', 'pdn_youtube_widgets' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		//if title is present
		if ( ! empty( $title ) )
		$pdn_youtube_widget_title = $args['before_title'] . $title . $args['after_title'];
		$pdn_youtube_args = array(
			'orderby' 			=> 'meta_value_num',
			'order' 			=> 'DESC',
            'post_type'      	=> 'pdn_youtube',
            //'category_name'  	=> esc_attr( $scholarship_section_cat_slug ),
            'posts_per_page'	=> 3
        );
        $pdn_youtube_query = new WP_Query( $pdn_youtube_args );
		echo $args['before_widget'];
		
		//output
		?>
			<div class="section-wrapper scholarship-widget-wrapper">
                <div class="mt-container">
					<div class="section-title-wrapper clearfix">
						<?=$pdn_youtube_widget_title;?>
					</div>
					<div class="team-wrapper mt-column-wrapper">
						<?php if ( $pdn_youtube_query->have_posts() ) {
							while ( $pdn_youtube_query->have_posts() ) {
								$pdn_youtube_query->the_post();
						?>
								<div class="single-post-wrapper mt-column-3">
									<iframe style="width: 100%; height: 200px; display: block;" src="https://www.youtube.com/embed/<?php echo get_post_meta($pdn_youtube_query->post->ID, '_pdn_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
								</div>
						<?php
							}
						}
						?>
					</div>
					<div class="cta-btn-wrap" >
						<center>
							<a style="border-radius: 10px;" href="https://www.youtube.com/channel/UCFNTkn-TWhET4gUgoV_8ncQ/videos" target="_blank">Semua Video</a>
						</center>
					</div>
				</div>
			</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'PDN Youtube', 'pdn_youtube_widgets' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}
