<?php 

Kirki::add_panel( 'skin_panel', array(
	'priority'    => 30,
	'title'       => esc_html__( 'Skin', 'kirki' ),
	'description' => esc_html__( 'My panel description', 'kirki' ),
) );

Kirki::add_config( 'theme_config_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
