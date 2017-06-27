<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<?= $this->Html->css(['plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css','plugins/iCheck/custom.css']) ?>
<?= $this->Html->script('plugins/iCheck/icheck.min') ?>
<div class="row" ng-app="employeeSurvey">
  <div class="col-lg-12" ng-controller = "surveyPage">{{backDiv}}
    <div style="background-color:#ffffff;" ng-hide="isSurveyStarted">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <br>
          <div class="wrapper text-center"> <br><br>
            <button type="button" id="startemployeeSurvey" class="btn btn-primary text-center" ng-click="startSurvey()">You can start now.</button>
          </div>
        </div>
      </div>
    </div>
    <div class="hpanel"  >
      <div class="panel-body">
      <div class="row">
      <div class="col-lg-2">
        <a href="#" ng-repeat="survey in surveyData" class="row list-group-item text-center" id="{{survey.competency.id}}" ng-click="changeTab($index)">{{survey.competency.text}}</a>
      </div>
      <div class="col-lg-10" >
      <form name="empSurvey">
      <div ng-repeat="survey in surveyData"  ng-show="isSurveyStarted && showDiv == $index">
        <h4 class="text-center">{{survey.competency.text}}</h4>
        <br>
        <p class="text-center">{{survey.competency.description}}</p>
        <br>
        <div class="table-responsive" ng-repeat="question in survey.competency.competency_questions">
        <table class="table table-hover table-bordered table-striped">
      <input type="hidden" name="myFieldName" value="someValue" ng-init="surveyRes.surveyResponseId[question.question.id] = question.question.employee_survey_responses[0].id"/>
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
                    <p style="color:black" ><strong>Justification:</strong>
                      <textarea type="text" required="{{surveyRes.surveyResponseId[question.question.id]}}" name="jBox{{question.question.id}}" ng-model="surveyRes.description[question.question.id]" maxlength="130"></textarea>
                      <div ng-show="validateJustification[question.question.id]"><i class="fa fa-lg fa-info-circle"></i><strong> Please Justify your answer.<strong></div>
                    </p>
                  </div>
                </td>
                <td>
                <div  ng-repeat="response in question.question.response_group.response_options" >
                  <label >
                    <input icheck  type="radio" id="radio" ng-change = "response.id==2 ? surveyRes.description[question.question.id]='':''" required="{{surveyRes.surveyResponseId[question.question.id]}}" name="responseOpt{{question.id}}" ng-model="surveyRes.checkbox[question.question.id]"  ng-value="response.id">
                  {{response.label}}
                  </label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <!-- <input type="button" value="Back" ng-if="showDiv" ng-click="goBack()"> -->
          <!-- ng-disabled="empSurvey.$invalid" -->
          <input type="button" value="Save"  ng-click="submitResponses(question.id, 0)" >
        </div>    
        </div> 
      </form>
        </div> 
      </div>
          <div class="wrapper text-center" ng-show="isSurveyStarted" >
                <button type="button" id="submitEmployeeSurvey" class="btn btn-primary text-center" ng-click="endSurvey()">Submit </button>
          </div> 
        <!-- <div class="hpanel"  style="background-color:#ffffff;" ng-show="isSurveyStarted">
            <div class="panel-body"> 
                    <div class="wrapper text-center">
                        <button type="button" id="submitlcSurvey" class="btn btn-primary text-center" ng-click="endSurvey()"  ng-disabled="isSurveyComplete === true ? false : true" <?php echo $this->Url->build([
                                                                                          "controller" => "Users",
                                                                                          "action" => "employeeSurveyResults",
                                                                                ]);?> >Submit</button>
                    </div>
            <p class="text-center"> Hit submit to finalize this Employees' survey. </p>
            </div>
        </div>
    </div> -->

    <!-- <div class="hpanel"  style="background-color:#ffffff;" ng-show="isSurveyComplete" >
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
                        <button type="button" id="submitlcSurvey" class="btn btn-primary text-center" ng-click="endSurvey()"  ng-disabled="isSurveyComplete === true ? false : true" <?php echo $this->Url->build([
                                                                                          "controller" => "Users",
                                                                                          "action" => "employeeSurveyResults",
                                                                                ]);?> >Submit</button>
                    </div>
                </div>
            </div>
        </div> -->
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
    "action" => "employeeSurveyResults",
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
    $scope.submitButton = false;
    $scope.surveyData = new Object;
    $scope.showDiv = 0;
    $scope.isSurveyComplete = false;
    $scope.totalCount = 0;
    $scope.validateJustification =  {};

    $scope.mapResponses = function(res){
      $scope.totalCount = 0;
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
        console.log($scope.totalCount);
      }

    $scope.goBack = function(){
      $scope.showDiv--;    }  
    $scope.printModel = function(){

      console.log($scope.surveyRes);
    }

    $scope.changeTab = function(index){
      $scope.showDiv = index;
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
        }

    $scope.endSurvey = function(){
  
            $scope.responseCounter();
            $http.post(endSurveyUrl)
            .then(function(response){
              console.log('here');
              console.log(response);
              if(!response.data.incompleteCompetencies){
                swal({
                  title: "Great Job",
                  text: "You've completed the survey.",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Okay",
                  closeOnConfirm: false,
                  });
              }else{
                for(x in response.data.incompleteCompetencies){
                  $('#'+response.data.incompleteCompetencies[x]).css('background-color','yellow');
                } 
              }
                
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
        
    $scope.submitResponses = function(){
      console.log('in submitResponses');
      $scope.validateJustification = false;
        for(x in $scope.surveyRes.checkbox){
         if($scope.surveyRes.checkbox[x] == 1 && ($scope.surveyRes.description[x] == "" || $scope.surveyRes.description[x] == null)){
            if(!$scope.validateJustification){
              $scope.validateJustification = {};
            }
            $scope.validateJustification[x] = true;
          }

        }
        console.log($scope.validateJustification);
        if($scope.validateJustification){
          console.log('here');
          return false;
        }
      console.log('here2');
      $scope.submitButton = true;
      var data = [];
      for(x in $scope.surveyRes.checkbox) {
        if(typeof $scope.surveyRes.description != 'undefined' && typeof $scope.surveyRes.description[x] == 'undefined'){
          $scope.surveyRes.description[x] = null;
        }
        if(typeof $scope.surveyRes.surveyResponseId[x] == "undefined"){
          console.log('if');
          console.log(x);
          data.push({

            "employee_survey_id" : $scope.employeeSurveyId,
            "question_id" : x,
            "response_option_id" : $scope.surveyRes.checkbox[x],
            "description" : $scope.surveyRes.description[x]
          });
        }else{
          console.log('asfas');
          console.log($scope.surveyRes.surveyResponseId[x]);
          data.push({
            "id" : $scope.surveyRes.surveyResponseId[x],
            "employee_survey_id" : $scope.employeeSurveyId,
            "question_id" : x,
            "response_option_id" : $scope.surveyRes.checkbox[x],
            "description" : $scope.surveyRes.description[x]
          });
        }

      }
      console.log(data);

      $http.post(saveResUrl, data)
            .then(function(response){
              init();
            }, function(response){
              //   console.log(response);
              //   swal({
              //     title: "Error!",
              //     text: "Could not save the response. Please try again",
              //     type: "error",
              //     showCancelButton: true,
              //     confirmButtonColor: "#DD6B55",
              //     confirmButtonText: "Okay",
              //     closeOnConfirm: true,
              // });
            });


      $scope.responseCounter();
      $scope.showDiv++; 
    }

        $scope.checkQuestions = function(){

        for(key in $scope.surveyRes.checkbox){

          if(typeof $scope.surveyRes.checkbox[key] == "undefined"){

            return true;

          }

        }
        
        return false;

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




  })
</script>

