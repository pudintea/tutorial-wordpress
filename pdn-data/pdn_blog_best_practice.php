<?php
/*


*/

class pdn_blog_best_practice extends WP_Widget {

	function __construct() {
		parent::__construct(
			// ID widget
			'pdn_blog_best_practice',
			// nama widget
			__('PDN Blog Best Practice Widget', ' pdn_blog_practice_widgets'),
			// deskripsi widget
			array( 'description' => __( 'PDN Blog Best Practice Widgets', 'pdn_blog_practice_widgets' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		//if title is present
		if ( ! empty( $title ) )
		$pdn_majalah_widget_title = $args['before_title'] . $title . $args['after_title'];
		echo $args['before_widget'];
		
		//OUTPUT KONTEN
		?>
		<style>
			#pdn_feed_bp_blog ul {
				list-style-type: decimal;
			}
			#pdn_feed_bp_blog ul li{
				border-bottom: 1px solid rgba(0,0,0,.1);
				margin-bottom: 5px;
				padding-bottom: 5px;
			}
			#pdn_feed_bp_blog ul li a{
				line-height: 20px;
				font-size: 13px;
				color: #000;
			}
			#pdn_feed_bp_blog ul li a:hover {
				color: #004b8e;
			}
		</style>
		<?php
			echo '<h3 class="widget-title">Best Practice</h3>';
			echo '<div id="pdn_feed_bp_blog">';
			wp_widget_rss_output(array(
				'url' => 'https://feeds.feedburner.com/pdn-my-id',
				'items' => 5,
				'show_summary' => 0,
				'show_author' => 0,
				'show_date' => 0)
				);
			echo '</div>';
		//END KONTEN
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'PDN Blog Best Practice', 'pdn_blog_practice_widgets' );
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
