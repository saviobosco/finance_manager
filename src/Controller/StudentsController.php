<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @property \App\Model\Table\StudentFeePaymentsTable $StudentFeePayments
 *
 * @method \App\Model\Entity\Student[] paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [/*'States',*/ 'Sessions', 'Classes']
        ];
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [ 'Sessions', 'Classes', 'StudentFees.Fees.FeeCategories']
        ]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
        $this->set(compact('student','sessions','classes'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        //$states = $this->Students->States->find('list', ['limit' => 200]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $this->set(compact('student', 'states', 'sessions', 'classes'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $states = $this->Students->States->find('list', ['limit' => 200]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $this->set(compact('student', 'states', 'sessions', 'classes'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function payFees($id = null)
    {
        $studentFees = $this->Students->getStudentFees($id);

        if ( $this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('StudentFeePayments');
            $newEntities = $this->StudentFeePayments->newEntities($this->request->getData());

            $receipt_id = $this->StudentFeePayments->savePayment($newEntities);

            if ( $receipt_id) {
                $this->Flash->success(__('Payment was successfully made '));

                return $this->redirect([
                    'plugin'=>null,
                    'controller'=>'Students',
                    'action'=>'paymentReceipt',
                    '?' => [
                        'student_id' => $id,
                        'receipt_id' => $receipt_id
                    ]
                ]);

            } else {
                $this->Flash->error(__('Payment could not be made'));
            }
        }

        $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
        $this->set(compact('studentFees','sessions','classes'));
    }

    public function paymentReceipt($id = null )
    {
        //get the student information
        $passedData = $this->request->getQuery();
        $student = $this->Students->get($passedData['student_id']);

        // get the receipt information
        $receiptDetails = $this->Students->getReceiptDetails($passedData['receipt_id']);

        $this->set(compact('student','receiptDetails'));
    }
}
