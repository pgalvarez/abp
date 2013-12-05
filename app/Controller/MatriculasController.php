<?php
class MatriculasController extends AppController{
	public $uses = array ('Asignatura','User','Matricula');

	public $virtualFields = array(
		  'name' => 'CONCAT(User.first_name, " ", User.second_name)'
	);

	function solicitar_matricula(){
		/*El alumno a través del formulario envia por GET la id de la asignatura y la accion que desea realizar
		 matricularse/desmatricularse*/
		if($this->request->query){
			$asignatura_id = $this->request->query['Id'];
			if(empty($asignatura_id)){
				throw new NotFoundException(__('Asignatura no válida'));			
			}
			$asignatura = $this->Asignatura->findById($asignatura_id);
			if(empty($asignatura)){
					throw new NotFoundException(__('Asignatura no válida'));	
			}		
			//Miramos si el alumno esta o no matriculado/pendiente ya
			$matricula = $this->Matricula->find('first',
				array(
					'conditions' => array(
						'Matricula.users_id' => '7',
						'Matricula.asignaturas_id' => $asignatura_id				
					),
					'fields' => array(
						'Matricula.id',
						'Matricula.matriculado'						
					)				
				)
			);	
			switch ($this->request->query['Accion']){ 
				case 'Matricular':
					//Validamos que no este matriculado 
					if( empty($matricula) ){
						$datos = array(
							'Matricula' => array(
								'asignaturas_id' => $asignatura_id,
								'users_id' => $this->Auth->user('id'),
								'matriculado' => '0'			
							)
						);
						$this->Matricula->create($datos);
						($this->Matricula->save($datos))?$this->Session->setFlash("Solicitud completada correctamente"):
						$this->Session->setFlash("Se ha producido un error durante la solicitud");
					}
				break;
				case 'Desmatricular':	
					if(empty($matricula)){
							throw new NotFoundException(__('Operación no válida'));	
					}else{
						$this->Matricula->delete($matricula['Matricula']['id']);
						$this->Session->setFlash("Operacion realizada con éxito");
					}	
			 	break;
			}
		}
		//Obtenemos asignaturas y matriculas para mostrarlas en la vista
		$this->set("asignaturas",	$this->Asignatura->find('all'));
		$this->set("matriculas",	$this->Matricula->find('all',
			array(
				'conditions' => array(
					'Matricula.users_id ' => '7')
				)
			)
		);
	}
	//Funcion utilizada por secretaría para confirmar la matriculación de los alumnos
	function matricular_alumnos(){
		$id = $this->request->query('Id');
		if(!empty($id)){
			$matricula = $this->Matricula->findById($id);
			if(empty($matricula)){
				throw new NotFoundException(__('Operación no válida'));
			}
			$this->Matricula->id= $id;
			if($this->Matricula->saveField('matriculado','1')){
				$this->Session->setFlash("Usuario matriculado correctamente");
			}else{
				$this->Session->setFlash("Se ha producido un error, intentelo de nuevo");
			}
		}
		$this->set("asignaturas", $this->Asignatura->find('all'));
		$this->set("usuarios",$this->User->find('list', 
			array(
				'fields' => array('User.id','User.name')
			)
		)
		);
	}
}

?>
