<div class="calendarios index">
	<h2><?php echo __('Calendarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('idGrupo'); ?></th>
			<th><?php echo $this->Paginator->sort('horario'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($calendarios as $calendario): ?>
	<tr>
		<td><?php echo h($calendario['Calendario']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendario['Calendario']['idGrupo']); ?>&nbsp;</td>
		<td><?php echo h($calendario['Calendario']['horario']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calendario['Calendario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calendario['Calendario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calendario['Calendario']['id']), null, __('Are you sure you want to delete # %s?', $calendario['Calendario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Calendario'), array('action' => 'add')); ?></li>
	</ul>
</div>
