<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5de62e9bd0234',
	'title' => 'Page Grid Block',
	'fields' => array(
		array(
			'key' => 'field_5de62f3b00275',
			'label' => 'Boxes in row',
			'name' => 'pg_cu',
			'type' => 'number',
			'instructions' => '1-8',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => 3,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 8,
			'step' => 1,
		),
		array(
			'key' => 'field_5de62f6a00276',
			'label' => 'Image size',
			'name' => 'pg_ims',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'choices' => array(
				'inside-post' => 'Cut 620x425',
				'500c' => 'Cut 500px',
				'block-300' => 'Cut 300px',
				'portrait' => 'Cut Portrait',
				'full' => 'No cut = full size',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5de62f8b00277',
			'label' => 'Choose pages',
			'name' => 'pg_g',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'filters' => array(
				0 => 'search',
				1 => 'post_type',
				2 => 'taxonomy',
			),
			'elements' => array(
				0 => 'featured_image',
			),
			'min' => '',
			'max' => '',
			'return_format' => 'object',
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/tkmb-page-grid',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_permissions' => '',
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1575366564,
));

endif;