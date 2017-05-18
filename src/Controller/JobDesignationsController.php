<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
/**
 * JobDesignations Controller
 *
 * @property \App\Model\Table\JobDesignationsTable $JobDesignations
 */
class JobDesignationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $jobDesignations = $this->paginate($this->JobDesignations);

        $this->set(compact('jobDesignations'));
        $this->set('_serialize', ['jobDesignations']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Designation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobDesignation = $this->JobDesignations->get($id, [
            'contain' => ['UserJobDesignations','JobDesignationCompetencies.Competencies']
        ]);

        $relatedCompetencies = new Collection($jobDesignation['job_designation_competencies']);
        $relCompetency =  $relatedCompetencies->extract('competency.text');
        $relCompetency = $relCompetency->toArray();

        $this->set('relCompetency', $relCompetency);
        $this->set('jobDesignation', $jobDesignation);
        $this->set('_serialize', ['jobDesignation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobDesignation = $this->JobDesignations->newEntity();
        $this->loadModel('Competencies');
        $competencies = $this->Competencies->find()
                                            ->all()
                                            ->toArray();
        $selectedCompitancyData = [];
        if ($this->request->is('post')) {
            $selectedCompitancyId = $this->request->data['compitancy'];
            foreach ($selectedCompitancyId as $key => $value) {
                $selectedCompitancyData[]['competency_id']=$value;
            }
            $name = strtolower($this->request->data['label']);
            $data = ['name' => $name,
                      'label' => $this->request->data['label'],
                      'job_designation_competencies'=>$selectedCompitancyData
                  ];
            $jobDesignation = $this->JobDesignations->newEntity($data,['associated' => ['JobDesignationCompetencies']]);
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
     * Edit method
     *
     * @param string|null $id Job Designation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   

        $jobDesignation = $this->JobDesignations->get($id, [
            'contain' => ['JobDesignationCompetencies']
        ]);

        if(isset($jobDesignation->job_designation_competencies)){

          $jobDesignation->job_designation_competencies = (new Collection($jobDesignation->job_designation_competencies))->extract('competency_id')->toArray();     
        }else{
            $jobDesignation->job_designation_competencies = [];
        }

        $this->loadModel('Competencies');
        $competencies = $this->Competencies->find()
                                            ->all()
                                            ->toArray();
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
     * @param string|null $id Job Designation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobDesignation = $this->JobDesignations->get($id);
        if ($this->JobDesignations->delete($jobDesignation)) {
            $this->Flash->success(__('The job designation has been deleted.'));
        } else {
            $this->Flash->error(__('The job designation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
