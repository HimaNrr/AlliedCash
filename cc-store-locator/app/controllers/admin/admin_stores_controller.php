<?php

class AdminStoresController extends MvcAdminController {
	
    public function add() {
        if (!empty($this->params['data']) && !empty($this->params['data']['Store'])) {
            //$this->params['data']['Store']['cdate'] = date('Y-m-d H:i:s');
            $object = $this->params['data']['Store'];
            if (empty($object['id'])) {
                $this->Store->create($this->params['data']);
                $id = $this->Store->insert_id;
                $url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'edit', 'id' => $id));
                $this->flash('notice', 'Store successfully created!');
                $this->redirect($url);
            }
        }
    }
    
    public function edit() {
        $this->verify_id_param();
        if (!empty($this->params['data']) && !empty($this->params['data']['Store'])) {
            //$this->params['data']['Store']['mdate'] = date('Y-m-d H:i:s');
            $object = $this->params['data']['Store'];
            if ($this->Store->save($this->params['data'])) {
                $url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'index'));
                $this->flash('notice', 'Store successfully saved!');
                $this->redirect($url);
            } else {
                $this->flash('error', $this->Store->validation_error_html);
            }
        }
        $this->set_object();
    }
    
}

?>