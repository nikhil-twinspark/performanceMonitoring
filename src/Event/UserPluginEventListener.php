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
use Cake\Datasource\ModelAwareTrait;

class UserPluginEventListener implements EventListenerInterface {
	use ModelAwareTrait;
	public function implementedEvents()
	{
	    return [
	        'userPlugin.users.add.save' => 'onRegistration',
	        'userPlugin.users.login.success' => 'usersLoginSuccess',
	        'userPlugin.users.resetPasswordLink' => 'onforgotPassword',
	        'userPlugin.users.add.enter' => 'addUserRequiredData'
	    ];
	}

	public function usersLoginSuccess($event, $data){

		$user = $data;
		$eventData = [];
	    $this->loadModel('Roles');
	    $eventData['role'] = $this->Roles->findById($user['role_id'])->first();

	    return $eventData;

	} 	

	public function addUserRequiredData($event, $data){
		$this->loadModel('JobDesignations');
        $jobDesignations = $this->JobDesignations->find()->combine('id','label')->toArray();

        return $jobDesignations;
	}

	public function onRegistration($event, $data){
		$this->loadModel('UserJobDesignations');
		$reqData['job_designation_id'] = $data['user']->user_job_designations['job_designation_id'];
		$reqData['user_id'] = $data['user']->id;

		
		$reqData = $this->UserJobDesignations->patchEntity($this->UserJobDesignations->newEntity($reqData), $data);
        $this->UserJobDesignations->save($reqData);

		$email_send = new Email();
		if($data['user']['role_id'] == 1){
			$emailText = "<p>You have been successfully registered on CAPview. You are a Super Admin here at Twinspark.</p>";
			$email_send->to($data['user']['email'])
			->emailFormat('html')
			->subject('Register New User')
			->send($emailText);	
		}elseif($data['user']['role_id'] == 2){
			$emailText = "<p>You have been successfully registered on CAPview. You are a Manager here at Twinspark. </p>";
			$email_send->to($data['user']['email'])
			->emailFormat('html')
			->subject('Register New User')
			->send($emailText);
		}else{
			$emailText = "<p>You have been successfully registered on CAPview. You are an Employee here at Twinspark. </p>";
			$email_send->to($data['user']['email'])
			->emailFormat('html')
			->subject('Register New User')
			->send($emailText);
		}
		
	}

	public function onforgotPassword($event, $data){
		$email_send = new Email();
		$emailText = "<p>Forgot Your Password? We can help! <br> This link will log you in and take you to a page where you can set a new password.<br> Click here to sign in and change your password. <br></p>".$data['link'];
		$email_send->to($data['email'])
		->subject('CAPview - Reset your Password')
		->emailFormat('html')
		->send($emailText);

	}
}