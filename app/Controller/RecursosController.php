<?php
class RecursosController extends AppController{
	function index(){
		$this->set("recursos", $this->Recurso->find('all'));
	}
	function add(){
		if($this->request->isPost()){
			$this->Recurso->create();
			if($this->Recurso->save($this->request->data)){
				return $this->redirect(array('controller' => '', 'action' => 'index'));
			}
			#$this->Session->setFlash('Error al guardar');
		}	
	}
	function edit($id = null){
	 if (!$id) {
        throw new NotFoundException(__('Recurso inválido'));
    }
    $recurso = $this->Recurso->findById($id);
    if (!$recurso) {
        throw new NotFoundException(__('Recurso inválido'));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Recurso->id = $id;
        if ($this->Recurso->save($this->request->data)) {
            $this->Session->setFlash(__('Recurso actualizado.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Error en la actualización.'));
    }
    if (!$this->request->data) {
        $this->request->data = $recurso;
    }	
	}
	function delete($id =	null){
 		if (!$id) {
        throw new NotFoundException(__('Recurso inválido'));
    }else{
			$error = false;
			foreach($ids as $id){
				if(	(!$this->Recurso->delete($id)) && (!$error) ){
					$error = true;
				}
			}
			$error?$this->Session->setFlash("Se han producido errores al eliminar"):	$this->Session->setFlash("Recursos 		
			eliminados con éxito");
		}
		return $this->redirect(array('controller' => 'Recursos', 'action' => 'index'));
	}
}
?>
