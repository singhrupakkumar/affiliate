<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;         

use Cake\Auth\DefaultPasswordHasher;

/**
 * Stores Controller
 *
 * @property \App\Model\Table\StoresTable $Stores
 *
 * @method \App\Model\Entity\Store[] paginate($object = null, array $settings = [])
 */
class StoresController extends AppController
{

    
    
    
    	public function beforeFilter(Event $event) {
 
        parent::beforeFilter($event);



        $this->Auth->allow(['index', 'add','storeDetails','shop','cashbackstore','all','topviewstore','hotdeals']);

        $this->authcontent();

    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $stores = $this->Stores->find('all',['contain'=>['Products'], 'conditions' => ['Stores.status' => 1]]);
        $stores = $stores->all(); 
        $data = $stores->toArray(); 
        /*************store in cashback*******************/
        $cashback_stores = $this->Stores->find('all',['contain'=>['Products'], 'conditions' => ['Stores.cashback' => 1,'Stores.status' => 1]]);
        $cashback_stores = $cashback_stores->all(); 
        $cashback_stores = $cashback_stores->toArray(); 
        
        /*******featured offers**********/
        $cat = $this->Categories->find('all', ['conditions' => ['Categories.slug' => 'featured']]);
        $cat = $cat->first();  
        $products = $this->Products->find('all',['contain'=>['Stores'], 'conditions' => ['Products.cat_id' => $cat['id']]]);
        $features = $products->all(); 
        $features = $features->toArray();
     
        $this->set('features', $features);
        $this->set('_serialize', ['features']);
        
        $this->set('cashback_stores', $cashback_stores);
        $this->set('_serialize', ['cashback_stores']);
        $this->set('stores', $data);
        $this->set('_serialize', ['stores']);
    }
    
      public function shop() 
    {

        $stores = $this->Stores->find('all',['contain'=>['Products'], 'conditions' => ['Stores.status' => 1]]);
        $stores = $stores->all(); 
        $data = $stores->toArray();
 
        $this->set('stores', $data); 
        $this->set('_serialize', ['stores']);
    }
     public function hotdeals() {  
        /*******Hot offers**********/
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $cat = $this->Categories->find('all', ['conditions' => ['Categories.slug' => 'hot_deals']]);
        $cat = $cat->first();  
        $monday_coupon = $this->Categories->find('all', ['conditions' => ['Categories.slug' => 'monday_coupon']]);

        $monday_coupon = $monday_coupon->first();  
        $products = $this->Products->find('all',['contain'=>['Stores'], 'conditions' => ['Products.cat_id' => $cat['id']]]);
        $hotdeals = $products->all(); 
        $hotdeals = $hotdeals->toArray();
        
        /**********Monday cuupon*********/
        
        $monday = $this->Products->find('all',['contain'=>['Stores'], 'conditions' => ['Products.cat_id' => $monday_coupon['id']]]);
        $monday = $monday->all(); 
        $monday = $monday->toArray(); 
        
        $this->set('hotdeals', $hotdeals); 
        $this->set('_serialize', ['hotdeals']);  
        
        $this->set('monday', $monday); 
        $this->set('_serialize', ['monday']); 
         
     }
    
      public function topviewstore() 
    {  
        $stores = $this->Stores->find('all',['contain'=>['Products'],['order'=>'Stores.view_count ASC'] ,'conditions' => ['Stores.status' => 1,'Stores.view_count !=' => 0]]);
        $stores = $stores->all(); 
        $data = $stores->toArray();
 
        $this->set('stores', $data); 
        $this->set('_serialize', ['stores']);
    }
    
        public function cashbackstore() 
    {

        $stores = $this->Stores->find('all',['contain'=>['Products'], 'conditions' => ['Stores.cashback' => 1,'Stores.status' => 1]]);
        $stores = $stores->all(); 
        $data = $stores->toArray();
 
        $this->set('cashback', $data); 
        $this->set('_serialize', ['stores']);
    }
    
    public function all() {
        if($this->request->is('get')){
            $term = $this->request->query['search'];
            $store = $this->Stores->find('all', array(
                'conditions' => array('Stores.name LIKE' => '%' . $term . '%','Stores.status' => 1),
                'limit' => 200,
            ));
            $store = $store->all(); 
            $store = $store->toArray();
           
            if($store){
                $response['isSuccess'] = 'true';
                $response['data'] = $store;
            }else{
              $response['isSuccess'] = 'false';
              $response['data'] = $store;
              $response['msg'] = 'There Is No Stote Same Like';
            }
        }   
        echo json_encode($store);
       exit;
 
    }
    

          public function storeDetails($slug = null)  
    { 

        $stores = $this->Stores->find('all',['contain'=>['Products'], 'conditions' => ['Stores.slug' => $slug,'Stores.status' => 1]]);
        $stores = $stores->first(); 
        
    
        $this->set('stores', $stores); 
        $this->set('_serialize', ['stores']);
    }

    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('store', $store);
        $this->set('_serialize', ['store']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $store = $this->Stores->newEntity();
        if ($this->request->is('post')) {
            $store = $this->Stores->patchEntity($store, $this->request->getData());
            if ($this->Stores->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Store Could Not Be Saved. Please, Try Again.'));
        }
        $this->set(compact('store'));
        $this->set('_serialize', ['store']);
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
        $store = $this->Stores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Stores->patchEntity($store, $this->request->getData());
            if ($this->Stores->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Store Could Not Be Saved. Please, Try Again.'));
        }
        $this->set(compact('store'));
        $this->set('_serialize', ['store']);
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
        $store = $this->Stores->get($id);
        if ($this->Stores->delete($store)) {
            $this->Flash->success(__('The Store Has Been Deleted.'));
        } else {
            $this->Flash->error(__('The Store Could Not Be Deleted. Please, Try Again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
