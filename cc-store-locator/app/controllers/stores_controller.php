<?php

class StoresController extends MvcPublicController {
	
    // Overwrite the default index() method to include the 'is_public' => true condition
	public function index() {
		$this->set_objects();
	}
    
	public function show() {
		$object = $this->model->find_by_id($this->params['id']);
		
		if (!empty($object)) {
			$this->set('object', $object);
		}
	}
    
    public function locator() {
        $postCode = $this->params['postcode'];
        $this->set('postCode', $postCode);
    }
    
    public function getStores() {
        $markers = $this->Store->getMarkers($this->params);
        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);
        header("Content-type: text/xml");

        foreach($markers as $row){
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("name", $row->name);
            $newnode->setAttribute("address", $row->address);
            $newnode->setAttribute("city", $row->city);
            $newnode->setAttribute("zip", $row->zip);
            $newnode->setAttribute("lat", $row->latitude);
            $newnode->setAttribute("lng", $row->longitude);
            $newnode->setAttribute("phone", $row->phone);
            $newnode->setAttribute("distance", 	$row->distance);
            $newnode->setAttribute("openingHours", $row->openingHours);
            $newnode->setAttribute("id", $row->id);
        }
        echo $dom->saveXML();
        die();
    }
    
}

?>