<?php
function gym_page_metabox( $meta_boxes ) {

	$gym_prefix = '_gym_';
	$meta_boxes[] = array(
		'id'        => 'gym_metaboxes',
		'title'     => esc_html__( 'Breadcrumb Options', 'gym-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $gym_prefix . 'header-background',
				'type'  => 'background',
				'name'  => esc_html__( 'Set The Header Background', 'gym-companion' ),
			),
			array(
				'id'    => $gym_prefix . 'header-text',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Header Text', 'gym-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'gym_page_metabox' );
