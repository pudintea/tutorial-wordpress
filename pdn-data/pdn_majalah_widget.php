<?php
/*


*/

class pdn_majalah_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// ID widget
			'pdn_majalah_widget',
			// nama widget
			__('PDN Majalah Widget', ' pdn_majalah_widgets'),
			// deskripsi widget
			array( 'description' => __( 'PDN Majalah Widgets', 'pdn_majalah_widgets' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		//if title is present
		if ( ! empty( $title ) )
		$pdn_majalah_widget_title = $args['before_title'] . $title . $args['after_title'];
		echo $args['before_widget'];
		
		//output
		?>
		<style>
			.pdn-iframe-majalah{
				width:100%;
				height:450px;
			}
			@media only screen and (max-width: 750px) {
			}
		</style>
			<div class="scholarship-widget-wrapper">
				<iframe class="pdn-iframe-majalah" src="https://fliphtml5.com/bookcase/qvnfg/yellow"  seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen >
				</iframe>
			</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'PDN Majalah', 'pdn_majalah_widgets' );
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
