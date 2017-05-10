<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $JobDesignation = TableRegistry::get('JobDesignations');
        $designations = $JobDesignation->find()->combine('id','label')->toArray();
        if ($this->request->is('post')) {
            $competency = $this->Competencies->patchEntity($competency, $this->request->data);
            if(!$competency->errors()){
                if ($this->Competencies->save($competency)){
                $data = ['job_designation_id'=>$this->Competencies->save($competency)['designation_id'] ,'competency_id'=>$this->Competencies->save($competency)['id']];
                $this->loadModel('JobDesignationCompetencies');
                $JobDesignationCompetencyData = $this->JobDesignationCompetencies->newEntity();
                $JobDesignationCompetencyData = $this->JobDesignationCompetencies->patchEntity($JobDesignationCompetencyData,$data);
                $this->JobDesignationCompetencies->save($JobDesignationCompetencyData);
                $this->Flash->success(__('The competency has been saved.'));

                return $this->redirect(['action' => 'index']);
                }    
            }
            $this->Flash->error(__('The competency could not be saved. Please, try again.'));
        }
        $this->set('designations', $designations);
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
            'contain' => []
        ]);
        $JobDesignation = TableRegistry::get('JobDesignations');
        $designations = $JobDesignation->find()->combine('id','label')->toArray();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $competency = $this->Competencies->patchEntity($competency, $this->request->data);
            if(!$competency->errors()){
                if ($this->Competencies->save($competency)){
                $data = ['job_designation_id'=>$this->Competencies->save($competency)['designation_id'] ,'competency_id'=>$this->Competencies->save($competency)['id']];
                $this->loadModel('JobDesignationCompetencies');
                $JobDesignationCompetencyData = $this->JobDesignationCompetencies->newEntity();
                $JobDesignationCompetencyData = $this->JobDesignationCompetencies->patchEntity($JobDesignationCompetencyData,$data);
                $this->JobDesignationCompetencies->save($JobDesignationCompetencyData);
                $this->Flash->success(__('The competency has been saved.'));

                return $this->redirect(['action' => 'index']);
                }    
            }
            $this->Flash->error(__('The competency could not be saved. Please, try again.'));
        }
        $this->set('designations', $designations);
        $this->set(compact('competency'));
        $this->set('_serialize', ['competency']);
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
