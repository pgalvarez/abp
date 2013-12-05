<?php
class UsersController extends AppController{
  
	public function add() {
		if ($this->request->is('post')) {
		  $this->User->create();
		  if ($this->User->save($this->request->data)) {
		      $this->Session->setFlash(__('Usuario dado de alta'));
		      return $this->redirect(array('action' => 'index'));
		  }
		  $this->Session->setFlash(__('Error al guardar, intentelo de nuevo.'));
		}
  }
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	public function login() {
		if ($this->request->is('post')) {
		  if ($this->Auth->login()) {
		      return $this->redirect($this->Auth->redirect());
		  }
		  $this->Session->setFlash(__('Nombre de usuario o contraseña incorrectos'));
		}
	}
	public function logout() {

	}

}
?>
