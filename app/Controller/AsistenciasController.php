<?php
class AsistenciasController extends AppController{
	function index(){
		$this->set("Asistencia", $this->Asistencia->find('all'));
	}
	function add(){
		if($this->request->isPost()){
			$this->Asistencia->create();
			if($this->Asistencia->save($this->request->data)){
				return $this->redirect(array('controller' => '', 'action' => 'index'));
			}
			#$this->Session->setFlash('Error al guardar');
		}	
	}
	
	function delete($id =	null){
 		if (!$id) {
        throw new NotFoundException(__('Asistencia inválido'));
    }else{
			$error = false;
			foreach($ids as $id){
				if(	(!$this->Asistencia->delete($id)) && (!$error) ){
					$error = true;
				}
			}
			$error?$this->Session->setFlash("Se han producido errores al eliminar"):	$this->Session->setFlash("Asistencia 		
			eliminados con éxito");
		}
		return $this->redirect(array('controller' => 'Asistencia', 'action' => 'index'));
	}
}
?>
