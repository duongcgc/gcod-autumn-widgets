<?php

// Adds widget: Gco Widget Newsletters
class Gcowidgetnewsletters_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gcowidgetnewsletters_widget',
			esc_html__( 'Gco Widget Newsletters', 'textdomain' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Title',
			'id' => 'title_text',
			'type' => 'text',
		),
		array(
			'label' => 'Form Shortcode',
			'id' => 'newsletter_shortcode',
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
		$newsletter_shortcode = $instance['newsletter_shortcode']; ?>

		<div class="widget_posts">
			<?php if ($title_text) { ?>
			   <div class="header__module">
			      <h3 class="title">
			            <span><?php echo $title_text; ?></span>
			      </h3>
			   </div>
			<?php } ?>

			<div class="content__module">
				<div class="newsletters__module newsletters__widget">
					<?php echo do_shortcode($newsletter_shortcode); ?>
				</div>
			</div>
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

function register_gcowidgetnewsletters_widget() {
	register_widget( 'Gcowidgetnewsletters_Widget' );
}
add_action( 'widgets_init', 'register_gcowidgetnewsletters_widget' );