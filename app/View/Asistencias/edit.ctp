<div class="asistencias form">
<?php echo $this->Form->create('Asistencia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Asistencia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('idUsuario');
		echo $this->Form->input('idGrupo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Asistencia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Asistencia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('action' => 'index')); ?></li>
	</ul>
</div>
