<?php
	$setting_theme = get_field('setting_theme', 'option');

	require_once('theme-1/theme-1.php');


	// switch ($setting_theme) {
	// 	case 'one':
	// 		require_once('theme-1/theme-1.php');
	// 	  break;
	// 	case 'two':
	// 		require_once('theme-2/theme-2.php');
	// 	  break;
	// 	case 'three':
	// 		require_once('theme-3/theme-3.php');
	// 	  break;
	// 	case 'four':
	// 		require_once('theme-4/theme-4.php');
	// 	  break;
	// 	case 'five':
	// 		require_once('theme-5/theme-5.php');
	// 	  break;
	// 	case 'six':
	// 		require_once('theme-6/theme-6.php');
	// 	  break;
	// 	case 'seven':
	// 		require_once('theme-7/theme-7.php');
	// 	  break;
	// 	case 'eight':
	// 		require_once('theme-8/theme-8.php');
	// 	  break;
	// 	case 'nine':
	// 		require_once('theme-9/theme-9.php');
	// 	  break;
	// 	case 'ten':
	// 		require_once('theme-10/theme-10.php');
	// 	  break;
	// 	case 'eleven':
	// 		require_once('theme-11/theme-11.php');
	// 	  break;
	// 	default:
	// 		require_once('theme-1/theme-1.php');
	// 	  break;
	//   }

function source_style() {
	wp_enqueue_style( 'theme-core-css', get_stylesheet_directory_uri() . '/theme-core/theme-core.css', array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'theme-accessibility', get_stylesheet_directory_uri() . '/theme-core/theme-accessibility.css', array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_script( 'theme-core-js', get_stylesheet_directory_uri() . '/theme-core/theme-core.js', array('jquery'), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_script( 'cookie-js', get_stylesheet_directory_uri() . '/theme-core/cookie-js/js.cookie.min.js' , array('jquery'), wp_get_theme()->get( 'Version' ), 'all');
}
add_action( 'wp_enqueue_scripts', 'source_style' , 20 );




function header_fuc(){
				get_header('main-1');

	// $setting_theme = get_field('setting_theme', 'option');
	//
	// switch ($setting_theme) {
	// 	case 'one':
	// 		get_header('main-1');
	// 	  break;
	// 	case 'two':
	// 		get_header('main-2');
	// 	  break;
	// 	case 'three':
	// 		get_header('main-3');
	// 	  break;
	// 	case 'four':
	// 		get_header('main-4');
	// 	  break;
	// 	case 'five':
	// 		get_header('main-5');
	// 	  break;
	// 	case 'six':
	// 		get_header('main-6');
	// 	  break;
	// 	case 'seven':
	// 		get_header('main-7');
	// 	  break;
	// 	case 'eight':
	// 		get_header('main-8');
	// 	  break;
	// 	case 'nine':
	// 		get_header('main-9');
	// 	  break;
	// 	case 'ten':
	// 		get_header('main-10');
	// 	  break;
	// 	case 'eleven':
	// 		get_header('main-11');
	// 	  break;
	// 	default:
	// 		get_header('main-1');
	// 	  break;
	//   }
}
function footer_fuc(){
				get_footer('main-1');
	// 	$setting_theme = get_field('setting_theme', 'option');
	// switch ($setting_theme) {
	// 	case 'one':
	// 		get_footer('main-1');
	// 	  break;
	// 	case 'two':
	// 		get_footer('main-2');
	// 	  break;
	// 	case 'three':
	// 		get_footer('main-3');
	// 	  break;
	// 	case 'four':
	// 		get_footer('main-4');
	// 	  break;
	// 	case 'five':
	// 		get_footer('main-5');
	// 	  break;
	// 	case 'six':
	// 		get_footer('main-6');
	// 	  break;
	// 	case 'seven':
	// 		get_footer('main-7');
	// 	  break;
	// 	case 'eight':
	// 		get_footer('main-8');
	// 	  break;
	// 	case 'nine':
	// 		get_footer('main-9');
	// 	  break;
	// 	case 'ten':
	// 		get_footer('main-10');
	// 	  break;
	// 	case 'eleven':
	// 		get_footer('main-11');
	// 	  break;
	// 	default:
	// 		get_footer('main-1');
	// 	  break;
	//   }
}

?>
