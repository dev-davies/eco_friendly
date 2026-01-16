<?php
/**
 * Novel Homes Theme Functions
 * 
 * @package Novel_Homes
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function novel_homes_theme_setup()
{
    // Add theme support for title tag
    add_theme_support('title-tag');

    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'novel-homes'),
        'footer-support' => __('Footer Support Menu', 'novel-homes'),
        'footer-quick' => __('Footer Quick Links Menu', 'novel-homes'),
    ));

    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));
}
add_action('after_setup_theme', 'novel_homes_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function novel_homes_enqueue_assets()
{
    // Enqueue Google Font - Inter
    wp_enqueue_style(
        'novel-homes-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap',
        array(),
        null
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'novel-homes-style',
        get_stylesheet_uri(),
        array('novel-homes-google-fonts'),
        wp_get_theme()->get('Version')
    );

    // Enqueue main script
    wp_enqueue_script(
        'novel-homes-script',
        get_template_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'novel_homes_enqueue_assets');

/**
 * Customizer Settings
 */
function novel_homes_customize_register($wp_customize)
{
    // Footer Section
    $wp_customize->add_section('novel_homes_footer', array(
        'title' => __('Footer Settings', 'novel-homes'),
        'priority' => 120,
    ));

    // Footer About Text
    $wp_customize->add_setting('footer_about_text', array(
        'default' => 'Premium energy-efficient appliances designed for modern Nigerian living. Combining Scandinavian minimalism with tropical engineering.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_about_text', array(
        'label' => __('About Text', 'novel-homes'),
        'section' => 'novel_homes_footer',
        'type' => 'textarea',
    ));

    // Footer Contact Text
    $wp_customize->add_setting('footer_contact_text', array(
        'default' => 'Lagos Showroom:<br>23 Admiralty Way, Lekki Phase 1<br><br>Email: hello@novelhomes.ng<br>Phone: +234 (0) 800 NOVEL HOMES',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_contact_text', array(
        'label' => __('Contact Information', 'novel-homes'),
        'section' => 'novel_homes_footer',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'novel_homes_customize_register');

/**
 * Add custom body classes
 */
function novel_homes_body_classes($classes)
{
    if (is_front_page()) {
        $classes[] = 'novel-homes-front-page';
    }

    return $classes;
}
add_filter('body_class', 'novel_homes_body_classes');

/**
 * WooCommerce Custom Support
 */
if (class_exists('WooCommerce')) {
    /**
     * Remove default WooCommerce wrapper
     */
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    /**
     * Add custom WooCommerce wrapper
     */
    function novel_homes_woocommerce_wrapper_start()
    {
        echo '<div class="container woocommerce-container">';
    }
    add_action('woocommerce_before_main_content', 'novel_homes_woocommerce_wrapper_start', 10);

    function novel_homes_woocommerce_wrapper_end()
    {
        echo '</div>';
    }
    add_action('woocommerce_after_main_content', 'novel_homes_woocommerce_wrapper_end', 10);
}
