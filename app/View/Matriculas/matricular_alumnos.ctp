<?php
foreach($asignaturas as $asignatura){
	echo '<table>';
					echo '<tr  id="trTituloAsignatura"><th colspan="2">'.$asignatura['Asignatura']['name'].'</th></tr>';
					echo '<tr><th>Alumno</th><th>Estado</th></tr>';
						foreach($asignatura['Matricula'] as $alumnos){
							$estado = ($alumnos['matriculado'])?"Aceptado":"Pendiente de aceptación";
							echo '<tr>';		
								echo '<td>'.$usuarios[$alumnos['users_id']].'</td>';
								echo '<td>'.$estado;						
							if(!$alumnos['matriculado'])
								echo ' | <a href="/Matriculas/matricular_alumnos?Id='.$alumnos['id'].'">Confirmar</a>';
							echo '</td></tr>';				
						}		
				echo	'</table>';
}
?>
