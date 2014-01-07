<?php
$this->Session->flash();
echo $this->Form->create('Calendario');
echo $this->Form->input('idGrupo');
echo $this->Form->input('horario');
echo $this->Form->end('Guardar'); ?>
