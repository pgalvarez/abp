<?php
echo $this->Form->create('Recurso');
echo $this->Form->input('nombre');
echo $this->Form->input('tipo', array('type' => 'select', 'options' => array(
	'despacho' => 'despacho',
	'aula' => 'aula',
	'laboratorio' => 'laboratorio',
	'salaReunion' => 'Sala de reunion'
	)
));
echo $this->Form->input('localizacion');
echo $this->Form->end('Guardar');

?>
