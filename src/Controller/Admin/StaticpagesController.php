<?php
namespace App\Controller\Admin;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Staticpages Controller
 *
 * @property \App\Model\Table\StaticpagesTable $Staticpages
 *
 * @method \App\Model\Entity\Staticpage[] paginate($object = null, array $settings = [])
 */
class StaticpagesController extends AppController
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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $staticpages = $this->Staticpages->find('all',[
			'order'		=>  ['Staticpages.id' => 'desc']
		]);
		
		$staticpages = $staticpages->all()->toArray();

        $this->set(compact('staticpages'));
        $this->set('_serialize', ['staticpages']);
    }

    /**
     * View method
     *
     * @param string|null $id Staticpage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staticpage = $this->Staticpages->get($id, [
            'contain' => []
        ]);

        $this->set('staticpage', $staticpage);
        $this->set('_serialize', ['staticpage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staticpage = $this->Staticpages->newEntity();
        if ($this->request->is('post')) {
		
			$post = $this->request->data;
			
			$image = $this->request->data['image'];
			$name = time().$image['name'];
			$tmp_name = $image['tmp_name'];
			$upload_path = WWW_ROOT.'images/staticpages/'.$name;
			move_uploaded_file($tmp_name, $upload_path);
			
			$post['image'] = $name;
		
			$post['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']));
		
            $staticpage = $this->Staticpages->patchEntity($staticpage, $post);
            if ($this->Staticpages->save($staticpage)) {
                $this->Flash->success(__('The staticpage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
            	$this->Flash->error(__('The staticpage could not be saved. Please, try again.'));
			}	
        }
        $this->set(compact('staticpage'));
        $this->set('_serialize', ['staticpage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staticpage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staticpage = $this->Staticpages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		
			$post = $this->request->data;
		
			if($this->request->data['image']['name'] != ''){
					
				if($staticpage->image != ''){
					unlink(WWW_ROOT.'images/staticpages/'.$staticpage->image);
				}	
			
				$image = $this->request->data['image'];
				$name = time().$image['name'];
				$tmp_name = $image['tmp_name'];
				$upload_path = WWW_ROOT.'images/staticpages/'.$name;
				move_uploaded_file($tmp_name, $upload_path);
				
				$post['image'] = $name;
			
			}else{
				unset($this->request->data['image']);
				$post = $this->request->data;
			}
			
			$post['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']));
			
            $staticpage = $this->Staticpages->patchEntity($staticpage, $post);
            if ($this->Staticpages->save($staticpage)) {
                $this->Flash->success(__('The staticpage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
           		$this->Flash->error(__('The staticpage could not be saved. Please, try again.'));
			}	
        }
        $this->set(compact('staticpage'));
        $this->set('_serialize', ['staticpage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staticpage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $staticpage = $this->Staticpages->get($id);
		
		if($staticpage->image != ''){
			unlink(WWW_ROOT.'images/staticpages/'.$staticpage->image);
		}
		
        if ($this->Staticpages->delete($staticpage)) {
            $this->Flash->success(__('The staticpage has been deleted.'));
        } else {
            $this->Flash->error(__('The staticpage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
