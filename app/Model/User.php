<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{

	public $belongsTo = array('Group');
	public $actsAs = array('Acl' => array('type' => 'requester'));

	public function beforeSave() {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
	//Utilizada por ACL cada vez que se da de alta un nuevo usuario, encargada de crear una nueva entrada en la tabla ARO
  public function parentNode() {
		die("dfjdks");
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
