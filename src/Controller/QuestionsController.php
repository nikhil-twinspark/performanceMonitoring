<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ResponseGroups']
        ];
        $questions = $this->paginate($this->Questions);
        $questions = $this->Questions->find()
                                     ->contain('CompetencyQuestions.Competencies')
                                     ->groupBy('competency_id')
                                     ->toArray();

        $this->set(compact('questions'));
        $this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['ResponseGroups','CompetencyQuestions.Competencies']
        ]);

        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        $this->loadModel('Competencies');
        $relatedCompetencies = $this->Competencies->find()
                                                  ->all();

        $competencies =  $relatedCompetencies->combine('id','text')
                                             ->toArray();

        $competencyMaxLevel = $relatedCompetencies->combine('id', 'maximum_level')
                                                ->toArray();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['competency_questions'][] = ['competency_id' => $this->request->data['competency_id']];
            $question = $this->Questions->newEntity($data, ['associated' =>['CompetencyQuestions']]);          
            $question = $this->Questions->patchEntity($question, $data, ['associated' =>['CompetencyQuestions']]);
            if ($this->Questions->save($question, ['associated' =>['CompetencyQuestions']])) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $responseGroups = $this->Questions->ResponseGroups->find('list', ['limit' => 200]);

        $this->set('competencyMaxLevel', $competencyMaxLevel);
        $this->set('relatedCompetencies', $relatedCompetencies);
        $this->set('competencies', $competencies);
        $this->set(compact('question', 'responseGroups'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Competencies');
        $relatedCompetencies = $this->Competencies->find()
                                                  ->all();

        $competencies =  $relatedCompetencies->combine('id','text')
                                             ->toArray();

        $competencyMaxLevel = $relatedCompetencies->combine('id', 'maximum_level')
                                                ->toArray();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['competency_questions'][] = ['competency_id' => $this->request->data['competency_id']];
            $question = $this->Questions->patchEntity($question, $data, ['associated' =>['CompetencyQuestions']]);
            if ($this->Questions->save($question, ['associated' =>['CompetencyQuestions']])) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $responseGroups = $this->Questions->ResponseGroups->find('list', ['limit' => 200]);

        $this->set('competencyMaxLevel', $competencyMaxLevel);
        $this->set('relatedCompetencies', $relatedCompetencies);
        $this->set('competencies', $competencies);
        $this->set(compact('question', 'responseGroups'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
