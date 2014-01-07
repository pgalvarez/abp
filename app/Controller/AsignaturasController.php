f<?php
class AsignaturasController extends AppController{
	public $uses = array('User','Asignatura');

	function index(){
		$this->set("Asignaturas", $this->Asignatura->find('all'));
	}
	function add(){
		if($this->request->isPost()){
			$this->Asignatura->create();
			if($this->Asignatura->save($this->request->data)){
				return $this->redirect(array('controller' => '', 'action' => 'index'));
			}
			$this->Session->setFlash('Error al guardar');
		}else{
			$result = $this->User->find('all', array(
				'fields' => array('User.first_name','User.second_name','User.id'),
				'conditions'=> array('User.group_id' => '4'),
				'order' => array('User.second_name', 'User.first_name')
				)
			);
			//Una vez obtenidos los datos los procesamos para representarlos en una tabla HTML ordenados alfabéticamente
			// por columnas y filas (de arriba abajo y derecha a izquierda)
			$cols = 4; //Número de columnas 
			$values = array();
			$numrows = sizeof($result);
			$rows_per_col = ceil($numrows / $cols);
			
			$values = $this->orderData($cols, $rows_per_col, $result);

			$this->set('cols',$cols);
			$this->set('rows_per_col',$rows_per_col);
			$this->set('values',$values);
		}
	}
	function edit($id = null){
	 if (!$id) {
        throw new NotFoundException(__('Codigo de asignatura inválido'));
    }	
    $asignatura = $this->Asignatura->findById($id);
    if (!$asignatura) {
        throw new NotFoundException(__('Código de asignatura inválido'));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Asignatura->id = $id;
        if ($this->Asignatura->save($this->request->data)) {
            $this->Session->setFlash(__('Asignatura actualizada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Error en la actualización.'));
    }
    if (!$this->request->data) {
        $this->request->data = $asignatura;

				$result = $this->User->find('all', array(
				'conditions' => array('User.group_id =' => '4'),
				'fields' => array('User.first_name','User.second_name','User.id'),
				'order' => array('User.second_name', 'User.first_name')
				)
			);
			$cols = 4; 
			$values = array();
			$numrows = sizeof($result);
			$rows_per_col = ceil($numrows / $cols);
	
			$values = $this->orderData($cols, $rows_per_col, $result);

			$this->set('cols',$cols);
			$this->set('rows_per_col',$rows_per_col);
			$this->set('values',$values);
    }	
	}
	function delete(){
		$ids = $this->request->query['checkAsignatura'];
 		if (empty($ids)) {
        throw new NotFoundException(__('Codigo de asignatura no válido'));
    }else{
			$error = false;
			foreach($ids as $id){
				if(	(!$this->Asignatura->delete($id)) && (!$error) ){
					$error = true;
				}
			}
			$error?$this->Session->setFlash("Se han producido errores al eliminar"):	$this->Session->setFlash("Asignatura/s eliminada/s con éxito");
		}
		return $this->redirect(array('controller' => 'Asignaturas', 'action' => 'index'));
	}
	function matricular(){
		$this->set('asignaturas', $this->Asignatura->find('all'));
	}

	function orderData($cols, $rows_per_col, $result){
		$values = array();
		for ($c=1;$c<=$cols;$c++) {
			$values['col_'.$c] = array();
		}
		$c = 1;
		$r = 1;
		foreach($result as $row ) {
			$values['col_'.$c][$r] = $row;
			if ($r == $rows_per_col) {
				$c++; $r = 1; 
			}else { 
				$r++;
			}
		}
		return $values;
	}
}
?>
