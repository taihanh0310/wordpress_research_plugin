<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Nhúng tập tin /inc/init.php vào để load một số chức năng trong website
 */
require dirname( __FILE__ ) . '/inc/init.php';

/**
 * them mot size anh thumbnail phu hop voi trang ban hang
 */

/**
 * cac thiet lap lien quan den theme
 */

function thachpham_theme_setup(){
    add_image_size('sanpham_thumb', 370, 300, false);
}

add_action('init', 'thachpham_theme_setup', 10);

// remove default style of child theme

function remove_default_styles(){
    wp_dequeue_style('spacking-style');
}
add_action('wp_print_styles', 'remove_default_styles', 10);

// load style

/**
 * Dang ky handle with style.css of parent theme
 * use as required parts of style.css in child theme
 */

function thachpham_load_theme_style(){
    wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-styles', get_stylesheet_directory_uri() . '/style.css', array('parent-styles'));
}

add_action('wp_enqueue_scripts', 'thachpham_load_theme_style', 15 );