<?php
/*-------------------------------------------*/
/*  Customizer
/*-------------------------------------------*/
add_action( 'customize_register', 'lightning_adv_unit_customize_register_sidebar_child_list_hidden' );
function lightning_adv_unit_customize_register_sidebar_child_list_hidden($wp_customize) {
	$wp_customize->add_setting( 'lightning_theme_options[sidebar_child_list_hidden]',  array(
        'default'           => false,
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'lightning_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'lightning_theme_options[sidebar_child_list_hidden]',array(
		'label'     => __('Sidebar menu hide list children', LIGHTNING_ADVANCED_TEXTDOMAIN),
		'section'   => 'lightning_design',
		'settings'  => 'lightning_theme_options[sidebar_child_list_hidden]',
		'type' 		=> 'checkbox',
		'priority' => 550,
	));
}

/*-------------------------------------------*/
/*  Position Change
/*-------------------------------------------*/
add_action( 'wp_head', 'lightning_adv_unit_sidebar_child_list_hidden_css', 2 );
function lightning_adv_unit_sidebar_child_list_hidden_css(){
	$options = get_option( 'lightning_theme_options' );
	if ( isset($options['sidebar_child_list_hidden'] ) && $options['sidebar_child_list_hidden'] ){
		$custom_css = "/*-------------------------------------------*/
/*	sidebar child menu display
/*-------------------------------------------*/
.localNav ul ul.children	{ display:none; }
.localNav ul li.current_page_ancestor	ul.children,
.localNav ul li.current_page_item		ul.children,
.localNav ul li.current-cat				ul.children{ display:block; }";
		wp_add_inline_style( 'lightning-design-style', $custom_css );
	}
}