<?php /**
 * Select options field widget template.
 *
 * Description.
 *
 * @since 1.0.0
 */

 // Adds widget: Widget Select Options Title
class Widgetselectoptionst_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'widgetselectoptionst_widget',
			esc_html__( 'Widget Select Options Title', 'gcotheme' ),
			array( 'description' => esc_html__( 'Widget select description', 'gcotheme' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Select label ',
			'id' => 'select_id',
			'default' => 'Select default value',
			'type' => 'select',
			'options' => array(
				'Option 1',
				'Option 2',
				'Option 3',
			),
		),
	);

	public function widget( $args, $instance ) {
		echo esc_html__($args['before_widget'],'gcotheme');

		if ( ! empty( $instance['title'] ) ) {
			echo esc_html__($args['before_title'],'gcotheme') . apply_filters( 'widget_title', $instance['title'] ) . esc_html__($args['after_title'], 'gcotheme');
		}

		// Output generated fields
		echo '<p>'.$instance['select_id'].'</p>';
		
		echo esc_html__($args['after_title'], 'gcotheme');
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'gcotheme' );
			switch ( $widget_field['type'] ) {
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
					foreach ($widget_field['options'] as $option) {
						if ($widget_value == $option) {
							$output .= '<option value="'.$option.'" selected>'.$option.'</option>';
						} else {
							$output .= '<option value="'.$option.'">'.$option.'</option>';
						}
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'gcotheme' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'gcotheme' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'gcotheme' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
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

function register_widgetselectoptionst_widget() {
	register_widget( 'Widgetselectoptionst_Widget' );
}
add_action( 'widgets_init', 'register_widgetselectoptionst_widget' );