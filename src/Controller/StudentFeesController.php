<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudentFees Controller
 *
 * @property \App\Model\Table\StudentFeesTable $StudentFees
 *
 * @method \App\Model\Entity\StudentFee[] paginate($object = null, array $settings = [])
 */
class StudentFeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Fees']
        ];
        $studentFees = $this->paginate($this->StudentFees);

        $this->set(compact('studentFees'));
        $this->set('_serialize', ['studentFees']);
    }

    /**
     * View method
     *
     * @param string|null $id Student Fee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentFee = $this->StudentFees->get($id, [
            'contain' => ['Students', 'Fees', 'StudentFeePayments']
        ]);

        $this->set('studentFee', $studentFee);
        $this->set('_serialize', ['studentFee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentFee = $this->StudentFees->newEntity();
        if ($this->request->is('post')) {
            $studentFee = $this->StudentFees->patchEntity($studentFee, $this->request->getData());
            if ($this->StudentFees->save($studentFee)) {
                $this->Flash->success(__('The student fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student fee could not be saved. Please, try again.'));
        }
        $students = $this->StudentFees->Students->find('list', ['limit' => 200]);
        $fees = $this->StudentFees->Fees->find('list', ['limit' => 200]);
        $this->set(compact('studentFee', 'students', 'fees'));
        $this->set('_serialize', ['studentFee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Fee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentFee = $this->StudentFees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentFee = $this->StudentFees->patchEntity($studentFee, $this->request->getData());
            if ($this->StudentFees->save($studentFee)) {
                $this->Flash->success(__('The student fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student fee could not be saved. Please, try again.'));
        }
        $students = $this->StudentFees->Students->find('list', ['limit' => 200]);
        $fees = $this->StudentFees->Fees->find('list', ['limit' => 200]);
        $this->set(compact('studentFee', 'students', 'fees'));
        $this->set('_serialize', ['studentFee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Fee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        try {
            $studentFee = $this->StudentFees->get($id);
            if ($this->StudentFees->deleteStudentFee($studentFee)) {
                $this->Flash->success(__('The student fee has been deleted.'));
            } else {
                $this->Flash->error(__('The student fee could not be deleted. Please, try again.'));
            }
            return $this->redirect($this->request->referer());

        } catch ( \PDOException $e ) {
            $this->Flash->error(__('This fee cannot be deleted because a payment has been made for it.'));

            return $this->redirect($this->request->referer());
        }

    }
}
