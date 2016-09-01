<?php

class Store extends MvcModel {

	var $display_field = 'name';
	
	var $admin_columns = array(
	'name' => array( 'label' => 'Location' ),
        'address',
        'city',
        'state' => array( 'label' => 'County' ),
        'zip' => array( 'label' => 'Post Code' ) ,
        'latitude',
        'longitude',
        'phone' => array( 'label' => 'Telephone' ),
        'openingHours' =>array( 'label' => 'Open Hours'),
	'id'
	);
    
    var $admin_searchable_fields = array(
        'Store.name',
        'Store.address',
        'Store.city',
        'Store.zip',
        'Store.phone',
        'Store.openingHours'
        );
    
    /*var $admin_searchable_columns = array(
        'Store.name',
        'Store.address1',
        'Store.city',
        'Store.zip',
        'Store.phone'
    );*/
    
    var $validate = array(
        'name' => 'not_empty',
        'address' => 'not_empty',
        'city' => 'not_empty',
        'zip' => 'not_empty',
        'latitude' => 'not_empty',
        'longitude' => 'not_empty',
        'phone' => 'not_empty',
        'openingHours' => 'not_empty',
        'deletion' => 'not_empty'
    );
    
    var $per_page = 10;
    
    public function getMarkers($params) {
        global $wpdb;
        $center_lat = $params['latitude'];
        $center_lng = $params['longitude'];
        $radius = $params['radius'];
             
        $query = sprintf("SELECT id, name, address, city, zip, latitude, longitude, phone, openingHours, deletion,  "
               . "( 3959 * acos( cos( radians('%s') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( latitude ) ) ) ) AS distance"
               . " FROM ".$wpdb->prefix."stores HAVING distance < '%s' AND deletion = '0' ORDER BY distance LIMIT 0 , 5",
                  mysql_real_escape_string($center_lat),
                  mysql_real_escape_string($center_lng),
                  mysql_real_escape_string($center_lat),
                  mysql_real_escape_string($radius));
        
        $markers = $wpdb->get_results( $query );
        
        return $markers;
    }
	
}

?>