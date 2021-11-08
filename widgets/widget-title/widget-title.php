<?php

// Adds widget: Gco Widget Title
class Gcowidgettitle_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gcowidgettitle_widget',
			esc_html__( 'Gco Widget Title', 'textdomain' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Title',
			'id' => 'title_text',
			'type' => 'text',
		),
		array(
			'label' => 'Url Title',
			'id' => 'urltitle_url',
			'type' => 'url',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		$title_text = $instance['title_text'];
		$urltitle_url = $instance['urltitle_url'];

		?>
		
		<?php if ($title_text) { ?>
		   <div class="header__module">
		      <h3 class="title">
		         <?php if ($urltitle_url) { ?>
		            <a href="<?php echo $urltitle_url; ?>" title="">
		         <?php } else { ?>
		            <span>
		         <?php } ?>
		            <?php echo $title_text; ?>
		         <?php if ($urltitle_url) { ?>
		            </a>
		         <?php } else { ?>
		            </span>
		         <?php } ?>
		      </h3>
		   </div>
		<?php } ?>

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

function register_gcowidgettitle_widget() {
	register_widget( 'Gcowidgettitle_Widget' );
}
add_action( 'widgets_init', 'register_gcowidgettitle_widget' );