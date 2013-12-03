<?php 
echo $this->Form->create('User');
echo $this->Form->input('firs_name'); 
echo $this->Form->input('second_name');
echo $this->Form->input('dni');
echo $this->Form->input('mail'); 
echo $this->Form->input('username'); 
echo $this->Form->input('password',array('type' => 'password')); 
echo $this->Form->end('Guardar'); 
?>

