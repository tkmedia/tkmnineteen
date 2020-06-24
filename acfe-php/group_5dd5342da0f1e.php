<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dd5342da0f1e',
	'title' => 'Product Page',
	'fields' => array(
		array(
			'key' => 'field_5dd92be4e5c4c',
			'label' => 'Change product visual title',
			'name' => 'product_title',
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
			'key' => 'field_5dd92c02e5c4d',
			'label' => 'SubTitle',
			'name' => 'product_subtitle',
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
			'key' => 'field_5dd53441cff87',
			'label' => 'Product Tag',
			'name' => 'product_tag',
			'type' => 'text',
			'instructions' => 'Will show on main image in side ribbon',
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
			'key' => 'field_5ddaed05fc283',
			'label' => 'Product Tag Name',
			'name' => 'product_tagi',
			'type' => 'radio',
			'instructions' => 'Will show on main image in side ribbon',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'choices' => array(
				'sale' => 'Sale',
				'new' => 'New',
				'popular' => 'Popular',
				'out_stock' => 'Out of stock',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'array',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5ddaed68fc285',
			'label' => 'Product Tag sale number',
			'name' => 'product_tags',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ddaed05fc283',
						'operator' => '==',
						'value' => 'sale',
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
			'placeholder' => '',
			'prepend' => '',
			'append' => '%',
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
		array(
			'key' => 'field_5ddbf13a2891e',
			'label' => 'Related products title',
			'name' => 'related_products_title',
			'type' => 'text',
			'instructions' => 'Change default from theme settings',
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
			'key' => 'field_5ddbf1be2891f',
			'label' => 'Related products Subtitle',
			'name' => 'related_products_subtitle',
			'type' => 'text',
			'instructions' => 'Change default from theme settings',
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
			'key' => 'field_5ddcf91fa43cd',
			'label' => 'Custom dimensions - Show',
			'name' => 'procu_dim',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5ddcf9b4a43ce',
			'label' => 'Custom dimensions - Button',
			'name' => 'procu_dimb',
			'type' => 'text',
			'instructions' => 'Change default from theme settings',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ddcf91fa43cd',
						'operator' => '==',
						'value' => '1',
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
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ddcf9d0a43cf',
			'label' => 'Custom dimensions - Form title',
			'name' => 'procu_dimt_ft',
			'type' => 'text',
			'instructions' => 'Change default from theme settings',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ddcf91fa43cd',
						'operator' => '==',
						'value' => '1',
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
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ddcf9f2a43d0',
			'label' => 'Custom dimensions - Form Subtitle',
			'name' => 'procu_dimt_fst',
			'type' => 'text',
			'instructions' => 'Change default from theme settings',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ddcf91fa43cd',
						'operator' => '==',
						'value' => '1',
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
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
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
	'modified' => 1586196027,
));

endif;