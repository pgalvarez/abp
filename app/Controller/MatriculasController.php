<?php
class MatriculasController extends AppController{
	public $uses = array ('Asignatura','User','Matricula');

	public $virtualFields = array(
		  'name' => 'CONCAT(User.first_name, " ", User.second_name)'
	);

	function index_alumnos(){ 
		//Obtenemos asignaturas y matriculas para mostrarlas en la vista
		$this->set("asignaturas",	$this->Asignatura->find('all'));
		$this->set("matriculas",	$this->Matricula->find('all',
			array(
				'conditions' => array(
					'Matricula.users_id ' => $this->Auth->user('id'))
				)
			)
		);	
	}

	function index_secretaria(){
	  /*Cuando hacemos una petición $this->Asignatura->find('all') debido a que establecemos la relación $belongsTo 	
		respecto a User(asignatura tiene un responsable)  y  $hasMany respecto a Matricula en el modelo de asignatura, nos 			devolverá una array el cual contendrá en su primera posición un array con los datos de la asignatura, en la segunda
		un array con los datos del usuario responsable y en la tercera un array en la que cada posición contendrá los datos 
		de una Matrícula para dicha asignatura */ 
		$this->set("asignaturas", $this->Asignatura->find('all'));
		$this->set("usuarios",$this->User->find('list', 
			array(
				'fields' => array('User.id','User.name')
			)
		)
		);
	}

	//El alumno a través del formulario envia por GET la id de la asignatura que desee solicitar matricularse
	function solicitar_matricula($asignatura_id){
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
						'Matricula.users_id' => $this->Auth->user('id'),
						'Matricula.asignaturas_id' => $asignatura_id				
					),
					'fields' => array(
						'Matricula.id'					
					)				
				)
			);	
			//Validamos que no este matriculado 
			if( empty($matricula) ){
				$datos = array(
					'Matricula' => array(
						'asignaturas_id' => $asignatura_id,
						'users_id' =>  $this->Auth->user('id'),
						'matriculado' => '0'			
					)
				);
				$this->Matricula->create($datos);
				($this->Matricula->save($datos))?$this->Session->setFlash("Solicitud completada correctamente"):
				$this->Session->setFlash("Se ha producido un error durante la solicitud");
			}
			return $this->redirect(array('controller' => 'Matriculas', 'action' => 'index_alumnos'));
	}

	//Funcion utilizada por secretaría para confirmar la matriculación de los alumnos
	function confirmar_matricula($id){
			if(empty($id)){
				throw new NotFoundException(__('Operación no válida'));
			}
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
			return $this->redirect(array('controller' => 'Matriculas', 'action' => 'index_secretaria'));
	}

	function desmatricular_alumno(){
			if(!$this->request->query){
				throw new NotFoundException(__('Petición no válida'));	
			}
			$asignatura_id = $this->request->query['Asignatura_id'];
			$user_id = $this->request->query['User_id'];

			if( empty($asignatura_id) | empty($user_id) ){
				throw new NotFoundException(__('Petición no válida'));			
			}
			$asignatura = $this->Asignatura->findById($asignatura_id);
			$user = $this->User->findById($user_id); 
			if(empty($asignatura) | empty($user)){
					throw new NotFoundException(__('Petición no válida'));	
			}	

			$matricula = $this->Matricula->find('first',
				array(
					'conditions' => array(
						'Matricula.users_id' => $user_id,
						'Matricula.asignaturas_id' => $asignatura_id				
					),
					'fields' => array(
						'Matricula.id'						
					)				
				)
			);	
		if(empty($matricula)){
				throw new NotFoundException(__('Operación no válida'));	
		}else{
			$this->Matricula->delete($matricula['Matricula']['id']);
			$this->Session->setFlash("Operacion realizada con éxito");
		}	
		return $this->redirect(array('controller' => 'Matriculas', 'action' => 'index_secretaria'));
	} 
}

?>
