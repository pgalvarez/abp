<?php
class Recurso extends AppModel{
	public $validate = array (
		'nombre' => array(
			'alfanumerico' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Solo se admiten números y letras'			
			)
		)	
	);
}

?>
