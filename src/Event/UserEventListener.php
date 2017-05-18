<?php 
namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Exception;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;

class UserEventListener implements EventListenerInterface {

	public function implementedEvents()
	{
	    return [
	        'PerformanceMonitoring.registerUser' => 'onRegistration',
	        'PerformanceMonitoring.forgotPassword' => 'onforgotPassword',
	        'PerformanceMonitoring.login' => 'onLogin',
	        'PerformanceMonitoring.applicationData' => 'applicationData'
	    ];
	}

	public function onRegistration($event, $data){
		// pr($data);die;
		$url = Router::url('/integrateideas/user/users', true);
		$email_send = new Email();
		$email_send->to($data->email)
		->subject('Register New User')
		->send($url);
	}

	public function onforgotPassword($event, $data){
		$url = Router::url('/integrateideas/user/', true);
		$url = $url.'users/resetPassword?reset-token='.$data[0];
		$email_send = new Email();
		$email_send->to($data[1])
		->subject('Reset Password Link')
		->send($url);  
	}
	public function applicationData($event, $data){

		$user = TableRegistry::get('JobDesignations');
		$user = $user->find()->combine('id','label')->toArray();
		// pr($user);die;
		return $user;
	}
}