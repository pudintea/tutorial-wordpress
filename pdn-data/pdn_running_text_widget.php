<?php
/*
 Nama : Mahpud / Najzmi
 Kontak : https://t.me/pudin_ira
 Instagram : https://instagram.com/pudin.ira
 
 Keterangan :
 Untuk menggunakan widget ini, harus sudah terinstall Plugin News Stiker
 Link : https://github.com/iamsayan/simple-posts-ticker
 Link : https://wordpress.org/plugins/simple-posts-ticker/
 
	<?php
		echo do_shortcode('[spt-posts-ticker]');
	?>
*/

class pdn_running_text_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// ID widget
			'pdn_running_text_widget',
			// nama widget
			__('PDN Running Text Widget', ' pdn_running_text_widgets'),
			// deskripsi widget
			array( 'description' => __( 'PDN Running Text Widgets', 'pdn_running_text_widgets' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		//if title is present
		if ( ! empty( $title ) )
		$pdn_majalah_widget_title = $args['before_title'] . $title . $args['after_title'];
		echo $args['before_widget'];
		
		//output
		//echo do_shortcode('[spt-posts-ticker]');
		?>
		<!-- DIDINI  -->
		<div class="pdn-running-text">
			<?php echo do_shortcode('[spt-posts-ticker]'); ?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'PDN Running Text', 'pdn_running_text_widgets' );
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
