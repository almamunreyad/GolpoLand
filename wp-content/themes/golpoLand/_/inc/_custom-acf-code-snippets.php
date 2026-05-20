<?php
// ACF Options

if (function_exists('acf_add_options_page')) {


	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Point ACF to the theme's acf-json folder for both load and save
add_filter('acf/settings/save_json', function () {
	return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
});

// the ACF fields

if (function_exists('acf_add_local_field_group')):

	acf_add_local_field_group(array(
		'key' => 'group_562fb3f3bc547',
		'title' => 'Code snippets: Body',
		'fields' => array(
			array(
				'key' => 'field_562fb3f3bfa7f',
				'label' => 'Code Snippets',
				'name' => 'code_snippets__body',
				'type' => 'repeater',
				'instructions' => 'Add code that belongs before the closing &lt;body&gt; tag',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => '+ Add Snippet',
				'sub_fields' => array(
					array(
						'key' => 'field_562fb3f3c14f9',
						'label' => 'Code',
						'name' => 'code',
						'type' => 'textarea',
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
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'collapsed' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-body-tag',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_562f9de4e4fbb',
		'title' => 'Code snippets: Head',
		'fields' => array(
			array(
				'key' => 'field_562f9deba8199',
				'label' => 'Code Snippets',
				'name' => 'code_snippets__head',
				'type' => 'repeater',
				'instructions' => 'Add code that belongs inside &lt;head&gt; tags',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => '+ Add Snippet',
				'sub_fields' => array(
					array(
						'key' => 'field_562f9df9a819a',
						'label' => 'Code',
						'name' => 'code',
						'type' => 'textarea',
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
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'collapsed' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-head-tag',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5a57b204b40b9',
		'title' => 'Code snippets: After head',
		'fields' => array(
			array(
				'key' => 'field_5a57b204b9ca0',
				'label' => 'Code Snippets',
				'name' => 'code_snippets__head_after',
				'type' => 'repeater',
				'instructions' => 'Add code that belongs immediately after the &lt;/head&gt; tag',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => '+ Add Snippet',
				'sub_fields' => array(
					array(
						'key' => 'field_5a57b204bcd22',
						'label' => 'Code',
						'name' => 'code',
						'type' => 'textarea',
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
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-head-tag',
				),
			),
		),
		'menu_order' => 5,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	// ── Featured Books Block ─────────────────────────────────────────────
	acf_add_local_field_group(array(
		'key'      => 'group_featured_books_block',
		'title'    => 'Featured Books Block',
		'fields'   => array(
			array(
				'key'           => 'field_fbb_source',
				'label'         => 'Books Source',
				'name'          => 'book_source',
				'type'          => 'radio',
				'required'      => 0,
				'conditional_logic' => 0,
				'choices'       => array(
					'automatic' => 'Automatic',
					'manual'    => 'Manual',
				),
				'default_value' => 'automatic',
				'return_format' => 'value',
				'allow_null'    => 0,
				'layout'        => 'horizontal',
			),
			array(
				'key'               => 'field_fbb_auto_message',
				'label'             => '',
				'name'              => 'auto_message',
				'type'              => 'message',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_fbb_source',
							'operator' => '==',
							'value'    => 'automatic',
						),
					),
				),
				'message'    => 'Automatic display books',
				'new_lines'  => 'wpautop',
				'esc_html'   => 0,
			),
			array(
				'key'               => 'field_fbb_manual_books',
				'label'             => 'Select Books',
				'name'              => 'manual_books',
				'type'              => 'relationship',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_fbb_source',
							'operator' => '==',
							'value'    => 'manual',
						),
					),
				),
				'post_type'     => array('post'),
				'filters'       => array('search'),
				'return_format' => 'object',
				'elements'      => array('featured_image'),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/featured-books-block',
				),
			),
		),
		'menu_order'          => 0,
		'position'            => 'normal',
		'style'               => 'default',
		'label_placement'     => 'top',
		'instruction_placement' => 'label',
		'active'              => 1,
	));

	// ── Categories Books Block ───────────────────────────────────────────
	acf_add_local_field_group(array(
		'key'    => 'group_categories_books_block',
		'title'  => 'Categories Books Block',
		'fields' => array(
			array(
				'key'               => 'field_cbb_block_title',
				'label'             => 'Block Title',
				'name'              => 'block_title',
				'type'              => 'text',
				'required'          => 0,
				'conditional_logic' => 0,
				'default_value'     => '',
				'placeholder'       => 'e.g. Browse by Category',
			),
			array(
				'key'               => 'field_cbb_show_slider',
				'label'             => 'Show CTA',
				'name'              => 'show_slider',
				'type'              => 'checkbox',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array('width' => '33', 'class' => '', 'id' => ''),
				'choices'           => array('yes' => 'Show CTA'),
				'default_value'     => array(),
				'return_format'     => 'value',
				'layout'            => 'vertical',
				'toggle'            => 0,
			),
			array(
				'key'               => 'field_cbb_background',
				'label'             => 'Select Background',
				'name'              => 'background',
				'type'              => 'button_group',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array('width' => '33', 'class' => '', 'id' => ''),
				'choices'           => array(
					'white'      => 'White',
					'light_gray' => 'Light Gray',
				),
				'default_value' => 'white',
				'return_format' => 'value',
				'layout'        => 'horizontal',
			),
			array(
				'key'               => 'field_cbb_source',
				'label'             => 'Books Source',
				'name'              => 'book_source',
				'type'              => 'radio',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array('width' => '33', 'class' => '', 'id' => ''),
				'choices'           => array(
					'manual'        => 'Manual',
					'from_category' => 'From Category',
				),
				'default_value' => 'manual',
				'return_format' => 'value',
				'allow_null'    => 0,
				'layout'        => 'horizontal',
			),
			array(
				'key'               => 'field_cbb_manual_books',
				'label'             => 'Select Books',
				'name'              => 'manual_books',
				'type'              => 'relationship',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_cbb_source',
							'operator' => '==',
							'value'    => 'manual',
						),
					),
				),
				'post_type'     => array('post'),
				'filters'       => array('search'),
				'return_format' => 'object',
				'elements'      => array('featured_image'),
			),
			array(
				'key'               => 'field_cbb_categories',
				'label'             => 'Select Categories',
				'name'              => 'book_categories',
				'type'              => 'taxonomy',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_cbb_source',
							'operator' => '==',
							'value'    => 'from_category',
						),
					),
				),
				'taxonomy'      => 'category',
				'add_term'      => 0,
				'save_terms'    => 0,
				'load_terms'    => 0,
				'return_format' => 'id',
				'field_type'    => 'checkbox',
				'allow_null'    => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/categories-books-block',
				),
			),
		),
		'menu_order'          => 0,
		'position'            => 'normal',
		'style'               => 'default',
		'label_placement'     => 'top',
		'instruction_placement' => 'label',
		'active'              => 1,
	));

endif;
