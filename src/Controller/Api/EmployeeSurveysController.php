<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Datasource\ConnectionManager;
use Cake\Collection\Collection;
use Cake\Event\Event;
use Cake\Log\Log;

/*$dsn = 'mysql://root:1234@localhost/new_buzzydoc';
ConnectionManager::config('new_buzzydoc', ['url' => $dsn]);*/

/**
 * ReferralLeads Controller
 *
 * @property \App\Model\Table\VendorRedeemedPointsTable 
 */
class  EmployeeSurveysController extends ApiController
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

    public function startSurvey(){
      $loggedInUser = $this->Auth->user();
      $this->loadModel('EmployeeSurveys');

      $indiSurvey = $this->EmployeeSurveys->findByUserId($loggedInUser['id'])
      ->where(['end_time IS NULL'])
      ->first();

      if(!$indiSurvey){
        $indiSurveyEntry = [
        'user_id' => $this->Auth->user('id'),
        'iteration' => 1,
        ];
        $newEntity = $this->EmployeeSurveys->newEntity();
        $indiSurveyEntry = $this->EmployeeSurveys->patchEntity($newEntity, $indiSurveyEntry);
        $indiSurveyEntry = $this->EmployeeSurveys->save($indiSurveyEntry);

        if($indiSurveyEntry){
          $indiSurveyId = $indiSurveyEntry->id;
        }
      }else{
            //if survey entry already exists.
        $indiSurveyId = $indiSurvey->id;
      }

      if($indiSurveyId){
        if(isset($indiSurveyEntry)){
          $this->set('indiSurveyEntryCreated', true);
        }else{
          $this->set('indiSurveyEntryCreated', false);
        }
      }else{
        throw new Exception("Individual Survey could not be started.");
      }
      $this->set('indiSurveyId', $indiSurveyId);
      $this->set('_serialize',['indiSurvey','indiSurveyEntryCreated','indiSurveyId']);
    }

    public function saveSurveyResponse(){
      if(!$this->request->is('post')){
        throw new MethodNotAllowedException(__('BAD_REQUEST'));
      }

      $data = $this->request->data;
      $this->loadModel('EmployeeSurveyResponses');
      $newEntity = $this->EmployeeSurveyResponses->newEntities($data);
      $saveSurveyResponse = $this->EmployeeSurveyResponses->patchEntities($newEntity, $data);
      $this->EmployeeSurveyResponses->saveMany($saveSurveyResponse);

      $this->set('response',$saveSurveyResponse);
      $this->set('_serialize', 'response');

    }

    public function stopSurvey(){
      $loggedInUser = $this->Auth->user();
      $this->loadModel('EmployeeSurveys');

      $indiSurvey = $this->EmployeeSurveys->findByUserId($loggedInUser['id'])
      ->where(['end_time IS NULL'])
      ->first();
      $indiSurvey->end_time = date('Y-m-d H:i:s');
      $indiSurveySave = $this->EmployeeSurveys->save($indiSurvey);

      $this->set('response', $indiSurveySave);
      $this->set('_serialize', 'response');
    }

    public function employeeSurveyQuestions(){
      $loggedInUser = $this->Auth->user();
      $this->loadModel('EmployeeSurveys');
      $employeeSurvey = $this->EmployeeSurveys->findByUserId($loggedInUser['id'])
                                              ->where(['end_time IS NULL'])
                                              ->last();

      $employeeSurveyId = $employeeSurvey['id'];
      // pr($employeeSurveyId);die;
      $this->loadModel('UserJobDesignations');
      $jobDesignationId = $this->UserJobDesignations->findByUserId($loggedInUser['id'])
                                                    ->first();

      $this->loadModel('JobDesignationCompetencies');
      $surveyData = $this->JobDesignationCompetencies->findByJobDesignationId($jobDesignationId['job_designation_id'])
                                                     ->contain(['Competencies.CompetencyQuestions.Questions' => function($q) use($employeeSurveyId){
                                                        return $q->contain(['ResponseGroups.ResponseOptions','EmployeeSurveyResponses' => function($x)use($employeeSurveyId){
                                                                return $x->where(['employee_survey_id' => $employeeSurveyId]);
                                                              }]);
                                                      }])
                                                     ->all();

      $this->set('surveyData', $surveyData);
      $this->set('employeeSurveyId', $employeeSurveyId);
      $this->set('_serialize',['surveyData','saveResponses','employeeSurveyId','jobDesignationId','loggedInUser']);
}

}