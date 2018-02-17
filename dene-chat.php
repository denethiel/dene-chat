<?php 

/* 
 * Plugin Name: Denethiel App - Wordpress Chat
 * Plugin URI: http://denethiel-app.com/
 * Description: Chat Integration with Wordpress
 * Version: 0.1 Alpha
 * Author: Jose David Pacheco Valedo
 * Author URI: http://www.twitter.com/josepdvahn
 * License: GLP2
 *
 */


// MENU OPTION
function dene_chat_control_menu(){
	add_menu_page( 
		'Chats',
		'Chats',
		'manage_options',
		'dene-chat',
		'dene_chat_page',
		plugins_url( '/src/assets/menu_logo.png', __FILE__ ),
		6 
	);
}

add_action( 'admin_menu', 'dene_chat_control_menu');

function dene_chat_page(){

	if(!current_user_can( 'manage_options' )){
		wp_die('No tienes suficientes privilegios para entra a esta pagina');
	}?>

	<div id="app"></div>
	<?php
}

// Enqueue Scripts FILES

add_action('admin_enqueue_scripts','dene_chat_enqueue_admin');
function dene_chat_enqueue_admin($hook){
	if($hook != 'toplevel_page_dene-chat'){
		return;
	}
	wp_register_script( 'dene-chat-vue-app', plugins_url('/dist/build.js?v='.time(),__FILE__), array( 'jquery' ), null, true );

	wp_enqueue_script( 'dene-chat-vue-app' );
}

 ?>