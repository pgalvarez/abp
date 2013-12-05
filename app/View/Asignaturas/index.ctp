<div>
	<?php echo $this->Session->flash();?>
	<a href="/Asignaturas/add">Nueva</a>
<form method ="get" action="/Asignaturas/delete?checkAsignatura[]">	
	<table>
		<tr>
			<th></th><th>Nombre</th>	<th>Créditos</th> <th>Responsable</th> <th>Opciones</th>
		</tr>
		<?php
		foreach($Asignaturas as $Asignatura){
			echo '<tr>
							<td> <input type="checkbox" name="checkAsignatura[]" value="'.$Asignatura['Asignatura']['id'].'"></input></td>
							<td>'.$Asignatura['Asignatura']['name'].'</td>
							<td>'.$Asignatura['Asignatura']['creditos'].'</td>
							<td>'.$Asignatura['User']['first_name'].'</td>
							<td>
								<a href="/Asignaturas/delete?checkAsignatura[]='.$Asignatura['Asignatura']['id'].'">
									<img src=/img/deleteIcon.png></img>
								</a>
								<a href="/Asignaturas/edit/'.$Asignatura['Asignatura']['id'].'">			
									<img src="/img/editIcon.png"></img>
								</a>							
							</td>
						</tr>';
		}
		?>
		</table>
		<input type="submit" value="Eliminar"></input>
	</form>
	
	
</div>
