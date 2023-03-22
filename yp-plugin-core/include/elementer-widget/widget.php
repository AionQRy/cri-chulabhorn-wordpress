<?php
class Customize_Elementor_Widgets
{

    protected static $instance = null;

    public static function get_instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct()
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }
    private function include_widgets_files()
    {
        require_once 'post-tab/post-tab-v1.php';
        require_once 'post-tab/post-tab-v2.php';
        require_once 'post-tab/post-tab-v3.php';
        require_once 'post-tab/post-tab-v4.php';
        require_once 'post-tab/post-tab-ebook.php';
        require_once 'carousel_ebook.php';
        require_once 'post-download-list.php';
        require_once 'post-list.php';
        require_once 'post-carousel.php';
        require_once 'carousel_home_banner.php';

    }

    public function register_widgets()
    {
        $this->include_widgets_files();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_tab_v1());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_tab_v2());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_tab_v3());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_tab_v4());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_tab_ebook_v1());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\carousel_ebook());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_download_list());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_list());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\post_carousel());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\carousel_home_banner());
    }
}

function yp_core_scripts()
{
    wp_enqueue_script('yp_core', plugin_dir_url(__DIR__) . 'js/yp-main.js', '1.0.0', true);
}
add_action('elementor/frontend/after_enqueue_scripts', 'yp_core_scripts', 20);

function yp_core_scripts_head()
{
    wp_enqueue_script('yp_e_swiper', plugin_dir_url(__DIR__) . 'js/swiper-bundle.min.js', '1.0.0');
}
add_action('wp_enqueue_scripts', 'yp_core_scripts_head', 10);

function wpdocs_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');

function wpdocs_custom_excerpt_length($length)
{
    return 220;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);



add_action('init', 'customize_elementor_init');
function customize_elementor_init()
{
    Customize_Elementor_Widgets::get_instance();
}
