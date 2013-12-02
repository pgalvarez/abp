<?php
class RecursosController extends AppController{
	function add (){
		if($this->request->isPost()){
			$this->Recurso->create();
			if($this->Recurso->save($this->request->data)){
				return $this->redirect(array('controller' => '', 'action' => 'index'));
			}
			#$this->Session->setFlash('Error al guardar');
		}	
	}
}
?>
