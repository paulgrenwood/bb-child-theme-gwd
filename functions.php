<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Customizer Additions
require_once 'customizer/customizer-settings.php';
//require_once 'customizer/customizer-css-wphead.php';
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
add_shortcode('YEAR', 'year_shortcode');

add_filter( 'fl_theme_compile_less_paths', function( $paths ){
    $paths[] = get_stylesheet_directory() . '/less/gwd-customizer.less';

   return $paths;
});

add_filter( 'fl_less_vars', function( $vars ) {
  $mods = FLCustomizer::get_mods();
  
  for( $h = 2; $h <= 6; $h++ ){
	  $vars['gwstandard_h' . $h . '_color'] = $mods['gwstandard_h' . $h . '_color'] ?: '#4a4a4a';
  }
  
    $vars['gwstandard__body_font__margin_bottom'] = $mods['gwstandard__body_font__margin_bottom'] ?: 10;
    $vars['gwstandard__intro_text__font_size'] = $mods['gwstandard__intro_text__font_size'] ?: 18;
	$vars['gwstandard__intro_text__line_height'] = $mods['gwstandard__intro_text__line_height'] ?: 1.6;
	$vars['gwstandard__intro_text__margin_bottom'] = $mods['gwstandard__intro_text__margin_bottom'] ?: 18;
	$vars['gwstandard__secondary_intro__font_size'] = $mods['gwstandard__secondary_intro__font_size'] ?: 20;
	$vars['gwstandard__secondary_intro__line_height'] = $mods['gwstandard__secondary_intro__line_height'] ?: 1.6;
	$vars['gwstandard__secondary_intro__margin_bottom'] = $mods['gwstandard__secondary_intro__margin_bottom'] ?: 20;
	$vars['gwstandard__small_text__font_size'] = $mods['gwstandard__small_text__font_size'] ?: 14;
	$vars['gwstandard__small_text__line_height'] = $mods['gwstandard__small_text__line_height'] ?: 1.2;
	$vars['gwstandard__small_text__margin_bottom'] = $mods['gwstandard__small_text__margin_bottom'] ?: 10;

  return $vars;
});

// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'wpex_style_select' ) ) {
	function wpex_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'wpex_style_select' );

// Add new styles to the TinyMCE "formats" menu dropdown
if ( ! function_exists( 'wpex_styles_dropdown' ) ) {
	function wpex_styles_dropdown( $settings ) {

		// Create array of new styles
		$new_styles = array(
        	array(
            	'title' => 'Headings',
                'items' => array(
					array(
						'title' => 'Heading 1',
						'block' => 'h1'
					),
					array(
						'title' => 'Heading 2',
						'block' => 'h2'
					),
					array(
						'title' => 'Heading 3',
						'block' => 'h3'
					),
					array(
						'title' => 'Heading 4',
						'block' => 'h4'
					),
					array(
						'title' => 'Heading 5',
						'block' => 'h5'
					),
					array(
						'title' => 'Heading 6',
						'block' => 'h6'
					)
				)
			),
			array(
				'title' => 'Buttons',
				'items' => array(
					array(
						'title' => 'Primary Button',
						'selector' => 'a',
						'classes' => 'fl-button'
					),
					array(
						'title' => 'Primary Button (Small)',
						'selector' => 'a',
						'classes' => 'fl-button fl-button_small'
					),
					array(
						'title' => 'Ghost Button',
						'selector' => 'a',
						'classes' => 'fl-button fl-button_ghost'
					),
					array(
						'title' => 'Ghost Button (Small)',
						'selector' => 'a',
						'classes' => 'fl-button fl-button_ghost fl-button_small'
					)
				)
			),
			array(
				'title' => 'Text',
				'items' => array(
					array(
						'title' => 'Paragraph',
						'block' => 'p',
					),
					array(
						'title' => 'Intro Text',
						'block' => 'p',
						'classes' => 'intro_text'
					),
					array(
						'title' => 'Intro Text (Alt)',
						'block' => 'p',
						'classes' => 'intro_text_alt'
					),
					array(
						'title' => 'Small Text',
						'block' => 'p',
						'classes' => 'small_text'
					)
				)
			)
		);

		// Merge old & new styles
		$settings['style_formats_merge'] = true;

		// Add new styles
		$settings['style_formats'] = json_encode( $new_styles );

		// Return New Settings
		return $settings;

	}
}
add_filter( 'tiny_mce_before_init', 'wpex_styles_dropdown' );

// Hooks your functions into the correct filters
function gwd_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'gwd_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'gwd_register_mce_button' );
	}
}
add_action('admin_head', 'gwd_add_mce_button');

// Declare script for new button
function gwd_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['gwd_mce_button'] = get_stylesheet_directory_uri() .'/js/mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function gwd_register_mce_button( $buttons ) {
	array_push( $buttons, 'gwd_mce_button' );
	return $buttons;
}

add_filter('tiny_mce_before_init','gwd_editor_dynamic_styles');
function gwd_editor_dynamic_styles( $mceInit ) {
    $styles = 'body.mce-content-body .fl-button{background-color:#4a4a4a;color:#fff;padding:12px 24px;display:inline-block;text-decoration:none;border:2px solid #4a4a4a;border-radius:9999px}body.mce-content-body .fl-button:focus,body.mce-content-body .fl-button:hover{color:#4a4a4a;background-color:transparent}body.mce-content-body .fl-button.fl-button_ghost{color:#4a4a4a;background-color:transparent}body.mce-content-body .fl-button.fl-button_ghost:focus,body.mce-content-body .fl-button.fl-button_ghost:hover{background-color:#4a4a4a;color:#fff}body.mce-content-body .fl-button.fl-button_small{padding:5px 15px}body.mce-content-body p.intro_text{font-size:1.5em}body.mce-content-body p.intro_text_alt{font-size:1.25em}body.mce-content-body p.small_text{font-size:.75em}';
    if ( isset( $mceInit['content_style'] ) ) {
        $mceInit['content_style'] .= ' ' . $styles . ' ';
    } else {
        $mceInit['content_style'] = $styles . ' ';
    }
    return $mceInit;
}

/*function gwd_add_editor_styles() {
    add_editor_style( '../bb-theme-child/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'gwd_add_editor_styles' );*/
//add_filter('tiny_mce_before_init','wpdocs_theme_editor_dynamic_styles');


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