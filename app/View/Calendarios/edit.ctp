<div class="calendarios form">
<?php echo $this->Form->create('Calendario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Calendario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('idGrupo');
		echo $this->Form->input('horario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Calendario.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Calendario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calendarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
