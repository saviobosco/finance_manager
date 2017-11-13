<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classes Controller
 *
 * @property \App\Model\Table\ClassesTable $Classes
 *
 * @method \App\Model\Entity\Class[] paginate($object = null, array $settings = [])
 */
class ClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $classes = $this->paginate($this->Classes);

        $this->set(compact('classes'));
        $this->set('_serialize', ['classes']);
    }

    /**
     * View method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $class = $this->Classes->get($id, [
            'contain' => ['Fees', 'Students']
        ]);

        $this->set('class', $class);
        $this->set('_serialize', ['class']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $class = $this->Classes->newEntity();
        if ($this->request->is('post')) {
            $class = $this->Classes->patchEntity($class, $this->request->getData());
            if ($this->Classes->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $blocks = $this->Classes->Blocks->find('list')->toArray();
        $this->set(compact('class','blocks'));
        $this->set('_serialize', ['class']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $class = $this->Classes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Classes->patchEntity($class, $this->request->getData());
            if ($this->Classes->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $blocks = $this->Classes->Blocks->find('list')->toArray();
        $this->set(compact('class','blocks'));
        $this->set('_serialize', ['class']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        try {
            $class = $this->Classes->get($id);
            if ($this->Classes->deleteClass($class)) {
                $this->Flash->success(__('The class has been deleted.'));
            } else {
                $this->Flash->error(__('The class could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } catch ( \PDOException $e ) {
            $this->Flash->error(__('This class cannot be deleted because its attached to fees'));
            return $this->redirect(['action' => 'index']);
        }

    }
}
