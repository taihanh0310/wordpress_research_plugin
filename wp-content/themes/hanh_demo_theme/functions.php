<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Function for simple theme
 */
if (!defined('ABSPATH')) {
    return;
}

add_action('wp_enqueue_scripts', 'st_enqueue_scripts_styles');

// create function quere styles

function st_enqueue_scripts_styles() {
    wp_enqueue_style('st-style', get_stylesheet_uri());
}

if (!function_exists('st_setup')) {

    function st_setup() {
        load_theme_textdomain('st', get_template_directory() . '/languages');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'st'),
            'footer' => __('Footer Menu', 'st')
        ));

        /**
         * title setup
         */
        add_theme_support('title-tag');

        $html5_args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        );

        add_theme_support('html5', $html5_args);
    }

}

add_action('after_setup_theme', 'st_setup');

if (!isset($content_width)) {
    $content_width = 1200; /* pixels */
}
    