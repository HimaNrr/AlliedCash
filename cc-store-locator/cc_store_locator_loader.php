<?php

class CcStoreLocatorLoader extends MvcPluginLoader {

	var $db_version = '1.0';
	var $tables = array();

	function activate() {
	
		// This call needs to be made to activate this app within WP MVC
		
		$this->activate_app(__FILE__);
		
		// Perform any databases modifications related to plugin activation here, if necessary

		require_once ABSPATH.'wp-admin/includes/upgrade.php';
	
		add_option('cc_store_locator_db_version', $this->db_version);
		
		// Use dbDelta() to create the tables for the app here
		global $wpdb;
        $sql = "
        CREATE TABLE ".$wpdb->prefix."stores (
          id int(11) NOT NULL auto_increment,
          name varchar(255) NOT NULL,
          address varchar(255) NOT NULL,
          city varchar(100) NOT NULL,
          state varchar(5) default NULL,
          zip varchar(20) NOT NULL,
          latitude decimal(20,6) NOT NULL,
          longitude decimal(20,6) NOT NULL,
          phone varchar(30) NOT NULL,
          deletion smallint(1) default '0' NOT NULL,
          store_id int(11) default NULL,
          openingHours varchar(255) NOT NULL,
          PRIMARY KEY  (id)
        )";
        dbDelta($sql);
		
	}

	function deactivate() {
	
		// This call needs to be made to deactivate this app within WP MVC
		
		$this->deactivate_app(__FILE__);
		
		// Perform any databases modifications related to plugin deactivation here, if necessary
	
	}

}

?>