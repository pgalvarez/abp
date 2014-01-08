<?php
App::uses('AppController', 'Controller');
/**
 * Asistencias Controller
 *
 * @property Asistencia $Asistencia
 * @property PaginatorComponent $Paginator
 */
class AsistenciasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Asistencia->recursive = 0;
		$this->set('asistencias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asistencia->exists($id)) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		$options = array('conditions' => array('Asistencia.' . $this->Asistencia->primaryKey => $id));
		$this->set('asistencia', $this->Asistencia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asistencia->create();
			if ($this->Asistencia->save($this->request->data)) {
				$this->Session->setFlash(__('The asistencia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asistencia could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Asistencia->exists($id)) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asistencia->save($this->request->data)) {
				$this->Session->setFlash(__('The asistencia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asistencia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asistencia.' . $this->Asistencia->primaryKey => $id));
			$this->request->data = $this->Asistencia->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Asistencia->id = $id;
		if (!$this->Asistencia->exists()) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Asistencia->delete()) {
			$this->Session->setFlash(__('The asistencia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The asistencia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
