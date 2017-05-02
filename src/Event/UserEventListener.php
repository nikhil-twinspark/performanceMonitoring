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
	        'PerformanceMonitoring.login' => 'onLogin'
	    ];
	}

	public function onRegistration($event, $data){
		$url = Router::url('/integrateideas/user/users', true);
		$email_send = new Email();
		$email_send->setTo($data->email)
		->setSubject('Register New User')
		->send($url);
	}

	public function onforgotPassword($event, $data){
	  $url = Router::url('/integrateideas/user/', true);
	  $url = $url.'users/resetPassword?reset-token='.$data[0];
	  $email_send = new Email();
	  $email_send->setTo($data[1])
	  ->setSubject('Reset Password Link')
	  ->send($url);  
	}
}