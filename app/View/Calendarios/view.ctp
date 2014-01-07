<div class="calendarios view">
<h2><?php echo __('Calendario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendario['Calendario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IdGrupo'); ?></dt>
		<dd>
			<?php echo h($calendario['Calendario']['idGrupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horario'); ?></dt>
		<dd>
			<?php echo h($calendario['Calendario']['horario']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendario'), array('action' => 'edit', $calendario['Calendario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendario'), array('action' => 'delete', $calendario['Calendario']['id']), null, __('Are you sure you want to delete # %s?', $calendario['Calendario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
