<?php

add_action('admin_menu', 'add_whatsaap_menu');

function add_whatsaap_menu(){
    add_menu_page('Whatsapp Share', 'Whatsapp Share', 'manage_options', 'whatsapp-share-option', 'whatsaap_options'); 
}

function whatsaap_options(){
	include_once( 'options/options.php'  );

	
	}