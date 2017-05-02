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
        $this->Auth->allow(['add','adminDashboard']);
    }

    public function adminDashboard(){
        $loggedInUser = $this->Auth->user();
        if($loggedInUser['role']->name == self::SUPER_ADMIN_LABEL){
        $controller = new Controller;
        $this->Users = $controller->loadModel('Integrateideas/User.Users');
        $roleLabel = self::SUPER_ADMIN_LABEL;
        $users = $this->Users->find()->contain(['Roles'])->all();
        }
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
