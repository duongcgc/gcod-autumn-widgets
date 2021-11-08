<?php
/*
    Plugin Name: GCOD Widgets for Autumn
    Plugin URI: https://themeforest.net/gcodesign/
    Description: GCOD Widgets for Autumn Theme
    Version: 1.0.0
    Author: CGO Design Team
    Author URI: https://gcodesign.com/wordpress-plugins/
    Text Domain: gcod-theme
*/

// Define path to plugin directory.
define('GCOD_AUTUMN_WIDGETS_PATH', plugin_dir_path(__FILE__));

// Define URL to plugin directory.
define('GCOD_AUTUMN_WIDGETS_URL', plugin_dir_url(__FILE__));

class GcoAutumnWidgets {
    private static $instance;
    private $gcod_components_dir = 'widgets';
    private $gcod_inc_dir = 'includes';

    /**
     * GcoAutumnWidgets constructor.
     */
    public function __construct() {
        $this->setup();
        $this->widgets();

        // Load custom widgets assets
        add_action('gcod_widgets_loader', array($this, 'gcod_custom_widgets_require_files'));
        add_action('wp_enqueue_scripts', array($this, 'gcod_custom_widgets_assets'));
        // add_action('admin_enqueue_scripts', array($this, 'gcod_custom_widgets_assets'));       

    }

    public static function getInstance() {

        if (!isset(self::$instance) && !(self::$instance instanceof GcoAutumnWidgets)) {
            self::$instance = new GcoAutumnWidgets();
        }

        return self::$instance;
    }

    public function setup() {

        // Define path to theme directory.
        if (!defined('GCOD_AUTUMN_THEME_PATH')) {
            define('GCOD_AUTUMN_THEME_PATH', get_template_directory() . '/');
        }

        // Define URL to theme directory.
        if (!defined('GCOD_AUTUMN_THEME_URL')) {
            define('GCOD_AUTUMN_THEME_URL', get_template_directory_uri() . '/');
        }


        if (!defined('GCOD_AUTUMN_WIDGETS_INC_PATH')) {
            define('GCOD_AUTUMN_WIDGETS_INC_PATH', plugin_dir_path(__FILE__) . $this->gcod_inc_dir);
        }

        if (!defined('GCOD_AUTUMN_WIDGETS_INC_URL')) {
            define('GCOD_AUTUMN_WIDGETS_INC_URL', plugin_dir_url(__FILE__) . $this->gcod_inc_dir);
        }

        if (!defined('GCOD_AUTUMN_WIDGET_COMPS_PATH')) {
            define('GCOD_AUTUMN_WIDGET_COMPS_PATH', plugin_dir_path(__FILE__) . $this->gcod_components_dir);
        }

        if (!defined('GCOD_AUTUMN_WIDGETS_COMPS_URL')) {
            define('GCOD_AUTUMN_WIDGETS_COMPS_URL', plugin_dir_url(__FILE__) . $this->gcod_components_dir);
        }
    }

    // Widget plug-in
    public function widgets() {
        add_action('after_setup_theme', function () {
            do_action('gcod_widgets_loader');
        });
    }

    // Widget loading from Plugin
    public function gcod_custom_widgets_require_files() {

        $gcod_widget_list = array(
            // 'widget-welcome/widget-welcome.php',
            'widget-photo/widget-photo.php',
            'widget-posts/widget-posts.php',
            'widget-follow-us/widget-follow-us.php',
            'widget-newsletters/widget-newsletters.php',
            'widget-title/widget-title.php',
        );

        // Include files from plugin core.
        $gcod_widgets_dir = GCOD_AUTUMN_WIDGET_COMPS_PATH . '/';
        foreach ($gcod_widget_list as $file) {
            require_once $gcod_widgets_dir . $file;
        }
    }

    // => Enqueue your custom widgets 
    function gcod_custom_widgets_assets() {
        wp_enqueue_style(
            'gcod-custom-widget-styles',
            get_template_directory_uri() . '/assets/css/gcod-widgets.css',
            false,
            wp_get_theme()->get('Version')
        );

        // wp_enqueue_script(
        //     'gcod-custom-widget-scripts',
        //     get_template_directory_uri() . '/assets/js/gcod-widgets.js',
        //     array(),
        //     true,
        //     wp_get_theme()->get('Version')
        // );

        wp_enqueue_style(
            'gcod-fontawesome-styles',
            plugin_dir_url(__FILE__) . 'assets/vendors/fontawesome/css/all.fontawesome.min.css',
            false,
            wp_get_theme()->get('Version')
        );

        wp_enqueue_style(
            'gcod-slick-styles',
            plugin_dir_url(__FILE__) . 'assets/vendors/slick/slick.min.css',
            false,
            wp_get_theme()->get('Version')
        );
        wp_register_script(
            'gcod-slick-scripts',
            plugin_dir_url(__FILE__) . 'assets/vendors/slick/slick.min.js',
            array('jquery'),
            true,
            wp_get_theme()->get('Version')
        );
        wp_enqueue_script('gcod-slick-scripts');

        if (\Elementor\Plugin::$instance->preview->is_preview_mode()) {
            wp_register_script(
                'gcod-custom-widget-scripts',
                plugin_dir_url(__FILE__) . 'assets/js/gcod-widget-editor.js',
                array('jquery', 'gcod-slick-scripts'),
                true,
                wp_get_theme()->get('Version')
            );
            wp_enqueue_script('gcod-custom-widget-scripts');
        } else {
            wp_register_script(
                'gcod-custom-widget-scripts',
                plugin_dir_url(__FILE__) . 'assets/js/gcod-widget.js',
                array('jquery', 'gcod-slick-scripts'),
                true,
                wp_get_theme()->get('Version')
            );
            wp_enqueue_script('gcod-custom-widget-scripts');
        }
    }
}

// Init instance core to launch
return GcoAutumnWidgets::getInstance();
