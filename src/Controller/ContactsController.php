<?php

namespace App\Controller;

use App\Controller\AppController;

class ContactsController extends AppController
{

 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

   public function index()
    {
		$this->autoRender = false; 
				   if ($this->request->is('get')) {
        $Contacts = $this->Contacts->find('all');
	   /*	
       return   $this->set([
            'Contacts' => $Contacts,
            '_serialize' => ['Contacts']
        ]);
		*/
	 $result = array('response' => (array('People' => $Contacts)));
     return $this->response->withType("application/json")->withStringBody(json_encode($result));
				   }
    }

    public function view($id)
    {
		$this->autoRender = false; 
		  if ($this->request->is('get')) {
		$people_id = $this->request->getParam('people_id');
		
        //$Contacts = $this->Contacts->get($id);
		
		$query = $this->Contacts->find();
        $query->where(['people_id' => $people_id]);

		
		/*
        return  $this->set([
            'recipe' => $Contacts,
            '_serialize' => ['recipe']
        ]);
		*/
	$result = array('response' => (array('Contacts' => $query)));
    return $this->response->withType("application/json")->withStringBody(json_encode($result));
		
		  }
    }

    public function add()
    {
		$this->autoRender = false; 		
		$this->request->getParam('people_id');
		  if ($this->request->is('post')) {
        $Contacts = $this->Contacts->newEntity($this->request->getData());
        if ($this->Contacts->save($Contacts)) {
            $message = 'Saved';
			    $result = array('response' => (array('message' => $message)));
        return $this->response->withType("application/json")->withStringBody(json_encode($result));
        } else {
            $message = 'Error';
			    $result = array('response' => (array('message' => $message)));
        return $this->response->withType("application/json")->withStringBody(json_encode($result));
        }
		
		/*
        $this->set([
            'message' => $message,
            'recipe' => $recipe,
            '_serialize' => ['message', 'recipe']
        ]);
		*/
		
	
		  }
    }

    public function edit($id)
    {
		$this->autoRender = false; 			
		$this->request->getParam('people_id');
        $Contact = $this->Contacts->get($id);
        if ($this->request->is(['post', 'put'])) {
            $Contact = $this->Contacts->patchEntity($Contact, $this->request->getData());
            if ($this->Contacts->save($Contact)) {
                $message = 'Saved';
				    $result = array('response' => (array('message' => $message)));
        return $this->response->withType("application/json")->withStringBody(json_encode($result));
            } else {
                $message = 'Error';
				    $result = array('response' => (array('message' => $message)));
        return $this->response->withType("application/json")->withStringBody(json_encode($result));
            }
        }
		
		/*
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
		*/
    }

    public function delete($id)
    {
		$this->request->getParam('people_id');
	//	        $this->request->allowMethod(['post', 'delete']);
     
	 //   $Contact = $this->Contacts->get($id);
		
		    if ($this->request->is(['post', 'put'])) {
        $message = 'Deleted';
        if (!$this->Contacts->delete($Contact)) {
            $message = 'Error';
			    $result = array('response' => (array('message' => $message)));
        return $this->response->withType("application/json")->withStringBody(json_encode($result));
        }
			}
		/*
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
		*/
    }
}
