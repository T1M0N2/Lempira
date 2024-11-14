<?php

/**
 * shop Toolkit Lite Theme Customizer
 *
 * @package shop Toolkit Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function shop_toolkit_lite_customize_register($wp_customize)
{

    $wp_customize->remove_control('shop_toolkit_blog_style');


    $wp_customize->add_setting('shop_toolkit_lite_blog_style', array(
        'default'        => 'style2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shop_toolkit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('shop_toolkit_lite_blog_style', array(
        'label'      => __('Select Blog Style', 'shop-toolkit'),
        'section'    => 'shop_toolkit_blog',
        'settings'   => 'shop_toolkit_lite_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'shop-toolkit'),
            'style1' => __('List over Image', 'shop-toolkit'),
            'style2' => __('List Style', 'shop-toolkit'),
            'style3' => __('Classic Style', 'shop-toolkit'),
        ),
    ));
}
add_action('customize_register', 'shop_toolkit_lite_customize_register', 99);
