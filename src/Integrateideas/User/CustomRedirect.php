<?php
namespace App\Integrateideas\User;

use Cake\Event\EventListenerInterface;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Exception;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;

class CustomRedirect
{
	
	private $_redirectArray = null;

	private $_appUrl = null;

	public function __construct() {
		$this->_redirectArray = [
		'admin' => '/users/adminDashboard',
		'manager' => '/users/managementDashboard',
		'employee' => '/users/employeeDashboard',
		];

 		$this->_appUrl = ''; //You can also use bootstrap or AppUrl from app.php here
	}

	public  function getRedirectUrl($roleName){
	 	
	 	return $this->_redirectArray[$roleName];
	}

}

?>

