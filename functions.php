<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Customizer Additions
require_once 'customizer/customizer-settings.php';
require_once 'customizer/customizer-css-wphead.php';
require_once 'gravityforms.php';

// Enable Font Awesome 5 Pro
add_filter( 'fl_enable_fa5_pro', '__return_true' );

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

//Year Shortcode
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');

/*
add_filter( 'fl_theme_compile_less_paths', function( $paths ){
    $paths[] = FL_CHILD_THEME_DIR . '/less/paul-customizer.less';

   return $paths;
});

add_filter( 'fl_less_vars', function( $vars ) {
  $mods = FLCustomizer::get_mods();
  
  $vars[ 'gwstandard_h2_color','gwstandard_h3_color','gwstandard_h4_color','gwstandard_h5_color','gwstandard_h6_color' ] = $mods[ 'gwstandard_h2_color','gwstandard_h3_color','gwstandard_h4_color','gwstandard_h5_color','gwstandard_h6_color' ];
  
  for( $h = 1; $h <= 6; $h++ ){
	  $current_mod = $mods['gwstandard_h' . $h . '_weight'];
	  if( isset( $current_mod ) && !empty( $current_mod ) ){
		  $vars['gwstandard_h' . $h . '_weight'] = $current_mod;
	  }else{
		  $vars['gwstandard_h' . $h . '_weight'] = $mods['heading_weight'];
	  }
  }
  
  $vars[ 'gwstandard_body-font_margin-bottom','gwstandard_intro-text_font-size','gwstandard_intro-text_line-height','gwstandard_intro-text_margin-bottom','gwstandard_secondary-intro_font-size','gwstandard_secondary-intro_line-height','gwstandard_secondary-intro_margin-bottom','gwstandard_small-text_font-size','gwstandard_small-text_line-height','gwstandard_small-text_margin-bottom'] = $mods[ 'gwstandard_body-font_margin-bottom','gwstandard_intro-text_font-size','gwstandard_intro-text_line-height','gwstandard_intro-text_margin-bottom','gwstandard_secondary-intro_font-size','gwstandard_secondary-intro_line-height','gwstandard_secondary-intro_margin-bottom','gwstandard_small-text_font-size','gwstandard_small-text_line-height','gwstandard_small-text_margin-bottom'];

  return $vars;
});
*/

//Enqueue Font Awesome Locally
/*
add_action( 'wp_enqueue_scripts', function() {
    global $wp_styles;
    if ( isset( $wp_styles->queue ) ) {
        foreach ( $wp_styles->queue as $key => $handle ) {
            if ( 'font-awesome-5' === $handle ) {
                if ( is_dir( ABSPATH . '/fonts/fontawesome' ) ) {
                    $wp_styles->registered[ $handle ]->src = site_url( 'fonts/fontawesome/css/fontawesome.min.css');
                }
            }
        }
    }
}, 11 );
*/