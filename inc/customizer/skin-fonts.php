<?php

$section = 'acorn_skin_fonts_section';

Kirki::add_section( $section, array(
	'title'          => esc_html__( 'Fonts', 'acorn' ),
	'description'    => esc_html__( 'My section description.', 'acorn' ),
	'panel'          => 'skin_panel',
	'priority'       => 10,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'radio',
	'settings'    => 'skin_font_option',
	'label'       => esc_html__( 'Typograpy Options', 'acorn' ),
	'section'     => $section,
	'default'     => 'skin',
	'priority'    => 10,
	'choices'     => [
		'skin'   => esc_html__( 'Use font system from skin', 'acorn' ),
		'simple' => esc_html__( 'Select from predifined font systems', 'acorn' ),
		'basic'  => esc_html__( 'Basic font customization', 'acorn' ),
		'custom' => esc_html__( 'Create custom font system', 'acorn' ),
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'radio',
	'settings'    => 'skin_font_basic',
	'label'       => esc_html__( 'Radio Control', 'acorn' ),
	'section'     => $section,
	'default'     => 'one',
	'priority'    => 10,
	'choices'     => [
		'one' => esc_html__( 'Set One', 'acorn' ),
		'two' => esc_html__( 'Set Two', 'acorn' ),
		'thr' => esc_html__( 'Set Three', 'acorn' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'simple',
		]
	],
] );


Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_body',
	'label'       => esc_html__( 'body', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'sans-serif',
		'variant'        => '400',
		'font-size'      => '1rem',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#212529',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h1',
	'label'       => esc_html__( 'H1', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '2.5rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h1',
		],
		[
			'element' => '.h1',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h2',
	'label'       => esc_html__( 'H2', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '2rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h2',
		],
		[
			'element' => '.h2',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h3',
	'label'       => esc_html__( 'H3', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '1.75rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h3',
		],
		[
			'element' => '.h3',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h4',
	'label'       => esc_html__( 'H4', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '1.5rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h4',
		],
		[
			'element' => '.h4',
		],
	],
] );
Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h5',
	'label'       => esc_html__( 'H5', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '1.25rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h5',
		],
		[
			'element' => '.h5',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'typography',
	'settings'    => 'skin_font_h6',
	'label'       => esc_html__( 'H6', 'acorn' ),
	'section'     => $section,
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '1rem',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
	//	'color'          => '#333333',
		'text-transform' => 'none',
	//	'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'active_callback'  => [
		[
			'setting'  => 'skin_font_option',
			'operator' => '===',
			'value'    => 'custom',
		]
	],
	'output'      => [
		[
			'element' => 'h6',
		],
		[
			'element' => '.h6',
		],
	],
] );


