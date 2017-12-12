<?php
namespace App\Controller\Admin;     

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;         

use Cake\Auth\DefaultPasswordHasher; 

/**
 * Favourites Controller
 *
 * @property \App\Model\Table\FavouritesTable $Stores 
 *
 * @method \App\Model\Entity\Store[] paginate($object = null, array $settings = [])
 */
class PaymentinfosController extends AppController
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

        $this->Auth->allow(['']); 

        $this->authcontent();

    }
    
    
        public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $paymentinfos = $this->paginate($this->Paymentinfos);
      
        $this->set(compact('paymentinfos'));
        $this->set('_serialize', ['paymentinfos']); 
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    { 
        $this->loadModel('Users');
        $fav = $this->Paymentinfos->newEntity();
         $post = $this->request->data;  
        if ($this->request->is('post')) {
            $check = $this->Paymentinfos->find('all',array('conditions'=>array('AND'=>array('Paymentinfos.card_no'=>$this->request->data['card_no'],'Paymentinfos.user_id'=>$this->request->data['user_id']))));
           
             $check = $check->first(); 
            if($check){  
                $this->Flash->error(__('This Card Already Added!'));
            }else{
            $fav = $this->Paymentinfos->patchEntity($fav, $post);
            if ($this->Paymentinfos->save($fav)) {
               $this->Flash->success(__('The Card Info Has Been Saved.'));
            }else{ 
               $this->Flash->error(__('The Card Info Could Not Be Saved. Please, Try Again.'));
 
            }
            }
        }
        $users = $this->Paymentinfos->Users->find('all', ['limit' => 200]);
        $users = $users->all()->toArray();

        $this->set(compact('fav','users'));
        $this->set('_serialize', ['fav']); 
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payinfo = $this->Paymentinfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Paymentinfos->patchEntity($payinfo, $this->request->getData());
            if ($this->Paymentinfos->save($payinfo)) {
                $this->Flash->success(__('The Card Info Has Been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Card Info Could Not Be Saved. Please, Try Again.'));
        }
        $users = $this->Paymentinfos->Users->find('all', ['limit' => 200]);
        $users = $users->all()->toArray();
        $this->set(compact('payinfo','users'));
        $this->set('_serialize', ['payinfo']);
    }
    
    
    
      /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payinfo = $this->Paymentinfos->get($id, [
            'contain' => ['Users']
        ]);

     
        $this->set('payinfo', $payinfo);
        $this->set('_serialize', ['payinfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Paymentinfos->get($id);
        if ($this->Paymentinfos->delete($store)) {
            $this->Flash->success(__('The Card Info Has Been Deleted.'));
        } else {
            $this->Flash->error(__('The Card Info Could Not Be Deleted. Please, Try Again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
