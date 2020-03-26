<?php

namespace App\Controller;

use App\Controller\AppController;

class PeoplesController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
		//$this->setEventManager()->off($this->Csrf);
    }

   public function index()
   {
		$this->autoRender = false; 
		   if ($this->request->is('get')) {
        $Peoples = $this->Peoples->find('all');
      /*
	     return  $this->set([
            'Peoples' => $Peoples,
            '_serialize' => ['Peoples']
        ]);
		*/
		 $result = array('response' => (array('Peoples' => $Peoples)));
   return $this->response->withType("application/json")->withStringBody(json_encode($result));
    }
   }
 
   public function view($id)
   {
		$this->autoRender = false; 
		   if ($this->request->is('get')) {
        $People = $this->Peoples->get($id);
		/*
        return  $this->set([
            'recipe' => $recipe,
            '_serialize' => ['recipe']
        ]);
		*/
			 $result = array('response' => (array('People' => $People)));
   return $this->response->withType("application/json")->withStringBody(json_encode($result));
		   }
    }
 
    public function add()
    {
		$this->autoRender = false; 
        if ($this->request->is('post')) {
        $People = $this->Peoples->newEntity($this->request->getData());
        if ($this->Peoples->save($People)) {
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
         return $this->set([
            'message' => $message,
            'recipe' => $recipe,
            '_serialize' => ['message', 'recipe']
        ]);
		*/
    }
   public function edit($id)
    {
		$this->autoRender = false; 
		
        $recipe = $this->Peoples->get($id);
        if ($this->request->is(['post', 'put'])) {
            $recipe = $this->Peoples->patchEntity($recipe, $this->request->getData());
            if ($this->Peoples->save($recipe)) {
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
      return $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
		*/
    }
	  public function delete($id)
    {
		$this->autoRender = false; 
        if ($this->request->is([ 'delete'])) {
        $recipe = $this->Peoples->get($id);
  
        if ($this->Peoples->delete($recipe)) {
            $message = 'Deleted';
        } else {
			   $message = 'Error';
			
		}
		      $result = array('response' => (array('message' => $message)));
   return $this->response->withType("application/json")->withStringBody(json_encode($result));
	}
	}
		/*
        return $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
		*/

}