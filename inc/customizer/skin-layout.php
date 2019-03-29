<?php
$section = 'acorn_skin_layout_section';

Kirki::add_section( $section, array(
	'title'          => esc_html__( 'Layout', 'acorn' ),
	'description'    => esc_html__( 'My section description.', 'acorn' ),
	'panel'          => 'skin_panel',
	'priority'       => 10,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'radio',
	'settings'    => 'skin_layout_option',
	'label'       => esc_html__( 'Layout Options', 'acorn' ),
	'section'     => $section,
	'default'     => 'skin',
	'priority'    => 10,
	'choices'     => [
		'skin'   => esc_html__( 'Use layout from skin', 'acorn' ),
		'custom' => esc_html__( 'Customize layout', 'acorn' ),
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'radio',
	'settings'    => 'skin_layout_basic',
	'label'       => esc_html__( 'Layout', 'acorn' ),
	'description'    => esc_html__( 'This will set the general layout of the website. If you decide on a boxed layout, you can still create full width pages on a per-page basis.', 'acorn' ),
	'section'     => $section,
	'default'     => 'full',
	'priority'    => 10,
	'choices'     => [
		'full' => esc_html__( 'Full', 'acorn' ),
		'box'  => esc_html__( 'Boxed', 'acorn' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'skin_layout_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'slider',
	'settings'    => 'skin_layout_boxed_width',
	'label'       => esc_html__( 'Max width', 'acorn' ),
	'section'     => $section,
	'default'     => 900,
	'choices'     => [
		'min'  => 750,
		'max'  => 1600,
		'step' => 1,
	],
	'active_callback'  => [
		[
			'setting'  => 'skin_layout_option',
			'operator' => '===',
			'value'    => 'custom',
		],
		[
			'setting'  => 'skin_layout_basic',
			'operator' => '===',
			'value'    => 'box',
		]
	],
] );
