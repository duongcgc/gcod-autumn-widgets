<?
/**
 * Welcome Widget.
 *
 * Description.
 *
 * @since 1.0.0
 * 
 * 
 */

// Adds widget: Welcome
class Welcome_Widget extends WP_Widget {

    // Widget Settings define here
    private $settings = array(
        'id'            => 'welcome_widget',
        'caption'       => 'Welcome',
        'description'   => 'Welcome Description',
    );

    function __construct() {
        parent::__construct(
            $this->settings['id'],
            esc_html__($this->settings['caption'], 'gcotheme'),
            array('description' => esc_html__($this->settings['description'], 'gcotheme'),
            'customize_selective_refresh' => true,) // Args
        );
    }

    // Fields of widget define here 
    // check other field types in /docs folder
    private $widget_fields = array(
        array(
            'label' => 'Welcome Text',
            'id' => 'welcome_text',
            'default' => 'Welcome',
            'type' => 'text',
        ),
    );


    // Frontend template here
    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Output generated fields
        echo '<p>' . $instance['welcome_text'] . '</p>';

        echo $args['after_widget'];
    }

    public function field_generator($instance) {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'gcotheme');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'gcotheme') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }


    // Admin form render here
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'gcotheme'); 
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'gcotheme'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p> 
<?php
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

// Widget hook
function register_welcome_widget() {
    register_widget('Welcome_Widget');
}
add_action('widgets_init', 'register_welcome_widget');