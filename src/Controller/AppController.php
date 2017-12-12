<?php

/**

 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

 *

 * Licensed under The MIT License

 * For full copyright and license information, please see the LICENSE.txt

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

 * @link      http://cakephp.org CakePHP(tm) Project

 * @since     0.2.9

 * @license   http://www.opensource.org/licenses/mit-license.php MIT License

 */

namespace App\Controller;



use Cake\Controller\Controller;
use Cake\Routing\Router;
use Cake\Event\Event;



/**

 * Application Controller

 *

 * Add your application-wide methods in the class below, your controllers

 * will inherit them.

 *

 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller

 */

class AppController extends Controller

{



    /**

     * Initialization hook method.

     *

     * Use this method to add common initialization code like loading components.

     *

     * e.g. `$this->loadComponent('Security');`

     *

     * @return void

     */

    public function initialize()

    {

        parent::initialize();



        $this->loadComponent('RequestHandler');

        $this->loadComponent('Flash');

		$this->loadComponent('Auth', [

            'loginRedirect' => [

                'controller' => 'Dashboard',

                'action'     => 'index'

            ],

            'logoutRedirect' => [

                'controller' => 'Stores',

                'action'     => 'index'

            ]

        ]);

		$userdata = $this->Auth->user();

        $this->set('loggeduser', $userdata);
	$path = Router::url('/', true); 
        $this->set('fullurl',$path);	
		
		/*************************************/
		
		$this->loadModel('Staticpages');
		$allpages = $this->Staticpages->find('all');
		$allpages = $allpages->all()->toArray();
		
		$this->set(compact('allpages'));
        $this->set('_serialize', ['allpages']);
		
		/*************************************/
		
		$this->loadModel('Staticpages');
		$firstpage = $this->Staticpages->find('all');
		$firstpage = $firstpage->first()->toArray();
		
		$this->set(compact('firstpage'));
        $this->set('_serialize', ['firstpage']);
		
		/*************************************/



        /*

         * Enable the following components for recommended CakePHP security settings.

         * see http://book.cakephp.org/3.0/en/controllers/components/security.html

         */

        //$this->loadComponent('Security');

        //$this->loadComponent('Csrf');

    }

   

    /**

     * Before render callback.

     *

     * @param \Cake\Event\Event $event The beforeRender event.

     * @return \Cake\Network\Response|null|void

     */

    public function beforeRender(Event $event)

    {
        
    ini_set('memory_limit', '-1');  
        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);

        $this->Auth->loginRedirect = array('controller' => 'dashboards', 'action' => 'index', 'admin' => true);

        $this->Auth->logoutRedirect = array('controller' => 'stores', 'action' => 'index', 'admin' => false);
  
        $this->Auth->authorize = array('Controller');
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'
                ),
                'scope' => array(
                    'User.active' => 1,
                )
            )
        );
        
        
        
        
        if (!array_key_exists('_serialize', $this->viewVars) &&

            in_array($this->response->type(), ['application/json', 'application/xml'])

        ) {

            $this->set('_serialize', true);

        }

    }

    
    
      

    public function authcontent() {

        $this->set('userdata', $this->Auth->user());

    }

}

