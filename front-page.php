<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header(); ?>

	<?php 
	get_template_part( 'modules/hero' ); ?>

	<?php 
	get_template_part( 'modules/ranking' ); ?>

	<?php 
	get_template_part( 'modules/blurb' ); ?>

	<?php 
	get_template_part( 'modules/buckets' ); ?>

	<?php 
	get_template_part( 'modules/blurb' ); ?>

	<?php 
	get_template_part( 'modules/cta' ); ?>

	<?php 
	get_template_part( 'modules/buckets' ); ?>

	<?php 
	get_template_part( 'modules/work' ); ?>

	<?php 
	get_template_part( 'modules/map' ); ?>

<?php
get_footer();
