<table id = "tableMatriculas">
		<tr>
			<th>Nombre</th><th>Creditos</th><th>Estado</th><th>Opciones</th>
		</tr>
<?php
/*Comprobamos si el alumno se encuentra matriculado, sin matricular o esta pendiente 
de confirmación de secretaría para hacer efectiva la matriculación*/

foreach($asignaturas as $asignatura){ 
	$matriculado = null;
	foreach($matriculas as $matricula){
		if($matricula['Matricula']['asignaturas_id'] == $asignatura['Asignatura']['id'] ){
			$matriculado = $matricula['Matricula']['matriculado'];
			break;
		}
	}
	if(isset($matriculado)){
		$estado = ($matriculado)?'Matriculado':'Pendiente de confirmación';
	}else{
		$estado = 'Sin matricular';		
	}
	echo 	'<tr>
					<td><span>'.$asignatura['Asignatura']['name'].'</span></td>
					<td><span>'.$asignatura['Asignatura']['creditos'].'<span></td>
					<td><span>'.$estado.'</span></td>
					<td>';
						if(isset($matriculado)){
							echo	'<a href="">Desmatriculación
										</a>';
						}else{
							echo	'<a href="/Matriculas/solicitar_matricula/'.$asignatura['Asignatura']['id'].'">Matricular
										</a>';
						}					
					'</td>
				</tr>';
}
echo '</table>';
?>
