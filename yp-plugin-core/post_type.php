<?php
function cptui_register_my_cpts() {
	
	/**
	 * Post Type: E-Newsletter.
	 */

	$labels = [
		"name" => __( "E-Newsletter", "yp-core" ),
		"singular_name" => __( "E-Newsletter", "yp-core" ),
	];

	$args = [
		"label" => __( "E-Newsletter", "yp-core" ),
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
		"can_export" => true,
		"rewrite" => [ "slug" => "e-newsletter", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "e-newsletter", $args );

	/**
	 * Post Type: Download.
	 */

	$labels = [
		"name" => esc_html__( "Download", "yp-core" ),
		"singular_name" => esc_html__( "Download", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "Download", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "downloads", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-download",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_downloadmanager", $args );

	/**
	 * Post Type: E-Book.
	 */

	$labels = [
		"name" => esc_html__( "E-Book", "yp-core" ),
		"singular_name" => esc_html__( "E-Book", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "E-Book", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-ebooks", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book-alt",
		"supports" => [ "title", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_ebook", $args );

	/**
	 * Post Type: Photos.
	 */

	$labels = [
		"name" => esc_html__( "Photos", "yp-core" ),
		"singular_name" => esc_html__( "Photos", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "Photos", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-photos", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-image",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_photos", $args );

	/**
	 * Post Type: Videos.
	 */

	$labels = [
		"name" => esc_html__( "Videos", "yp-core" ),
		"singular_name" => esc_html__( "Videos", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "Videos", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-videos", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_videos", $args );

	/**
	 * Post Type: Weblinks.
	 */

	$labels = [
		"name" => esc_html__( "Weblinks", "yp-core" ),
		"singular_name" => esc_html__( "Weblinks", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "Weblinks", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-weblink", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-download",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_weblink", $args );

	/**
	 * Post Type: RSS.
	 */

	$labels = [
		"name" => esc_html__( "RSS", "yp-core" ),
		"singular_name" => esc_html__( "RSS", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "RSS", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-rss", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-download",
		"supports" => [ "title", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_rss", $args );

	/**
	 * Post Type: Publications.
	 */

	$labels = [
		"name" => esc_html__( "Publications", "yp-core" ),
		"singular_name" => esc_html__( "Publications", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "Publications", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-publications", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-download",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_publications", $args );

	/**
	 * Post Type: FAQs.
	 */

	$labels = [
		"name" => esc_html__( "FAQs", "yp-core" ),
		"singular_name" => esc_html__( "FAQs", "yp-core" ),
	];

	$args = [
		"label" => esc_html__( "FAQs", "yp-core" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cri-faqs", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-download",
		"supports" => [ "title", "editor" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vc_faqs", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



 ?>
