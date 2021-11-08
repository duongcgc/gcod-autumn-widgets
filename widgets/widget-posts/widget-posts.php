<?php

// Adds widget: Gco Widget Post
class Gcowidgetpost_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gcowidgetpost_widget',
			esc_html__( 'Gco Widget Post', 'textdomain' )
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
		array(
			'label' => 'Number Posts',
			'id' => 'numberposts_number',
			'type' => 'number',
		),
		array(
			'label' => 'Style',
			'id' => 'style_select',
			'type' => 'select',
			'options' => array(
				'Style 01',
				'Style 02',
			),
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		//echo '<p>'.$instance['title_text'].'</p>';
		//echo '<p>'.$instance['numberposts_number'].'</p>';
		$title_text = $instance['title_text'];
		$urltitle_url = $instance['urltitle_url'];
		$numberposts_number = $instance['numberposts_number'];
		$style_select = $instance['style_select'];

		?>
		
		<div class="widget_posts">
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

			<div class="content__module">
				<?php if ($style_select == 'Style 01') { ?>
					<div class="posts__module posts__widget style-1">
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-01.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-02.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-03.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-04.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
					</div>
				<?php } elseif ($style_select == 'Style 02') { ?>
					<div class="slick-slider widget-posts-slider  posts__module posts__widget style-2">
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-01.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-02.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-03.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
						<div class="item">
							<div class="post">
								<div class="image">
									<a href="#" title="">
										<image src="<?php echo GCOD_AUTUMN_ELEMENTS_URL . 'assets/images/post-04.jpg'; ?>" alt="Life style" />
									</a>
								</div>
								<div class="content">
									<div class="post-cat">
										<a href="#" title="">Lifeslite</a>
									</div>
									<h4 class="post-name">
										<a href="#" title="">The unseen of spending three years at Pixelgrade</a>
									</h4>
									<ul class="post-meta">
										<li>
										<a href="#" title="">Devon Lane</a>
										</li>
										<li>
										<span>October 25, 2019</span>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- end item -->
					</div>
				<?php } ?>
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

function register_gcowidgetpost_widget() {
	register_widget( 'Gcowidgetpost_Widget' );
}
add_action( 'widgets_init', 'register_gcowidgetpost_widget' );