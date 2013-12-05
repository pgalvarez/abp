<?php
class CalendariosController extends AppController{
	function index(){
		$this->set("Calendario", $this->Calendario->find('all'));
	}
	function add(){
		if($this->request->isPost()){
			$this->Calendario->create();
			if($this->Calendario->save($this->request->data)){
				return $this->redirect(array('controller' => '', 'action' => 'index'));
			}
			#$this->Session->setFlash('Error al guardar');
		}	
	}
	function edit($id = null){
	 if (!$id) {
        throw new NotFoundException(__('Calendario inválido'));
    }
    $Calendario = $this->Calendario->findById($id);
    if (!$Calendario) {
        throw new NotFoundException(__('Calendario inválido'));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Calendario->id = $id;
        if ($this->Calendario->save($this->request->data)) {
            $this->Session->setFlash(__('Calendario actualizado.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Error en la actualización.'));
    }
    if (!$this->request->data) {
        $this->request->data = $Calendario;
    }	
	}
	function delete($id =	null){
 		if (!$id) {
        throw new NotFoundException(__('Calendario inválido'));
    }else{
			$error = false;
			foreach($ids as $id){
				if(	(!$this->Calendario->delete($id)) && (!$error) ){
					$error = true;
				}
			}
			$error?$this->Session->setFlash("Se han producido errores al eliminar"):	$this->Session->setFlash("Calendario 		
			eliminados con éxito");
		}
		return $this->redirect(array('controller' => 'Calendario', 'action' => 'index'));
	}
}
?>
