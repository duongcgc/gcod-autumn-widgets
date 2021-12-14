<?php

// Adds widget: GCO Instagram Widget
class GCO_Instagram_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gco_instagram_widget',
			esc_html__( 'GCO Instagram Widget', 'textdomain' )
		);
	}

	private $widget_fields = array(

		array(
			'label' => 'Title',
			'id' => 'title_text',
			'type' => 'text',
		),

		array(
			'label' => 'Instagram Shortcode',
			'id' => 'instagram_shortcode',
			'type' => 'text',
		),

		array(
			'label' => 'Instagram Follow',
			'id' => 'instagram_follow',
			'type' => 'text',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		$title_text = $instance['title_text'];
		$instagram_shortcode = $instance['instagram_shortcode']; 
		$instagram_follow = $instance['instagram_follow']; 
		
		?>

		<div class="widget_posts">
			<?php if ($title_text) { ?>
			   <div class="header__module">
			      <h3 class="title">
			            <span><?php echo $title_text; ?></span>
			      </h3>
			   </div>
			<?php } ?>

			<?php if ($instagram_shortcode != '') : ?>
			<div class="content__module">
				<div class="instagram__module instagram__widget">
					<?php echo do_shortcode($instagram_shortcode); ?>
				</div>

				<div class="post-button is-style-outline">
					<a href="<?php echo $instagram_follow; ?>" class="btn wp-block-button__link">Follow</a>
				</div>
			</div>
			<?php endif; ?>
		</div>
		
		<?php echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_gco_instagram_widget() {
	register_widget( 'GCO_Instagram_Widget' );
}
add_action( 'widgets_init', 'register_gco_instagram_widget' );