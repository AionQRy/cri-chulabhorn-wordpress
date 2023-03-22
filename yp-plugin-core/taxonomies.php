<?php
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Download Category.
	 */

	$labels = [
		"name" => esc_html__( "Download Category", "yp-core" ),
		"singular_name" => esc_html__( "Download Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Download Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'download-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_download_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_download_category", [ "vc_downloadmanager" ], $args );

	/**
	 * Taxonomy: Photos Category.
	 */

	$labels = [
		"name" => esc_html__( "Photos Category", "yp-core" ),
		"singular_name" => esc_html__( "Photos Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Photos Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'photos-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_photo_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_photo_category", [ "vc_photos" ], $args );

	/**
	 * Taxonomy: Videos Category.
	 */

	$labels = [
		"name" => esc_html__( "Videos Category", "yp-core" ),
		"singular_name" => esc_html__( "Videos Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Videos Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'videos-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_video_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_video_category", [ "vc_videos" ], $args );

	/**
	 * Taxonomy: Photos Tags.
	 */

	$labels = [
		"name" => esc_html__( "Photos Tags", "yp-core" ),
		"singular_name" => esc_html__( "Photos Tags", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Photos Tags", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'photo-tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_photo_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_photo_tags", [ "vc_photos" ], $args );

	/**
	 * Taxonomy: Videos Tags.
	 */

	$labels = [
		"name" => esc_html__( "Videos Tags", "yp-core" ),
		"singular_name" => esc_html__( "Videos Tags", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Videos Tags", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video-tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_video_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_video_tags", [ "vc_videos" ], $args );

	/**
	 * Taxonomy: Download Tags.
	 */

	$labels = [
		"name" => esc_html__( "Download Tags", "yp-core" ),
		"singular_name" => esc_html__( "Download Tags", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Download Tags", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'download-tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_download_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_download_tags", [ "vc_downloadmanager" ], $args );

	/**
	 * Taxonomy: RSS Category.
	 */

	$labels = [
		"name" => esc_html__( "RSS Category", "yp-core" ),
		"singular_name" => esc_html__( "RSS Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "RSS Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'rss-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "rss_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "rss_category", [ "vc_rss" ], $args );

	/**
	 * Taxonomy: E-Book Category.
	 */

	$labels = [
		"name" => esc_html__( "E-Book Category", "yp-core" ),
		"singular_name" => esc_html__( "E-Book Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "E-Book Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'e-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_ebook_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_ebook_category", [ "vc_ebook" ], $args );

	/**
	 * Taxonomy: E-Book Tags.
	 */

	$labels = [
		"name" => esc_html__( "E-Book Tags", "yp-core" ),
		"singular_name" => esc_html__( "E-book Tags", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "E-Book Tags", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'ebook-tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_ebook_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_ebook_tags", [ "vc_ebook" ], $args );

	/**
	 * Taxonomy: Weblink Category.
	 */

	$labels = [
		"name" => esc_html__( "Weblink Category", "yp-core" ),
		"singular_name" => esc_html__( "Weblink Category", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Weblink Category", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'weblink-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_weblink_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_weblink_category", [ "vc_weblink" ], $args );

	/**
	 * Taxonomy: Publications Laboratory.
	 */

	$labels = [
		"name" => esc_html__( "Publications Laboratory", "yp-core" ),
		"singular_name" => esc_html__( "Publications Laboratory", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Publications Laboratory", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'publications_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_publications_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_publications_category", [ "vc_publications" ], $args );

	/**
	 * Taxonomy: Publications Year.
	 */

	$labels = [
		"name" => esc_html__( "Publications Year", "yp-core" ),
		"singular_name" => esc_html__( "Publications Year", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "Publications Year", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'publications_year', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_publications_year",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_publications_year", [ "vc_publications" ], $args );

	/**
	 * Taxonomy: FAQs Categories.
	 */

	$labels = [
		"name" => esc_html__( "FAQs Categories", "yp-core" ),
		"singular_name" => esc_html__( "FAQs Categories", "yp-core" ),
	];


	$args = [
		"label" => esc_html__( "FAQs Categories", "yp-core" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'faqs-category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "vc_faqs_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vc_faqs_category", [ "vc_faqs" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

 ?>
