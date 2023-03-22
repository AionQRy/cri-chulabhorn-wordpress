<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Weblinks.
	 */

	$labels = [
		"name" => __( "Weblinks", "fluffy" ),
		"singular_name" => __( "WebLinks", "fluffy" ),
	];

	$args = [
		"label" => __( "Weblinks", "fluffy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "weblink", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "weblink", $args );

	/**
	 * Post Type: Videos.
	 */

	// $labels = [
	// 	"name" => __( "Videos", "fluffy" ),
	// 	"singular_name" => __( "Videos", "fluffy" ),
	// ];
	//
	// $args = [
	// 	"label" => __( "Videos", "fluffy" ),
	// 	"labels" => $labels,
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => true,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => true,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => [ "slug" => "videos", "with_front" => true ],
	// 	"query_var" => true,
	// 	"supports" => [ "title", "editor", "thumbnail" ],
	// 	"show_in_graphql" => false,
	// ];
	//
	// register_post_type( "vc_video", $args );
	//
	// /**
	//  * Post Type: Photos.
	//  */
	//
	// $labels = [
	// 	"name" => __( "Photos", "fluffy" ),
	// 	"singular_name" => __( "Photos", "fluffy" ),
	// ];
	//
	// $args = [
	// 	"label" => __( "Photos", "fluffy" ),
	// 	"labels" => $labels,
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => true,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => true,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => [ "slug" => "photos", "with_front" => true ],
	// 	"query_var" => true,
	// 	"supports" => [ "title", "editor", "thumbnail" ],
	// 	"show_in_graphql" => false,
	// ];
	//
	// register_post_type( "vc_photo", $args );
	//
	// /**
	//  * Post Type: Child Website.
	//  */
	//
	// $labels = [
	// 	"name" => __( "Child Website", "fluffy" ),
	// 	"singular_name" => __( "Child Website", "fluffy" ),
	// ];
	//
	// $args = [
	// 	"label" => __( "Child Website", "fluffy" ),
	// 	"labels" => $labels,
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => false,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => false,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => false,
	// 	"query_var" => true,
	// 	"supports" => [ "title" ],
	// 	"show_in_graphql" => false,
	// ];
	//
	// register_post_type( "post-link-child", $args );

	/**
	 * Post Type: E-Book.
	 */
	//
	// $labels = [
	// 	"name" => __( "E-Book", "fluffy" ),
	// 	"singular_name" => __( "E-Book", "fluffy" ),
	// ];
	//
	// $args = [
	// 	"label" => __( "E-Book", "fluffy" ),
	// 	"labels" => $labels,
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => true,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => true,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => [ "slug" => "e-book", "with_front" => true ],
	// 	"query_var" => true,
	// 	"supports" => [ "title", "editor", "thumbnail" ],
	// 	"show_in_graphql" => false,
	// ];
	//
	// register_post_type( "e-book", $args );
	//
	// /**
	//  * Post Type: E-Newsletter.
	//  */
	//
	// $labels = [
	// 	"name" => __( "E-Newsletter", "fluffy" ),
	// 	"singular_name" => __( "E-Newsletter", "fluffy" ),
	// ];
	//
	// $args = [
	// 	"label" => __( "E-Newsletter", "fluffy" ),
	// 	"labels" => $labels,
	// 	"description" => "",
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"show_ui" => true,
	// 	"show_in_rest" => true,
	// 	"rest_base" => "",
	// 	"rest_controller_class" => "WP_REST_Posts_Controller",
	// 	"has_archive" => false,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"delete_with_user" => false,
	// 	"exclude_from_search" => false,
	// 	"capability_type" => "post",
	// 	"map_meta_cap" => true,
	// 	"hierarchical" => false,
	// 	"rewrite" => [ "slug" => "e-newsletter", "with_front" => true ],
	// 	"query_var" => true,
	// 	"supports" => [ "title" ],
	// 	"show_in_graphql" => false,
	// ];
	//
	// register_post_type( "e-newsletter", $args );

	/**
	 * Post Type: Bottom Banner.
	 */

	$labels = [
		"name" => __( "Bottom Banner", "fluffy" ),
		"singular_name" => __( "Bottom Banner", "fluffy" ),
	];

	$args = [
		"label" => __( "Bottom Banner", "fluffy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "banner_bottom", "with_front" => false ],
		"query_var" => true,
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "banner_bottom", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


 ?>
