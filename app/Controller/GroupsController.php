<?php
class GroupsController extends AppController{

 public function add() {
    if ($this->request->is('post')) {
        $this->Group->create();
        if ($this->Group->save($this->request->data)) {
            $this->Session->setFlash(__('Grupo creado'));
            return $this->redirect(array('action' => 'add'));
        }
        $this->Session->setFlash(__('Error al crear grupo.'));
    }
  }
	public function beforeFilter() {
		  parent::beforeFilter();
		   $this->Auth->allow('*');
	}

}
?>
