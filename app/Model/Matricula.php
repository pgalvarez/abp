<?php
class Matricula extends AppModel{
	public $belongsTo = array(
		  'Asignatura' => array('className' => 'Asignatura', 'foreignKey' => 'asignaturas_id'), 
			'User' => array('className' => 'User', 'foreignKey' => 'users_id')
	);

	}

?>
