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
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class UsersController extends AppController
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

    const SUPER_ADMIN_LABEL = 'admin';
    const MANAGEMENT_LABEL = 'manager';
    const EMPLOYEES_LABEL = 'employee';

    public function initialize(){
        parent::initialize();
        $this->Auth->config('authorize', ['Controller']);
        $this->Auth->allow(['add','adminDashboard','signUp']);
    }

    public function adminDashboard(){
        $this->loadModel('UserJobDesignations');
        $userJobDesig = $this->UserJobDesignations->find()
                                                  ->contain('JobDesignations')
                                                  ->all()
                                                  ->combine('user_id', 'job_designation.label')
                                                  ->toArray();

        $loggedInUser = $this->Auth->user();
        if($loggedInUser['role']->name == self::SUPER_ADMIN_LABEL){
        $controller = new Controller;
        $this->Users = $controller->loadModel('Integrateideas/User.Users');
        $roleLabel = self::SUPER_ADMIN_LABEL;
        $users = $this->Users->find()->contain(['Roles'])->all();
        }
        $this->set('userJobDesig', $userJobDesig);
        $this->set('loggedInUser', $loggedInUser);
        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }

    
    public function managementDashboard(){
        $loggedInUser = $this->Auth->user();
        if($loggedInUser['role']->name == self::MANAGEMENT_LABEL){
        $this->loadModel('Integrateideas/User.Users');
        $roleLabel = self::SUPER_ADMIN_LABEL;
        $users = $this->Users->find()->contain(['Roles' => function($q)use($roleLabel){
            return $q->where(['Roles.name IS NOT' => $roleLabel]);

        }])->all();
        }
        $this->set('loggedInUser', $loggedInUser);
        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }    

    public function employeeDashboard(){
        $loggedInUser = $this->Auth->user();
        if($loggedInUser['role']->name == self::EMPLOYEES_LABEL){
        $this->loadModel('Integrateideas/User.Users');
        $roleLabel = self::EMPLOYEES_LABEL;
        $users = $this->Users->find()->contain(['Roles' => function($q)use($roleLabel){
            return $q->where(['Roles.name' => $roleLabel]);

        }])->all();
        }
        $this->set('loggedInUser', $loggedInUser);
        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }

    public function signUp(){
        $userTable = $this->loadModel('Integrateideas/User.Users');
        $user = $userTable->newEntity();
        $this->loadModel('Integrateideas/User.Roles');
        $roles = $this->Roles->find()->where(['Roles.name IS NOT' => 'admin' ])->combine('id', 'label')->toArray();
        $this->loadModel('JobDesignations');
        $jobDesignations = $this->JobDesignations->find()->combine('id','label')->toArray();
        if ($this->request->is('post')) {
            $email = $this->request->data['email'];
            list ($user, $domain) = explode('@', $email);
            $isTwinsparkMail = ($domain == 'twinspark.co');
            if($isTwinsparkMail){
            $userTable = $this->loadModel('Integrateideas/User.Users');
            $user = $userTable->newEntity();
            $user = $userTable->patchEntity($user, $this->request->data);
            if(!$user->errors()){
            if ($userTable->save($user)) {
                if(!$userTable->save($user)['job_designation_id']){
                $userJobDesignationData = ['user_id' => $userTable->save($user)['id'], 'job_designation_id' => '0'];
                }else{
                $userJobDesignationData = ['user_id' => $userTable->save($user)['id'], 'job_designation_id' => $userTable->save($user)['job_designation_id']];
                }
                $this->loadModel('UserJobDesignations');
                $userJobDesig = $this->UserJobDesignations->newEntity();
                $userJobDesig = $this->UserJobDesignations->patchEntity($userJobDesig,$userJobDesignationData);
                $this->UserJobDesignations->save($userJobDesig);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect('/integrateideas/user/users/login');
            }else{
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
          }else{
            $this->Flash->error(__('KINDLY_PROVIDE_VALID_DATA'));
          }
        }else{
           $this->Flash->error(__('Email id should be @twinspark.co')); 
        }
      }
    $this->set('jobDesignations', $jobDesignations);
    $this->set('roles', $roles);
    $this->set('user', $user);
    $this->set('_serialize', ['user']);


    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user)
    {
    return true;
    }

}
