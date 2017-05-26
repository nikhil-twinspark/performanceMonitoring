<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<?= $this->Html->css(['plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css','plugins/iCheck/custom.css']) ?>
<?= $this->Html->script('plugins/iCheck/icheck.min') ?>
<div class="row" ng-app="employeeSurvey">
  <div class="col-lg-12" ng-controller = "surveyPage">{{backDiv}}
    <div style="background-color:#ffffff;" ng-hide="isSurveyStarted">
      <div class="ibox float-e-margins">
        <div class="ibox-content"> 
          <!-- <strong><p class="text-center"><small>Please take the Survey and let us know how we can help improve.</small></p></strong> -->
          <br>
          <div class="wrapper text-center"> <br><br>
            <button type="button" id="startemployeeSurvey" class="btn btn-primary text-center" ng-click="startSurvey()">You can start now.</button>
          </div>
        </div>
      </div>
    </div>
    <div class="hpanel" ng-repeat="survey in surveyData"  ng-show="isSurveyStarted && showDiv == $index" >
      <div class="panel-body">
      <div class="well" ng-show="isSurveyComplete">
                    <h3 class="list-group-item-heading">Great Job!</h3>
                    <p class="list-group-item-text">The survey is complete now. Would you like to continue editing or Submit the survey ? </p>
                    <button type="button" id="gotoSubmit" class="btn btn-outline btn-info text-center" ng-click="goToSubmission()" ng-disabled="isSurveyComplete === true ? false : true">Proceed to Submit</button>
      </div>
        <h4 class="text-center">{{survey.competency.text}}</h4>
        <br>
        <p class="text-center">{{survey.competency.description}}</p>
        <br>
        <div class="table-responsive" ng-repeat="question in survey.competency.competency_questions">
        <table class="table table-hover table-bordered table-striped">
      <input type="hidden" name="myFieldName" value="someValue" ng-init="surveyRes.surveyResponseId[question.id] = question.question.employee_survey_responses[0].id"/>
            <tbody>
              <tr>
                <td class="col-sm-1">
                  <span class="label label-success">Q{{$index+1}}</span>
                </td>
                <td class="issue-info col-sm-9">
                  <small>
                    {{question.question.text}}
                    <br><br>
                  </small>
                  <div class="questText" ng-if="surveyRes.checkbox[question.question.id] == 1">
                    <p style="color:black"><strong>Justification:</strong>
                      <input type="text" name="text1" ng-model="surveyRes.description[question.question.id]" maxlength="130">
                    </p>
                  </div>
                </td>
                <td>
                <div  ng-repeat="response in question.question.response_group.response_options">
                  <label >
                    <input icheck  type="radio" id="radio" ng-change = "response.id==2 ? surveyRes.description[question.question.id]='':''" name="responseOpt{{question.id}}" ng-model="surveyRes.checkbox[question.question.id]"  ng-value="response.id">
                  {{response.label}}
                  </label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <input type="button" value="Back" ng-if="showDiv" ng-click="goBack()">
          <input type="button" value="Next"  ng-click="submitResponses(question.id, 0)" >
        </div>      
      </div>
    </div>

    <div class="hpanel"  style="background-color:#ffffff;" ng-show="isSurveyComplete" >
             <div class="panel-head">                   
                <div class="ibox-title">
                    <h3 class="text-center">Survey Complete</h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="ibox-content"> 
                    <p class="text-center">Are there any changes that you want to make? If so, go back and do that now before hitting submit.
                        <br><br>
                         Hit submit to finalize this student's survey.
                    </p>
                    <div class="wrapper text-center">
                        <button type="button" id="submitlcSurvey" class="btn btn-primary text-center" ng-click="endSurvey()"  ng-disabled="isSurveyComplete === true ? false : true">Submit</button>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

<script type="text/javascript">
  <?php 

  echo "var getQuesUrl = '".$this->Url->build([
    "controller" => "EmployeeSurveys",
    "prefix" =>"api",
    "action" => "employeeSurveyQuestions"
    ])."';";
  echo "var startSurveyUrl = '".$this->Url->build([
    'plugin' => false,
    "prefix" =>"api",
    "controller" => "EmployeeSurveys",
    "action" => "startSurvey"
    ])."';";
  echo "var redirectUrl = '".$this->Url->build([
    "controller" => "Users",
    "action" => "employeeDashboard",
    ])."';";
  echo "var saveResUrl = '".$this->Url->build([
        'plugin' => false,
        "prefix" =>"api",
        "controller" => "EmployeeSurveys",
        "action" => "saveSurveyResponse"
        ])."';";
  echo "var endSurveyUrl = '".$this->Url->build([
        "prefix" =>"api",
        "controller" => "EmployeeSurveys", 
        "action" => "stopSurvey"
        ])."';";
  ?>
  var employeeSurvey = angular.module('employeeSurvey', []);

  employeeSurvey.directive('icheck', function($timeout){
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function($scope, element, $attrs, ngModel) {
        return $timeout(function() {
          var value;
          value = $attrs['value'];

          $scope.$watch($attrs['ngModel'], function(newValue){
            $(element).iCheck('update');
          })

          return $(element).iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'

          }).on('ifChanged', function(event) {
            if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
              $scope.$apply(function() {
                return ngModel.$setViewValue(event.target.checked);
              });
            }
            if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
              return $scope.$apply(function() {
                return ngModel.$setViewValue(value);
              });
            }
          });
        });
      }
    };
  });


  employeeSurvey.controller('surveyPage', function($scope, $http, $window, $timeout){

    $scope.isSurveyStarted = false;
    $scope.surveyId = 0;
    $scope.responses = '';
    $scope.surveyRes = {};
    $scope.surveyRes.checkbox = [];
    $scope.surveyRes.surveyResponseId = '';
    $scope.surveyRes.description = [];
    $scope.responseOptions = '';
    $scope.saveResponses = '';
    $scope.surveyData = new Object;
    $scope.showDiv = 0;
    $scope.isSurveyComplete = false;
    $scope.totalCount = 0;

    $scope.mapResponses = function(res){
        for(x in $scope.surveyData){
          for(y in $scope.surveyData[x].competency.competency_questions){

            var questionId = $scope.surveyData[x].competency.competency_questions[y].question_id;
            $scope.totalCount++;
            if(typeof $scope.surveyData[x].competency.competency_questions[y].question.employee_survey_responses[0] != 'undefined'){
                     
              var response = $scope.surveyData[x].competency.competency_questions[y].question.employee_survey_responses[0];
                $scope.surveyRes.checkbox[questionId] = response.response_option_id;
                
                if(typeof response.description != 'undefined'){
                  $scope.surveyRes.description[questionId] = response.description;
                }
            }
          }
        }
        // console.log('in mapResponses');
        console.log($scope.totalCount);
      }

    $scope.goBack = function(){
      $scope.showDiv--;    }  
    $scope.printModel = function(){

      console.log($scope.surveyRes);
    }
    $scope.startSurvey = function(){

      $scope.isSurveyStarted = true;

      $http.get(startSurveyUrl).then(function(response){
        $scope.surveyId = response.data.indiSurveyId;
        init();
      },function(response){
        console.log(response);
        console.log(redirectUrl);
        swal({
          title: "Error!",
          text: "Unable to start survey at this moment.",
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Okay",
          closeOnConfirm: false,
        },
        function(isConfirm){
          if(isConfirm) {
            window.location.replace(redirectUrl);
            console.log(redirectUrl);
          }

        });
      });
    }
    $scope.goToSubmission = function(){
            console.log('here');
            $scope.showDiv.slideTo(32, 0);
            console.log(showDiv);
        }
    $scope.submitResponses = function(){
      var data = [];

      for(x in $scope.surveyRes.checkbox) {
      
        if(typeof $scope.surveyRes.description != 'undefined' && typeof $scope.surveyRes.description[x] == 'undefined'){
          $scope.surveyRes.description[x] = null;
        }
        if(typeof $scope.surveyRes.surveyResponseId[x] == "undefined"){
          data.push({

            "employee_survey_id" : $scope.employeeSurveyId,
            "question_id" : x,
            "response_option_id" : $scope.surveyRes.checkbox[x],
            "description" : $scope.surveyRes.description[x]
          });
        }else{
           data.push({
            "id" : $scope.surveyRes.surveyResponseId[x],
            "employee_survey_id" : $scope.employeeSurveyId,
            "question_id" : x,
            "response_option_id" : $scope.surveyRes.checkbox[x],
            "description" : $scope.surveyRes.description[x]
          });
        }
      }
      // console.log(data);
      $http.post(saveResUrl, data)
            .then(function(response){
            }, function(response){
                console.log(response);
                swal({
                  title: "Error!",
                  text: "Could not save the response. Please try again",
                  type: "error",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Okay",
                  closeOnConfirm: true,
              });
            });

      $scope.responseCounter();
      $scope.showDiv++; 
    }

    function init(){
      $scope.surveyData = new Object;
      $http.get(getQuesUrl+'/'+$scope.surveyId+'.json').then(function(response){ 
        console.log(response);
        $scope.surveyData = response.data.surveyData;
        $scope.employeeSurveyId = response.data.employeeSurveyId;

        $scope.mapResponses();
      },
      function(response){
        console.log("couldn't fetch questions");
        console.log(response);
        swal({
          title: "Error!",
          text: "Unable to start survey at this moment." ,
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Okay",
          closeOnConfirm: false,  
        },
        function(isConfirm){
          if(isConfirm) {
            window.location.replace(redirectUrl);
          }

        });

      });
    }

    $scope.responseCounter = function(){
            // var totalCount = 0;
            var count = 0;
            console.log($scope.surveyRes.checkbox);
            for(x in $scope.surveyRes.checkbox){
                // totalCount++;
                if(typeof $scope.surveyRes.checkbox[x] != "undefined"){
                    count++;
                }
            }
            console.log('count is'+count);
            if($scope.totalCount == count){
                $scope.isSurveyComplete = true;
            }else{
                $scope.isSurveyComplete = false;
            }
        }

    $scope.endSurvey = function(){
            console.log('in endSurvey');
            console.log('going to responseCounter');
            $scope.responseCounter();
            $http.post(endSurveyUrl)
            .then(function(response){
                swal({
                  title: "Great Job",
                  text: "You've completed the survey.",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Okay",
                  closeOnConfirm: false,
                  },
                  function(isConfirm){
                      if(isConfirm) {
                        window.location.replace(redirectUrl);
                    }
                  });
            }, function(response){
                console.log(response);
               swal({
                  title: "Error!",
                  text: response.message,
                  type: "error",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Okay",
                  closeOnConfirm: false,
                  },
                  function(isConfirm){
                      if(isConfirm) {
                        swal("Try again.", "You could try submitting the survey again.", "error");
                    }
                });
               console.log(response);

           });
        }


  })
</script>
