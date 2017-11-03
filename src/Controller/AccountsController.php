<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/20/17
 * Time: 1:14 AM
 */

namespace App\Controller;

use Cake\Utility\Inflector;
use Cake\Utility\Text;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;
use CakeDC\Users\Controller\Traits\ReCaptchaTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;
use CakeDC\Users\Controller\Traits\SimpleCrudTrait;

class AccountsController extends AppController
{
    use LoginTrait;
    use RegisterTrait;
    use ProfileTrait;
    use ReCaptchaTrait;
    use SimpleCrudTrait;

    public function home()
    {
        // this is the home after log in
    }

    public function dashboard()
    {

    }

    public function add()
    {
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $entity = $table->newEntity();
        $this->set($tableAlias, $entity);
        $this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
        if (!$this->request->is('post')) {
            return;
        }
        $entity = $table->patchEntity($entity, $this->request->getData());
        $entity->id = Text::uuid();
        $singular = Inflector::singularize(Inflector::humanize($tableAlias));
        if ($table->save($entity)) {
            $this->Flash->success(__d('CakeDC/Users', 'The {0} has been saved', $singular));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__d('CakeDC/Users', 'The {0} could not be saved', $singular));
    }

}