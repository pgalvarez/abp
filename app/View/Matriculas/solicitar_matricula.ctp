<table id = "tableMatriculas">
		<tr>
			<th>Nombre</th><th>Creditos</th><th>Estado</th><th>Opciones</th>
		</tr>
<?php
/*Comprobamos si el alumno se encuentra matriculado, sin matricular o esta pendiente 
de confirmación de secretaría para hacer efectiva la matriculación*/
$matriculado = null;
print_r($matriculas);
foreach($asignaturas as $asignatura){ 
	foreach($matriculas as $matricula){
		if($matricula['Matricula']['asignaturas_id'] == $asignatura['Asignatura']['id'] ){
			$matriculado = $matricula['Matricula']['matriculado'];
			break;
		}
	}
	if(isset($matriculado)){
		$estado = ($matriculado)?'Matriculado':'Pendiente';
		$opcion = 'Desmatricular';
	}else{
		$estado = 'Sin matricular';		
		$opcion = 'Matricular';
	}
	echo 	'<tr>
					<td><span>'.$asignatura['Asignatura']['name'].'</span></td>
					<td><span>'.$asignatura['Asignatura']['creditos'].'<span></td>
					<td><span>'.$estado.'</span></td>
					<td>
						<a href="/Matriculas/solicitar_matricula?Accion='.$opcion.'&Id='.$asignatura['Asignatura']['id'].'">'.$opcion.'</a>
					</td>
				</tr>';
}
echo '</table>';
?>
