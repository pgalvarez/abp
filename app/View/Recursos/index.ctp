<div>
	<?php echo $this->Session->flash();?>
	<a href="/Recursos/add">Nuevo</a>
	<form  method="get" action="/Recursos/delete" >
		<table>
		<tr>
			<th></th><th>Nombre</th>	<th>Localizacion</th> <th>Tipo</th> <th>Opciones</th>
		</tr>
		<?php
		foreach($recursos as $recurso){
			echo '<tr>
							<td> <input type="checkbox" name="checkRecurso[]" value="'.$recurso['Recurso']['id'].'"></input></td>
							<td>'.$recurso['Recurso']['nombre'].'</td>
							<td>'.$recurso['Recurso']['localizacion'].'</td>
							<td>'.$recurso['Recurso']['tipo'].'</td>
							<td>
								<a href="/Recursos/delete?checkRecurso[]='.$recurso['Recurso']['id'].'">
									<img src=/img/deleteRecurso.png></img>
								</a>
								<a href="/Recursos/edit/'.$recurso['Recurso']['id'].'">			
									<img src="/img/editRecurso.png"></img>
								</a>							
							</td>
						</tr>';
		}
		?>
		</table>
		<input type="submit" value="Eliminar"></input>
	</form>
	
	
</div>
