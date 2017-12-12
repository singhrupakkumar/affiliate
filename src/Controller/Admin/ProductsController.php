<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Core\Configure;

use Cake\Error\Debugger; 
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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

        $this->Auth->allow(['slugify']); 

        $this->authcontent();
    ini_set('memory_limit', '-1');    

    }
    
    private function slugify($str) { 
                // trim the string
                $str = strtolower(trim($str));
                // replace all non valid characters and spaces with an underscore
                $str = preg_replace('/[^a-z0-9-]/', '_', $str);
                $str = preg_replace('/-+/', "_", $str);
        return $str;
     } 
     
     
    
     	public function import() {
          
     	    include(ROOT.'/vendor/php-simple-html-dom-parser-master/Src/Sunra/PhpSimple/HtmlDomParser.php'); 
     		$this->loadModel('Stores');
                $this->loadModel('Categories');
		$user_arr = [];
		if ($this->request->is('post')) {
		 if(!empty($this->request->data['import_csv']['name'])) {  
		$filename = $this->request->data['import_csv']['tmp_name'];

		$handle = fopen($filename, "r");
		$header = fgetcsv($handle);
		
		$return = array(
		'messages' => array(),
		'errors' => array(),
		);
		$i = 1;
		$mydara = array();
		
		while (($row = fgetcsv($handle)) !== FALSE) {
		$i++; /* This is line 38 */
		$mydata [] = $row;

		
		}
		
		
		// for each header field
		foreach ($mydata as $row) {
		$data = array();

		if(isset($row[0])){
		 $store = $this->Stores->find('all',['conditions'=>['Stores.name LIKE' => '%' . $row[0] . '%']]);
                 $store = $store->first();
                 if($store){
                    $data['store_id']= $store['id'];
                 }else{
                      $newstore = $this->Stores->newEntity();
                      if(isset($row[12])){  
                      $sdata['url'] = parse_url($row[12])['host'];
                      }
                      $sdata['name'] = $row[0];
                      $sdata['slug'] = $this->slugify($row[0]); 
                      $storen = $this->Stores->patchEntity($newstore, $sdata);
                      $save1  = $this->Stores->save($storen);
                      if($save1) {
                      $data['store_id']= $save1['id'];            
                      }
                 }
                }
                
                if(isset($row[17])){
		 $cat = $this->Categories->find('all',['conditions'=>['Categories.name LIKE' => '%' . $row[17] . '%']]);
                 $cat = $cat->first();
                 if($cat){
                    $data['cat_id']= $cat['id'];
                 }else{
                      $category = $this->Categories->newEntity();
                      $catdata['name'] = $row[17];
                      $catdata['slug'] = $this->slugify($row[17]); 
                      $category = $this->Categories->patchEntity($category, $catdata);
                      $save  = $this->Categories->save($category);
                      if($save) {
                      $data['cat_id']= $save['id'];            
                      }
                 }
                }
                
		if(isset($row[2])){ 
		   $data['link_id']= $row[2];
		}
		if(isset($row[3])){
		   $data['name']= $row[3];
		   $data['slug'] = $this->slugify($row[3]);
		}
		if(isset($row[4])){
		   $data['description']= $row[4];
		}
		
		if(isset($row[5])){
		   $data['keyword']= $row[5];
		}
		
		if(isset($row[10])){ 
                    $dom = $HtmlDomParser::str_get_html($row[10]);
                    if(isset($dom->root->children[1])){
		    $data['image']=  $dom->root->children[1]->attr['src']; 
                    }
		}
		
		if(isset($row[12])){
		   $data['url']= $row[12];
		}
	
	
                $exist = $this->Products->find('all',['conditions'=>['Products.link_id' =>$row[2]]]);
                $existstore = $exist->first();
                if(empty($existstore)){
                    $user = $this->Products->newEntity();
                    $user = $this->Products->patchEntity($user, $data);
                    $sav = $this->Products->save($user);
                }else{

                    $articlesTable = TableRegistry::get('Products');
                    $article = $articlesTable->get($existstore['id']); // Return article with id 12
                    $article->name = $row[3];
                    $article->description = $row[4];
                    $article->keyword = $row[5];
                     if(isset($dom->root->children[1])){
                    $article->image = $dom->root->children[1]->attr['src'];
                     }
                    $article->url = $row[12];
                    $sav = $articlesTable->save($article);   

//                  $this->Products->updateAll(array(
//                      'Products.name' =>$row[3],
//                      'Products.description' =>$row[4],
//                      'Products.keyword' =>$row[5], 
//                      'Products.image' =>$dom->root->children[1]->attr['src'],
//                      'Products.url' => $row[12]
//                          ), array('Products.id' =>$existstore['id']));    
                }
		}

	
		if (!empty($sav)) {
		$this->Flash->success(__('The Products has been saved.'));
		return $this->redirect(['action' => 'index']);
		} else {
		$this->Flash->error(__('The following Products could not be saved. Please, try again.')); 

                 return $this->redirect(['action' => 'index']);
		}
		}else{
		  	$this->Flash->error(__('Please select csv file.')); 
                         return $this->redirect(['action' => 'index']);  
		} 
		}  
     		
         } 
     
     
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {  	

  	$products = $this->Products->find('all',[
            'contain' => ['Categories', 'Stores']
        ], [
			'order' => ['Products.id' => 'desc']
	]);

	$products = $products->all()->toArray();
	
        foreach($products as &$data){
              if ($data['image'] != '') {
                if (!filter_var($data['image'], FILTER_VALIDATE_URL) === false) {
                    $data['image'] = $data['image'];
                } else {
                    $data['image'] = Router::url('/', true). "images/products/" . $data['image'];
                }  

            } else {
                $data['image'] = Router::url('/', true). "images/products/no-image.jpg";
            } 
        }

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) 
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Stores']
        ]);
        
     

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            
                $image = $this->request->data['image'];
 
	        $name = time().$image['name'];
		$tmp_name = $image['tmp_name'];
		$upload_path = WWW_ROOT.'images/products/'.$name;
		move_uploaded_file($tmp_name, $upload_path);
            $this->request->data['image'] = $name;      
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $cats = $this->Products->Categories->find('treeList', ['limit' => 200]); 
        $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        $this->set(compact('product', 'cats', 'stores'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { 
            
            	        $post = $this->request->data;

			if($this->request->data['image']['name'] != ''){ 
					
			 	
			 
				$image = $this->request->data['image'];
				$name = time().$image['name'];
				$tmp_name = $image['tmp_name'];
				$upload_path = WWW_ROOT.'images/products/'.$name;
				move_uploaded_file($tmp_name, $upload_path);
				 
				$post['image'] = $name;
			
			}else{
				unset($this->request->data['image']);
				$post = $this->request->data;
			}
            $product = $this->Products->patchEntity($product, $post );  
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $cats = $this->Products->Categories->find('treeList', ['limit' => 200]);
        $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        $this->set(compact('product', 'cats', 'stores'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
