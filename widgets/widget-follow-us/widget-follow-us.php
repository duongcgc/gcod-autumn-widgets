<?php

// Adds widget: Gco Widget Follow Us
class GCO_Follow_US_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gco_follow_us_widget',
			esc_html__( 'Gco Widget Follow Us', 'textdomain' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Title',
			'id' => 'title_text',
			'type' => 'text',
		),
		array(
			'label' => 'Darkmode',
			'id' => 'darkmode',
			'default' => 'false',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		$title_text = $instance['title_text'];
		$darkmode = $instance['darkmode']; 


		// Default icons
		$default_icons = array(
			'icon-facebook',
			'icon-instagram',
			'icon-linkedin',
			'icon-twitter',
			'icon-youtube',
			
		);

		// Get display and order icons
		$gcod_social_icons_display = get_theme_mod('gcod_social_icons_setting',$default_icons);
		
		?>

		<div class="widget_posts <?php echo $darkmode; ?>">
			<?php if ($title_text) { ?>
			   <div class="header__module">
			      <h3 class="title">
			            <span><?php echo $title_text; ?></span>
			      </h3>
			   </div>
			<?php } ?>

			<div class="content__module">
				<div class="follow__us__module follow__us__widget">
					<ul>
						<?php 
						foreach ($gcod_social_icons_display as $gcod_social_icon): 
							$icon_name = str_replace("icon-", "", $gcod_social_icon);
							$social_url = get_theme_mod('gcod_'. $icon_name . '_uri');
							$social_icon = 'fa-'. $icon_name;
						?>

							<li><a href="<?php echo $social_url; ?>" title="follow me" tabindex="0"><i class="fab <?php echo $social_icon;?> icon"></i></a></li>

						<?php 
						endforeach; 
						?>
                    </ul>
				</div>
			</div>
		</div>
		
		<?php echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '<p>Check in below socials to show icon follow widgets - Setting link on Customizer => Branding => Social Accounts</p>';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sdfsdfsd' ).'</label>';
					$output .= '</p>';
					break;
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

function register_gco_follow_us_widget() {
	register_widget( 'GCO_Follow_US_Widget' );
}
add_action( 'widgets_init', 'register_gco_follow_us_widget' );