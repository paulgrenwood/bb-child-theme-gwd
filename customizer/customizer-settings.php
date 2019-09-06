<?php

add_action('customize_register','gwstandard_customizer_options', 12);

function gwstandard_customizer_options( $wp_customize ){
	
	$wp_customize->remove_panel( 'fl-header' );
	$wp_customize->remove_panel( 'fl-footer' );
	
/*
	foreach ($wp_customize->sections() as $section_key => $section_object ) {
	  var_dump( $section_key );
	}
*/


	/*
	===
	HEADING CONTROLS
	===
	*/
	
	//H2 - SETTINGS
	$wp_customize->add_setting(
		'gwstandard_h2_color',
		array(
			'default' => '#4a4a4a',
		)
	);
	//H2 - CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gwstandard_h2_color',
			array(
				'label'		=> __( 'H2 Color', 'gwstandard' ),
				'section'	=> 'fl-heading-font',
				'settings'	=> 'gwstandard_h2_color'		
			)
		)
	);
	
	
	//H3 - SETTINGS
	$wp_customize->add_setting(
		'gwstandard_h3_color',
		array(
			'default' => '#4a4a4a',
		)
	);
	
	//H3 - CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gwstandard_h3_color',
			array(
				'label'		=> __( 'H3 Color', 'gwstandard' ),
				'section'	=> 'fl-heading-font',
				'settings'	=> 'gwstandard_h3_color'		
			)
		)
	);
	
	
	//H4 - SETTINGS
	$wp_customize->add_setting(
		'gwstandard_h4_color',
		array(
			'default' => '#4a4a4a',
		)
	);
	
	//H4 - CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gwstandard_h4_color',
			array(
				'label'		=> __( 'H4 Color', 'gwstandard' ),
				'section'	=> 'fl-heading-font',
				'settings'	=> 'gwstandard_h4_color'		
			)
		)
	);
	
	
	//H5 - SETTINGS
	$wp_customize->add_setting(
		'gwstandard_h5_color',
		array(
			'default' => '#4a4a4a',
		)
	);
	
	//H5 - CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gwstandard_h5_color',
			array(
				'label'		=> __( 'H5 Color', 'gwstandard' ),
				'section'	=> 'fl-heading-font',
				'settings'	=> 'gwstandard_h5_color'		
			)
		)
	);
	
	//H6 - SETTINGS
	$wp_customize->add_setting(
		'gwstandard_h6_color',
		array(
			'default' => '#4a4a4a',
		)
	);
	
	//H6 - CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gwstandard_h6_color',
			array(
				'label'		=> __( 'H6 Color', 'gwstandard' ),
				'section'	=> 'fl-heading-font',
				'settings'	=> 'gwstandard_h6_color'		
			)
		)
	);
	
	/*
	===
	INTRO / SMALL TEXT
	===
	*/
	
	//INTRO TEXT FONT SIZE - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__intro_text__font_size',
		array(
			'default' => '18',
			'transport' => 'postMessage'
		)
	);
	//INTRO TEXT FONT SIZE - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__intro_text__font_size',
			array(
				'label'		=> __('Intro Text Font Size', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				)
			)
		)
	);
	
	//PARAGRAPH - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__body_font__margin_bottom',
		array(
			'default' => '10',
			'transport' => 'postMessage'
		)
	);
	//PARAGRAPH - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__body_font__margin_bottom',
			array(
				'label'		=> __( 'Paragraph Margin Bottom', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 0,
					'max'	=> 100,
					'step'	=> 1
				)
			)
		)
	);
	
	
	//INTRO TEXT LINE HEIGHT - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__intro_text__line_height',
		array(
			'default' => '1.6',
			'transport' => 'postMessage'
		)
	);
	
	//INTRO TEXT LINE HEIGHT - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__intro_text__line_height',
			array(
				'label'		=> __('Intro Text Line Height', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 1,
					'max'	=> 2.5,
					'step'	=> 0.05
				)
			)
		)
	);
	
	//INTRO TEXT MARGIN BOTTOM - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__intro_text__margin_bottom',
		array(
			'default' => '18',
			'transport' => 'postMessage'
		)
	);
	
	//INTRO TEXT MARGIN BOTTOM - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__intro_text__margin_bottom',
			array(
				'label'		=> __( 'Intro Text Margin Bottom', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 0,
					'max'	=> 100,
					'step'	=> 1
				)
			)
		)
	);
	
	
	//SECONDARY INTRO FONT SIZE - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__secondary_intro__font_size',
		array(
			'default' => '20',
			'transport' => 'postMessage'
		)	
	);
	
	//SECONDARY INTRO FONT SIZE - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__secondary_intro__font_size',
			array(
				'label'		=> __('Secondary Intro Font Size', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				)
			)
		)
	);
	
	//SECONDARY INTRO LINE HEIGHT - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__secondary_intro__line_height',
		array(
			'default' => '1.6',
			'transport' => 'postMessage'
		)
	);
	
	//SECONDARY INTRO LINE HEIGHT - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__secondary_intro__line_height',
			array(
				'label'		=> __('Secondary Intro Line Height', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 1,
					'max'	=> 2.5,
					'step'	=> 0.05
				)
			)
		)
	);
	
	//SECONDARY INTRO MARGIN BOTTOM - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__secondary_intro__margin_bottom',
		array(
			'default' => '20',
			'transport' => 'postMessage'
		)
	);
	
	//SECONDARY INTRO MARGIN BOTTOM - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__secondary_intro__margin_bottom',
			array(
				'label'		=> __( 'Secondary Intro Margin Bottom', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 0,
					'max'	=> 100,
					'step'	=> 1
				)
			)
		)
	);
	
	
	//SMALL TEXT FONT SIZE - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__small_text__font_size',
		array(
			'default' => '14',
			'transport' => 'postMessage'
		)
	);
	
	//SMALL TEXT FONT SIZE - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__small_text__font_size',
			array(
				'label'		=> __('Small Text Font Size', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				)
			)
		)
	);
		
	//SMALL TEXT LINE HEIGHT - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__small_text__line_height',
		array(
			'default' => '1.2',
			'transport' => 'postMessage'
		)
	);
	
	//SMALL TEXT LINE HEIGHT - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__small_text__line_height',
			array(
				'label'		=> __('Small Text Line Height', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 1,
					'max'	=> 2.5,
					'step'	=> 0.05
				)
			)
		)
	);
	
	
	//SMALL TEXT MARGIN BOTTOM - SETTINGS
	$wp_customize->add_setting(
		'gwstandard__small_text__margin_bottom',
		array(
			'default' => '10',
			'transport' => 'postMessage'
		)
	);
	
	//SMALL TEXT MARGIN BOTTOM - CONTROLS
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'gwstandard__small_text__margin_bottom',
			array(
				'label'		=> __( 'Small Text Margin Bottom', 'gwstandard' ),
				'type'		=> 'slider',
				'section'	=> 'fl-body-font',
				'choices'	=> array(
					'min'	=> 0,
					'max'	=> 100,
					'step'	=> 1
				)
			)
		)
	);
	
	
	/*
	===
	HEADING / TEXT MARGINS
	===
	*/
	
/*
	FLCustomizer::add_section( 'fl-margins', array(
			'title'		=> _x( 'Margins', 'Heading / Paragraph Margins', 'gwstandard' ),
			'panel'		=> 'fl-general',
			'options'	=> array(
				'margin-p-bottom' 	=> array(
					'setting'		=> array(
						'default'	=> '',
						'transport'	=> 'postMessage'
					),
					'control'		=> array(
						'class'		=> 'FLCustomizerControl',
						'label'		=> __('Paragraph Margin Bottom', 'gwstandard'),
						'type'		=> 'slider',
						'choices'	=> array(
							'min'	=> -30,
							'max'	=> 100,
							'step'	=> 1
						)
					)
				)
			)
		)
	);
*/
	
/*
	$paragraph_margins = 'slide-type' => array(
		'setting'	=> array(
			'default'	=> '10',
			'transport'	=> 'postMessage'
		),
		'control'	=> array(
			'class'		=> 'FLCustomizerControl',
			'label'		=> __('Paragraph Margin Bottom', 'gwstandard'),
			'type'		=> 'slider',
			'choices'	=> array(
				'min'	=> 0,
				'max'	=> 100,
				'step'	=> 1
			)
		),
	);
*/
/*
	$wp_customize->add_setting(
		'gwstandard_h4_margin-bottom',
		array(
			'default' => '10',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
		new FLCustomizerControl( $wp_customize, 'gwstandard_h4_margin-bottom', array(
			'label'			=> __( 'H4 Margin Bottom', 'gwstandard' ),
			'section'		=> 'fl-heading-font',
			'settings'		=> 'gwstandard_h4_margin-bottom',
			'type'			=> 'slider',
			'choices'		=> array(
				'min'		=> 0,
				'max'		=> 50,
				'step'		=> 1
			)
		));
	);
*/
}

// Google Fonts filter callback function
function fl_google_fonts_callback( $fonts ) {
	var_dump('FL GOOGLE FONTS CALLBACK');
	var_dump('==========');
	var_dump( $fonts );
    // (maybe) modify $string
    return $fonts;
}
//add_filter( 'fl_theme_google_fonts', 'fl_google_fonts_callback', 10, 3 );
//apply_filters( 'fl_theme_google_fonts', $fonts );

function my_font_subset( $subset, $font ) {
	//var_dump( $fc );
	var_dump( $font );
	//var_dump( '==========' );
	//var_dump( $subset );
    if ( $font == 'Bitter' ) {
	    var_dump( 'BITTER' );
        $subset = '&subset=latin,latin-ext';
    }
    //$fc++;
    //return $subset;
}
//add_filter( 'fl_font_subset', 'my_font_subset', 10, 2 );

function fl_google_json( $json ){
	var_dump( $json );
	return $json;
}
//add_filter( 'fl_theme_get_google_json', 'fl_google_json', 10, 2 );
?>