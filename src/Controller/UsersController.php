<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailchimp\Mailchimp;
use Cake\Auth\DefaultPasswordHasher;

/**

 * Users Controller

 *

 * @property \App\Model\Table\UsersTable $Users

 *

 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])

 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['add', 'login', 'forgot', 'reset', 'contact', 'newsletter', 'gplogin', 'signup','fblogin','referearn','invitecode','wallet']);  

        $this->authcontent(); 
    } 

 
    /**

     * View method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|void

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */
    public function view($id = null) {

        $user = $this->Users->get($id, [

            'contain' => []
        ]);



        $this->set('user', $user);

        $this->set('_serialize', ['user']);
    }

    /**

     * Add method

     *

     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

     */
    public function add() {



        if ($this->Auth->user()) {

            return $this->redirect('/');
        }



        $user = $this->Users->newEntity();



        if ($this->request->is('post')) {

            $this->request->data['username'] = $this->request->data['email'];

            $post = $this->request->getData();

            //echo "<pre>"; print_r($post); echo "</pre>"; exit;

            $post['status'] = '1';

            $post['name'] = $post['first_name'] . ' ' . $post['last_name'];


            $user = $this->Users->patchEntity($user, $post);

            $new_user = $this->Users->save($user);

            if ($new_user) {

                if (isset($user)) {
                    

                        $ms = 'You are registered recently with email ID <strong>' . $post['email'] . '</strong> on Affiliate Shop.';

                        $email = new Email('default');
                        $email->from(['rupak@avainfotech.com' => 'Affiliate Shop'])
                                ->emailFormat('html')
                                ->template('default', 'default')
                                ->to($user->email)
                                ->subject('Regarding User Registration')
                                ->send($ms);
                  
                }


                $this->Flash->success(__('Registered Successfully.'));


                /*                 * ********************************* */
                /* 				 Login				 */
                /*                 * ********************************* */

                if (!filter_var($this->request->data['email'], FILTER_VALIDATE_EMAIL) === false) {

                    $this->Auth->config('authenticate', [

                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                    ]);

                    $this->Auth->constructAuthenticate();

                    $this->request->data['email'] = $this->request->data['email'];

                    //unset($this->request->data['username']);
                }

                $user = $this->Auth->identify();

                if ($user) {
                    $this->Auth->setUser($user);

                    return $this->redirect(['action' => 'edit', $new_user->id]);
                }

                /*                 * ********************************* */
                /* 			Login (END)				 */
                /*                 * ********************************* */


                //return $this->redirect(['action' => 'add']);
            } else {

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }



        $this->set(compact('user'));

        $this->set('_serialize', ['user']);
    }

    public function signup() {

        $response = array();

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            if ($this->request->data['name'] == '' || $this->request->data['email'] == '' || $this->request->data['password1'] == '' || $this->request->data['password'] == '') {
                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Please fill all the fields</strong></div>";
            } else if ($this->request->data['password1'] != $this->request->data['password']) {
                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Password and confirm password does not match.</strong></div>";
            } else {

                $user_check = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['email']]]);
                $user_check = $user_check->first();
                if (!empty($user_check)) {
                    $response['isSucess'] = "false";
                    $response['msg'] = "<div class='alert alert-danger'><strong>Email address already exists. Please try with another Email Address..</strong></div>";
                } else {

                    $post = $this->request->data;

                    $post['status'] = '1';
                    $post['role'] = 'customer';
                    $post['name'] = $post['name'];
                    $post['username'] = $post['email'];

                    $user = $this->Users->patchEntity($user, $post);
                    $new_user = $this->Users->save($user);
                    
                     // generate refferal code
                        $user_referral_code =  substr($post['email'],0,3).rtrim(strtr(base64_encode($new_user->id), '+/', '-_'), '=');  
                        $this->Users->updateAll(['refer_code' =>  $user_referral_code], ['id' => $new_user->id]);
                    if ($new_user) {
                        $ms = 'A new user has been registered recently with email address <strong>' . $post['email'] . '</strong>';

                        $ms .= '<br>';

                        $ms .= '<table border="0"><tr><th scope="row" align="left">Name</th><td>' . $post['name'] . '</td></tr><tr><th scope="row" align="left">Email</th><td>' . $post['email'] . '</td></tr></table>';

                         $email = new Email('default');
                         $email->from(['rupak@avainfotech.com' => 'Affiliate Shop'])
                         	->emailFormat('html')
                         	->template('default', 'default')
                         	->to($new_user->email)
                         	->subject('New User Registration')
                         	->send($ms);
                        $currentuser = $this->Users->find('all', ['conditions' => ['Users.id' => $new_user->id]]);
                        $currentuser = $currentuser->first();
                        $this->Auth->setUser($currentuser);     
                        $response['isSucess'] = "true";
                        $response['msg'] = "<div class='alert alert-success'><strong>Registered Successfully.</strong></div>";
                    }
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function fblogin() {  
        $session = $this->request->session();

        $response = array();
        if (isset($this->request->data['action']) && $this->request->data['action'] == "fblogin") {

            $results = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['myid']['email']]]);
            $results = $results->first();


            if (!empty($results)) {
             
              // $this->request->data['username'] = $results['email'];
              // $this->request->data['password'] = 'zxswedcxswzrrr';  
               // $user1 = $this->Auth->identify();  

                if ($results) {
                    $this->Users->updateAll(array('fb_id' => $this->request->data['myid']['id']), array('id' => $results['id']));
                    $this->Auth->setUser($results);
                    $session->write('sociallogin',1);
                    $response['isSuccess'] = 'true';
                    $response['msg'] = 'Logged in successfully';
                } else {
                    $response['isSuccess'] = 'false';
                    $response['msg'] = 'Error In Signing In. Please Try Again.';
                }
            } else {

                $post = array();

                $post['fb_id'] = $this->request->data['myid']['id'];
                $post['first_name'] = $this->request->data['myid']['first_name'];
                $post['last_name'] = $this->request->data['myid']['last_name'];
                $post['email'] = $this->request->data['myid']['email'];
                $post['username'] = $this->request->data['myid']['email'];
                $post['name'] = $this->request->data['myid']['name'];
                $post['password'] = 'zxswedcxswzrrr';
                $post['status'] = '1';
                $post['role'] = 'customer';


                $user = $this->Users->newEntity();

                $user = $this->Users->patchEntity($user, $post);
                $new_user = $this->Users->save($user);
                
                if ($new_user) {
                    // generate refferal code
                        $user_referral_code =  substr($post['email'],0,3).rtrim(strtr(base64_encode($new_user->id), '+/', '-_'), '=');  
                        $this->Users->updateAll(['refer_code' =>  $user_referral_code], ['id' => $new_user->id]);
                    $this->request->data['username'] = $this->request->data['myid']['email'];
                    $this->request->data['password'] = 'zxswedcxswzrrr';

                    if (!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL) === false) {
                        $this->Auth->config('authenticate', [
                            'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                        ]);

                        $this->Auth->constructAuthenticate();

                        $this->request->data['email'] = $this->request->data['username'];

                        unset($this->request->data['username']);
                    }

                    $user2 = $this->Auth->identify();

                    if ($user2) {

                        $this->Auth->setUser($user2);
                         $session->write('sociallogin',1);      
                        $response['isSuccess'] = 'true';
                        $response['msg'] = 'Logged In Successfully';
                    } else {
                        $response['isSuccess'] = 'false';
                        $response['msg'] = 'Error in Signing In. Please Try Again.';
                    }
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function gplogin() {
         $session = $this->request->session();
        $response = array();

        if (isset($this->request->data['action']) && $this->request->data['action'] == "gplogin") {

            $results = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['email']]]);
            $results = $results->first();
            if (!empty($results)) {
               // $user1 = $this->Auth->identify();

                if ($results) {  
                    $this->Users->updateAll(array('google_id' => $this->request->data['id']), array('id' => $results['id']));
                    $this->Auth->setUser($results);  
                     $session->write('sociallogin',1);      
                    $response['isSuccess'] = 'true';
                    $response['msg'] = 'Logged in Successfully';
                } else {
                    $response['isSuccess'] = 'false';
                    $response['msg'] = 'Error In Signing In. Please Try Again.';
                }
            } else {

                $post = array();

                $post['google_id'] = $this->request->data['id'];
                $post['first_name'] = $this->request->data['first_name'];
                $post['last_name'] = $this->request->data['last_name'];
                $post['email'] = $this->request->data['email'];
                $post['username'] = $this->request->data['email'];
                $post['name'] = $this->request->data['name'];
                $post['password'] = 'zxswedcxswzrrr';
                $post['status'] = '1';
                $post['role'] = 'customer';


                $user2 = $this->Users->newEntity();

                $user2 = $this->Users->patchEntity($user2, $post);
                $new_user = $this->Users->save($user2);

                if ($new_user) {
                    // generate refferal code
                        $user_referral_code =  substr($post['email'],0,3).rtrim(strtr(base64_encode($new_user->id), '+/', '-_'), '=');  
                        $this->Users->updateAll(['refer_code' =>  $user_referral_code], ['id' => $new_user->id]);
                    $this->request->data['username'] = $this->request->data['email'];
                    $this->request->data['password'] = 'zxswedcxswzrrr';
                    $user2 = $this->Auth->identify();

                    if ($user2) {

                        $this->Auth->setUser($user2);
                         $session->write('sociallogin',1);      
                        $response['isSuccess'] = 'true';
                        $response['msg'] = 'Logged in Successfully';
                    } else {
                        $response['isSuccess'] = 'false';
                        $response['msg'] = 'Error In Signing In. Please Try Again.';
                    }
                } else {
                    $response['isSuccess'] = 'false';
                    $response['msg'] = 'Error In Signing In. Please Try Again.';
                }
            }
        }

        echo json_encode($response);
        exit;
    }
    
    
    public function myaccount(){
      $this->loadModel('Favourites');  
      $uid =  $this->Auth->user('id');
      if($uid){
        $userdata  = $this->Users->find('all',array('conditions'=>array('Users.id'=>$uid)));
        $userdata  = $userdata->first();
        
        $fav_store  = $this->Favourites->find('all',array('contain'=>['Stores'],'conditions'=>array('Favourites.user_id'=>$uid)));
        $fav_store  = $fav_store->all();
        $fav_store = $fav_store->toArray();

      }else {
       return $this->redirect(['controller' => 'stores', 'action' => 'index']);    
      }
         $this->set(compact('userdata','fav_store'));
        $this->set('_serialize', ['userdata','fav_store']);
      
    }

    /**

     * Edit method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */
    public function edit() {
        
        $id = $this->Auth->user('id');
       if($id){
          
              $user = $this->Users->get($id, [

            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
 
            $post = $this->request->data;

//                if ($this->request->data['image']['name'] != '') {
//
//                    if ($user->image != '') {
//                        unlink(WWW_ROOT . 'images/users/' . $user->image);
//                    }
//
//                    $image = $this->request->data['image'];
//                    $name = time() . $image['name'];
//                    $tmp_name = $image['tmp_name'];
//                    $upload_path = WWW_ROOT . 'images/users/' . $name;
//                    move_uploaded_file($tmp_name, $upload_path);
//
//                    $post['image'] = $name;
//                } else {
//                    unset($this->request->data['image']);
//                    $post = $this->request->data;
//                }


                $post['name'] = $post['first_name'] . ' ' . $post['last_name'];
    
            $user = $this->Users->patchEntity($user, $post);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));
            } else {

                $this->Flash->error(__('The User Could Not Be saved. Please, Try Again.'));
            }
        }

           
       }else{
           $this->Flash->error(__('You must login first.'));  
          return $this->redirect(['controller' => 'stores', 'action' => 'index']);    
       } 

        $this->loadModel('Countries');

        $countries = $this->Countries->find('all');
        $countries = $countries->all();

        $this->set(compact('countries'));

        $this->set(compact('user'));

        $this->set('_serialize', ['user']);
    }

    /**

     * Delete method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|null Redirects to index.

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */
    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {

            $this->Flash->success(__('The User Has Been Deleted.'));
        } else {

            $this->Flash->error(__('The User Could Not Be Deleted. Please, Try Again.'));
        }



        return $this->redirect(['action' => 'index']);
    }

    public function login() {

        if ($this->request->is('post')) {

            $this->request->session()->delete('user_id');    

            if ($this->request->data['username'] == '') {
                $response['isSucess'] = "false";

                $response['msg'] = "<div class='alert alert-danger'><strong>Please enter your Email Address!</strong></div>";
            } else if ($this->request->data['password'] == '') { 

                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Please enter your Password!</strong></div>";
            } else {

                if (!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL) === false) {

                    $this->Auth->config('authenticate', [

                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                    ]);

                    $this->Auth->constructAuthenticate();

                    $this->request->data['email'] = $this->request->data['username'];

                    unset($this->request->data['username']);
                }

                $user = $this->Auth->identify();
                if ($user) {

                    if ($user['status'] == 0) {
                        $this->Auth->logout();
                        $response['data'] = "no data";
                        $response['isSucess'] = "false";
                        $response['msg'] = "<div class='alert alert-danger'><strong>You are not active Yet!</strong></div>";
                    } else {
                        $this->Auth->setUser($user);
                        if ($this->Auth->user('role') == 'admin') {
                            $this->Auth->logout();

                            $response['data'] = "no data";

                            $response['isSucess'] = "false";
                            $response['msg'] = "<div class='alert alert-danger'><strong>Your Role Is Admin</strong></div>";
                        } else {
                            $response['data'] = $this->Auth->user();
                            $response['isSucess'] = "true";
                            $response['msg'] = "<div class='alert alert-success'><strong>Logged In Successfully</strong></div>";
                        }
                    }
                } else {
                    $response['data'] = "no data";

                    $response['isSucess'] = "false";
                    $response['msg'] = "<div class='alert alert-danger'><strong>Invalid Email Address & Password</strong></div>";
                   
                }
            }
        } else {

            return $this->redirect(['controller' => 'stores', 'action' => 'index']);
        }

        $this->set(compact('response'));

        $this->set('_serialize', ['response']);
    }

    public function logout() {  
         $this->request->session()->delete('sociallogin');  
        if ($this->Auth->logout()) {

            return $this->redirect('/');
        }
    }

    public function forgot() {
        if ($this->Auth->user('id')) {  
            $this->redirect('/');
        }


        if ($this->request->is('post')) {

            $email = $this->request->data['email'];



            $user = $this->Users->find('all', ['conditions' => ['Users.email' => $email]]);

            $user = $user->first();

            $burl = Router::fullbaseUrl();

            if (empty($user)) {

                $this->Flash->error(__('Please Enter valid Email Address'));
            } else {

                if ($user->email) {

                    $hash = md5(time() . rand(111999999999999999999999999, 99999999999999999999999999999999999999999));

                    $url = Router::url(['controller' => 'Users', 'action' => 'reset' . '/' . $hash]);



                    $this->Users->updateAll(array('tokenhash' => $hash), array('id' => $user->id));

                    $ms = "User<br/>";

                    $ms.='<a href=' . $burl . $url . '>Click Here To Reset Your Password</a><br/>';

                    $email = new Email('default');

                    $email->from(['rupak@avainfotech.com' => 'Affiliate Shop'])
                            ->emailFormat('html')
                            ->template('default', 'default')
                            ->to($user->email)
                            ->subject('Reset Your Password')
                            ->send($ms);



                    $this->Flash->success(__('Check your Email To Reset Your Password'));
                } else {

                    $this->Flash->error(__('Email Is Invalid'));
                }
            }
        }
    }

    public function reset($token) {
//
//        if ($this->Auth->user('id')) { 
//            $this->redirect('/');
//        }

        $query = $this->Users->find('all', ['conditions' => ['Users.tokenhash' => $token]]);
        $data = $query->first();
        if ($data) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                if ($this->request->data['password1'] != $this->request->data['password']) {
                    $this->Flash->success(__('New password & confirm password does not match!'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                }
                $this->request->data['tokenhash'] = md5(time() . rand(111999999999999999999999999999, 999999999999999999999999999999999));
                $user = $this->Users->get($data->id, [
                    'contain' => []
                ]);
                $user = $this->Users->patchEntity($user, $this->request->getData());  

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your Password Has Been Changed'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                } else {
                    $this->Flash->success(__('Invalid Password, Try Again'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                }
            }
        } else {
            $this->Flash->success(__('Invalid Token, Try Again'));
            return;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    public function changepassword() {
        $id = $this->Auth->user('id');

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['password1'])) {
                if ($this->request->data['password'] != $this->request->data['password1']) {
                    $this->Flash->success(__('New and confirm password does not match'));
                    return;
                }
            }
            if ((new DefaultPasswordHasher)->check($this->request->data['opassword'], $user['password'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password Changed Successfully'));

                    if (isset($_GET['route'])) {
                        return $this->redirect(['action' => 'edit', $id]);
                    } else {
                        return $this->redirect(['action' => 'changepassword']);
                    }
                } else {
                    $this->Flash->success(__('Invalid Password, Try again'));
                    if (isset($_GET['route'])) {
                        return $this->redirect(['action' => 'edit', $id]);
                    } else {
                        return $this->redirect(['action' => 'changepassword']);
                    }
                }
            } else {
                $this->Flash->success(__('Old Password Did Not Match'));
                if (isset($_GET['route'])) {
                    return $this->redirect(['action' => 'edit', $id]);
                } else {
                    return $this->redirect(['action' => 'changepassword']);
                }
            }
        }
    }

    public function referearn() {
       $id = $this->Auth->user('id');
       
       if($this->request->is('post')){
           $email1 = $this->request->data['email'];
           $refer_link = $this->request->data['refer_link'];

            if(!empty($email1)){ 

                 $email = new Email('default');

                 $send = $email->from(['rupak@avainfotech.com' => 'Affiliate Shop']) 
                        ->emailFormat('html')
                        ->template('invite')
                        ->to($email1)
                        ->subject('Registration Invite Code!')
                        ->viewVars(array('link' => $refer_link)) 
                        ->viewVars(array('email' => $email1))  
                        ->send();
                  if($send){
                      $this->Flash->success(__('Successfully Sent!'));
                  }else{
                   $this->Flash->error(__('Try Again!')); 
                  } 
            }
           
        }
       $query = $this->Users->find('all', ['conditions' => ['Users.id' => $id]]);
       $user = $query->first();
       
        $this->set('user',$user); 
        $this->set('_serialize', ['user']);

      
    }
    
    public function invitecode($invitecode = null) {    

       
    }
    

    public function wallet() {
      $uid =  $this->Auth->user('id');
      $this->loadModel('Paymentinfos');
        $fav = $this->Paymentinfos->newEntity();
         $post = $this->request->data;  
         $post['user_id'] = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $check = $this->Paymentinfos->find('all',array('conditions'=>array('AND'=>array('Paymentinfos.card_no'=>$this->request->data['card_no'],'Paymentinfos.user_id'=>$this->Auth->user('id')))));
           
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
       
      if($uid){
        $userdata  = $this->Users->find('all',array('conditions'=>array('Users.id'=>$uid)));
        $userdata  = $userdata->first(); 
      }else {
       return $this->redirect(['controller' => 'stores', 'action' => 'index']);    
      }
        $this->set(compact('userdata'));
        $this->set('_serialize', ['userdata']);  

    }

    public function addGallery() {

        $this->loadModel('Galleries');

        $gallery = $this->Galleries->newEntity();

        if ($this->request->is(['patch', 'put', 'post'])) {

            $file = $this->request->data['file'];
            $name = time() . $file['name'];
            $tmp_name = $file['tmp_name'];
            $upload_path = WWW_ROOT . 'images/gallery/' . $name;
            move_uploaded_file($tmp_name, $upload_path);

            $this->request->data['file'] = $name;
            $this->request->data['format'] = $file['type'];
            $this->request->data['user_id'] = $this->Auth->user('id');

            $gallery = $this->Galleries->patchEntity($gallery, $this->request->data);

            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('You File Bas Been Uploaded Successfully'));
                return $this->redirect(["controller" => "users", "action" => "trainer"]);
            } else {
                $this->Flash->success(__('Error In File Upload. Please Try Again Later'));
                return $this->redirect(["controller" => "stores", "action" => "index"]);
            }
        }
    }

    public function removeGallery($id) {

        $id = base64_decode($id);

        $this->loadModel('Galleries');

        $gallery = $this->Galleries->get($id, [
            'contains' => []
        ]);

        unlink(WWW_ROOT . 'images/gallery/' . $gallery->file);

        $result = $this->Galleries->delete($gallery);

        if ($result) {
            $this->Flash->success(__('You file has been deleted successfully'));
            return $this->redirect(["controller" => "users", "action" => "trainer"]);
        } else {
            $this->Flash->success(__('Error in file deletion. Please try again later'));
            return $this->redirect(["controller" => "users", "action" => "trainer"]);
        }
    }

    public function contact() {


        $this->loadModel('Contacts');

        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {

                $ms = '<table width="200" border="1"><tr><th scope="row">Name</th><td>' . $this->request->data['name'] . '</td></tr><tr><th scope="row">Email</th><td>' . $this->request->data['email'] . '</td></tr><tr><th scope="row">Subject</th><td>' . $this->request->data['subject'] . '</td></tr><th scope="row">Message</th><td>' . $this->request->data['message'] . '</td></tr></table>';


                $email = new Email('default');

                $email->from(['rupak@avainfotech.com' => 'Affiliate Shop'])
                        ->emailFormat('html')
                        ->template('default', 'default')
                        ->to('rupak@avainfotech.com')
                        ->subject('Contact Us Enquiry')
                        ->send($ms);


                $this->Flash->success(__('Your Enquiry has been sent successfully.'));
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    /*     * *********Newsletter**************** */

    public function newsletter() {
        // include(ROOT.'/Mailchimp/Mailchimp.php'); 
         require ROOT.'/vendor/jhut89/mailchimp3php/src/mailchimpRoot.php';
        //ashu $api_key = "35833bae8881ce0ecced3fc3daa81482-us14";    
        //ashu $list_id = "1a2fe1e7c5";
        $list_id = "5560075e9c";

      $post_params = ['email_address'=>$_POST['email'], 'status'=>'subscribed'];

       $subscriber =  $mailchimp->lists($list_id)->members()->POST($post_params);

       // $subscriber = $Mailchimp_Lists->subscribe($list_id, array('email' => htmlentities($_POST['email'])));
        if (!empty($subscriber->id)) {
            echo "success";
        } else {
            echo "fail";
        }
        exit;
    }

}
