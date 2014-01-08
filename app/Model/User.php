<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{

	public $actsAs = array('Acl' => array('type' => 'requester'));
	public $virtualFields = array(    
    'name' => 'CONCAT(User.first_name, " ", User.second_name)'
	);
	public $hasMany = array(
		'Matricula' => array(
			'className' => 'Matricula',
			'foreignKey' => 'users_id'		
		)
	);
	public $belongsTo = array(
    'Group' => array(
        'className' => 'Group',
				'foreignKey' => 'group_id',
				'fields' => array('Group.name')
    )
  );
	public $validate = array(
		'first_name' => array(
			'alfanumerico' => array(
				'rule' => '/[a-zA-Z]+/',
				'required' => true,
				'message' => 'Solo letras'	
			)
		),
		'second_name' => array(
			'alfanumerico' =>array(
				'rule' => '/[a-zA-Z]+/',
				'required' => true,
				'message' => 'Solo letras '
			)	
		),
		'dni' => array(
			'dniRule' =>array(
				'rule' => '/[0-9]{8}[a-zA-Z]/',
				'required' => true,
				'message' => 'Formato incorrecto'		
			)
		),
		'username' => array(
			'alfanumerico' =>array(
				'rule' => '/[a-zA-Z]+/',
				'required' => true,
				'message' => 'Solo letras y números'		
			)
		),
		'password' => array(
			'alfanumerico' =>array(
				'rule' => '/[a-zA-Z]+/',
				'required' => true,
				'message' => 'Solo letras y números'		
			)
		)
	);

	public function beforeSave() {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
  }
	//Encargada de crear entradas en ARO cuando se crea un usuario
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
