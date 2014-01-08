<?php
foreach($asignaturas as $asignatura){
	echo '<table class = "tableMatricularAlumnos">';
		echo '<tr  id="trTituloAsignatura"><th colspan="3">'.$asignatura['Asignatura']['name'].'</th></tr>';
		echo '<tr><th>Alumno</th><th>Estado</th><th>Opciones</th></tr>';
			foreach($asignatura['Matricula'] as $alumnos){
				$estado = ($alumnos['matriculado'])?"Aceptado":"Pendiente de aceptación";
				echo '<tr>';		
					echo '<td>'.$usuarios[$alumnos['users_id']].'</td>';
					echo '<td>'.$estado.'</td>';						
				if(!$alumnos['matriculado']){
					echo '<td> 
									<a href="/Matriculas/matricular_alumnos?Id='.$alumnos['id'].'">Confirmar</a>
									<a href="/Matriculas/matricular_alumnos?Id='.$alumnos['id'].'">Denegar</a>
								</td>';
				}else{
						echo '<td> 
									<a href="/Matriculas/solicitar_matricula?Accion=Desmatricular&Id='.$asignatura['Asignatura']['id'].'"> 
										Desmatricular
									</a>
								</td>';		
				}
				echo '</tr>';				
			}		
	echo	'</table>';
}
?>
