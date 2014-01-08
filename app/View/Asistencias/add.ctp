<div class="asistencias form">
<?php echo $this->Form->create('Asistencia'); ?>
	<fieldset>
		<legend><?php echo __('Add Asistencia'); ?></legend>
	<?php
		echo $this->Form->input('idUsuario');
		echo $this->Form->input('idGrupo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Asistencias'), array('action' => 'index')); ?></li>
	</ul>
</div>
