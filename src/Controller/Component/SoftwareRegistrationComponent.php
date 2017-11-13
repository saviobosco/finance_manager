<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Date;
use Cake\Network\Exception\ForbiddenException;

/**
 * SoftwareRegistration component
 * This is the software registration component.
 * It check the validity of the software
 */
class SoftwareRegistrationComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function beforeFilter(Event $event)
    {
        // user is logged in
        if ($this->getController()->Auth->user('id') ) {
            if ($this->checkAppRegistration() === false) {
                // accessible actions

                if (!in_array($this->getController()->request->getParam('action'),$this->getConfig('allowedActions'))) {
                    $event->stopPropagation(); // stop event propagation
                    if ($this->getController()->request->is('ajax')) {
                        throw new ForbiddenException('An Error Occurred processing your request');
                    }
                    return $this->getController()->redirect(['plugin'=>false,'prefix'=>false,'controller'=>'Dashboard','action'=>'registerApplication']);
                }
            }
        }
    }

    public function checkAppRegistration()
    {
        $currentDate = (new Date())->format('d-m-Y');
        $expirationDate = Configure::read('expiration_date');

        if ( $currentDate > $expirationDate ) {
            $this->getController()->set('message','Your product registration has expired. Please renew your subscription.');
            return false;
        }
        // checking if a registration is not valid
        if ( Configure::read('serial_code_hash') !== crypt(Configure::read('serial_code'),$expirationDate) ) {
            $this->getController()->set('message','Your product registration has been corrupted.');
            return false;
        }
        return true;
    }
}
