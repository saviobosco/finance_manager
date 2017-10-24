<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/21/17
 * Time: 1:31 PM
 */

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use Settings\Core\Setting;

/**
 * Class DashboardController
 * @package App\Controller
 *
 * @property \App\Model\Table\IncomesTable $Incomes
 * @property \App\Model\Table\FeeCategoriesTable $FeeCategories
 */

class DashboardController extends AppController
{
    public function index()
    {

        // get fee income ordered by fee category
        $this->loadModel('FeeCategories');
        $incomeSources = $this->FeeCategories->find('IncomeByFeeCategories');

        $this->set(compact('incomeSources'));
    }

    public function incomeStatistics()
    {

        // load the income Table
        $this->loadModel('Incomes');
        $incomes = $this->Incomes->find();

        $this->set(compact('incomes'));

    }

    public function expenditureStatistics()
    {

    }

    public function settings()
    {
        //Setting::write('Application.school_name', '');


        $this->loadModel('Settings.Configurations');
        $this->prefixes = Configure::read('Settings.Prefixes');

        $key = 'Application';

        //$prefix = Hash::get($this->prefixes, ucfirst($key));
        $settings = $this->Configurations->find('all')->where([
            'name LIKE' => $key . '%',
            'editable' => 1,
        ])->order(['weight', 'id']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settings = $this->Configurations->patchEntities($settings, $this->request->data);

            foreach ($settings as $setting) {
                //$this->Flash->success('The settings has been saved.');
                if (!$this->Configurations->save($setting)) {
                    $this->Flash->error('The settings could not be saved. Please, try again.');
                }
            }
            $this->Flash->success('The settings has been saved.');
            Setting::clear(true);
            Setting::autoLoad();
            //return $this->redirect([]);
        }
        $this->set(compact('prefix', 'settings'));

    }

}