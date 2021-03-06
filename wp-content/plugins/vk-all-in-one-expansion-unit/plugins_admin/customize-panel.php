<?php
/**
 * VkExUnit customize-panel.php
 *
 * @package  VkExUnit
 * @author   Kurudrive<kurudrive@gmail.com>
 * @since    28/Sep/2017
 */

/**
 * Add Customize Panel
 */
function veu_add_customize_panel(){
	if ( apply_filters('veu_customize_panel_activation', false ) ){
		add_action( 'customize_register', 'veu_customize_register' );
	}
}
 add_action( 'after_setup_theme', 'veu_add_customize_panel' );

 function veu_customize_register( $wp_customize ) {
 	/*-------------------------------------------*/
 	/*	ExUnit Panel
 	/*-------------------------------------------*/
 	$wp_customize->add_panel( 'veu_setting', array(
 	   	'priority'       => 1000,
 	   	'capability'     => 'edit_theme_options',
 	   	'theme_supports' => '',
 	   	'title'          => __( 'ExUnit Settings', 'vkExUnit' ),
 	));

}
