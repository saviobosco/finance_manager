<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/21/17
 * Time: 1:31 PM
 */

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use Cake\I18n\Date;
use Cake\Utility\Hash;
use Settings\Core\Setting;

/**
 * Class DashboardController
 * @package App\Controller
 *
 * @property \App\Model\Table\IncomesTable $Incomes
 * @property \App\Model\Table\ExpendituresTable $Expenditures
 * @property \App\Model\Table\FeeCategoriesTable $FeeCategories
 * @property \Settings\Model\Table\ConfigurationsTable $Configurations
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

    }


    public function ajaxGetIncomeStatistics()
    {
        // load the income Table
        $this->loadModel('Incomes');

        if ( $this->request->is('ajax')) {
            $postData = $this->request->getData();
            if (empty($postData)) {
                $this->set('message','Please Select an input value');
                $this->render('/Element/incomeStatistics/error','ajax');
                return;
            }
            try {
                if ($postData['query'] === 'custom') {
                    $startDate = new Date($postData['start_date']);
                    $endDate = new Date($postData['end_date']);
                    $incomes = $this->Incomes->getIncomeWithDateRange($startDate,$endDate);
                } else {
                    $incomes = $this->Incomes->getIncomeWithPassedValue($postData);
                }
                $this->set(compact('incomes','startDate','endDate'));
                switch($postData['query']) {
                    case 'week':
                        $this->render('/Element/incomeStatistics/ajax_return_for_week','ajax');
                        break;
                    case 'month':
                        $this->render('/Element/incomeStatistics/ajax_return_for_month','ajax');
                        break;
                    case 'year':
                        $this->render('/Element/incomeStatistics/ajax_return_for_year','ajax');
                        break;
                    case 'custom':
                        $this->render('/Element/incomeStatistics/ajax_return_for_custom','ajax');
                        break;
                    default:
                        $this->render('/Element/incomeStatistics/no_value','ajax');
                }
            } catch ( \PDOException $e ) {
                if (strpos($e->getMessage(),'General error: 1 no such function:') ) {
                    $this->set('message',__('This application version does not support this operation'));
                    $this->render('/Element/incomeStatistics/error','ajax');
                    return;
                }
            }
        }

    }

    public function expenditureStatistics()
    {

    }

    public function ajaxGetExpenditureStatistics()
    {
        // load the income Table
        $this->loadModel('Expenditures');

        if ( $this->request->is('ajax')) {
            $postData = $this->request->getData();
            if (empty($postData)) {
                $this->set('message','Please Select an input value');
                $this->render('/Element/expenditureStatistics/error','ajax');
                return;
            }
            try {
                if ($postData['query'] === 'custom') {
                    $startDate = new Date($postData['start_date']);
                    $endDate = new Date($postData['end_date']);
                    $expenditures = $this->Expenditures->getExpenditureWithDateRange($startDate,$endDate);
                } else {
                    $expenditures = $this->Expenditures->getExpenditureWithPassedValue($postData);
                }
            } catch ( \PDOException $e ) {
                if (strpos($e->getMessage(),'General error: 1 no such function:') ) {
                    $this->set('message',__('This application version does not support this operation'));
                    $this->render('/Element/expenditureStatistics/error','ajax');
                    return;
                }
            }
            $this->set(compact('expenditures','startDate','endDate'));
            switch($postData['query']) {
                case 'week':
                    $this->render('/Element/expenditureStatistics/ajax_return_for_week','ajax');
                    break;
                case 'month':
                    $this->render('/Element/expenditureStatistics/ajax_return_for_month','ajax');
                    break;
                case 'year':
                    $this->render('/Element/expenditureStatistics/ajax_return_for_year','ajax');
                    break;
                case 'custom':
                    $this->render('/Element/expenditureStatistics/ajax_return_for_custom','ajax');
                    break;
                default:
                    $this->render('/Element/expenditureStatistics/no_value','ajax');
            }
        }

    }

    public function settings()
    {
        //Setting::write('Application.school_motto', '');

        $dir = new Folder(WWW_ROOT.'img');
        $file = $dir->find('image-banner.png', true);

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
        $this->set(compact('prefix', 'settings','file'));

    }

    public function about()
    {

    }

    public function help()
    {

    }

    public function update()
    {
        //
        if ($this->request->is(['POST'])) {

            if (!extension_loaded('zip')) {
                $this->Flash->error('Please load the zip extension fo this feature to work');
                return;
            }

            //debug($this->request->getData()); exit(1);
            $uploadFile = explode('.',$this->request->getData('file')['name']); // extract the file name // impro

            // extracting the files
            $zip = new \ZipArchive();
            if ($zip->open($this->request->getData('file')['tmp_name'] ) === TRUE) {
                $zip->extractTo(TMP);
                $zip->close();
                // read the file from the temp dir
                $updateFolder = new Folder(TMP.$uploadFile[0]);
                //debug($updateFolder);

                //debug($updateFolder->delete()); exit;

                $updateFolder->copy([
                    'to' => APP,
                    'scheme' => Folder::MERGE
                ]);

                if ((new Folder(TMP.$uploadFile[0]))->delete() ) {

                    $this->Flash->success(__('The application has been successfully updated'));

                }

            } else {
                $this->Flash->error(__('The files could not be extracted'));
            }
        }
    }


    public function uploadBannerImage()
    {

        if ( $this->request->is(['patch', 'post', 'put'])) {
            // check if upload
            //debug($this->request->data); exit;
            if (empty($this->request->getData('banner')['name'])) {
                $this->Flash->error(__('No file selected.'));
                return $this->redirect($this->request->referer());
            }
            $file = new File(WWW_ROOT.'img/image-banner.png');
            if ( $file->exists() ) {
                $file->delete();
            }
            if ( move_uploaded_file($this->request->getData('banner')['tmp_name'], WWW_ROOT.'/img/image-banner.png') ) {
                $this->Flash->success(__('File was successfully uploaded'));
                return $this->redirect($this->request->referer());
            }
        }
    }
}