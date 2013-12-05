<?php
$this->Session->flash();
echo $this->Form->create('Asignatura');
echo $this->Form->input('name');
echo $this->Form->input('creditos');
?>
<div id ="selectResp"><span>Responsable</span><span id ="nameResp"></span></div>
<div id="responsableAsig">
	<table >
	<?php 
	for ($r=1;$r<=$rows_per_col;$r++) {
		echo '<tr>';
		for ($c=1;$c <=$cols;$c++) { 
			if(isset($values['col_'.$c][$r])){
				echo '<td class="tdResp">
				<input class="chekResp" type="radio" name=data[Asignatura][responsable_id]
				 value='.$values['col_'.$c][$r]['User']['id'].'> 
				<span>'.$values['col_'.$c][$r]['User']['first_name'].'</span>
				</td>';
			}
		}
		echo '</tr>';
	}
	?>
	</table>
</div>
<?php echo $this->Form->end('Guardar'); ?>
