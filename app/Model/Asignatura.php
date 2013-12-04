<?php
class Asignatura extends AppModel{
  public $belongsTo = array(
    'User' => array(
        'className' => 'User',
				'foreignKey' => 'responsable_id',
				'conditions' => array('Group.name' => 'Profesor'),
				'fields' => array('User.first_name','User.second_name')
    )
  );
#  public $hasAndBelongsToMany = array(
#		'Alumnos' =>
#			array(
#				'className' => 'User',
#				'joinTable' => 'asignaturas_users',
#				'foreignKey' => 'asignatura_id',
#				'associationForeignKey' => 'user_id'			
#			)	
#	);
	public $validate = array(
		'name' => array(
				'alfanumerico' => array(
					'rule' => '/[a-zA-Z]+/',
					'required' => true,
					'message' => 'Solo letras y números'				
				)
		),
		'creditos' => array(
			'obligatorio' => array(
				'rule'=>'/[0-9]+/',
				'required' => true			
			)		
		)
	);
}
?>
