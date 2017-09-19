<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fees Controller
 *
 * @property \App\Model\Table\FeesTable $Fees
 *
 * @method \App\Model\Entity\Fee[] paginate($object = null, array $settings = [])
 */
class FeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FeeCategories', 'Terms', 'Classes', 'Sessions']
        ];
        $fees = $this->paginate($this->Fees);

        $this->set(compact('fees'));
        $this->set('_serialize', ['fees']);
    }

    /**
     * View method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fee = $this->Fees->get($id, [
            'contain' => ['FeeCategories', 'Terms', 'Classes', 'Sessions', 'StudentFees']
        ]);

        $this->set('fee', $fee);
        $this->set('_serialize', ['fee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fee = $this->Fees->newEntity();
        if ($this->request->is('post')) {
            $fee = $this->Fees->patchEntity($fee, $this->request->getData());
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $feeCategories = $this->Fees->FeeCategories->find('list', ['limit' => 200]);
        $terms = $this->Fees->Terms->find('list', ['limit' => 200]);
        $classes = $this->Fees->Classes->find('list', ['limit' => 200]);
        $sessions = $this->Fees->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'feeCategories', 'terms', 'classes', 'sessions'));
        $this->set('_serialize', ['fee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fee = $this->Fees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fee = $this->Fees->patchEntity($fee, $this->request->getData());
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $feeCategories = $this->Fees->FeeCategories->find('list', ['limit' => 200]);
        $terms = $this->Fees->Terms->find('list', ['limit' => 200]);
        $classes = $this->Fees->Classes->find('list', ['limit' => 200]);
        $sessions = $this->Fees->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'feeCategories', 'terms', 'classes', 'sessions'));
        $this->set('_serialize', ['fee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fee = $this->Fees->get($id);
        if ($this->Fees->delete($fee)) {
            $this->Flash->success(__('The fee has been deleted.'));
        } else {
            $this->Flash->error(__('The fee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
