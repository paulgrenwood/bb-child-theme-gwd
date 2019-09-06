<?php
	
function gwstandard_echo_valid_weight( $val ){
	if( isset( $val ) && !empty( $val ) ){
		echo 'font-weight:' . $val . ';';
	}
}

add_action( 'wp_head', 'gwstandard_customize_css' );
add_action( 'admin_head', 'gwstandard_customize_css' );
add_action( 'fl_head', 'gwstandard_customize_css' );
/*
 * Output our custom Accent Color setting CSS Style
 *
 */
function gwstandard_customize_css() {
    ?>
         <style type="text/css">
             h2 { 
	             color:<?php echo get_theme_mod( 'gwstandard_h2_color', '#4a4a4a' )?>;
	             <?php gwstandard_echo_valid_weight( get_theme_mod('gwstandard_h2_weight', '' ) ); ?> 
	         }
             h3 { 
	             color:<?php echo get_theme_mod( 'gwstandard_h3_color', '#4a4a4a' )?>;
	             <?php gwstandard_echo_valid_weight( get_theme_mod('gwstandard_h3_weight', '' ) ); ?> 
	         }
             h4 { 
	             color:<?php echo get_theme_mod( 'gwstandard_h4_color', '#4a4a4a' )?>;
	             <?php gwstandard_echo_valid_weight( get_theme_mod('gwstandard_h4_weight', '' ) ); ?> 
	         }
             h5 { 
	             color:<?php echo get_theme_mod( 'gwstandard_h5_color', '#4a4a4a' )?>;
	             <?php gwstandard_echo_valid_weight( get_theme_mod('gwstandard_h5_weight', '' ) ); ?> 
             }
             h6 { 
	             color:<?php echo get_theme_mod( 'gwstandard_h6_color', '#4a4a4a' )?>;
	             <?php gwstandard_echo_valid_weight( get_theme_mod('gwstandard_h6_weight', '' ) ); ?> 
	         }
	         
	         p{
		         margin-bottom:<?php echo get_theme_mod( 'gwstandard_body-font_margin-bottom', '10' )?>px;
	         }
	         
	         li{
		         line-height:<?php echo get_theme_mod( 'fl-body-line-height', '1.4' )?>;
		         margin-bottom:<?php echo get_theme_mod( 'gwstandard_body-font_margin-bottom', '10' )?>px;
	         }
	         
	         .gwd_fl-rich-text_intro-text > p,
	         .gwd_fl-rich-text_intro-text li,
	         p.intro_text{
		         font-size:<?php echo get_theme_mod( 'gwstandard_intro-text_font-size', '18' )?>px;
		         line-height:<?php echo get_theme_mod( 'gwstandard_intro-text_line-height', '1.6')?>;
		         margin-bottom:<?php echo get_theme_mod( 'gwstandard_intro-text_margin-bottom', '18')?>px;
	         }
	         
	         .gwd_fl-rich-text_secondary-intro > p,
	         .gwd_fl-rich-text_secondary-intro li,
	         p.intro_text_alt{
		         font-size:<?php echo get_theme_mod( 'gwstandard_secondary-intro_font-size', '20' )?>px;
		         line-height:<?php echo get_theme_mod( 'gwstandard_secondary-intro_line-height', '1.6')?>;
		         margin-bottom:<?php echo get_theme_mod( 'gwstandard_secondary-intro_margin-bottom', '20')?>px;
	         }
	         
	         .gwd_fl-rich-text_small-text > p,
	         .gwd_fl-rich-text_small-text li,
	         small,
	         p.small_text{
		         font-size:<?php echo get_theme_mod( 'gwstandard_small-text_font-size', '14' )?>px;
		         line-height:<?php echo get_theme_mod( 'gwstandard_small-text_line-height', '1.2')?>;
		         margin-bottom:<?php echo get_theme_mod( 'gwstandard_small-text_margin-bottom', '10')?>px;
	         }
         </style>
    <?php
}