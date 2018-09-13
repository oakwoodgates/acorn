<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acorn
 */

get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<?php get_template_part( 'template-parts/header' ); ?>

	<div id="content" class="site-content">
