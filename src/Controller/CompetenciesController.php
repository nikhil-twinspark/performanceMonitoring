<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

/**
 * Competencies Controller
 *
 * @property \App\Model\Table\CompetenciesTable $Competencies
 */
class CompetenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        $competencies = $this->paginate($this->Competencies);
        $competencies = $this->Competencies->find()
                                           ->contain('JobDesignationCompetencies.JobDesignations')
                                           ->groupBy('competency_id')
                                           ->toArray();

        $this->set(compact('competencies'));
        $this->set('_serialize', ['competencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Competency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competency = $this->Competencies->get($id, [
            'contain' => ['JobDesignationCompetencies']
        ]);

        $this->set('competency', $competency);
        $this->set('_serialize', ['competency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competency = $this->Competencies->newEntity();
        $this->loadModel('JobDesignations');
        $JobDesignations = $this->JobDesignations->find()
                                                ->all()
                                                ->toArray();
        $selectedJobDesignationData = [];
        if ($this->request->is('post')) {
            $selectedJobDesignationId = $this->request->data['job_designation_id'];
            foreach ($selectedJobDesignationId as $key => $value) {
                $selectedJobDesignationData[]['job_designation_id'] = $value;
            }
            $data = ['text' => $this->request->data['text'],
                      'maximum_level' => $this->request->data['maximum_level'],
                      'description' => $this->request->data['description'],
                      'job_designation_competencies' => $selectedJobDesignationData
                      ];
            $competency = $this->Competencies->newEntity($data, ['associated' =>['JobDesignationCompetencies']]);          
            $competency = $this->Competencies->patchEntity($competency, $data, ['associated' =>['JobDesignationCompetencies']]);
            if(!$competency->errors()){
                if ($this->Competencies->save($competency,['associated' =>['JobDesignationCompetencies']])){
                $this->Flash->success(__('The competency has been saved.'));

                return $this->redirect(['action' => 'index']);
                }    
            }
            $this->Flash->error(__('The competency could not be saved. Please, try again.'));
        }
        $this->set('JobDesignations', $JobDesignations);
        $this->set(compact('competency'));
        $this->set('_serialize', ['competency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Competency id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competency = $this->Competencies->get($id, [
            'contain' => ['JobDesignationCompetencies']
        ]);
        if(isset($competency->job_designation_competencies)){
            $competency->job_designation_competencies = (new Collection($competency->job_designation_competencies))->extract('job_designation_id')->toArray();
        }else{
            $competency->job_designation_competencies = [];
        }
        $this->loadModel('JobDesignations');
        $jobDesignations = $this->JobDesignations->find()
                                            ->all()
                                            ->toArray();
        $selectedJobDesignationData = [];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selectedJobDesignationId = $this->request->data['job_designation_id'];
            foreach ($selectedJobDesignationId as $key => $value) {
                $selectedJobDesignationData[]['job_designation_id'] = $value;
            }
            $data = ['text' => $this->request->data['text'],
                      'maximum_level' => $this->request->data['maximum_level'],
                      'description' => $this->request->data['description'],
                      'job_designation_competencies' => $selectedJobDesignationData
                      ];
            $competency = $this->Competencies->patchEntity($competency,$data, ['associated' => ['JobDesignationCompetencies']]);
                if ($this->Competencies->save($competency, ['associated' => ['JobDesignationCompetencies']])){
                $this->Flash->success(__('The competency has been saved.'));
                return $this->redirect(['action' => 'index']);
                }    
            $this->Flash->error(__('The competency could not be saved. Please, try again.'));
        }
        $this->set('jobDesignations', $jobDesignations);
        $this->set(compact('competency'));
        $this->set('_serialize', ['competency']);
    }

    public function e($id = null)
    {   
        $selectedCompitancyData = [];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selectedCompitancyId = $this->request->data['compitancy'];
            foreach ($selectedCompitancyId as $key => $value) {
                $selectedCompitancyData[]['competency_id']=$value;   
            }
            $name = strtolower($this->request->data['label']);
            $data = ['name' => $name,
                      'label' => $this->request->data['label'],
                      'job_designation_competencies'=>$selectedCompitancyData
                  ];
            
            $jobDesignation = $this->JobDesignations->patchEntity($jobDesignation,$data,['associated' => ['JobDesignationCompetencies']]);
            if ($this->JobDesignations->save($jobDesignation, ['associated' => ['JobDesignationCompetencies']])) {
                $this->Flash->success(__('The job designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job designation could not be saved. Please, try again.'));
        }
        $this->set('competencies', $competencies);
        $this->set(compact('jobDesignation'));
        $this->set('_serialize', ['jobDesignation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Competency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $competency = $this->Competencies->get($id);
        if ($this->Competencies->delete($competency)) {
            $this->Flash->success(__('The competency has been deleted.'));
        } else {
            $this->Flash->error(__('The competency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
