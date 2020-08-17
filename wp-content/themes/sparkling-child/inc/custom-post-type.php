<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * custom post type
 */
function thachpham_register_post_types($post_types) {
    // tao post type ten 'sanpham'

    $post_types = array(
        'labels' => array(
            'name' => 'Sản phẩm',
            'singular_name' => 'Sản phẩm',
            'add_new' => 'Thêm sản phẩm',
            'add_new_item' => 'Thêm sản phẩm mới',
            'all_items' => 'Tất cả sản phẩm',
            'edit_item' => 'Sửa sản phẩm',
            'featured_image' => 'Ảnh đại diện sản phẩm',
            'filter_item_list' => 'Lọc danh sách sản phẩm',
            'item_list' => 'Danh sách sản phẩm',
            'set_featured_image' => 'Thiết lập ảnh đại diện'
        ),
        'title' => 'Nhập tên sản phẩm',
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'comment'),
        'rewrite' => array('slug' => 'sanpham'),
        'hide_meta_box' => array('author'),
        'has_archive' => true
    );
    register_post_type('sanpham', $post_types);
//    return $post_types;
}

// add filter post type

//add_filter('piklist_post_types', 'thachpham_register_post_types');
add_action('init', 'thachpham_register_post_types');

function my_custom_post_product() {
    $labels = array(
        'name' => _x( 'Products', 'post type general name' ),
        'singular_name' => _x( 'Product', 'post type singular name' ),
        'add_new' => _x( 'Add New', 'book' ),
        'add_new_item' => __( 'Add New Product' ),
        'edit_item' => __( 'Edit Product' ),
        'new_item' => __( 'New Product' ),
        'all_items' => __( 'All Products' ),
        'view_item' => __( 'View Product' ),
        'search_items' => __( 'Search Products' ),
        'not_found' => __( 'No products found' ),
        'not_found_in_trash' => __( 'No products found in the Trash' ),
        'parent_item_colon' => '',
        'menu_name' => 'Products'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our products and product specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('product', $args);
}

add_action('init', 'my_custom_post_product');
