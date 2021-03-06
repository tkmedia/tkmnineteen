<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dd003f44e44e',
	'title' => 'Styled Image Block',
	'fields' => array(
		array(
			'key' => 'field_5dd003f4516a4',
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
			'key' => 'field_5dd01bcddb7c5',
			'label' => 'Image Style',
			'name' => 'fi_st',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'img_shadow' => 'Add Drop shadow',
				'img_content' => 'Add Content on image',
				'img_content_hover' => 'Show Content on hover only',
				'img_overlay' => 'Overlay on image',
				'img_border' => 'Inside border',
				'img_radius' => 'Round corners',
				'img_circle' => 'Circle - Img maust cut square',
				'inside_logo' => 'Add logo on image',
				'original' => 'No stretch - Original proportions',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 1,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5dd003f45175a',
			'label' => 'Title',
			'name' => 'fi_t',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd0208598c6f',
			'label' => 'Choose the image',
			'name' => 'f_img',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'menu-50',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd020a698c70',
			'label' => 'Hover image',
			'name' => 'f_img_h',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'menu-50',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd01f7798c67',
			'label' => 'Links',
			'name' => 'fi_lk',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn_link' => 'Links with buttons',
				'img_link' => 'Link all image',
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
			'key' => 'field_5dd01e2498c62',
			'label' => 'Text content',
			'name' => 'fi_tx',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 4,
			'new_lines' => 'br',
		),
		array(
			'key' => 'field_5dd01f2298c65',
			'label' => 'Font size',
			'name' => 'fi_txsz',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 22,
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5dd01f5098c66',
			'label' => 'Font color',
			'name' => 'fi_txcl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5dd01e6198c63',
			'label' => 'Text Ver align',
			'name' => 'fi_txv',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top_xs' => 'top',
				'middle-xs' => 'middle',
				'bottom-xs' => 'bottom',
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
			'key' => 'field_5dd01ed798c64',
			'label' => 'Text Hor align',
			'name' => 'fi_txal',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'center_xs' => 'center',
				'start-xs' => 'strat',
				'end-xs' => 'end',
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
			'key' => 'field_5dd0203a98c6d',
			'label' => 'Link for all the image',
			'name' => 'fi_fl',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'img_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd0206798c6e',
			'label' => 'Open link in fancy box',
			'name' => 'fi_lfb',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'img_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5dd01fc298c68',
			'label' => 'First button',
			'name' => 'fi_bt1',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'btn_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd0200698c6a',
			'label' => 'First button link',
			'name' => 'fi_bt1l',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'btn_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd0201598c6b',
			'label' => 'Second button',
			'name' => 'fi_bt2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'btn_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd0202598c6c',
			'label' => 'Second button link',
			'name' => 'fi_bt2l',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'img_content',
					),
				),
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'btn_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd003f45182c',
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
			'key' => 'field_5dd020c798c71',
			'label' => 'image Top margin',
			'name' => 'fi_ftm',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'img_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5dd020fd98c72',
			'label' => 'image Bottom margin',
			'name' => 'fi_bm',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01f7798c67',
						'operator' => '==',
						'value' => 'img_link',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5dd003f451867',
			'label' => 'Title Font size',
			'name' => 'fi_tsz',
			'type' => 'range',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 32,
			'min' => 17,
			'max' => 100,
			'step' => 1,
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5dd003f451917',
			'label' => 'Title color',
			'name' => 'fi_tcl',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5dd003f4518dc',
			'label' => 'Title Alignment',
			'name' => 'fi_tal',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
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
			'key' => 'field_5dd01d18db7c8',
			'label' => 'Logo position on image',
			'name' => 'fi_lgp',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'inside_logo',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'start-xs top-xs' => 'start-xs top-xs',
				'start-xs middle-xs' => 'start-xs middle-xs',
				'start-xs bottom-xs' => 'start-xs bottom-xs',
				'center-xs top-xs' => 'center-xs top-xs',
				'center-xs	middle-xs' => 'center-xs	middle-xs',
				'center-xs	bottom-xs' => 'center-xs	bottom-xs',
				'end-xs top-xs' => 'end-xs top-xs',
				'end-xs middle-xs' => 'end-xs middle-xs',
				'end-xs bottom-xs' => 'end-xs bottom-xs',
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
			'key' => 'field_5dd0062bcfafd',
			'label' => 'Title location',
			'name' => 'fi_tlo',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'title-top' => 'Title top',
				'title-bottom' => 'Title bottom',
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
			'key' => 'field_5dd0065fcfafe',
			'label' => 'Image size',
			'name' => 'fi_tp',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
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
			'key' => 'field_5dd006cbcfaff',
			'label' => 'Image align',
			'name' => 'fi_al',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'center' => 'center',
				'right' => 'right',
				'left' => 'left',
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
			'key' => 'field_5dd01ccddb7c7',
			'label' => 'Logo on image',
			'name' => 'fi_lg',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01bcddb7c5',
						'operator' => '==',
						'value' => 'inside_logo',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'menu-50',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd01c7cdb7c6',
			'label' => 'Image fit in block',
			'name' => 'fi_bg',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'contain' => 'contain',
				'cover' => 'cover',
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
			'key' => 'field_5dd01dbe98c61',
			'label' => 'Container height',
			'name' => 'fi_h',
			'type' => 'range',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5dd01c7cdb7c6',
						'operator' => '==',
						'value' => 'cover',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'min' => 50,
			'max' => 1000,
			'step' => '',
			'prepend' => '',
			'append' => 'px',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/tkmb-image-block',
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
	'modified' => 1574003520,
));

endif;