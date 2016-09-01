<?php
/*
Plugin Name: Cc Store Locator
Plugin URI: 
Description: ChequeCentre store locator.
*/

register_activation_hook(__FILE__, 'cc_store_locator_activate');
register_deactivation_hook(__FILE__, 'cc_store_locator_deactivate');

function cc_store_locator_activate() {
	require_once dirname(__FILE__).'/cc_store_locator_loader.php';
	$loader = new CcStoreLocatorLoader();
	$loader->activate();
}

function cc_store_locator_deactivate() {
	require_once dirname(__FILE__).'/cc_store_locator_loader.php';
	$loader = new CcStoreLocatorLoader();
	$loader->deactivate();
}

?>