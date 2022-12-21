<?php
/*


*/

class pdn_youtube_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// ID widget
			'pdn_youtube_widget',
			// nama widget
			__('PDN: Youtube Widget', ' pdn_youtube_widget_domain'),
			// deskripsi widget
			array( 'description' => __( 'Widget youtube yang sengaja saya sediakan untuk kalian', 'pdn_youtube_widget_domain' ), )
		);
	}
	
	private function widget_fields() {
        
        $fields = array(

            'section_title' => array(
                'pdn_widgets_name'         => 'section_title',
                'pdn_widgets_title'        => __( 'Section Title', 'pdn_youtube_widget_domain' ),
                'pdn_widgets_field_type'   => 'text'
            ),

            'section_info' => array(
                'pdn_widgets_name'         => 'section_info',
                'pdn_widgets_title'        => __( 'Section Info', 'pdn_youtube_widget_domain' ),
                'pdn_widgets_row'          => 5,
                'pdn_widgets_field_type'   => 'textarea'
            ),

            'section_cat_slug' => array(
                'pdn_widgets_name'         => 'section_cat_slug',
                'pdn_widgets_title'        => __( 'Section Category', 'pdn_youtube_widget_domain' ),
                'pdn_widgets_default'      => '',
                'pdn_widgets_field_type'   => 'category_dropdown'
            ),

            'section_post_count' => array(
                'pdn_widgets_name'         => 'section_post_count',
                'pdn_widgets_title'        => __( 'Section Post Count', 'pdn_youtube_widget_domain' ),
                'pdn_widgets_default'      => 4,
                'pdn_widgets_field_type'   => 'number'
            ),
        );
        return $fields;
    }
	
	public function widget( $args, $instance ) {
		extract( $args );

        if ( empty( $instance ) ) {
            return ;
        }

        $pdn_youtube_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $pdn_youtube_section_info       = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $pdn_youtube_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];
        $pdn_youtube_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];

        if ( empty( $scholarship_section_cat_slug ) ) {
            return ;
        }

        if ( !empty( $pdn_youtube_section_title ) || !empty( $pdn_youtube_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $pdn_youtube_args = array(
			'orderby' 			=> 'meta_value_num',
			'order' 			=> 'ASC',
            'post_type'      	=> 'pdn_pengelola',
            //'category_name'  	=> esc_attr( $pdn_youtube_section_cat_slug ),
            'posts_per_page'	=> absint( $pdn_youtube_section_post_count )
        );
        $pdn_youtube_query = new WP_Query( $pdn_youtube_args );
		
		//output
		?>
			<div class="section-wrapper scholarship-widget-wrapper">
                <div class="mt-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
                       <?php
                            if ( !empty( $pdn_youtube_section_title ) ) {
                                echo $before_title . esc_html( $pdn_youtube_section_title ) . $after_title;
                            }

                            if ( !empty( $pdn_youtube_section_info ) ) {
                                echo '<span class="section-info">'. esc_html( $pdn_youtube_section_info ) .'</span>';
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->
                    <div class="team-wrapper mt-column-wrapper">
                                    <div class="single-post-wrapper mt-column-4">
                                            <div class="img-holder">
                                                <div class="team-desc-wrapper">
                                                    <div class="team-desc">
                                                        <span>
																			dfdfdfdf
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="team-title-wrapper">
                                            <h3 class="post-title"><a href="#>">hghgh</a></h3>
                                            <span class="team-position">fggfgfg</span>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $pdn_youtube_widgets_field_value = !empty( $instance[$pdn_widgets_name] ) ? wp_kses_post( $instance[$pdn_widgets_name] ) : '';
            pdn_widgets_show_widget_field( $this, $widget_field, $pdn_youtube_widgets_field_value );
        }
	}

	public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$pdn_widgets_name] = pdn_widgets_updated_field_value( $widget_field, $new_instance[$pdn_widgets_name] );
        }

        return $instance;
    }

}
