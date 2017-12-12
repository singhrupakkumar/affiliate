<?php

namespace App\Controller\Admin;



use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;



/**

 * Users Controller

 *

 * @property \App\Model\Table\UsersTable $Users

 *

 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])

 */

class DashboardController extends AppController

{

	public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        if ($this->request->params['prefix'] == 'admin') {

            $this->viewBuilder()->setLayout('admin');
            if($this->Auth->user() && $this->Auth->user('role') !='admin'){
             $this->Auth->logout(); 
              //  $this->viewBuilder()->setLayout('admin');
            }

        }

        $this->Auth->allow(['logout']);

        $this->authcontent();

    }



	public function index(){

		$this->loadModel('Users');
                $this->loadModel('Products');
		
		$users = $this->Users->find('all',[
			'conditions' => ['Users.status' => 1]
		])->all()->toArray();
		
		$this->set('users', $users);
		$this->set('_serialize', ['users']);
		
		$clients = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'admin', 'Users.status' => 1]
		])->all()->toArray();
		
		$this->set('clients', $clients);
		$this->set('_serialize', ['clients']);
		
		$products = $this->Products->find('all',[
			'conditions' => ['Products.status' => 1]
		])->all()->toArray();
		
		$this->set('products', $products);
		$this->set('_serialize', ['products']);

		$members = $this->Users->find('all',[
			'conditions' => ['Users.status' => 1],
			'order'		=> ['Users.id' => 'desc'],
			'limit'		=>	8
		])->all()->toArray();
		
		$this->set('members', $members);
		$this->set('_serialize', ['members']);
		  

	}
}