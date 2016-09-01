<?php
MvcRouter::public_connect('search', array('controller' => 'documentation_nodes', 'action' => 'search'));
MvcRouter::public_connect('{:controller}', array('action' => 'index'));
MvcRouter::public_connect('{:controller}/{:id:[\d]+}', array('action' => 'show'));
MvcRouter::public_connect('{:controller}/{:action}/{:id:[\d]+}');
//MvcRouter::public_connect('store-locator', array('controller'=>'stores', 'action' => 'locator'));
//MvcRouter::public_connect('foreign-currency', array('controller'=>'currencies', 'action' => 'index'));
MvcRouter::public_connect('{:controller}/{:action}/{:latitude}/{:longitude}/{:radius}');
 
MvcRouter::admin_ajax_connect(array('controller' => 'admin_documentation_nodes', 'action' => 'update_tree'));
MvcRouter::admin_ajax_connect(array('controller' => 'admin_documentation_nodes', 'action' => 'preview_content'));
?>
