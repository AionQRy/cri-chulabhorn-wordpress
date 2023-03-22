<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: WebLink Categories.
	 */

	// $labels = [
	// 	"name" => __( "WebLink Categories", "fluffy" ),
	// 	"singular_name" => __( "WebLink Categories", "fluffy" ),
	// ];
	//
	//
	// $args = [
	// 	"label" => __( "WebLink Categories", "fluffy" ),
	// 	"labels" => $labels,
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"hierarchical" => true,
	// 	"show_ui" => true,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"query_var" => true,
	// 	"rewrite" => [ 'slug' => 'weblink-category', 'with_front' => true, ],
	// 	"show_admin_column" => false,
	// 	"show_in_rest" => true,
	// 	"show_tagcloud" => false,
	// 	"rest_base" => "weblink_category",
	// 	"rest_controller_class" => "WP_REST_Terms_Controller",
	// 	"show_in_quick_edit" => false,
	// 	"show_in_graphql" => false,
	// ];
	// register_taxonomy( "weblink_category", [ "weblink" ], $args );

	/**
	 * Taxonomy: Videos Categories.
	 */
//
// 	$labels = [
// 		"name" => __( "Videos Categories", "fluffy" ),
// 		"singular_name" => __( "Videos Categories", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "Videos Categories", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'videos-category', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "vc_video_category",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "vc_video_category", [ "vc_video" ], $args );
//
// 	/**
// 	 * Taxonomy: Photos Categories.
// 	 */
//
// 	$labels = [
// 		"name" => __( "Photos Categories", "fluffy" ),
// 		"singular_name" => __( "Photos  Categories", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "Photos Categories", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'photos-category', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "vc_photo_category",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "vc_photo_category", [ "vc_photo" ], $args );
//
// 	/**
// 	 * Taxonomy: E-Book Categories.
// 	 */
//
// 	$labels = [
// 		"name" => __( "E-Book Categories", "fluffy" ),
// 		"singular_name" => __( "E-Book Categories", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "E-Book Categories", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'ebook-category', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "ebook_category",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "ebook_category", [ "e-book" ], $args );
//
// 	/**
// 	 * Taxonomy: E-Book Tags.
// 	 */
//
// 	$labels = [
// 		"name" => __( "E-Book Tags", "fluffy" ),
// 		"singular_name" => __( "E-Book Tags", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "E-Book Tags", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'ebook-tags', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "ebook_tags",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "ebook_tags", [ "e-book" ], $args );
//
// // 	/**
// // 	 * Taxonomy: Videos Tags.
// // 	 */
// //
// 	$labels = [
// 		"name" => __( "Videos Tags", "fluffy" ),
// 		"singular_name" => __( "Videos Tags", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "Videos Tags", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'videos-tags', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "vc_video_tags",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "vc_video_tags", [ "vc_video" ], $args );
//
// // 	/**
// // 	 * Taxonomy: Photos Tags.
// // 	 */
//
// 	$labels = [
// 		"name" => __( "Photos Tags", "fluffy" ),
// 		"singular_name" => __( "Photos Tags", "fluffy" ),
// 	];
//
//
// 	$args = [
// 		"label" => __( "Photos Tags", "fluffy" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'photos-tags', 'with_front' => true, ],
// 		"show_admin_column" => false,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "vc_photo_tags",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"show_in_quick_edit" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "vc_photo_tags", [ "vc_photo" ], $args );



	/**
	 * Taxonomy: Years.
	 */

	$labels = [
		"name" => __( "Years", "fluffy" ),
		"singular_name" => __( "Year", "fluffy" ),
	];


	$args = [
		"label" => __( "Years", "fluffy" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'post-year', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "post_year",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "post_year", [ "post" ], $args );

}
add_action( 'init', 'cptui_register_my_taxes' );

 ?>
