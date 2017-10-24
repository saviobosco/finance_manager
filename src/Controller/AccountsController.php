<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/20/17
 * Time: 1:14 AM
 */

namespace App\Controller;

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

}