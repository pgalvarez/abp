<?php 
echo $this->Form->create('User');
echo $this->Form->input('group_id',array(
	'type' => 'select',
	'options' => array(
		'1' => 'Administrador',
		'2' => 'Secretaria',	
		'3' => 'Alumno',
		'4' => 'Profesor',
		'5' => 'Becario'
	)
));
echo $this->Form->input('first_name'); 
echo $this->Form->input('second_name');
echo $this->Form->input('dni');
echo $this->Form->input('mail'); 
echo $this->Form->input('username'); 
echo $this->Form->input('password',array('type' => 'password')); 
echo $this->Form->end('Guardar'); 
?>

