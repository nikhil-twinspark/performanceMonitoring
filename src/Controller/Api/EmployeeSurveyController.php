<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Collection\Collection;


/*$dsn = 'mysql://root:1234@localhost/new_buzzydoc';
ConnectionManager::config('new_buzzydoc', ['url' => $dsn]);*/

/**
 * ReferralLeads Controller
 *
 * @property \App\Model\Table\VendorRedeemedPointsTable 
 */
class  AwardsController extends ApiController
{

    public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');

  }

/**
  * Tier method
  * This method is called when amount is spent by the patient. Calculate method in PatientTiersTable is called.
  * If tier upgrades mailer event is fired further if a gift coupon is associated to the tier then GiftCoupon method 
  * is called.
  * If year changes for a patient then mailer event is fired.
  *
  * @return \Cake\Network\Response
  * @throws \Cake\Network\Exception\InternalErrorException when data provided is not valid.
  * @throws \Cake\Network\Exception\BadRequestException if data is empty.
  * @throws \Cake\Network\Exception\MethodNotAllowedException if request is not post.
  * @author James Kukreja
  */



}