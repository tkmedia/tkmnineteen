<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dcef283185cd',
	'title' => 'Styled Title Block',
	'fields' => array(
		array(
			'key' => 'field_5dcef344f8dec',
			'label' => 'Content',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5dcef358f8ded',
			'label' => 'Title style',
			'name' => 'st_tp',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'choices' => array(
				'split' => 'Split',
				'clean' => 'Clean',
				'clean-underline' => 'Clean Underline',
				'clean-sideline' => 'Clean Sideline',
				'box' => 'Box',
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
			'key' => 'field_5dcef40af8dee',
			'label' => 'Title type heading',
			'name' => 'st_h',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'choices' => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h1' => 'h1',
				'p' => 'p',
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
			'key' => 'field_5dcef839c5fab',
			'label' => 'The title (first part)',
			'name' => 'st_fr',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcef84bc5fac',
			'label' => 'The title (second part)',
			'name' => 'st_lt',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcef81fc5faa',
			'label' => 'Pre title - above',
			'name' => 'st_pt',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcef859c5fad',
			'label' => 'Intro',
			'name' => 'st_in',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dcef60cf8df8',
			'label' => 'Design',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5dcef467f8def',
			'label' => 'Title Font size',
			'name' => 'st_sz',
			'type' => 'range',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => 32,
			'min' => 17,
			'max' => 100,
			'step' => 1,
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5dcef51df8df1',
			'label' => 'Font size - second part',
			'name' => 'st_ssz',
			'type' => 'range',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'split',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => 20,
			'min' => 17,
			'max' => 100,
			'step' => 1,
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5dcef4d4f8df0',
			'label' => 'Title Alignment',
			'name' => 'st_al',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'Split',
					),
				),
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'Clean',
					),
				),
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'Clean Underline',
					),
				),
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'Clean Sideline',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'choices' => array(
				'center' => 'center',
				'strat' => 'strat',
				'end' => 'end',
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
			'key' => 'field_5dcef5b3f8df5',
			'label' => 'Title color',
			'name' => 'st_cl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
		array(
			'key' => 'field_5dcef5d7f8df6',
			'label' => 'Title Background color',
			'name' => 'st_bcl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'split',
					),
				),
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'split',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
		array(
			'key' => 'field_5dcef77dc5fa5',
			'label' => 'Title color - second part',
			'name' => 'st_scl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'split',
					),
				),
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'clean',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
		array(
			'key' => 'field_5dcef7a8c5fa7',
			'label' => 'Title Background color - second part',
			'name' => 'st_sbcl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dcef358f8ded',
						'operator' => '==',
						'value' => 'split',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
		array(
			'key' => 'field_5dcef7c6c5fa8',
			'label' => 'Pre Title color',
			'name' => 'st_pcl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
		array(
			'key' => 'field_5dcef806c5fa9',
			'label' => 'Intro text color',
			'name' => 'st_incl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'default_value' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/tkmb-style-title',
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
	'modified' => 1574003530,
));

endif;