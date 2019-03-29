<?php
function acorn_skin_color_customizer( $settings = 'skin_color_primary', $default = '#0088CC' ) {
	return 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'skin_color_'.$settings,
		'label'       => __( $settings, 'acorn' ),
		'description' => esc_html__( 'This is a color control', 'acorn' ),
		'section'     => 'acorn_skin_colors_section',
		'default'     => $default,
	//	'choices'     => [
	//		'alpha' => true,
	//	],
		'active_callback'  => [
			[
				'setting'  => 'skin_color_palette_option',
				'operator' => '===',
				'value'    => 'custom',
			]
		],
	] );
}

function acorn_skin_color_customizer_section() {

	$section = 'acorn_skin_colors_section';

	Kirki::add_section( $section, array(
	    'title'          => esc_html__( 'Colors', 'acorn' ),
	    'description'    => esc_html__( 'My section description.', 'acorn' ),
	    'panel'          => 'skin_panel',
	    'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'radio',
		'settings'    => 'skin_color_palette_option',
		'label'       => esc_html__( 'Radio Control', 'acorn' ),
		'section'     => $section,
		'default'     => 'skin',
		'priority'    => 10,
		'choices'     => [
			'skin'   => esc_html__( 'Use color palette from skin', 'acorn' ),
			'basic'  => esc_html__( 'Select from premade color palettes', 'acorn' ),
			'custom' => esc_html__( 'Create custom color palette', 'acorn' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'palette',
		'settings'    => 'skin_color_palette',
		'label'       => esc_html__( 'Palette Control', 'acorn' ),
		'section'     => $section,
		'default'     => 'light',
		'priority'    => 10,
		'choices'     => [
			'light' => [
				'#007bff',
				'#e83e8c',
				'#fd7e14',
				'#20c997',
				'#17a2b8',
				'#ECEFF1',
				'#28a745',
				'#dc3545',
			],
			'dark' => [
				'#37474F',
				'#FFFFFF',
				'#F9A825',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'skin_color_palette_option',
				'operator' => '===',
				'value'    => 'basic',
			]
		],
	] );

//	acorn_skin_color_customizer( 'skin_primary' );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'skin_color_primary',
		'label'       => __( 'primary', 'acorn' ),
		'description' => esc_html__( 'This is a color control', 'acorn' ),
		'section'     => $section,
		'default'     => '#fff',
	//	'choices'     => [
	//		'alpha' => true,
	//	],
		'active_callback'  => [
			[
				'setting'  => 'skin_color_palette_option',
				'operator' => '===',
				'value'    => 'custom',
			]
		],
		'output' => array(
			array(
				'element'  => '.entry-title',
				'property' => 'color',
			),
		),
	] );
	acorn_skin_color_customizer( 'secondary' );
	acorn_skin_color_customizer( 'info' );
	acorn_skin_color_customizer( 'warning' );
	acorn_skin_color_customizer( 'danger' );
	acorn_skin_color_customizer( 'light' );
	acorn_skin_color_customizer( 'dark' );

}
acorn_skin_color_customizer_section();