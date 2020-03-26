<?php

namespace App\Controller\ApiController;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller Dedicated to API
 **/

class ApiController extends Controller
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
    }
}