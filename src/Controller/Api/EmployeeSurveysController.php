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
      $newEntity = $this->EmployeeSurveyResponses->findByEmployeeSurveyId($data[0]['employee_survey_id']);
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
      $employeeSurveyId = $indiSurveySave['id'];
      
      $this->loadModel('EmployeeSurveyResponses');
      $surveyResultData =  $this->EmployeeSurveyResponses->findByEmployeeSurveyId($employeeSurveyId)
                                                         ->contain(['Questions.CompetencyQuestions'])
                                                         ->all();
// pr($surveyResultData);die;
      $surveyResultDataByQuestions = $surveyResultData->groupBy('question.competency_questions.0.competency_id')->toArray();
      $collection = new Collection($surveyResultDataByQuestions);
      $dataByLevelNo = $collection->map(function($value,$key){
            $dataByLevelNo2 = new Collection($value);
            $dataByLevelNo2 = $dataByLevelNo2->groupBy('question.level_no');
            return $dataByLevelNo2->toArray();
      });
      $result = $dataByLevelNo->toArray();
      $data = [];
      $this->loadModel('EmployeeSurveyResults');
      $fetchSurveyResultData = $this->EmployeeSurveyResults->findByEmployeeSurveyId($employeeSurveyId)
                                                           ->all();
// pr($fetchSurveyResultData);die;
      $fetchData = $fetchSurveyResultData->combine('competency_id','id')
                                         ->toArray();

      
      foreach ($result as $competencyId => $value1) {
        $curLevFound = false;
          foreach ($value1 as $levelNo => $value2) {
              foreach ($value2 as $index => $value3) {
                  if($value3['response_option_id'] == 2){
                    $current_level = $levelNo - 1;
    
                    $exist = 0;
                    if(!empty($value3) && in_array($value3['question']['competency_questions'][0]['competency_id'],array_keys($fetchData))){
                      $patch[] = [
                                    'id' => $fetchData[$value3['question']['competency_questions'][0]['competency_id']],
                                    'current_level' =>  $current_level
                                ];
                      $exist = 1;
                    }else{
                      $data[] = [
                                'competency_id' => $value3['question']['competency_questions'][0]['competency_id'],
                                'employee_survey_id' => $value3['employee_survey_id'],
                                'current_level' => $current_level
                                ];
                    }

                    $curLevFound = true;
                    break;
                    }
                
              }
              if($curLevFound){
                break;
              }

          }
        if($curLevFound){
            continue;
        }else{
          if(in_array($competencyId, array_keys($fetchData))){
            $patch[] = [
                          'id' => $fetchData[$competencyId],
                          'current_level' => $levelNo
                        ];
          }else{
            $data[] = [
                          'competency_id' => $competencyId,
                          'employee_survey_id' => $employeeSurveyId,
                          'current_level' => $levelNo
                      ];
          }
        }
      }

      if(!empty($patch)){
          $surveyResultPatchData = $this->EmployeeSurveyResults->patchEntities($fetchSurveyResultData,$patch);
      }
      if(!empty($data)){
          $newEntity = $this->EmployeeSurveyResults->newEntities($data);
          $surveyResultNewData = $this->EmployeeSurveyResults->patchEntities($newEntity, $data);
      }
      if(isset($surveyResultNewData) && isset($surveyResultPatchData)){
        $saveSurveyResultData = array_merge($surveyResultNewData, $surveyResultPatchData);
      }elseif(isset($surveyResultPatchData)){
        $saveSurveyResultData = $surveyResultPatchData;
      }else{
        $saveSurveyResultData = $surveyResultNewData;
      }

      $this->EmployeeSurveyResults->saveMany($saveSurveyResultData);

      $this->set('response', [$indiSurveySave,$saveSurveyResultData]);
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