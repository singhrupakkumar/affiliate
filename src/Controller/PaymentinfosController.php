<?php
namespace App\Controller;

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



        $this->Auth->allow(['edit', 'add']);

        $this->authcontent();

    }
    
    
    
        public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $paymentinfos = $this->paginate($this->Paymentinfos);
        
        print_r($paymentinfos);
        exit; 
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
        $fav = $this->Paymentinfos->newEntity();
         $post = $this->request->data;  
         $post['user_id'] = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $check = $this->Paymentinfos->find('all',array('conditions'=>array('AND'=>array('Paymentinfos.card_no'=>$this->request->data['card_no'],'Paymentinfos.user_id'=>$this->Auth->user('id')))));
           
             $check = $check->first(); 
            if($check){  
                $response['isSuccess'] = 'true';
                $response['msg'] = '<div class="alert alert-success">This Card Already Added!</div>'; 
            }else{
            $fav = $this->Paymentinfos->patchEntity($fav, $post);
            if ($this->Paymentinfos->save($fav)) {
                $response['isSuccess'] = 'true';
                $response['msg'] = '<div class="alert alert-success">The Card Info Has Been Saved.</div>';
             
            }else{ 
                $response['isSuccess'] = 'false';
                $response['msg'] = 'The Card Info Could Not Be Saved. Please, Try Again.';  
                
            }
            }
        }
        
     echo json_encode($response);
     exit;
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
        $store = $this->Paymentinfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Paymentinfos->patchEntity($store, $this->request->getData());
            if ($this->Paymentinfos->save($store)) {
                $this->Flash->success(__('The Card Info Has Been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Card Info Could Not Be Saved. Please, Try Again.'));
        }
        $this->set(compact('favourite'));
        $this->set('_serialize', ['favourite']);
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
