<?php
/**
 * @package vahes_plugin
 * @version 1
 */
/*
Plugin Name: Vahe's Test Plugin
Plugin URI: http://localhost
Description: This is just a test plugin to add tags
Author: Vahe Holtian
Version: 1
Author URI: http://localhost/
*/


function hello_vahe() {
	$chosen = "Hello darkness my old friend";

	printf(
		'<p id="vahe"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello:' ),
		'en',
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_vahe' );

// We need some CSS to position the paragraph.
function vahe_css() {
	echo "
	<style type='text/css'>
	#vahe {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		color: red;
		line-height: 1.6666;
	}
	.rtl #vahe {
		float: left;
	}
	.block-editor-page #vahe {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#vahe,
		.rtl #vahe {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'vahe_css' );


function cptui_register_my_taxes_artists() {

	/**
	 * Taxonomy: Artists.
	 */

	$labels = [
		"name" => __( "Artists", "my-simple-theme" ),
		"singular_name" => __( "Artist", "my-simple-theme" ),
	];

	
	$args = [
		"label" => __( "Artists", "my-simple-theme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'artists', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "artists",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "artists", [ "post" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_artists' );
