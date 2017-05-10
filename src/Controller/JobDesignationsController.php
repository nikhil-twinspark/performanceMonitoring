<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['UserJobDesignations']
        ]);

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
        if ($this->request->is('post')) {
            $jobDesignation = $this->JobDesignations->patchEntity($jobDesignation, $this->request->data);
            if ($this->JobDesignations->save($jobDesignation)) {
                $this->Flash->success(__('The job designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job designation could not be saved. Please, try again.'));
        }
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
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobDesignation = $this->JobDesignations->patchEntity($jobDesignation, $this->request->data);
            if ($this->JobDesignations->save($jobDesignation)) {
                $this->Flash->success(__('The job designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job designation could not be saved. Please, try again.'));
        }
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
