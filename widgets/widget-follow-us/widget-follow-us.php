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
			'label' => 'Facebook',
			'id' => 'facebook',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Instagram',
			'id' => 'instagram',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Linkedin',
			'id' => 'linkedin',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Twitter',
			'id' => 'twitter',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Youtube',
			'id' => 'youtube',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Dribbble',
			'id' => 'dribbble',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Behance',
			'id' => 'behance',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Flicker',
			'id' => 'flicker',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Pinterest',
			'id' => 'pinterest',
			'default' => 'false',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Github',
			'id' => 'github',
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
		$facebook_icon = $instance['facebook']; 
		$instagram_icon = $instance['instagram']; 
		$linkedin_icon = $instance['linkedin']; 
		$twitter_icon = $instance['twitter']; 
		$youtube_icon = $instance['youtube']; 
		$dribbble_icon = $instance['dribbble']; 
		$behance_icon = $instance['behance']; 
		$flicker_icon = $instance['flicker']; 
		$pinterest_icon = $instance['pinterest']; 
		$github_icon = $instance['github']; 

		// Links get from settings
		$facebook_uri = get_theme_mod('gcod_facebook_uri'); 
		$instagram_uri = get_theme_mod('gcod_instagram_uri'); 
		$linkedin_uri = get_theme_mod('gcod_linkedin_uri'); 
		$twitter_uri = get_theme_mod('gcod_twitter_uri'); 
		$youtube_uri = get_theme_mod('gcod_youtube_uri'); 
		$dribbble_uri = get_theme_mod('gcod_dribbble_uri'); 
		$behance_uri = get_theme_mod('gcod_behance_uri'); 
		$flicker_uri = get_theme_mod('gcod_flicker_uri'); 
		$pinterest_uri = get_theme_mod('gcod_pinterest_uri'); 
		$github_uri = get_theme_mod('gcod_github_uri'); 		
		
		?>

		<div class="widget_posts">
			<?php if ($title_text) { ?>
			   <div class="header__module">
			      <h3 class="title">
			            <span><?php echo $title_text; ?></span>
			      </h3>
				  <p>Check in below socials to show icon follow widgets - Setting link on Customizer => Branding => Social Accounts</p>
			   </div>
			<?php } ?>

			<div class="content__module">
				<div class="follow__us__module follow__us__widget">
					<ul>
						<?php if ($facebook_icon): ?>
						<li><a href="<?php echo $facebook_uri; ?>" title="" tabindex="0"><i class="fab fa-facebook icon"></i></a></li>
						<?php endif; ?>
						<?php if ($instagram_icon): ?>
						<li><a href="<?php echo $instagram_uri; ?>" title="" tabindex="0"><i class="fab fa-instagram icon"></i></a></li>
						<?php endif; ?>
						<?php if ($linkedin_icon): ?>
						<li><a href="<?php echo $linkedin_uri; ?>" title="" tabindex="0"><i class="fab fa-linkedin icon"></i></a></li>
						<?php endif; ?>
						<?php if ($twitter_icon): ?>
						<li><a href="<?php echo $twitter_uri; ?>" title="" tabindex="0"><i class="fab fa-twitter icon"></i></a></li>
						<?php endif; ?>
						<?php if ($youtube_icon): ?>
						<li><a href="<?php echo $youtube_uri; ?>" title="" tabindex="0"><i class="fab fa-youtube icon"></i></a></li>
						<?php endif; ?>
						<?php if ($dribbble_icon): ?>
						<li><a href="<?php echo $dribbble_uri; ?>" title="" tabindex="0"><i class="fab fa-dribbble icon"></i></a></li>
						<?php endif; ?>
						<?php if ($behance_icon): ?>
						<li><a href="<?php echo $behance_uri; ?>" title="" tabindex="0"><i class="fab fa-behance icon"></i></a></li>
						<?php endif; ?>
						<?php if ($flicker_icon): ?>
						<li><a href="<?php echo $flicker_uri; ?>" title="" tabindex="0"><i class="fab fa-flicker icon"></i></a></li>
						<?php endif; ?>
						<?php if ($pinterest_icon): ?>
						<li><a href="<?php echo $pinterest_uri; ?>" title="" tabindex="0"><i class="fab fa-pinterest icon"></i></a></li>
						<?php endif; ?>
						<?php if ($github_icon): ?>
						<li><a href="<?php echo $github_uri; ?>" title="" tabindex="0"><i class="fab fa-github icon"></i></a></li>
						<?php endif; ?>
						
                    </ul>
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