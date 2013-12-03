<?php
App::uses('AuthComponent', 'Controller/Component');

class UsersController extends AppController{
	
	public $belongsTo = array('Group');
 	public $actsAs = array('Acl' => array('type' => 'requester'));

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
  public function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
  }
	//Utilizada por ACL cada vez que se da de alta un nuevo usuario, encargada de crear una nueva entrada en la tabla ARO
  public function parentNode() {
    if (!$this->id && empty($this->data)) {
        return null;
    }
    if (isset($this->data['User']['group_id'])) {
        $groupId = $this->data['User']['group_id'];
    } else {
        $groupId = $this->field('group_id');
    }
    if (!$groupId) {
        return null;
    } else {
        return array('Group' => array('id' => $groupId));
    }
	}




}
?>
